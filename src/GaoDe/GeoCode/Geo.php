<?php

namespace Createlinux\EasyGaoDe\GaoDe\GeoCode;

use Createlinux\EasyGaoDe\Abstracts\GaoDeServiceAbstract;
use \Createlinux\EasyGaoDe\Http\ResponseAbstract;
use Createlinux\EasyGaoDe\Enums\OutputInterface;

/**
 * 地理编码：将详细的结构化地址转换为高德经纬度坐标。且支持对地标性名胜景区、建筑物名称解析为高德经纬度坐标。
 * 结构化地址举例：北京市朝阳区阜通东大街6号转换后经纬度：116.480881,39.989410
 * 地标性建筑举例：天安门转换后经纬度：116.397499,39.908722
 */
class Geo extends GaoDeServiceAbstract
{


    protected string $url = 'https://restapi.amap.com/v3/geocode/geo';
    protected string $location = '';
    protected string $address = '';
    protected string $city = '';


    /**
     * @var string callback 值是用户定义的函数名称，此参数只在 output 参数设置为 JSON 时有效。
     */
    protected string $callback = '';
    /**
     * @title 执行查询
     * @return GeoResponse
     * @throws \Exception
     */
    public function query(): GeoResponse
    {
        if(!$this->getAddress()){
            throw new \InvalidArgumentException("缺少address参数，请调用setAddress()方法设置address");
        }
        $result = $this->request->get($this->url, [
            'key' => $this->getKey(),
            'address' => $this->getAddress(),
            'city' => $this->getCity(),
            'output' => $this->getOutput(),
            'callback' => $this->getCallback(),
            'sig' => $this->getSig()
        ]);
        return new GeoResponse($result);
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     *
     * @remark
     * @param string $location
     * @return void
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getAddress(): string
    {
        if(!trim($this->address)){
            throw new \InvalidArgumentException("Geo 未填写address参数");
        }
        return $this->address;
    }

    /**
     *
     * @remark
     * @param string $address 必填：结构化地址信息 规则遵循：国家、省份、城市、区县、城镇、乡村、街道、门牌号码、屋邨、大厦，如：北京市朝阳区阜通东大街6号。
     * @return void
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getCallback(): string
    {
        return $this->callback;
    }

    public function setCallback(string $callback): void
    {
        $this->callback = $callback;
    }
}