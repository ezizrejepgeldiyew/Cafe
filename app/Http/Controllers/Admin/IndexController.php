<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('Admin.index');
    }



    public function subCategory()
    {
        return view('Admin.subCategory');
    }
}
