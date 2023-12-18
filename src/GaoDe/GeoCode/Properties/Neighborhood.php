<?php

namespace Createlinux\EasyGaoDe\GaoDe\GeoCode\Properties;
class Neighborhood
{
    protected string $name;
    protected string $type;

    public function __construct(string $name, string $type)
    {

        $this->name = $name;
        $this->type = $type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'type' => $this->getType()
        ];
    }
}