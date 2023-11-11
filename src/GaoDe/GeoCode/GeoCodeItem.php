<?php

namespace Createlinux\EasyGaoDe\GaoDe\GeoCode;

use Createlinux\EasyGaoDe\GaoDe\GeoCode\Properties\Building;
use Createlinux\EasyGaoDe\GaoDe\GeoCode\Properties\Neighborhood;

class GeoCodeItem
{
    protected string $formattedAddress;
    protected string $country;
    protected string $province;
    protected string $citycode;
    protected string $city;
    protected string $district;
    protected array $township;
    protected string $adcode;
    protected string $street;
    protected string $number;
    protected string $location;
    protected string $level;
    /**
     * @var Neighborhood;
     */
    protected Neighborhood $neighborhood;
    /**
     * @var Building
     */
    protected Building $build;

    public function getFormattedAddress(): string
    {
        return $this->formattedAddress;
    }

    public function setFormattedAddress(string $formattedAddress): void
    {
        $this->formattedAddress = $formattedAddress;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function getProvince(): string
    {
        return $this->province;
    }

    public function setProvince(string $province): void
    {
        $this->province = $province;
    }

    public function getCitycode(): string
    {
        return $this->citycode;
    }

    public function setCitycode(string $citycode): void
    {
        $this->citycode = $citycode;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getDistrict(): string
    {
        return $this->district;
    }

    public function getTownship(): string
    {
        return $this->township;
    }

    public function setTownship(array $township): void
    {
        $this->township = $township;
    }

    public function setDistrict(string $district): void
    {
        $this->district = $district;
    }

    public function getAdcode(): string
    {
        return $this->adcode;
    }

    public function setAdcode(string $adcode): void
    {
        $this->adcode = $adcode;
    }

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

    public function getLevel(): string
    {
        return $this->level;
    }

    public function setLevel(string $level): void
    {
        $this->level = $level;
    }

    public function getNeighborhood(): Neighborhood
    {
        return $this->neighborhood;
    }

    public function setNeighborhood(Neighborhood $neighborhood): void
    {
        $this->neighborhood = $neighborhood;
    }

    public function getBuilding(): Building
    {
        return $this->build;
    }

    public function setBuilding(Building $build): void
    {
        $this->build = $build;
    }
}