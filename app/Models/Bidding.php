<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Bidding extends Model
{
    // use HasFactory;
    protected $table = 'bidding';
    public function product()
    {
        return $this->hasMany(Product::class,'product_id','id');
    }
}
