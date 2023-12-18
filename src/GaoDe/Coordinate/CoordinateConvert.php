<?php

namespace Createlinux\EasyGaoDe\GaoDe\Coordinate;

use Createlinux\EasyGaoDe\Abstracts\GaoDeServiceAbstract;
use Createlinux\EasyGaoDe\Enums\OutputInterface;
use Createlinux\EasyGaoDe\Http\ResponseAbstract;

/**
 * @class 坐标转换
 *
 */
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
     *
     * 请求接口查询
     * @remark
     * @return CoordinateConvertResponse
     * @throws \Exception
     */
    function query(): CoordinateConvertResponse
    {
        if(!$this->getLocations()){
            throw new \InvalidArgumentException("请使用setLocations()设置坐标对");
        }
        $result = $this->request->get($this->url,[
            'key' => $this->getKey(),
            'coordsys' => $this->getCoordsys(),
            'locations' => $this->getLocations(),
            'sig' => $this->getSig(),
            'output' => $this->getOutput()
        ]);

        return new CoordinateConvertResponse($result,$this->getCoordsys());
    }

    /**
     *
     * @remark
     * @return string
     */
    public function getLocations(): string
    {
        return $this->locations;
    }

    /**
     *
     * @remark
     * @param string $locations 经度和纬度用","分割，经度在前，纬度在后，经纬度小数点后不得超过6位。多个坐标对之间用”|”进行分隔最多支持40对坐标。
     * @return void
     */
    public function setLocations(string $locations): void
    {
        $locationsArray = explode(";",$locations);
        if(count($locationsArray) > 40){
            throw new \InvalidArgumentException("locations参数最多支持40对坐标");
        }
        $this->locations = $locations;
    }

    /**
     *
     * @remark
     * @return string 获取设置的原坐标系
     */
    public function getCoordsys(): string
    {
        return $this->coordsys;
    }

    /**
     *
     * @remark
     * @param string $coordsys 默认值：autonavi(不进行转换) 可选值：gps;mapbar;baidu;请使用填写Createlinux\EasyGaoDe\Enums\CoordsysInterface;
     *
     * @return void
     */
    public function setCoordsys(string $coordsys): void
    {
        $this->coordsys = $coordsys;
    }

}