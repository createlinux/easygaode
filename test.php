<?php
require_once './vendor/autoload.php';

$key = 'fab933e2cf9c631ad0a59f1f6dd9db93';
$easygaode = new \Createlinux\EasyGaoDe\Application($key);
$ipLocator = $easygaode->createIPLocator();
$ipLocator->setIp('221.15.188.248');

$response = $ipLocator->query();
