<?php
require_once './vendor/autoload.php';

use \Createlinux\EasyGaoDe\Application;

$key = '4fcfb2a6b78f1cc21fbe4c63f68c56b9';
$easygaode = new \Createlinux\EasyGaoDe\Application($key);
$ipLocator = $easygaode->createIPLocator();
$queryResult = $ipLocator
    ->setIp('')
    ->query();

//TODO 出错了
$ipLocator = new \Createlinux\EasyGaoDe\IP\IPLocator($key);
$response = $ipLocator->setIp('115.60.167.38')->query();

print_r($response->getArrayBody());