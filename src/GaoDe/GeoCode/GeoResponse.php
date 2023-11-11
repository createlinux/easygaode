<?php

namespace Createlinux\EasyGaoDe\GaoDe\GeoCode;

use Createlinux\EasyGaoDe\Http\ResponseAbstract;
use Createlinux\EasyGaoDe\GaoDe\GeoCode\Properties\Building;
use Createlinux\EasyGaoDe\GaoDe\GeoCode\Properties\Neighborhood;
use Illuminate\Support\Collection;

class GeoResponse extends ResponseAbstract
{
    /**
     * @var Collection
     */
    protected $geoCodes = null;
    protected $count = 0;

    /**
     * @title 请填写标题
     * @return Collection|array<GeoCodeItem>
     */
    public function getGeoCodes(): Collection
    {
        //TODO
        if ($this->geoCodes === null) {
            $collection = new Collection();
            foreach ($this->resultArray['geocodes'] as $geocode) {
                $geoCodeItem = new GeoCodeItem();
                $geoCodeItem->setCity($geocode['city']);
                $geoCodeItem->setBuilding(new Building(
                    $geocode['building']['name'] ?? '',
                    $geocode['building']['type'] ?? ''
                ));
                $geoCodeItem->setAdcode($geocode['adcode']);
                $geoCodeItem->setCitycode($geocode['citycode']);
                $geoCodeItem->setLevel($geocode['level']);
                $geoCodeItem->setCountry($geocode['country']);
                $geoCodeItem->setDistrict($geocode['district']);
                $geoCodeItem->setNumber($geocode['number']);
                $geoCodeItem->setFormattedAddress($geocode['formatted_address']);
                $geoCodeItem->setLocation($geocode['location']);
                $geoCodeItem->setStreet($geocode['street']);
                $geoCodeItem->setNeighborhood(
                    new Neighborhood($geocode['neighborhood']['name'], $geocode['neighborhood']['type'])
                );
                $geoCodeItem->setProvince($geocode['province']);
                $geoCodeItem->setTownship($geocode['township']);

                $collection->push($geoCodeItem);
            }
            $this->geoCodes = $collection;
        }

        return $this->geoCodes;
    }

    public function getCount()
    {
        return $this->resultArray['count'] ?? 0;
    }
}