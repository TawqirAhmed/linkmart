<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;


    protected $table = "notices";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query,$term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term)
        {
            $query->where('title','like',$term)
                    ->orWhere('id','like',$term)
                    ->orWhere('created_at','like',$term)
                    ->orWhereHas('user', function($query) use ($term){
                        $query->where('name','like',$term);
                    });
        });
    }
}
