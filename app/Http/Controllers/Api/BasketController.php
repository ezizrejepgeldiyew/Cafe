<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;

class BasketController extends Controller
{
    public function get()
    {
        $productData = json_decode(request('productData'));
        $product = [];
        for ($i = 0; $i < count($productData); $i++) {
            $products = Product::with('subcategory.category')->find($productData[$i]->productId);
            $product[$i] = $products;
        }
        return response()->json(compact('product'), 200);
    }
}
