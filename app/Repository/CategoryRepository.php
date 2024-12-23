<?php

namespace App\Repository;

use App\Interfaces\CategoryRepositoryInterfaces;
use App\Models\Category;

class CategoryRepository  implements CategoryRepositoryInterfaces
{
    public function getAllCategories()
    {
        return Category::all();
    }
    public function getCategoryBySlug($slug)
    {
        return Category::where('slug', $slug)->first();
    }
}
