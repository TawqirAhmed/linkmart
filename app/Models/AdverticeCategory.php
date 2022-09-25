<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdverticeCategory extends Model
{
    use HasFactory;

    public function service()
    {
        return $this->hasMany(Service::class, 'advertice_category_id')->with('service_category');
    }
}
