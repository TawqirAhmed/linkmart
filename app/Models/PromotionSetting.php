<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionSetting extends Model
{
    use HasFactory;

    protected $table = "promotion_settings";

    public function vendors()
    {
        return $this->belongsTo(vendor::class, 'vendor_id');
    }
}
