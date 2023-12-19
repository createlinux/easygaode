<?php

namespace Createlinux\EasyGaoDe\GaoDe\GeoCode;

use Createlinux\EasyGaoDe\GaoDe\GeoCode\Properties\AddressComponent;
//TODO
class ReGeoCode
{
    protected string $formattedAddress = '';

    protected ?AddressComponent $addressComponent;

    /**
     *
     * @remark
     * @return string 格式化地址信息
     */
    public function getFormattedAddress(): string
    {
        return $this->formattedAddress;
    }

    public function setFormattedAddress(string $formattedAddress): void
    {
        $this->formattedAddress = $formattedAddress;
    }

    public function getAddressComponent(): ?AddressComponent
    {
        return $this->addressComponent;
    }

    public function setAddressComponent(?AddressComponent $addressComponent): void
    {
        $this->addressComponent = $addressComponent;
    }
}