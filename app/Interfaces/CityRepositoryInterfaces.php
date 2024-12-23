<?php

namespace App\Interfaces;

interface CityRepositoryInterfaces
{
    public function getAllCities();
    public function getCityBySlug($slug);
}
