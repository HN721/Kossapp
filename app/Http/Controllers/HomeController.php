<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterfaces;
use App\Interfaces\CategoryRepositoryInterfaces;
use App\Interfaces\CityRepositoryInterfaces;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private CityRepositoryInterfaces $cityRepository;
    private CategoryRepositoryInterfaces $categoryRepository;
    private BoardingHouseRepositoryInterfaces $boardingHouseRepository;

    public function __construct(
        CityRepositoryInterfaces $cityRepository,
        CategoryRepositoryInterfaces $categoryRepository,
        BoardingHouseRepositoryInterfaces $boardingHouseRepository
    ) {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }
    public function index()
    {
        $categories = $this->categoryRepository->getAllCategories();
        $popularBoardingHouses = $this->boardingHouseRepository->getPopularBoardingHouses();
        $cities = $this->cityRepository->getAllCities();
        $boardingHouses = $this->boardingHouseRepository->getAllBoardingHouses();
        return view('pages.home', compact('categories', 'popularBoardingHouses', 'cities', 'boardingHouses'));
    }
}
