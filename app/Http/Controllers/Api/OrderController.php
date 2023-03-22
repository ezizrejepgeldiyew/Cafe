<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Place;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function get()
    {
        $order = json_decode(request('orderData'))->productData;
        // $order->phone_number = (int)('993' . $order->phone_number);

        // Order::create($order);

        return response()->json($order, 200);
    }
    public function store()
    {
        $data = request()->all();
        $data['phone_number'] = (int)('993' . $data['phone_number']);

        Order::create($data);
        return response()->json(compact('data'), 200);
    }

    public function productStore()
    {
        return response()->json(compact('data'),200);
    }

    public function place()
    {
        $place = Place::get();
        return response()->json(compact('place'),200);
    }
}
