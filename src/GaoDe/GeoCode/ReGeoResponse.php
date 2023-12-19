<?php

namespace Createlinux\EasyGaoDe\GaoDe\GeoCode;

use Createlinux\EasyGaoDe\GaoDe\GeoCode\Properties\AddressComponent;
use Createlinux\EasyGaoDe\Http\ResponseAbstract;

//TODO
class ReGeoResponse extends ResponseAbstract
{
    /**
     * 地理编码信息 结果对象
     * @var
     */


    /**
     * 返回地理编码信息对象
     * @remark
     * @return ReGeoCode
     */
    public function getReGeoCode():?ReGeoCode
    {
        $reGeoCodeArray = $this->resultArray['regeocode'] ?? null;
        if(!$reGeoCodeArray) return null;

        $reGeoCode = new ReGeoCode();
        $reGeoCode->setFormattedAddress($reGeoCodeArray['formatted_address']);

        $addressComponent = new AddressComponent();
        $addressComponent->setCity($reGeoCodeArray['addressComponent']['city']);
        $addressComponent->setTownship($reGeoCodeArray['addressComponent']['township']);
        $addressComponent->setAdcode($reGeoCodeArray['addressComponent']['adcode']);
        $addressComponent->setDistrict($reGeoCodeArray['addressComponent']['district']);
        $addressComponent->setCounty($reGeoCodeArray['addressComponent']['country']);
        $addressComponent->setProvince($reGeoCodeArray['addressComponent']['province']);


        $reGeoCode->setAddressComponent($addressComponent);
        return $reGeoCode;
    }

}