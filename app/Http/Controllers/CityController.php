<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterfaces;
use App\Interfaces\CityRepositoryInterfaces;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private CityRepositoryInterfaces $cityRepository;
    private BoardingHouseRepositoryInterfaces $boardingHouseRepository;
    public function __construct(
        BoardingHouseRepositoryInterfaces $boardingHouseRepository,
        CityRepositoryInterfaces $cityRepository
    ) {

        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->cityRepository = $cityRepository;
    }
    public function show($slug)
    {
        $boardingHouses = $this->boardingHouseRepository->getBoardingHouseByCitySlug($slug);
        $city = $this->cityRepository->getCityBySlug($slug);
        return view('pages.city.show', compact('boardingHouses', 'city'));
    }
}
