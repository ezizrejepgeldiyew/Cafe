<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        $subCategory = SubCategory::get();
        $product = Product::with('subcategory.category')->get();
        return view('Admin.product', compact('product', 'subCategory'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalName();
            $filename = 'image/product/' . $extenstion;
            Image::make($file)->resize(120, 120)->save(public_path($filename), 80);
            $data['photo'] = $filename;

            $filename = 'image/product/resize' . $extenstion;
            Image::make($file)->resize(300, 300)->save(public_path($filename), 80);
            $data['photo1'] = $filename;
        }
        $product = Product::create($data);
        return back()->with('success',"Maglumat üstünlikli goşuldy");
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        if (empty($request->price_min) != empty($request->ready_time_min))
            return back();
        $product = Product::find($id);
        $data['photo'] = $product->photo;
        $data['photo1'] = $product->photo1;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalName();
            $filename = 'image/product/' . $extenstion;
            Image::make($file)->resize(120, 120)->save(public_path($filename), 80);
            $data['photo'] = $filename;
            File::delete($product->photo);

            $filename = 'image/product/resize' . $extenstion;
            Image::make($file)->resize(300, 300)->save(public_path($filename), 80);
            $data['photo1'] = $filename;
            File::delete($product->photo1);
        }
        $product->update($data);
        return redirect()->route('Product.index')->with('success',"Maglumat üstünlikli üýtgedildi");
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        File::delete($product->photo);
        File::delete($product->photo1);
        Product::destroy($id);
        return back()->with('success',"Maglumat üstünlikli pozuldy");
    }
}
