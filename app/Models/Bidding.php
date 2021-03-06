<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Bidding extends Model
{
    // use HasFactory;
    protected $table = 'bidding';
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function user()
    {
        return $this->hasMany(User::class,'user_id','id');
    }
}
