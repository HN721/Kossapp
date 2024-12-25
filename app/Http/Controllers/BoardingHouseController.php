<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterfaces;
use App\Interfaces\CategoryRepositoryInterfaces;
use App\Interfaces\CityRepositoryInterfaces;
use Illuminate\Http\Request;

class BoardingHouseController extends Controller
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
    public function find()
    {
        $categories = $this->categoryRepository->getAllCategories();
        $cities = $this->cityRepository->getAllCities();
        return view('pages.BoardingHouse.find', compact('categories', 'cities'));
    }
    public function show($slug)
    {
        $boardingHouses = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);
        return view('pages.BoardingHouse.show', compact('boardingHouses'));
    }
    public function rooms($slug)
    {
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);
        return view('pages.BoardingHouse.rooms', compact('boardingHouse'));
    }
    public function findResult(Request $request)
    {
        $boardingHouses = $this->boardingHouseRepository->getAllBoardingHouses($request);
        return view('pages.BoardingHouse.find-result', compact('boardingHouses'));
    }
}
