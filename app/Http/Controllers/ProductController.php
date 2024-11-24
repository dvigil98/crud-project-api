<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Interfaces\IProductService;

class ProductController extends Controller
{
    private $productService;

    public function __construct(IProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return $this->productService->getProducts();
    }

    public function store(StoreProductRequest $request)
    {
        return $this->productService->saveProduct($request);
    }

    public function show(string $id)
    {
        return $this->productService->getProduct($id);
    }

    public function update(UpdateProductRequest $request, string $id)
    {
        return $this->productService->updateProduct($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->productService->deleteProduct($id);
    }

    public function search(string $critery, string $value)
    {
        return $this->productService->searchProducts($critery, $value);
    }
}
