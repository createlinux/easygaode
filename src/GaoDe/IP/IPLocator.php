<?php

namespace Createlinux\EasyGaoDe\GaoDe\IP;

use Createlinux\EasyGaoDe\Http\Request;

/**
 * 根据IP返回具体位置
 */
class IPLocator
{
    protected string $url = 'https://restapi.amap.com/v3/ip';
    protected Request $request;
    /**
     * @var string 用户在高德地图官网申请Web服务API类型KEY
     */
    protected string $key;
    /**
     * @var string 需要搜索的IP地址（仅支持国内）若用户不填写IP，则取客户http之中的请求来进行定位
     */
    protected string $ip;

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

    /**
     * @return IPLocatorResponse
     * @throws \Exception
     */
    public function query()
    {
        $result = $this->request->get($this->url, [
            'key' => $this->getKey(),
            'ip' => $this->getIp(),
            'sig' => $this->getSig()
        ]);
        return new IPLocatorResponse($result);
    }

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
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @param string $ip 需要搜索的IP地址（仅支持国内）若用户不填写IP，则取客户HTTP之中的请求来进行定位
     */
    public function setIp(string $ip): IPLocator
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * @return string
     */
    public function getSig(): string
    {
        return $this->sig;
    }

    /**
     * @param string $sig 选填，选择数字签名认证的付费用户必填
     */
    public function setSig(string $sig): IPLocator
    {
        $this->sig = $sig;
        return $this;
    }
}