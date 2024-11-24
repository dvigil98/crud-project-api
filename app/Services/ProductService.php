<?php

namespace App\Services;

use App\Http\Resources\ProductResource;
use App\Interfaces\IProductRepository;
use App\Interfaces\IProductService;
use App\Models\Product;
use App\Traits\ApiResponse;

class ProductService implements IProductService
{
    use ApiResponse;

    private $productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProducts()
    {
        try {
            $products = $this->productRepository->getAll();

            return $this->ok(ProductResource::collection($products));
        } catch (\Throwable $th) {
            return $this->internalServerError([$th->getMessage()]);
        }
    }

    public function saveProduct($data)
    {
        try {
            $product = new Product();
            $product->category_id = $data->category_id;
            $product->code = $data->code;
            $product->name = $data->name;
            $product->description = $data->description;
            $product->purchase_price = $data->purchase_price;
            $product->sale_price = $data->sale_price;

            if ($this->productRepository->saveOrUpdate($product))
                return $this->created(new ProductResource($product));

            return $this->badRequest(['Datos no guardados']);
        } catch (\Throwable $th) {
            return $this->internalServerError([$th->getMessage()]);
        }
    }

    public function getProduct($id)
    {
        try {
            $product = $this->productRepository->getById($id);

            if (empty($product))
                return $this->notFound(['Datos no encontrados']);

            return $this->ok(new ProductResource($product));
        } catch (\Throwable $th) {
            return $this->internalServerError([$th->getMessage()]);
        }
    }

    public function updateProduct($data, $id)
    {
        try {
            $product = $this->productRepository->getById($id);

            if (empty($product))
                return $this->notFound(['Datos no encontrados']);

            $product->category_id = $data->category_id;
            $product->code = $data->code;
            $product->name = $data->name;
            $product->description = $data->description;
            $product->purchase_price = $data->purchase_price;
            $product->sale_price = $data->sale_price;

            if ($this->productRepository->saveOrUpdate($product))
                return $this->ok(new ProductResource($product));

            return $this->badRequest(['Datos no actualizados']);
        } catch (\Throwable $th) {
            return $this->internalServerError([$th->getMessage()]);
        }
    }

    public function deleteProduct($id)
    {
        try {
            $product = $this->productRepository->getById($id);

            if (empty($product))
                return $this->notFound(['Datos no encontrados']);

            if ($this->productRepository->delete($product))
                return $this->ok();

            return $this->badRequest(['Datos no eliminados']);
        } catch (\Throwable $th) {
            return $this->internalServerError([$th->getMessage()]);
        }
    }

    public function searchProducts($critery, $value)
    {
        try {
            $products = $this->productRepository->search($critery, $value);

            return $this->ok(ProductResource::collection($products));
        } catch (\Throwable $th) {
            return $this->internalServerError([$th->getMessage()]);
        }
    }
}
