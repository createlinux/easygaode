<?php

namespace Createlinux\EasyGaoDe\Abstracts;

use Createlinux\EasyGaoDe\Http\Request;
use Createlinux\EasyGaoDe\Http\ResponseAbstract;

abstract class GaoDeServiceAbstract
{
    protected string $url = '';
    protected Request $request;
    protected string $key;

    /**
     * @var string 选择数字签名认证的付费用户必填
     */
    protected string $sig = '';


    public function __construct(string $key)
    {
        $this->request = new Request();
        $this->key = $key;
        if (!trim($this->key)) {
            throw new \InvalidArgumentException("key不能为空");
        }
    }

    abstract function query(): ResponseAbstract;
    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * @return string
     */
    public function getSig(): string
    {
        return $this->sig;
    }

    /**
     * @param $this GaoDeServiceAbstract 选填，选择数字签名认证的付费用户必填
     */
    public function setSig(string $sig): GaoDeServiceAbstract
    {
        $this->sig = $sig;
        return $this;
    }
}