<?php 

use App\Models\ProductReview;

use App\Models\product;
use App\Models\OrderItem;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;


if(!function_exists('avg_rating')){
	function avg_rating($product_id)
	{
		$avg = ProductReview::avg_ratings($product_id);

		if ($avg != null) {
            $avg = number_format((float)$avg, 2, '.','');
        }

        return $avg;
	}
}




if(!function_exists('add_order_count')){
	function add_order_count($data)
	{
		foreach ($data as $key => $value) {

            $count = 0;

            foreach ($value->variations as $key_v => $value_v) {
                
                $temp = OrderItem::where('product_variation_id',$value_v->id)->get();

                if ($temp->count() > 0) {
                    foreach ($temp as $key_temp => $value_temp) {
                        $count = $count+$value_temp->quantity;
                    }
                }

                $data[$key]['order_count'] = $count;

            }

        }

        // return $data;
        return $data->sortByDesc('order_count');
	}
}

if(!function_exists('collection_paginate')){
	function collection_paginate($items, $perPage, $page = null,$baseUrl = null,$options = [])
	{
		$page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? 
                       $items : Collection::make($items);

        $lap = new LengthAwarePaginator($items->forPage($page, $perPage), 
                           $items->count(),
                           $perPage, $page, $options);

        if ($baseUrl) {
            $lap->setPath($baseUrl);
        }

        return $lap;
	}
}


if(!function_exists('best_selling_products')){
    function best_selling_products()
    {
        

        $temp_array=[];

        $items = OrderItem::with('variation')->get();
        // dd($items);

        $temp_array=[];

        foreach ($items as $key => $value) {
            
            if(array_key_exists($value->variation->product->name,$temp_array)){
                $temp_array[$value->variation->product->name]['qty']++;
            }else{
                
                $temp_array[$value->variation->product->name]['qty']=1;
                $temp_array[$value->variation->product->name]['id']=$value->variation->product->id;
            }
            
        }

        arsort($temp_array);

        $final_array = [];

        $i=0;

        foreach ($temp_array as $key => $value) {
            
            array_push($final_array, $value['id']);
            
            $i++;
            if ($i >7) {
                break;
            }
        }

        $top_products = product::whereIn('id',$final_array)->where('published',1)->get();

        return $top_products;
    }
}