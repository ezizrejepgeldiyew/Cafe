<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $category = Category::get();
        $subCategory = SubCategory::with('category')->get();
        return view('Admin.subCategory', compact('category', 'subCategory'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $subCategory = SubCategory::create($data);
        return back()->with('success',"Maglumat üstünlikli goşuldy");
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $subCategory = SubCategory::find($id)->update($data);
        return redirect()->route('SubCategory.index')->with('success',"Maglumat üstünlikli üýtgedildi");
    }

    public function delete($id)
    {
        SubCategory::destroy($id);
        return back()->with('success',"Maglumat üstünlikli pozuldy");
    }
}
