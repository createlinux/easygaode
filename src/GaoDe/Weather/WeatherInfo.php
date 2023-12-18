<?php

namespace Createlinux\EasyGaoDe\GaoDe\Weather;

use Createlinux\EasyGaoDe\Abstracts\GaoDeServiceAbstract;
use Createlinux\EasyGaoDe\Enums\OutputInterface;

class WeatherInfo extends GaoDeServiceAbstract
{
    protected string $url = 'https://restapi.amap.com/v3/weather/weatherInfo';

    /**
     * @var string base 返回实况天气,all 返回预报天气
     */
    protected string $extensions = 'base';

    protected string $city = '';

    function query(): WeatherInfoResponse
    {
        if(!$this->getCity()){
            throw new \InvalidArgumentException("未设置city参数");
        }
        if(!in_array($this->getExtensions(),[ExtensionInterface::all,ExtensionInterface::base])){
            throw new \InvalidArgumentException("参数“extension”值错误，只允许base和all");
        }

        $result = $this->request->get($this->url, [
            'key' => $this->getKey(),
            'sig' => $this->getSig(),
            'output' => $this->getOutput(),
            'extensions' => $this->getExtensions(),
            'city' => $this->getCity()
        ]);
        return new WeatherInfoResponse($result);
    }

    public function getExtensions(): string
    {
        return $this->extensions;
    }

    /**
     *
     * @param string $extensions base 返回实况天气,all 返回预报天气
     * @return void
     */
    public function setExtensions(string $extensions = 'base'): void
    {
        $this->extensions = $extensions;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }
}