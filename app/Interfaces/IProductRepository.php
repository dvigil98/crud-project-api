<?php

namespace App\Interfaces;

use App\Models\Product;

interface IProductRepository
{
    public function getAll();
    public function saveOrUpdate(Product $product);
    public function getById($id);
    public function delete(Product $product);
    public function search($critery, $value);
}
