<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductVendor;

class Vendor extends Model
{
    // use HasFactory;
    public function product_vendor()
    {
        return $this->belongsTo(ProductVendor::class,'product_id','id');
    }
}
