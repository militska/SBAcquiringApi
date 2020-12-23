### Rest клиент для эквайинга сбербанка

Простой клиент для апи, и очень много логирования.


```php
$confFile = include __DIR__ . '/../src/config/config_test.php';
$conf = new Configuration($confFile);
$logger = new \Monolog\Logger('t');

$requestCreate = new RegisterRequest();
$requestCreate->orderNumber = 123;
$requestCreate->amount = 100;
$requestCreate->description = 'test';

$api = new SberbankAcquiringApi($conf, $logger);

$res = $api->create($requestCreate);
var_export($conf);`