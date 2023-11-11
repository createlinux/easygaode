<?php

namespace Createlinux\EasyGaoDe\GaoDe\Coordinate;

use Createlinux\EasyGaoDe\Abstracts\GaoDeServiceAbstract;
use Createlinux\EasyGaoDe\Enums\OutputInterface;
use Createlinux\EasyGaoDe\Http\ResponseAbstract;

class CoordinateConvert extends GaoDeServiceAbstract
{
    protected string $url = 'https://restapi.amap.com/v3/assistant/coordinate/convert';

    /**
     * @var string 经度和纬度用","分割，经度在前，纬度在后，经纬度小数点后不得超过6位。多个坐标对之间用”|”进行分隔最多支持40对坐标。
     */
    protected string $locations = '';
    /**
     * @var string gps;mapbar;baidu;autonavi(不进行转换)
     */
    protected string $coordsys = '';

    /**
     * @var string 可选值：JSON,XML
     */
    protected string $output = OutputInterface::json;


    function query(): CoordinateConvertResponse
    {
        $result = $this->request->get($this->url,[
            'key' => $this->getKey(),
            'coordsys' => $this->getCoordsys(),
            'locations' => $this->getLocations(),
            'sig' => $this->getSig(),
            'output' => $this->getOutput()
        ]);
        return new CoordinateConvertResponse($result);
    }

    public function getLocations(): string
    {
        return $this->locations;
    }

    public function setLocations(string $locations): void
    {
        $locationsArray = explode("|",$locations);
        if(count($locationsArray) > 40){
            throw new \InvalidArgumentException("locations参数最多支持40对坐标");
        }
        $this->locations = $locations;
    }

    public function getCoordsys(): string
    {
        return $this->coordsys;
    }

    public function setCoordsys(string $coordsys): void
    {
        $this->coordsys = $coordsys;
    }

    public function getOutput(): string
    {
        return $this->output;
    }

    public function setOutput(string $output): void
    {
        $this->output = $output;
    }

}