<?php

namespace Createlinux\EasyGaoDe\Abstracts;

use Createlinux\EasyGaoDe\Enums\OutputInterface;
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
    /**
     * @var string 可选输入内容包括：JSON，XML。
     */
    protected string $output = OutputInterface::json;


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

    public function getOutput(): string
    {
        return $this->output;
    }

    /**
     *
     * @remark
     * @param string $output 返回数据格式类型：JSON，XML。设置 JSON 返回结果数据将会以JSON结构构成；
     * 如果设置 XML 返回结果数据将以 XML 结构构成。可调用OutputInterface::json或者OutputInterface::xml
     *
     * @return void
     */
    public function setOutput(string $output): void
    {
        $this->output = $output;
    }
}