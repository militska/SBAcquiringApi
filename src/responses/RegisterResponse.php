<?php

namespace militska\SBAcquiringApi\src\responses;

use militska\SBAcquiringApi\src\BaseDto;

/**
 * Данные с ответом на запрос регистриации платежа
 *
 * Class RegisterResponse
 * @see https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
 */
class RegisterResponse extends BaseDto
{
    /* @var int Код успешной оплаты* */
    const SUCCESS_ERROR_CODE = 0;

    /**@var int Код ошибки (см документацию)*/
    public $errorCode = self::SUCCESS_ERROR_CODE;

    /**@var string Текст ошибки */
    public $errorMessage;

    /**@var string Номер заказа в платёжном шлюзе. Уникален в пределах шлюза.*/
    public $orderId;

    /**@var string URL-адрес платёжной формы */
    public $formUrl;

}