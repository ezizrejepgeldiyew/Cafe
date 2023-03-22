<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::get();
        return view('Admin.category', compact('category'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalName();
            $filename = 'image/category/' . $extenstion;
            Image::make($file)->resize(300, 300)->save(public_path($filename), 80);
            $data['photo'] = $filename;
        }
        $category = Category::create($data);
        return back()->with('success',"Maglumat üstünlikli goşuldy");
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $category = Category::find($id);
        $data['photo'] = $category->photo;
        if ($request->hasFile('photo')) {
            File::delete($category->photo);
            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalName();
            $filename = 'image/category/' . $extenstion;
            Image::make($file)->resize(300, 300)->save(public_path($filename), 80);
            $data['photo'] = $filename;
        }
        // dd($category);
        $category->update($data);
        return redirect()->route('Category.index')->with('success',"Maglumat üstünlikli üýtgedildi");
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        File::delete($category->photo);
        Category::destroy($id);
        return back()->with('success',"Maglumat üstünlikli pozuldy");
    }
}
