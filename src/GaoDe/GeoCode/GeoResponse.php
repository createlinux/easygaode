<?php

namespace Createlinux\EasyGaoDe\GaoDe\GeoCode;

use Createlinux\EasyGaoDe\Http\ResponseAbstract;
use Createlinux\EasyGaoDe\GaoDe\GeoCode\Properties\Building;
use Createlinux\EasyGaoDe\GaoDe\GeoCode\Properties\Neighborhood;
use Illuminate\Support\Collection;

class GeoResponse extends ResponseAbstract
{
    /**
     * 地理编码信息列表 结果对象列表
     * @var GeoCodeCollection
     */
    protected ?GeoCodeCollection $geoCodes = null;

    /**
     * @title 请填写标题
     * @return GeoCodeCollection|array<GeoCodeItem>
     */
    public function getGeoCodes(): GeoCodeCollection
    {
        //TODO
        if ($this->geoCodes === null) {
            $collection = new GeoCodeCollection();
            foreach ($this->resultArray['geocodes'] as $geocode) {
                $geoCodeItem = new GeoCodeItem();
                $geoCodeItem->setCity($geocode['city']);
                $geoCodeItem->setBuilding(new Building(
                    egd_empty_array_to_string($geocode['building']['name']),
                    egd_empty_array_to_string($geocode['building']['type'])
                ));
                $geoCodeItem->setAdcode($geocode['adcode']);
                $geoCodeItem->setCitycode($geocode['citycode']);
                $geoCodeItem->setLevel($geocode['level']);
                $geoCodeItem->setCountry($geocode['country']);
                $geoCodeItem->setDistrict(egd_empty_array_to_string($geocode['district']));
                $geoCodeItem->setTownship(egd_empty_array_to_string($geocode['township']));
                $geoCodeItem->setNumber(egd_empty_array_to_string($geocode['number']));
                $geoCodeItem->setFormattedAddress($geocode['formatted_address']);
                $geoCodeItem->setLocation($geocode['location']);
                $geoCodeItem->setStreet(egd_empty_array_to_string($geocode['street']));
                $geoCodeItem->setNeighborhood(
                    new Neighborhood(
                        egd_empty_array_to_string($geocode['neighborhood']['name']),
                        egd_empty_array_to_string($geocode['neighborhood']['type'])
                    )
                );
                $geoCodeItem->setProvince($geocode['province']);

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