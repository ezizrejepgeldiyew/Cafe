<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $dateFormat = 'Y-m-d H:m:s';

    protected $fillable = ['title', 'link', 'photo', 'description', 'date', 'status'];
}
