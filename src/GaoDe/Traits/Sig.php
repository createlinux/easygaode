<?php

namespace Createlinux\EasyGaoDe\GaoDe\Traits;

/**
 * 数字签名
 */
trait Sig
{
    protected string $sig = '';

    public function getSig(): string
    {
        return $this->sig;
    }

    public function setSig(string $sig): void
    {
        $this->sig = $sig;
    }


}