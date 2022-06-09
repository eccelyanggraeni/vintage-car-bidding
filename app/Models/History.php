<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class History extends Model
{
    // use HasFactory;
    public function product()
    {
        return $this->hasMany(Product::class,'product_id','id');
    }
}
