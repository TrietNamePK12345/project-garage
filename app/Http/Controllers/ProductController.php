<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Collection;
class ProductController
{
    public static function getProductById(string $id): Product
    {
        $product = Product::find($id);

        if (!$product) {
            throw new ModelNotFoundException("Không tìm thấy sản phẩm với ID: $id");
        }

        return $product;
    }


    public static function allProducts(): Collection
    {
        return Product::all();
    }
}
