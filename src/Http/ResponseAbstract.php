<?php

namespace Createlinux\EasyGaoDe\Http;

abstract class ResponseAbstract
{
    /**
     * @var string 返回结果
     */
    protected string $result;
    /**
     * @var array
     */
    protected $resultArray = [];

    public function __construct(string $result)
    {
        $this->result = $result;
        $this->resultArray = json_decode($this->result, true);
    }

    public function getArrayBody()
    {
        return $this->resultArray;
    }

    public function getStatus()
    {
        return $this->resultArray['status'] ?? null;
    }

    public function getInfo()
    {
        return $this->resultArray['info'] ?? null;
    }

    /**
     * @return mixed|null 返回状态说明,10000代表正确,详情参阅info状态表
     */
    public function getInfoCode()
    {
        return $this->resultArray['infocode'] ?? null;
    }

    /**
     * @return string 获取原报文体
     */
    public function getOriginBody(): string
    {
        return $this->result;
    }
}