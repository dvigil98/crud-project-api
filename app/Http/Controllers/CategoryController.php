<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Interfaces\ICategoryService;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(ICategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return $this->categoryService->getCategories();
    }

    public function store(StoreCategoryRequest $request)
    {
        return $this->categoryService->saveCategory($request);
    }

    public function show(string $id)
    {
        return $this->categoryService->getCategory($id);
    }

    public function update(UpdateCategoryRequest $request, string $id)
    {
        return $this->categoryService->updateCategory($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->categoryService->deleteCategory($id);
    }

    public function search(string $critery, string $value)
    {
        return $this->categoryService->searchCategories($critery, $value);
    }
}
