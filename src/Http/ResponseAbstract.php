<?php

namespace Createlinux\EasyGaoDe\Http;

use Illuminate\Support\Collection;

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

    /**
     *
     * @remark
     * @return mixed|null 返回结果状态值 值为0或1,0表示失败；1表示成功
     */
    public function getStatus()
    {
        return $this->resultArray['status'] ?? null;
    }

    /**
     *
     * @remark
     * @return mixed|null 返回状态说明 返回状态说明，status为0时，info返回错误原因，否则返回“OK”。
     */
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

    /**
     * @return bool 是否失败
     */
    public function isFailed(): bool
    {
        return $this->getStatus() != 1;
    }

    /**
     * @return bool 是否成功
     */
    public function isSuccessful(): bool
    {
        return $this->getStatus() == 1;
    }
}