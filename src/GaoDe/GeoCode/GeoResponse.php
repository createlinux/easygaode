<?php

namespace Createlinux\EasyGaoDe\GaoDe\GeoCode;

use Createlinux\EasyGaoDe\Http\ResponseAbstract;

class GeoResponse extends ResponseAbstract
{
    protected array $geocodes = [];

    /**
     * @title 请填写标题
     * @return array<GeoCodeItem>
     */
    public function getGeocodes(): array
    {
        return $this->resultArray['geocodes'];
    }
}