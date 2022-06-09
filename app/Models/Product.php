<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\History;
use App\Models\ProductVendor;
use App\Models\Bidding;

class Product extends Model
{
    // use HasFactory;
    protected $table = 'product';

    public function history()
    {
        return $this->belongsTo(History::class,'product_id','id');
    }

    public function product_vendor()
    {
        return $this->belongsTo(ProductVendor::class,'product_id','id');
    }

    public function bidding()
    {
        return $this->belongsTo(Bidding::class,'product_id','id');
    }
}
