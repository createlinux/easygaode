<?php

namespace Createlinux\EasyGaoDe\GaoDe\GeoCode\Properties;
//TODO
class StreetNumber
{
    protected string $street = '';
    protected string $number = '';
    protected string $location = '';
    protected string $direction = '';
    protected string $distance = '';

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }

    public function setDirection(string $direction): void
    {
        $this->direction = $direction;
    }

    public function getDistance(): string
    {
        return $this->distance;
    }

    public function setDistance(string $distance): void
    {
        $this->distance = $distance;
    }
}