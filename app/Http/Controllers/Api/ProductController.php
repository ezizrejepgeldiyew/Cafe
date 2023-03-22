<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with('subcategory.category')->get();
        return compact('product');
    }

    public function popular()
    {
        $product = Product::with('subcategory.category')->limit(2)->get();
        return response()->json(compact('product'),200);
    }

    public function recommended()
    {
        $product = Product::with('subcategory.category')->inRandomOrder()->get();
        return response()->json(compact('product'),200);
    }

    public function category()
    {
        $id = request('id');
        $product = SubCategory::where('category_id',$id)->get();
    }
}
