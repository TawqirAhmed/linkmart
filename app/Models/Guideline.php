<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guideline extends Model
{
    use HasFactory;
    protected $table = "guidelines";

    public function scopeSearch($query,$term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term)
        {
            $query->where('title','like',$term)
                    ->orWhere('id','like',$term)
                    ->orWhere('created_at','like',$term);
        });
    }
}
