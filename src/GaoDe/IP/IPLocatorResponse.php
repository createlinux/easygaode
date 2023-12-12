<?php

namespace Createlinux\EasyGaoDe\GaoDe\IP;

use Createlinux\EasyGaoDe\Http\ResponseAbstract;

/**
 * IP定位返回对象
 */
class IPLocatorResponse extends ResponseAbstract
{

    /**
     * @return string 若为直辖市则显示直辖市名称；如果在局域网 IP网段内，则返回“局域网”；非法IP以及国外IP则返回空
     */
    public function getProvince()
    {
        return $this->resultArray['province'] ?? null;
    }

    /***
     * @return mixed|null 获取城市
     */
    public function getCity()
    {
        return $this->resultArray['city'] ?? null;
    }

    /**
     * @return mixed|null 城市的adcode编码
     */
    public function getAdCode()
    {
        return $this->resultArray['adcode'] ?? null;
    }

    /**
     * @return mixed|null 所在城市矩形区域范围 所在城市范围的左下右上对标对
     */
    public function getRectangle()
    {
        return $this->resultArray['rectangle'] ?? null;
    }


}