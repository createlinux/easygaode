<?php

namespace Createlinux\EasyGaoDe;

use Createlinux\EasyGaoDe\GaoDe\GeoCode\Geo;
use Createlinux\EasyGaoDe\GaoDe\IP\IPLocator;

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
     * @title IP定位：根据IP返回省市
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
     * @title 地理编码
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
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
}