<?php

namespace App\Http\Livewire\Web\Featured;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\product;
use App\Models\category;

class FeaturedProductsComponent extends Component
{ 
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate = 8;

    public $sorting = 'default';


    public function render()
    {
        if ($this->sorting == 'default') {
            $allProducts = product::where('featured',1)->where('published',1)->with('variations','category')->orderBy('name','ASC')->paginate($this->paginate);
        }
        elseif($this->sorting == 'price-asc'){
            $allProducts = product::where('featured',1)->where('published',1)->with('variations','category')->orderBy('unit_price','ASC')->paginate($this->paginate);
        }
        elseif($this->sorting == 'price-desc') {
            $allProducts = product::where('featured',1)->where('published',1)->with('variations','category')->orderBy('unit_price','DESC')->paginate($this->paginate);
        }
        // ------------------------------------------------------------------------------------
        elseif($this->sorting == 'order-asc') {
            $data = product::where('featured',1)->where('published',1)->with('variations','category')->get();
            $allProducts = collection_paginate(add_order_count($data),$this->paginate);
        }
        else {
            $allProducts = product::where('featured',1)->where('published',1)->with('variations','category')->orderBy('name','ASC')->paginate($this->paginate);
        }

        // dd($allProducts);

        return view('livewire.web.featured.featured-products-component',compact('allProducts'))->layout('web.base.base');
    }
}
