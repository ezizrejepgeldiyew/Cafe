<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function getCategorySubcategories($id)
    {
        $subcategory = SubCategory::with('category')->whereHas('category', function($category) use ($id) {
            $category->where('id',$id);
        })->get();
        // $subcategory = SubCategory::with('category')->get();
        return response()->json(compact('subcategory'), 200);
    }

    public function getSubcategoryProducts($id)
    {
        $product = Product::with('subcategory.category')->whereHas('subcategory',  function ($subcategory) use ($id) {
            $subcategory->where('id', $id);
        })->get();
        return response()->json(compact('product'), 200);
    }
}
