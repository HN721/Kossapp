<?php

namespace App\Interfaces;

interface CategoryRepositoryInterfaces
{
    public function getAllCategories();
    public function getCategoryBySlug($slug);
}
