<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['services_type_name', 'place_name', 'services_date', 'delivery_address', 'payment_type_name', 'name', 'phone_number', 'notes', 'product_data'];

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
