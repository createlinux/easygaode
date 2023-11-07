<?php

namespace Createlinux\EasyGaoDe;

use Createlinux\EasyGaoDe\IP\IPLocator;

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
     * @title 请填写标题
     * @isMenu 1
     * @remark
     * @return IPLocator|void
     */
    public function createIPLocator()
    {
        if (!isset(self::$instances[IPLocator::class])){
            self::$instances[IPLocator::class] = new IPLocator($this->getKey());
        }
        return self::$instances[IPLocator::class];
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
}