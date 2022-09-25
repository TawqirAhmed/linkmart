<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = "order_items";

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function variation()
    {
        return $this->belongsTo(variation::class,'product_variation_id')->with('product','color','size');
    }

}
