<?php

use militska\SBAcquiringApi\src\Configuration;
use militska\acq\src\AcquiringApi;
use militska\acq\src\requests\RegisterRequest;

include(__DIR__ . '/../vendor/autoload.php');

$confFile = include __DIR__ . '/../src/config/config_test.php';
$conf = new Configuration($confFile);
$logger = new \Monolog\Logger('t');

$requestCreate = new RegisterRequest();
$requestCreate->orderNumber = 123;
$requestCreate->amount = 100;
$requestCreate->description = 'test';

$api = new AcquiringApi($conf, $logger);

$res = $api->create($requestCreate);
var_export($conf);