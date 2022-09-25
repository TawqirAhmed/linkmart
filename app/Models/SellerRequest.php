<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerRequest extends Model
{
    use HasFactory;


    public function scopeSearch($query,$term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term)
        {
            $query->where('id','like',$term)
                    ->orWhere('shop_name','like',$term)
                    ->orWhere('owner_name','like',$term)
                    ->orWhere('owner_email','like',$term)
                    ->orWhere('owner_phone','like',$term);
        });
    }
}
