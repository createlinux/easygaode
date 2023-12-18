<?php

namespace Createlinux\EasyGaoDe\GaoDe\GeoCode;

use Createlinux\EasyGaoDe\Abstracts\CollectionAbstract;
use Illuminate\Support\Arr;

class GeoCodeCollection extends CollectionAbstract
{
    /**
     * 返回geocodes第一条数据
     * @remark
     * @param callable|null $callback
     * @param $default
     * @return GeoCodeItem
     */
    public function first(callable $callback = null, $default = null)
    {
        return Arr::first($this->items, $callback, $default);
    }
}