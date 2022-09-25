<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;


    public function scopeSearch($query,$term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term)
        {
            $query->where('name','like',$term)
                    ->orWhere('email','like',$term)
                    ->orWhere('contact_no','like',$term)
                    ->orWhere('order_no','like',$term)
                    ->orWhere('status','like',$term)
                    ->orWhere('product_name','like',$term)
                    ->orWhere('product_id','like',$term)
                    ->orWhere('created_at','like',$term);
        });
    }
}
