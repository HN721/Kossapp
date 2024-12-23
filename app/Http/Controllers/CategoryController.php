<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterfaces;
use App\Interfaces\CategoryRepositoryInterfaces;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private BoardingHouseRepositoryInterfaces $boardingHouseRepository;
    private CategoryRepositoryInterfaces $categoryRepository;
    public function __construct(
        CategoryRepositoryInterfaces $categoryRepository,
        BoardingHouseRepositoryInterfaces $boardingHouseRepository
    ) {

        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->categoryRepository = $categoryRepository;
    }
    public function show($slug)
    {
        $category = $this->categoryRepository->getCategoryBySlug($slug);
        $boardingHouses = $this->boardingHouseRepository->getBoardingHouseByCategorySlug($slug);
        return view('pages.category.show', compact('boardingHouses', 'category'));
    }
}
