<?php

namespace Createlinux\EasyGaoDe\GaoDe\GeoCode;

use Createlinux\EasyGaoDe\Http\ResponseAbstract;

class ReGeoResponse extends ResponseAbstract
{
    /**
     * 地理编码信息列表 结果对象列表
     * @var ReGeoCodeCollection
     */
    protected ?ReGeoCodeCollection $reGeoCodes = null;

    /**
     * @remark
     * @return ReGeoCodeCollection
     */
    public function getReGeoCodes(): ReGeoCodeCollection
    {
        if ($this->reGeoCodes === null) {
            $collection = new ReGeoCodeCollection();
            //TODO
        }
    }

}