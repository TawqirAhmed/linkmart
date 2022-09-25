<?php

namespace App\Http\Livewire\Web\Searched;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\product;
use App\Models\category;
use App\Models\FlashSale;
use App\Models\HotSale;

class SearchedProductComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search_word;

    public $paginate = 8;
    public $sorting = 'default';

    public function mount($key)
    {
        $this->search_word = $key;
    }

    // product::where('name','like','%'.$this->search_word.'%')->orderBy('created_at','DESC')->paginate(12);
    public function render()
    {
        // $category = category::where('name','like','%'.$this->search_word.'%')->orderBy('created_at','DESC')->get();

        if ($this->sorting == 'default') {
            $searchedProducts = product::where('name','like','%'.$this->search_word.'%')->orWhere('tags','like','%'.$this->search_word.'%')->with('category')->orderBy('name','ASC')->paginate($this->paginate);
        }
        elseif($this->sorting == 'price-asc'){
            $searchedProducts = product::where('name','like','%'.$this->search_word.'%')->orWhere('tags','like','%'.$this->search_word.'%')->with('category')->orderBy('unit_price','ASC')->paginate($this->paginate);
        }
        elseif($this->sorting == 'price-desc'){
            $searchedProducts = product::where('name','like','%'.$this->search_word.'%')->orWhere('tags','like','%'.$this->search_word.'%')->with('category')->orderBy('unit_price','DESC')->paginate($this->paginate);
        }
        // -------------------------------------------------------------------------
        elseif($this->sorting == 'order-asc'){
            $data = product::where('name','like','%'.$this->search_word.'%')->orWhere('tags','like','%'.$this->search_word.'%')->with('category')->get();
            $searchedProducts = collection_paginate(add_order_count($data),$this->paginate);
        }
        else {
            $searchedProducts = product::where('name','like','%'.$this->search_word.'%')->orWhere('tags','like','%'.$this->search_word.'%')->with('category')->orderBy('name','ASC')->paginate($this->paginate);
        }
        
        $flash_sale = FlashSale::find(1);
        $hot_sale = HotSale::find(1);
        // dd($category);

        return view('livewire.web.searched.searched-product-component',compact('searchedProducts','flash_sale','hot_sale'))->layout('web.base.base');
    }
}
