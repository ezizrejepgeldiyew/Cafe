<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;

class PlaceController extends Controller
{
    public function index()
    {
        $place = Place::get();
        return view('Admin.place', compact('place'));
    }

    public function store()
    {
        $data = request()->all();
        Place::create($data);
        return back()->with('success',"Maglumat üstünlikli goşuldy");
    }

    public function update($id)
    {
        $data = request()->all();
        Place::find($id)->update($data);
        return redirect()->route('Place.index')->with('success',"Maglumat üstünlikli üýtgedildi");
    }

    public function delete($id)
    {
        Place::find($id)->destroy($id);
        return back()->with('success',"Maglumat üstünlikli pozuldy");
    }
}
