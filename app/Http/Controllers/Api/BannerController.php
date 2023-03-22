<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::get();
        return response()->json(compact('banner'),200);
    }
}
