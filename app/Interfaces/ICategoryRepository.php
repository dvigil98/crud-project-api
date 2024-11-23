<?php

namespace App\Interfaces;

use App\Models\Category;

interface ICategoryRepository
{
    public function getAll();
    public function saveOrUpdate(Category $category);
    public function getById($id);
    public function delete(Category $category);
    public function search($critery, $value);
}
