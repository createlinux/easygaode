<?php

namespace Createlinux\EasyGaoDe\GaoDe\GeoCode;

use Createlinux\EasyGaoDe\GaoDe\GeoCode\Properties\Building;
use Createlinux\EasyGaoDe\GaoDe\GeoCode\Properties\Neighborhood;

class GeoCodeItem
{

    /**
     * @var string 格式化过的地址
     */
    protected string $formattedAddress;
    /**
     * @var string 国家
     */
    protected string $country;
    /**
     * @var string 省份
     */
    protected string $province;
    /**
     * @var string 城市编码
     */
    protected string $citycode;
    /**
     * @var string 城市
     */
    protected string $city;
    /**
     * @var string 地区所在的区，例如朝阳区
     */
    protected string $district;
    /**
     * @var string 坐标点所在乡镇/街道（此街道为社区街道，不是道路信息）例如：燕园街道
     */
    protected string $township;
    /**
     * @var string 区域编码，例如100101
     */
    protected string $adcode;
    /**
     * @var string 街道，例如：阜通东大街
     */
    protected string $street;
    /**
     * @var string 门牌号
     */
    protected string $number;
    /**
     * @var string 坐标点，格式：经度,纬度
     */
    protected string $location;
    /**
     * @link https://lbs.amap.com/api/webservice/guide/api/georegeo#geo
     * @var string 匹配级别
     */
    protected string $level;
    /**
     * @var Neighborhood 邻居
     */
    protected Neighborhood $neighborhood;
    /**
     * @var Building 周边建筑
     */
    protected Building $build;

    /**
     *
     * @remark 格式化地址
     * @return string
     */
    public function getFormattedAddress(): string
    {
        return $this->formattedAddress;
    }

    /**
     *
     * @remark 格式化地址
     * @param string $formattedAddress
     * @return void
     */
    public function setFormattedAddress(string $formattedAddress): void
    {
        $this->formattedAddress = $formattedAddress;
    }

    /**
     *
     * @remark
     * @return string 获取国家
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     *
     * @remark
     * @param string $country 设置国家
     * @return void
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     *
     * @remark
     * @return string 获取省份
     */

    public function getProvince(): string
    {
        return $this->province;
    }

    /**
     *
     * @remark
     * @param string $province  设置省份
     * @return void
     */
    public function setProvince(string $province): void
    {
        $this->province = $province;
    }

    /**
     *
     * @remark
     * @return string 获取城市编码
     */
    public function getCitycode(): string
    {
        return $this->citycode;
    }

    /**
     *
     * @remark
     * @param string $citycode 设置城市编码
     * @return void
     */
    public function setCitycode(string $citycode): void
    {
        $this->citycode = $citycode;
    }

    /**
     *
     * @remark
     * @return string 获取城市
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     *
     * @remark
     * @param string $city 设置城市
     * @return void
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     *
     * @remark
     * @return string 获取所在区，例如朝阳区
     */
    public function getDistrict(): string
    {
        return $this->district;
    }

    /**
     *
     * @remark
     * @return string 获取坐标点所在乡镇/街道（此街道为社区街道，不是道路信息）例如：燕园街道
     */
    public function getTownship(): string
    {
        return $this->township;
    }

    /**
     *
     * @remark
     * @param string $township 设置坐标点所在乡镇/街道（此街道为社区街道，不是道路信息）例如：燕园街道
     * @return void
     */
    public function setTownship(string $township): void
    {
        $this->township = $township;
    }

    /**
     *
     * @remark
     * @param string $district 设置所在区，例如朝阳区
     * @return void
     */
    public function setDistrict(string $district): void
    {
        $this->district = $district;
    }

    /**
     *
     * @remark
     * @return string 获取区域编码
     */
    public function getAdcode(): string
    {
        return $this->adcode;
    }

    /**
     *
     * @remark
     * @param string $adcode 设置区域编码
     * @return void
     */

    public function setAdcode(string $adcode): void
    {
        $this->adcode = $adcode;
    }

    /**
     *
     * @remark
     * @return string 获取街道名
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     *
     * @remark
     * @param string $street 设置街道名
     * @return void
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    /**
     *
     * @remark
     * @return string 获取门牌号
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     *
     * @remark
     * @param string $number 设置门牌号
     * @return void
     */
    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    /**
     *
     * @remark
     * @return string 获取经纬度，格式：经度,维度
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     *
     * @remark
     * @param string $location 设置经纬度，格式：经度,维度
     * @return void
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    /**
     *
     * @remark
     * @return string 匹配级别
     */
    public function getLevel(): string
    {
        return $this->level;
    }

    /**
     *
     * @remark
     * @param string $level 设置匹配级别
     * @return void
     */
    public function setLevel(string $level): void
    {
        $this->level = $level;
    }

    /**
     *
     * @remark
     * @return Neighborhood 获取邻居信息
     */
    public function getNeighborhood(): Neighborhood
    {
        return $this->neighborhood;
    }

    public function setNeighborhood(Neighborhood $neighborhood): void
    {
        $this->neighborhood = $neighborhood;
    }

    /**
     *
     * @remark
     * @return Building 获取建筑信息
     */
    public function getBuilding(): Building
    {
        return $this->build;
    }

    public function setBuilding(Building $build): void
    {
        $this->build = $build;
    }
}