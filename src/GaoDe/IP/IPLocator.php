<?php

namespace Createlinux\EasyGaoDe\GaoDe\IP;

use Createlinux\EasyGaoDe\Abstracts\GaoDeServiceAbstract;
use Createlinux\EasyGaoDe\Http\Request;
use Createlinux\EasyGaoDe\Http\ResponseAbstract;
use InvalidArgumentException;

/**
 * 根据IP返回具体位置
 */
class IPLocator extends GaoDeServiceAbstract
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
    protected string $ip = '';



    /**
     * @return ResponseAbstract
     * @throws \Exception
     */
    public function query(): IPLocatorResponse
    {
        if(!$this->getIp()){
            throw new InvalidArgumentException("请使用setIp()设置ip地址");
        }
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


}