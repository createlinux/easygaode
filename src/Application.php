<?php

namespace Createlinux\EasyGaoDe;

use Createlinux\EasyGaoDe\GaoDe\Coordinate\CoordinateConvert;
use Createlinux\EasyGaoDe\GaoDe\GeoCode\Geo;
use Createlinux\EasyGaoDe\GaoDe\IP\IPLocator;
use Createlinux\EasyGaoDe\GaoDe\Weather\WeatherInfo;

class Application
{


    private static array $instances = [];
    protected string $key;

    public function __construct(string $key)
    {
        $this->key = $key;
        if (!trim($key)) {
            throw new \InvalidArgumentException("key不能为空");
        }
    }

    /**
     * IP定位：根据IP返回省市
     * @return IPLocator|void
     */
    public function createIPLocator()
    {
        if (!isset(self::$instances[IPLocator::class])) {
            self::$instances[IPLocator::class] = new IPLocator($this->getKey());
        }
        return self::$instances[IPLocator::class];
    }

    /**
     * 地理编码
     * @return Geo|mixed
     */
    public function createGeoCode()
    {
        if (!isset(self::$instances[Geo::class])) {
            self::$instances[Geo::class] = new Geo($this->getKey());
        }
        return self::$instances[Geo::class];
    }

    /**
     * 坐标转换实例
     * @return CoordinateConvert|mixed
     */
    public function createCoordinateConvert()
    {
        if (!isset(self::$instances[CoordinateConvert::class])) {
            self::$instances[CoordinateConvert::class] = new CoordinateConvert($this->getKey());
        }
        return self::$instances[CoordinateConvert::class];
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * 天气查询实例
     * @return WeatherInfo|mixed
     */
    public function createWeatherInfo()
    {
        if (!isset(self::$instances[WeatherInfo::class])) {
            self::$instances[WeatherInfo::class] = new WeatherInfo($this->getKey());
        }
        return self::$instances[WeatherInfo::class];
    }
}