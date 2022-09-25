<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function advertice_category()
    {
        return $this->belongsTo(AdverticeCategory::class);
    }


    public function scopeSearch($query,$term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term)
        {
            $query->where('id','like',$term)
                    ->orWhere('company_name','like',$term)
                    ->orWhere('contact_info','like',$term)
                    ->orWhereHas('service_category', function($query) use ($term){
                        $query->where('name','like',$term);
                    })
                    ->orWhereHas('advertice_category', function($query) use ($term){
                        $query->where('name','like',$term);
                    });
        });
    }
}
