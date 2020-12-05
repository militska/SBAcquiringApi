<?php

namespace militska\SBAcquiringApi\src;

use Exception;
use militska\SBAcquiringApi\src\Configuration;
use militska\SBAcquiringApi\src\requests\RegisterRequest;
use militska\SBAcquiringApi\src\responses\PaymentResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use militska\SBAcquiringApi\src\responses\RegisterResponse;
use Monolog\Logger;

/**
 * Класс работы с апи по платежам картами.
 *
 * Class AcquiringApi
 * @see https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
 */
class AcquiringApi
{
    /** @var int таймаут для запросов по умолчанию */
    const DEFAULT_TIMEOUT = 10;

    /*** @var Client $client */
    private $client;

    /*** @var Configuration */
    private $configuration;

    /*** @var \Monolog\Logger */
    private $logger;

    /***
     * AcquiringApi constructor.
     * @param Configuration $configure
     * @param Logger $logger
     */
    public function __construct($configure, $logger)
    {
        $this->client = new \GuzzleHttp\Client();
        $this->logger = $logger;
        $this->configuration = $configure;
    }

    /**
     * Получение расширенного состояния заказа
     * @param integer $orderId
     * @return PaymentResponse
     */
    public function getOrderExtendStatus(int $orderId): PaymentResponse
    {
        $url = $this->configuration->baseUrl . Url::ORDER_EXTEND_STATUS;
        $postParams = array_merge(['orderNumber' => $orderId], $this->getAuthParams());

        $this->logger->log(
            Logger::INFO,
            "SBAcquiringApi.getOrderExtendStatus() params for sberbank " .
            "orderId={$orderId};" .
            "url={$url};" .
            "params" . var_export($this->maskedPassword($postParams), true),);

        try {
            $response = $this->client->post($url, [
                'headers' => $this->getHeaders(),
                'timeout' => self::DEFAULT_TIMEOUT,
                'form_params' => $postParams,
            ]);
        } catch (GuzzleException|Exception $e) {
            $this->logger->log(
                Logger::WARNING,
                "SBAcquiringApi.getOrderExtendStatus() exception " .
                "orderId={$orderId};" .
                "url={$url};" .
                "message={$e->getMessage()};"
            );

            return (new PaymentResponse([['errorCode' => 9999, 'errorMessage' => $e->getMessage()]]));
        }

        $responseSource = json_decode($response->getBody(), true);
        $this->logger->log(
            Logger::INFO . var_export($responseSource, true),
            "SBAcquiringApi.getOrderExtendStatus() params from sberbank; " .
            "orderId={$orderId};" .
            "url={$url};" .
            "params". var_export($responseSource, true)
        );

        return (new PaymentResponse($responseSource));
    }

    /***
     * @param RegisterRequest $request
     * @return RegisterResponse
     */
    public function create(RegisterRequest $request): RegisterResponse
    {
        $url = $this->configuration->baseUrl . Url::REGISTER;
        $postParams = array_merge($request->getAttributes(), $this->getAuthParams());

        $this->logger->log(
            Logger::INFO,
            "SberbankAcquiringApi.create() params for sberbank" .
            "orderId=" . $request->orderNumber . "; " .
            "url={$url}; " .
            "params" . var_export($this->maskedPassword($postParams), true)
        );

        try {
            $response = $this->client->post($url, [
                'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
                'form_params' => $postParams,
                'timeout' => 10,
            ]);

        } catch (GuzzleException|Exception $e) {
            $this->logger->log(
                Logger::WARNING,
                "SBAcquiringApi.getOrderExtendStatus() exception " .
                "orderId={$request->orderNumber};" .
                "url={$url};" .
                "message={$e->getMessage()};"
            );

            return (new RegisterResponse([['errorCode' => 9999, 'errorMessage' => $e->getMessage()]]));
        }
        $responseSource = json_decode($response->getBody(), true);

        $this->logger->log(
            Logger::INFO, "SberbankAcquiringApi.create() params from sberbank; " .
            "orderId={$request->orderNumber};" .
            "url={$url};" .
            "params" . var_export($responseSource, true)
        );

        return (new RegisterResponse($responseSource));
    }

    /**
     * @return array
     */
    private function getHeaders()
    {
        return ['Content-Type' => 'application/x-www-form-urlencoded'];
    }

    /**
     * @return array
     */
    private function getAuthParams()
    {
        return [
            'userName' => $this->configuration->username,
            'password' => $this->configuration->password,
        ];
    }

    /**
     * Затереть пароль для записи в логи
     * @param array $params
     * @return array
     */
    private function maskedPassword(array $params)
    {
        unset($params['password']);

        return $params;
    }
}
