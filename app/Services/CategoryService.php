<?php

namespace App\Services;

use App\Http\Resources\CategoryResource;
use App\Interfaces\ICategoryRepository;
use App\Interfaces\ICategoryService;
use App\Models\Category;
use App\Traits\ApiResponse;

class CategoryService implements ICategoryService
{
    use ApiResponse;

    private $categoryRepository;

    public function __construct(ICategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategories()
    {
        try {
            $categories = $this->categoryRepository->getAll();

            return $this->ok(CategoryResource::collection($categories));
        } catch (\Throwable $th) {
            return $this->internalServerError([$th->getMessage()]);
        }
    }

    public function saveCategory($data)
    {
        try {
            $category = new Category();
            $category->name = $data->name;
            $category->description = $data->description;

            if ($this->categoryRepository->saveOrUpdate($category))
                return $this->created(new CategoryResource($category));

            return $this->badRequest(['Datos no guardados']);
        } catch (\Throwable $th) {
            return $this->internalServerError([$th->getMessage()]);
        }
    }

    public function getCategory($id)
    {
        try {
            $category = $this->categoryRepository->getById($id);

            if (empty($category))
                return $this->notFound(['Datos no encontrados']);

            return $this->ok(new CategoryResource($category));
        } catch (\Throwable $th) {
            return $this->internalServerError([$th->getMessage()]);
        }
    }

    public function updateCategory($data, $id)
    {
        try {
            $category = $this->categoryRepository->getById($id);

            if (empty($category))
                return $this->notFound(['Datos no encontrados']);

            $category->name = $data->name;
            $category->description = $data->description;

            if ($this->categoryRepository->saveOrUpdate($category))
                return $this->ok(new CategoryResource($category));

            return $this->badRequest(['Datos no actualizados']);
        } catch (\Throwable $th) {
            return $this->internalServerError([$th->getMessage()]);
        }
    }

    public function deleteCategory($id)
    {
        try {
            $category = $this->categoryRepository->getById($id);

            if (empty($category))
                return $this->notFound(['Datos no encontrados']);

            if ($this->categoryRepository->delete($category))
                return $this->ok();

            return $this->badRequest(['Datos no eliminados']);
        } catch (\Throwable $th) {
            return $this->internalServerError([$th->getMessage()]);
        }
    }

    public function searchCategories($critery, $value)
    {
        try {
            $categories = $this->categoryRepository->search($critery, $value);

            return $this->ok(CategoryResource::collection($categories));
        } catch (\Throwable $th) {
            return $this->internalServerError([$th->getMessage()]);
        }
    }
}
