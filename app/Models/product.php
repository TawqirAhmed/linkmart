<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = "products";

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function vendors()
    {
        return $this->belongsTo(vendor::class, 'vendor_id');
    }

    public function variations()
    {
        return $this->hasMany(variation::class)->with('size')->with('color');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }


    public function scopeSearch($query,$term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term)
        {
            $query->where('name','like',$term)
                    ->orWhere('description','like',$term)
                    ->orWhere('created_at','like',$term)
                    ->orWhereHas('vendors', function($query) use ($term){
                        $query->where('name','like',$term);
                    })
                    ->orWhereHas('brand', function($query) use ($term){
                        $query->where('name','like',$term);
                    });
        });
    }
}
