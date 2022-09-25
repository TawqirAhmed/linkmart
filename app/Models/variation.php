<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class variation extends Model
{
    use HasFactory;

    protected $table = "variations";

    public function color()
    {
        return $this->belongsTo(color::class,  'color_id');
    }

    public function size()
    {
        return $this->belongsTo(size::class,  'size_id');
    }

    public function product()
    {
        return $this->belongsTo(product::class)->with('vendors');
    }

    // public function ordered_items()
    // {
    //     return $this->hasMany(OrderItem::class , 'product_variation_id');
    // }
}
