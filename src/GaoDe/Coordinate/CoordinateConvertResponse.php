<?php

namespace Createlinux\EasyGaoDe\GaoDe\Coordinate;

use Createlinux\EasyGaoDe\Http\ResponseAbstract;

class CoordinateConvertResponse extends ResponseAbstract
{
    public function getLocations()
    {
        return $this->resultArray['locations'];
    }

    public function getLocationCollection(): LocationCollection
    {
        return new LocationCollection(explode(";", $this->getLocations()));
    }
}