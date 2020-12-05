<?php

namespace militska\SBAcquiringApi\src;
/***
 * Адреса для запросов
 * Class Url
 */
class Url
{
    /** @var string Создание заказа на оплату, сразу
     * в ответ получим ссылку для платежную форму на стороне сбербанка
     */
    const REGISTER = '/payment/rest/register.do';

    /** @var string Расширенная информация о состоянии платежа, рекомендованная */
    const ORDER_EXTEND_STATUS = '/payment/rest/getOrderStatusExtended.do';
}