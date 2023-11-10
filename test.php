<?php
require_once './vendor/autoload.php';

$key = 'fab933e2cf9c631ad0a59f1f6dd9db93';
$easygaode = new \Createlinux\EasyGaoDe\Application($key);
$ipLocator = $easygaode->createIPLocator();
/*$response = $ipLocator->setIp('115.60.160.49')->query();
print_r($response);
die;*/
$geo = new \Createlinux\EasyGaoDe\GaoDe\GeoCode\Geo($key);
$geo->setAddress("北京市朝阳区阜通东大街6号");
$geo->setCity("北京");

$response = $geo->query();
$geoCodes = $response->getGeocodes();

print_r($geoCodes);