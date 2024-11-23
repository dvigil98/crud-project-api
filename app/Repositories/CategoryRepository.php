<?php

namespace App\Repositories;

use App\Interfaces\ICategoryRepository;
use App\Models\Category;

class CategoryRepository implements ICategoryRepository
{
    public function getAll()
    {
        $categories = Category::orderBy('id', 'asc')->get();
        return $categories;
    }

    public function saveOrUpdate(Category $category)
    {
        return $category->save();
    }

    public function getById($id)
    {
        $category = Category::find($id);
        return $category;
    }

    public function delete(Category $category)
    {
        return $category->delete();
    }

    public function search($critery, $value)
    {
        $categories = Category::where($critery, 'like', "%{$value}%")->get();
        return $categories;
    }
}
