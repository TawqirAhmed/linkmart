<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\product;

class HomeAPIController extends Controller
{
    public function featuredProducts()
    {
       $data = product::where('featured',1)->get();

       return response()->json([
                "status" => 1,
                "message" =>"Featured Products.",
                "count" =>$data->count(),
                "data" => $data
            ]);
    }
}
