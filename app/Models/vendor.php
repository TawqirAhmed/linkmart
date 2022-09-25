<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    use HasFactory;

    public function products(){

        return $this->hasMany(product::class, 'vendor_id');

    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');

    }
}
