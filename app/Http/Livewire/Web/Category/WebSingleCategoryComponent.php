<?php

namespace App\Http\Livewire\Web\Category;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\product;
use App\Models\category;

use App\Models\HotSale;
use App\Models\FlashSale;


class WebSingleCategoryComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id, $category_name, $meta_tags;

    public $paginate = 8;

    public $sorting = 'default';

    public function mount($id)
    {
        $this->category_id = $id;

        $data = category::find($id);

        $this->category_name = $data->name;
        $this->meta_tags = $data->meta_title;
    }

    public function render()
    {
        if ($this->sorting == 'default') {
            $allProducts = product::where('published',1)->where('category_id',$this->category_id)->with('variations')->orderBy('name','ASC')->paginate($this->paginate);
        }
        elseif($this->sorting == 'price-asc'){
            $allProducts = product::where('published',1)->where('category_id',$this->category_id)->with('variations')->orderBy('unit_price','ASC')->paginate($this->paginate);
        }
        elseif($this->sorting == 'price-desc') {
            $allProducts = product::where('published',1)->where('category_id',$this->category_id)->with('variations')->orderBy('unit_price','DESC')->paginate($this->paginate);
        }
        // -------------------------------------------------------------------------------
        elseif($this->sorting == 'order-asc') {
            $data = product::where('published',1)->where('category_id',$this->category_id)->with('variations')->get();
            $allProducts = collection_paginate(add_order_count($data),$this->paginate);
        }
        else {
            $allProducts = product::where('published',1)->where('category_id',$this->category_id)->with('variations')->orderBy('name','ASC')->paginate($this->paginate);
        }
        
        $hot_sale = HotSale::find(1);
        $flash_sale = FlashSale::find(1);

        return view('livewire.web.category.web-single-category-component',compact('allProducts','hot_sale','flash_sale'))->layout('web.base.base');
    }



}
