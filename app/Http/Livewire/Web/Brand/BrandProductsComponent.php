<?php

namespace App\Http\Livewire\Web\Brand;

use Livewire\Component;
use Livewire\WithPagination;


use App\Models\product;
use App\Models\Brand;
use App\Models\HotSale;
use App\Models\FlashSale;

class BrandProductsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $paginate = 12;
    public $sorting = 'default';

    public $brand_id;

    public function mount($key)
    {
        $this->brand_id = $key;
    }

    public function render()
    {

        $brand_info = Brand::find($this->brand_id);

        if ($this->sorting == 'default') {
            $searchedProducts = product::where('published',1)->where('brand_id',$this->brand_id)->with('category')->with('vendors')->orderBy('name','ASC')->paginate($this->paginate);
        }
        elseif($this->sorting == 'price-asc'){
            $searchedProducts = product::where('published',1)->where('brand_id',$this->brand_id)->with('category')->with('vendors')->orderBy('unit_price','ASC')->paginate($this->paginate);
        }
        elseif($this->sorting == 'price-desc'){
            $searchedProducts = product::where('published',1)->where('brand_id',$this->brand_id)->with('category')->with('vendors')->orderBy('unit_price','DESC')->paginate($this->paginate);
        }
        // -----------------------------------------------------------------------------------
        elseif($this->sorting == 'order-asc'){
            $data = product::where('published',1)->where('brand_id',$this->brand_id)->with('category')->with('vendors')->get();
            $searchedProducts = collection_paginate(add_order_count($data),$this->paginate);
        }
        else {
            $searchedProducts = product::where('published',1)->where('brand_id',$this->brand_id)->with('category')->with('vendors')->orderBy('name','ASC')->paginate($this->paginate);
        }

        $hot_sale = HotSale::find(1);
        $flash_sale = FlashSale::find(1);


        return view('livewire.web.brand.brand-products-component',compact('searchedProducts','brand_info','hot_sale','flash_sale'))->layout('web.base.base');
    }
}
