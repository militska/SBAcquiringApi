<?php
namespace militska\SBAcquiringApi\src;

/**
 * Статусы заказа
 *
 * Class State
 * @package militska\sberacc\src
 */
class State
{
    /** @var integer Зарегестрирован, но не оплачен */
    const ORDER_STATE_REGISTER_NOT_PAID = 0;

    /** @var integer Сумма захолдирована */
    const ORDER_STATE_HOLD_AMOUNT = 1;

    /** @var integer Успешное списание */
    const ORDER_STATE_AUTH_ORDER_AMOUNT = 2;

    /** @var integer Списание отменено */
    const ORDER_STATE_AUTH_CANCELED = 3;

    /** @var integer Отменена транзакция */
    const ORDER_STATE_TRANS_RETURN = 4;

    /** @var integer Начали авторизацию 3ds */
    const ORDER_STATE_AUTH_BY_ACS = 5;

    /** @var integer  Отклонили авторизацию */
    const ORDER_STATE_AUTH_REJECTED = 6;

}