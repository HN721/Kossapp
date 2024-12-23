<?php

namespace App\Repository;

use App\Interfaces\CityRepositoryInterfaces;
use App\Models\City;

class CityRepository implements CityRepositoryInterfaces
{
    public function getAllCities()
    {
        return City::all();
    }
    public function getCityBySlug($slug)
    {
        return City::where('slug', $slug)->first();
    }
}
