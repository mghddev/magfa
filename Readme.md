### Magfa API Client for sending sms

you can find usage of this library down here,

````php

<?php
use mghddev\adp\AdpApiClient;
use mghddev\adp\ValueObject\Message;
use mghddev\adp\ValueObject\ReportVO;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'vendor/autoload.php';

$domain = '***';
$username = '******';
$password = '*********';

$client = new MagfaApiClient($domain, $username, $password);

$message = (new EnqueueVO())
    ->setTo('989128049107')
    ->setFrom('98300079416')
    ->setMessage('سلام آقا')
    ->setMClass(1);

$result = $client->send([$message]);

$status = $client->getStatus($result[0]);