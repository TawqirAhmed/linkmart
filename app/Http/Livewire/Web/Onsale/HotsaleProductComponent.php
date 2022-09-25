<?php

namespace App\Http\Livewire\Web\Onsale;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\product;
use App\Models\category;
use App\Models\HotSale;
use Carbon\Carbon;

class HotsaleProductComponent extends Component
{ 
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate = 8;

    public $sorting = 'default';


    public function render()
    {
        if ($this->sorting == 'default') {
            $allProducts = product::where('on_sale',1)->where('published',1)->where('hot_sale',1)->with('variations','category')->orderBy('name','ASC')->paginate($this->paginate);
        }
        elseif($this->sorting == 'price-asc'){
            $allProducts = product::where('on_sale',1)->where('published',1)->where('hot_sale',1)->with('variations','category')->orderBy('unit_price','ASC')->paginate($this->paginate);
        }
        elseif($this->sorting == 'price-desc') {
            $allProducts = product::where('on_sale',1)->where('published',1)->where('hot_sale',1)->with('variations','category')->orderBy('unit_price','DESC')->paginate($this->paginate);
        }
        // --------------------------------------------------------------------------
        elseif($this->sorting == 'order-asc') {
            $data = product::where('on_sale',1)->where('published',1)->where('hot_sale',1)->with('variations','category')->get();
            
            $allProducts = collection_paginate(add_order_count($data),$this->paginate);
        }
        else {
            $allProducts = product::where('on_sale',1)->where('published',1)->where('hot_sale',1)->with('variations','category')->orderBy('name','ASC')->paginate($this->paginate);
        }

        $hot_sale = HotSale::find(1);

        return view('livewire.web.onsale.hotsale-product-component',compact('allProducts','hot_sale'))->layout('web.base.base');
    }
}
