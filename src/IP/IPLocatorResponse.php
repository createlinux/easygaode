<?php

namespace Createlinux\EasyGaoDe\IP;

use Createlinux\EasyGaoDe\Abstracts\ResponseAbstract;

/**
 * IP定位返回对象
 */
class IPLocatorResponse extends ResponseAbstract
{

    protected string $result;
    /**
     * @var mixed
     */
    protected array $resultArray;

    /**
     * @param string $result
     */
    public function __construct(string $result)
    {
        $this->result = $result;
        $this->resultArray = json_decode($this->result, true);
    }

    /**
     * @return string 获取原报文体
     */
    public function getOriginBody(): string
    {
        return $this->result;
    }

    /**
     * @return array 获取结果数组
     */
    public function getArrayBody(): array
    {
        return $this->resultArray;
    }

    /**
     * @return mixed|null 获取状态
     */
    public function getStatus()
    {
        return $this->resultArray['status'] ?? null;
    }

    /**
     * @return mixed|null 获取info
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
     * @return string 若为直辖市则显示直辖市名称；如果在局域网 IP网段内，则返回“局域网”；非法IP以及国外IP则返回空
     */
    public function getProvince()
    {
        return $this->resultArray['province'] ?? null;
    }

    /***
     * @return mixed|null 获取城市
     */
    public function getCity()
    {
        return $this->resultArray['city'] ?? null;
    }

    /**
     * @return mixed|null 城市的adcode编码
     */
    public function getAdCode()
    {
        return $this->resultArray['adcode'] ?? null;
    }

    /**
     * @return mixed|null rectangle
     */
    public function getRectangle()
    {
        return $this->resultArray['rectangle'] ?? null;
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