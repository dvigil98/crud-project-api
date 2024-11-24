<?php

namespace App\Interfaces;

interface IProductService
{
    public function getProducts();
    public function saveProduct($data);
    public function getProduct($id);
    public function updateProduct($data, $id);
    public function deleteProduct($id);
    public function searchProducts($critery, $value);
}
