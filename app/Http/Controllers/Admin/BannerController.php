<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::get();
        return view('Admin.Banner.index', compact('banner'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalName();
            $filename = 'image/banner/' . $extenstion;
            Image::make($file)->resize(120, 120)->save(public_path($filename), 80);
            $data['photo'] = $filename;
        }
        $banner = Banner::create($data);
        return back()->with('success',"Maglumat üstünlikli goşuldy");
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $banner = Banner::find($id);
        $data['photo'] = $banner->photo;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalName();
            $filename = 'image/banner/' . $extenstion;
            Image::make($file)->resize(120, 120)->save(public_path($filename), 80);
            $data['photo'] = $filename;
            File::delete($banner->photo);
        }
        $banner->update($data);
        return redirect()->route('Banner.index')->with('success',"Maglumat üstünlikli üýtgedildi");
    }

    public function delete($id)
    {
        $banner = Banner::findOrFail($id);
        File::delete($banner->photo);
        Banner::destroy($id);
        return back()->with('success',"Maglumat üstünlikli pozuldy");
    }

    public function success()
    {
        $banner = Banner::whereStatus('success')->get();
        return view('Admin.Banner.success', compact('banner'));
    }

    public function secondary()
    {
        $banner = Banner::whereStatus('secondary')->get();
        return view('Admin.Banner.secondary', compact('banner'));
    }
}
