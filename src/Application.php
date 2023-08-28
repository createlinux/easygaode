<?php
namespace Createlinux\EasyGaoDe;
use Createlinux\EasyGaoDe\IP\IPLocator;

class Application
{
    protected string $key;

    public function __construct(string $key)
    {
        $this->key = $key;
        if (!trim($key)) {
            throw new \InvalidArgumentException("key不能为空");
        }
    }

    public function createIPLocator()
    {
        return new IPLocator($this->getKey());
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
}