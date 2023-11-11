<?php

namespace Createlinux\EasyGaoDe\GaoDe\GeoCode\Properties;
class Building
{
    protected array $name;
    protected array $type;

    public function __construct(array $name, array $type)
    {

        $this->name = $name;
        $this->type = $type;
    }

    public function getName(): array
    {
        return $this->name;
    }

    public function getType(): array
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