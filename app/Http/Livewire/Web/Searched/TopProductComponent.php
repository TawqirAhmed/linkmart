<?php

namespace App\Http\Livewire\Web\Searched;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\product;
use App\Models\category;
use App\Models\FlashSale;
use App\Models\HotSale;
use App\Models\OrderItem;
use Carbon\Carbon;


class TopProductComponent extends Component
{ 
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate = 8;

    public $sorting = 'default';

    

    public $product_id_array = [];

    public function mount()
    {
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

        $product_id_array = [];

        
        foreach ($temp_array as $key => $value) {
            
            array_push($product_id_array,$value['id']);
        }

        // $allProducts = product::whereIn('id',$product_id_array)->get();

        $this->product_id_array = $product_id_array;
    }


    public function render()
    {

        $flash_sale = FlashSale::find(1);
        $hot_sale = HotSale::find(1);

         if ($this->sorting == 'default') {
            $allProducts = product::whereIn('id',$this->product_id_array)->where('published',1)->with('variations','category')->orderBy('name','ASC')->paginate($this->paginate);
        }
        elseif($this->sorting == 'price-asc'){
            $allProducts = product::whereIn('id',$this->product_id_array)->where('published',1)->with('variations','category')->orderBy('unit_price','ASC')->paginate($this->paginate);
        }
        elseif($this->sorting == 'price-desc') {
            $allProducts = product::whereIn('id',$this->product_id_array)->where('published',1)->with('variations','category')->orderBy('unit_price','DESC')->paginate($this->paginate);
        }
        elseif($this->sorting == 'order-asc') {
            $data = product::whereIn('id',$this->product_id_array)->where('published',1)->with('variations','category')->get();
            $allProducts = collection_paginate(add_order_count($data),$this->paginate);
        }
        else {
            $allProducts = product::whereIn('id',$this->product_id_array)->where('published',1)->with('variations','category')->orderBy('name','ASC')->paginate($this->paginate);
        }

        return view('livewire.web.searched.top-product-component',compact('allProducts','hot_sale','flash_sale'))->layout('web.base.base');
    }
}
