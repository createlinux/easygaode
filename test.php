<?php
require_once './vendor/autoload.php';

$key = '20d1331c238cc91b8c1a3319b5bc8fe1';


$easygaode = new \Createlinux\EasyGaoDe\Application($key);

$regeocode = $easygaode->createReGeoCode();
$regeocode->setLocation("113.667892,34.720432");
$regeocode->setOutput(\Createlinux\EasyGaoDe\Enums\OutputInterface::json);
$response = $regeocode->query();

if ($response->isFailed()) {
    return print_r($response->getInfo() . "\n");
}

$reGeoCode = $response->getReGeoCode();
print_r($reGeoCode->getAddressComponent());