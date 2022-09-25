<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorProfile extends Model
{
    use HasFactory;



    protected $table = "vendor_profiles";


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->with('vendors');
    }

    public function scopeSearch($query,$term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term)
        {
            $query->where('shop_name','like',$term)
                    ->where('owner_name','like',$term)
                    ->orWhere('owner_email','like',$term)
                    ->orWhere('owner_phone','like',$term)
                    ->orWhereHas('user', function($query) use ($term){
                        $query->where('name','like',$term)
                        ->orWhereHas('vendors', function($query) use ($term){
                            $query->where('name','like',$term);
                        });
                    });
        });
    }
}
