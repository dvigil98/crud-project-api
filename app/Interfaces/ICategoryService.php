<?php

namespace App\Interfaces;

interface ICategoryService
{
    public function getCategories();
    public function saveCategory($data);
    public function getCategory($id);
    public function updateCategory($data, $id);
    public function deleteCategory($id);
    public function searchCategories($critery, $value);
}
