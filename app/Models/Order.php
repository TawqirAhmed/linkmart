<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->with('profile');
    }
    public function vendor()
    {
        return $this->belongsTo(vendor::class, 'vendor_id');
    }

    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class)->with('variation');
    }

    public function scopeSearch($query,$term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term)
        {
            $query->where('id','like',$term)
                    ->orWhere('name','like',$term)
                    ->orWhere('order_number','like',$term)
                    ->orWhere('mobile','like',$term)
                    ->orWhere('email','like',$term)
                    ->orWhere('status','like',$term)
                    ->orWhere('created_at','like',$term)
                    ->orWhereHas('vendor', function($query) use ($term){
                        $query->where('name','like',$term);
                    });
        });
    }
}
