<?php

namespace Createlinux\EasyGaoDe\GaoDe\GeoCode;

use Createlinux\EasyGaoDe\Abstracts\GaoDeServiceAbstract;
use Createlinux\EasyGaoDe\Http\ResponseAbstract;

class ReGeo extends GaoDeServiceAbstract
{
    protected string $url = 'https://restapi.amap.com/v3/geocode/regeo';
    protected string $location = '';
    protected string $poiType = '';
    /**
     * @var string 搜索半径 radius取值范围在0~3000，默认是1000。单位：米
     */
    protected string $radius = '1000';
    /**
     * @var string 返回结果控制 extensions 参数默认取值是 base，也就是返回基本地址信息；
     * extensions 参数取值为 all 时会返回基本地址信息、附近 POI 内容、道路信息以及道路交叉口信息。
     */
    protected string $extensions = 'base';

    /**
     * @var string 道路等级 以下内容需要 extensions 参数为 all 时才生效。 可选值：0，1 当roadlevel=0时，显示所有道路
     * 当roadlevel=1时，过滤非主干道路，仅输出主干道路数据
     */
    protected string $roadlevel = '';


    /**
     * @var string 回调函数，callback 值是用户定义的函数名称，此参数只在 output 参数设置为 JSON 时有效
     */
    protected string $callback = '';

    /**
     * 是否优化POI返回顺序
     * 以下内容需要 extensions 参数为 all 时才生效。
     * homeorcorp 参数的设置可以影响召回 POI 内容的排序策略，目前提供三个可选参数：
     *
     * 0：不对召回的排序策略进行干扰。
     *
     * 1：综合大数据分析将居家相关的 POI 内容优先返回，即优化返回结果中 pois 字段的poi顺序。
     *
     * 2：综合大数据分析将公司相关的 POI 内容优先返回，即优化返回结果中 pois 字段的poi顺序。
     * @var string
     */
    protected string $homeorcorp = '';

    /**
     *
     * 调用接口查询
     * @remark
     * @return ReGeoResponse
     * @throws \Exception
     */
    function query(): ReGeoResponse
    {
        if(!$this->getLocation()){
            throw new \InvalidArgumentException("缺少location，请使用setLocation()方法设置坐标对");
        }

        $response = $this->request->get($this->url, [
            'key' => $this->getKey(),
            'sig' => $this->getSig(),
            'location' => $this->getLocation(),
            'poitype' => $this->getPoiType(),
            'radius' => $this->getRadius(),
            'extensions' => $this->getExtensions(),
            'roadlevel' => $this->getRoadlevel(),
            'output' => $this->getOutput(),
            'callback' => $this->getCallback(),
            'homeorcorp' => $this->getHomeorcorp()
        ]);
        return new ReGeoResponse($response);
    }

    /**
     *
     * @remark
     * @return string 获取经纬度坐标参数
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     *
     * @remark
     * @param string $location 经纬度坐标(必填)。传入内容规则：经度在前，纬度在后，经纬度间以“,”分割，经纬度小数点后不要超过 6 位。
     * @return void
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getPoiType(): string
    {
        return $this->poiType;
    }

    /**
     *
     * @link https://a.amap.com/lbs/static/amap_3dmap_lite/amap_poicode.zip
     * 以下内容需要 extensions 参数为 all 时才生效。
     * 逆地理编码在进行坐标解析之后不仅可以返回地址描述，也可以返回经纬度附近符合限定要求的POI内容（在 extensions 字段值为 all 时才会返回POI内容）。设置 POI 类型参数相当于为上述操作限定要求。参数仅支持传入POI TYPECODE，可以传入多个POI TYPECODE，相互之间用“|”分隔。获取 POI TYPECODE 可以参考POI分类码表
     * @remark
     * @param string $poiType 返回附近POI类型
     * @return void
     */
    public function setPoiType(string $poiType): void
    {
        $this->poiType = $poiType;
    }

    public function getRadius(): string
    {
        return $this->radius;
    }

    /**
     *
     * @remark
     * @param string $radius 搜索半径 radius取值范围在0~3000，默认是1000。单位：米
     * @return void
     */
    public function setRadius(string $radius): void
    {
        $this->radius = $radius;
    }

    public function getRoadlevel(): string
    {
        return $this->roadlevel;
    }

    /**
     *
     * 以下内容需要 extensions 参数为 all 时才生效。
     * 可选值：0，1
     * 当roadlevel=0时，显示所有道路
     * 当roadlevel=1时，过滤非主干道路，仅输出主干道路数据
     * @remark
     * @param string $roadlevel
     * @return void
     */
    public function setRoadlevel(string $roadlevel): void
    {
        $this->roadlevel = $roadlevel;
    }

    public function getHomeorcorp(): string
    {
        return $this->homeorcorp;
    }

    /**
     *
     * @remark
     * @param string $homeorcorp 是否优化POI返回顺序，以下内容需要 extensions 参数为 all 时才生效。
     * homeorcorp 参数的设置可以影响召回 POI 内容的排序策略，目前提供三个可选参数：
     * 0：不对召回的排序策略进行干扰。
     * 1：综合大数据分析将居家相关的 POI 内容优先返回，即优化返回结果中 pois 字段的poi顺序。
     * 2：综合大数据分析将公司相关的 POI 内容优先返回，即优化返回结果中 pois 字段的poi顺序。
     * @return void
     */
    public function setHomeorcorp(string $homeorcorp): void
    {
        $this->homeorcorp = $homeorcorp;
    }

    /**
     *
     * 返回结果控制 extensions 参数默认取值是 base，也就是返回基本地址信息；
     *  extensions 参数取值为 all 时会返回基本地址信息、附近 POI 内容、道路信息以及道路交叉口信息。
     * @remark
     * @return string
     */
    public function getExtensions(): string
    {
        return $this->extensions;
    }

    public function setExtensions(string $extensions): void
    {
        $this->extensions = $extensions;
    }

    public function getCallback(): string
    {
        return $this->callback;
    }

    /**
     *
     * @remark
     * @param string $callback callback 值是用户定义的函数名称，此参数只在 output 参数设置为 JSON 时有效
     * @return void
     */
    public function setCallback(string $callback): void
    {
        $this->callback = $callback;
    }
}