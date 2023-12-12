<?php

namespace Createlinux\EasyGaoDe\GaoDe\Coordinate;

use Createlinux\EasyGaoDe\Enums\CoordsysInterface;
use Createlinux\EasyGaoDe\Http\ResponseAbstract;

class CoordinateConvertResponse extends ResponseAbstract
{

    protected string $coordsys = CoordsysInterface::autonavi;

    public function __construct(string $result, string $coordsys = CoordsysInterface::autonavi)
    {
        parent::__construct($result);
        $this->coordsys = $coordsys;
    }

    /**
     *
     * @remark 获取返回值locations坐标对，如果coordsys值为autonavi则分隔符号为|，否则坐标对为;
     * @return mixed
     */
    public function getLocations()
    {
        return $this->resultArray['locations'];
    }

    /**
     *
     * @link https://github.com/illuminate/collections
     * @remark
     * @return LocationCollection 获取locations合集
     */
    public function getLocationCollection(): LocationCollection
    {
        $splitParameter = $this->getCoordsys() === CoordsysInterface::autonavi ? '|': ';';
        return new LocationCollection(explode($splitParameter, $this->getLocations()));
    }

    protected function getCoordsys(): string
    {
        return $this->coordsys;
    }
}