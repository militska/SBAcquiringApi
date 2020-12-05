<?php

namespace militska\SBAcquiringApi\src\requests;

use militska\SBAcquiringApi\src\BaseDto;

/**
 * Даннные для запроса на создание заказа
 *
 * @see https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
 *
 * Class RegisterRequest
 */
class RegisterRequest extends BaseDto
{

    /** @var  int Russian Ruble  ISO 4217 */
    const AMOUNT_RUSSIAN_RUBLE = 643;

    /**@var int Номер (идентификатор) заказа у нас, */
    public $orderNumber;

    /**@var string Номер заказа в платёжном шлюзе. Уникален в пределах шлюза. */
    public $amount = self::AMOUNT_RUSSIAN_RUBLE;

    /**@var string URL-адрес платёжной формы */
    public $currency;

    /**@var string Текст ошибки */
    public $returnUrl;

    /**@var string Текст ошибки */
    public $failUrl;

    /**@var string Номер заказа в платёжном шлюзе. Уникален в пределах шлюза. */
    public $description;

    /**@var string URL-адрес платёжной формы */
    public $clientId;

    /**@var array Номер заказа в платёжном шлюзе. Уникален в пределах шлюза. */
    public $jsonParams;

    /**@var string URL-адрес платёжной формы */
    public $features;

}