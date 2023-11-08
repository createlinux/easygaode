<?php

namespace Createlinux\EasyGaoDe\Gdeo;

use Createlinux\EasyGaoDe\Http\Request;

class GeoCode
{
    protected $url = 'https://restapi.amap.com/v3/geocode/regeo';
    private string $key;
    protected string $location = '';

    public function __construct(string $key)
    {
        $this->request = new Request();
        $this->key = $key;
        if (!trim($this->key)) {
            throw new \InvalidArgumentException("key不能为空");
        }
    }

    public function query()
    {
        $result = $this->request->get($this->url, [
            'key' => $this->getKey(),
            'ip' => $this->getKey(),
            'sig' => $this->getKey()
        ]);
        return new GeoCodeResponse($result);
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
}