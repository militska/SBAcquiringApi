<?php
namespace militska\SBAcquiringApi\src;

/****
 * Class Configuration
 */
class Configuration extends BaseDto
{
    /** @var array Через какого пользователя поведем платеж */
    public $username;

    /** @var array Через какого пользователя поведем платеж */
    public $password;

    /** @var string Ресурс, на который шлем запросы (боевая, тестовая среда) */
    public $baseUrl;

    /** *@var string Страница редиректа успешной оплаты. ПС отправит туда клиента */
    public $success;

    /** *@var string Страница редиректа при попытке оплаты с ошибкой. ПС отправит туда клиента */
    public $error;

}