<?php

namespace Createlinux\EasyGaoDe\Abstracts;

abstract class ResponseAbstract
{
    abstract public function getArrayBody();

    /**
     * @return mixed 值为0或1,0表示失败；1表示成功
     */
    abstract public function getStatus();

    /**
     * @return mixed 返回状态说明，status为0时，info返回错误原因，否则返回“OK”。
     */
    abstract public function getInfo();

    /**
     * @return mixed 返回状态说明,10000代表正确,详情参阅info状态表
     */
    abstract public function getInfoCode();

    abstract public function getOriginBody(): string;
}