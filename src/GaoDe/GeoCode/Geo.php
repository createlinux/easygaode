<?php

namespace Createlinux\EasyGaoDe\GaoDe\GeoCode;

use Createlinux\EasyGaoDe\Http\Request;
use Createlinux\EasyGaoDe\GaoDe\Traits\Sig;

/**
 * 地理编码
 */
class Geo
{
    use Sig;

    protected $url = 'https://restapi.amap.com/v3/geocode/geo';
    private string $key;
    protected string $location = '';
    protected string $address = '';
    protected string $city = '';

    /**
     * @var string 可选输入内容包括：JSON，XML。
     */
    protected string $output = GeoOutputInterface::json;
    /**
     * @var string callback 值是用户定义的函数名称，此参数只在 output 参数设置为 JSON 时有效。
     */
    protected string $callback = '';

    public function __construct(string $key)
    {
        $this->request = new Request();
        $this->key = $key;
        if (!trim($this->key)) {
            throw new \InvalidArgumentException("key不能为空");
        }
    }

    /**
     * @title 执行查询
     * @return GeoResponse
     * @throws \Exception
     */
    public function query()
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