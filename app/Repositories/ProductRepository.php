<?php

namespace App\Repositories;

use App\Interfaces\IProductRepository;
use App\Models\Product;

class ProductRepository implements IProductRepository
{
    public function getAll()
    {
        $products = Product::orderBy('id', 'asc')->get();
        return $products;
    }

    public function saveOrUpdate(Product $product)
    {
        return $product->save();
    }

    public function getById($id)
    {
        $product = Product::find($id);
        return $product;
    }

    public function delete(Product $product)
    {
        return $product->delete();
    }
}
