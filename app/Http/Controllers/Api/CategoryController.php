<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::get();
        return response()->json(compact('category'), 200);
    }

    public function getCategoryProducts($id)
    {
        $product = Product::with('subcategory.category')->whereHas('subcategory',  function ($subcategory) use ($id) {
            $subcategory->whereHas('category', function ($category) use ($id) {
                $category->where('id', $id);
            });
        })->get();
        return response()->json(compact('product'), 200);
    }
}
