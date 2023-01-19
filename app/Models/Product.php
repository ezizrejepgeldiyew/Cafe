<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sub_category', 'photo', 'photo1', 'composition', 'price_max', 'ready_time_max', 'price_min', 'ready_time_min'];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_category','id');
    }

}
