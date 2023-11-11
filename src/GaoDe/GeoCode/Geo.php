<?php

namespace Createlinux\EasyGaoDe\GaoDe\GeoCode;

use Createlinux\EasyGaoDe\Abstracts\GaoDeServiceAbstract;
use \Createlinux\EasyGaoDe\Http\ResponseAbstract;
use Createlinux\EasyGaoDe\Enums\OutputInterface;

/**
 * 地理编码
 */
class Geo extends GaoDeServiceAbstract
{


    protected string $url = 'https://restapi.amap.com/v3/geocode/geo';
    protected string $location = '';
    protected string $address = '';
    protected string $city = '';

    /**
     * @var string 可选输入内容包括：JSON，XML。
     */
    protected string $output = OutputInterface::json;
    /**
     * @var string callback 值是用户定义的函数名称，此参数只在 output 参数设置为 JSON 时有效。
     */
    protected string $callback = '';
    /**
     * @title 执行查询
     * @return GeoResponse
     * @throws \Exception
     */
    public function query(): ResponseAbstract
    {
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

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

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

    public function getOutput(): string
    {
        return $this->output;
    }

    public function setOutput(string $output): void
    {
        $this->output = $output;
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