<?php

namespace Createlinux\EasyGaoDe\GaoDe\GeoCode\Properties;
//TODO
class AddressComponent
{
    protected string $county = '';
    protected string $province = '';
    protected string $city = '';
    protected string $citycode = '';
    protected string $district = '';
    protected string $adcode = '';
    protected string $township = '';
    protected string $towncode = '';

    protected ?Neighborhood $neighborhood;
    protected ?Building $building;
    protected ?StreetNumber $streetNumber;

    public function getCounty(): string
    {
        return $this->county;
    }

    public function setCounty(string $county): void
    {
        $this->county = $county;
    }

    public function getProvince(): string
    {
        return $this->province;
    }

    public function setProvince(string $province): void
    {
        $this->province = $province;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getCitycode(): string
    {
        return $this->citycode;
    }

    public function setCitycode(string $citycode): void
    {
        $this->citycode = $citycode;
    }

    public function getDistrict(): string
    {
        return $this->district;
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

    public function getTownship(): string
    {
        return $this->township;
    }

    public function setTownship(string $township): void
    {
        $this->township = $township;
    }

    public function getTowncode(): string
    {
        return $this->towncode;
    }

    public function setTowncode(string $towncode): void
    {
        $this->towncode = $towncode;
    }

    public function getNeighborhood(): ?Neighborhood
    {
        return $this->neighborhood;
    }

    public function setNeighborhood(?Neighborhood $neighborhood): void
    {
        $this->neighborhood = $neighborhood;
    }

    public function getBuilding(): ?Building
    {
        return $this->building;
    }

    public function setBuilding(?Building $building): void
    {
        $this->building = $building;
    }

    public function getStreetNumber(): ?StreetNumber
    {
        return $this->streetNumber;
    }

    public function setStreetNumber(?StreetNumber $streetNumber): void
    {
        $this->streetNumber = $streetNumber;
    }
}