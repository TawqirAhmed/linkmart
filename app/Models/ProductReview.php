<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

    protected $table = "product_reviews";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(product::class)->with('variations','vendors');
    }

    public function reply()
    {
        return $this->hasMany(ReviewReply::class);
    }

    public static function avg_ratings($product_id)
    {
        $ratings = ProductReview::where('product_id',$product_id)->get();

        $count = $ratings->count();

        if ($count <= 0) {
            return;
        }

        $total_ratings = 0;

        foreach ($ratings as $key => $value) {
            
            $total_ratings = $total_ratings + $value->rating;

        }

        $avg = $total_ratings / $count;

        return $avg;
    }

}
