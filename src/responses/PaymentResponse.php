<?php

namespace militska\SBAcquiringApi\src\responses;

use militska\SBAcquiringApi\src\BaseDto;

/**
 * Данные с ответом расширенного запроса состояния заказа.
 *
 * Class PaymentResponse
 * @package common\components\sberbank\response
 */
class PaymentResponse extends BaseDto
{
    /* @var int Код успешной оплаты* */
    const SUCCESS_ACTION_CODE = 0;

    /* @var int Заказ не найден */
    const ORDER_NOT_FOUND_ERROR_CODE = 6;

    /* @var int Не было успешных попыток оплаты */
    const NO_TRY_PAYMNENT_ACTION_CODE = -100;

    /**@var int Код ошибки
     * @see https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getorderstatusextended#коды_ошибок
     */
    public $errorCode = self::SUCCESS_ACTION_CODE;

    /**@var string Текст ошибки */
    public $errorMessage;

    /**@var int Код Валюты */
    public $currency;

    /**@var int состояние заказа */
    public $orderStatus;

    /**@var int ид заказа в системе магазина */
    public $orderNumber;

    /**@var int Описание заказа */
    public $orderDescription;

    /**@var int Дата платежа */
    public $date;

    /**@var string Адрес с которого выполнили операцию */
    public $ip;

    /**@var array Дополнительные параметры мерчанта, к примеру email */
    public $merchantOrderParams;

    /**@var array Параметры с ид заказа в ПС */
    public $attributes;

    /**@var array */
    public $transactionAttributes;

    /**@var string  Дата/время авторизации */
    public $authDateTime;

    /**@var int Адрес с которого выполнили операцию */
    public $terminalId;

    /**@var int Id терминала */
    public $authRefNum;

    /**@var array Информацией о суммах подтверждения, списания, возврата */
    public $paymentAmountInfo;

    /**@var array  Информация о банке-эмитенте (выпустившем карту) */
    public $bankInfo;

    /**@var array Технические данные об авторизации карты */
    public $cardAuthInfo;

    /**@var string Сумма платежа в копейках */
    public $amount;

    /**@var array Массив с данными о связке платежа */
    public $bindingInfo;

    /**@var string Код ошибки
     * @see https://securepayments.sberbank.ru/wiki/doku.php/integration:api:actioncode
     */
    public $actionCode;

    /**@var string Понятный текст ошибки */
    public $actionCodeDescription;

    /**@var string Полная строка с данными о состоянии платежа во внешней системе */
    public $extendStateString;

    /**@var string Дата истечения срока действия карты */
    public $expiration;

    /**@var string Маскированный номер карты */
    public $maskPan;

    /**@var string Связка для автоплатежей */
    public $bindingId;

    /**@var bool Были ли средства принудительно возвращены покупателю банком */
    public $chargeback;

    /**@var string Способ совершения платежа (платёж с вводом карточных данных, оплата по связке и т. п.) */
    public $paymentWay;

}