<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\WithPagination;


use App\Models\product;
use App\Models\vendor;

class VendorWiseProductComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "asc";

    public $filter, $vendor_id;

    public $temp_filter, $temp_vendor_id;

    public function sortBy($field)
    {
        if ($this->sortDirection == "asc") {
            $this->sortDirection = "desc";
        }
        else
        {
            $this->sortDirection = "asc";
        }

        return $this->sortBy = $field;
    }


    public function setValue()
    {
        $this->filter = $this->temp_filter;
        $this->vendor_id = $this->temp_vendor_id;

        // dd($this->filter,$this->temp_filter,$this->vendor_id,$this->temp_vendor_id);
    }

    public function render()
    {
        $vendors = vendor::all();


        if ($this->filter === 'published') {
            $allProducts = product::where('published',1)->where('vendor_id',$this->vendor_id)->with('category')->with('variations')->with('brand')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }
        elseif($this->filter === 'not_published'){
            $allProducts = product::where('published',0)->where('vendor_id',$this->vendor_id)->with('category')->with('variations')->with('brand')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }
        else{
            $allProducts = product::with('category')->where('vendor_id',$this->vendor_id)->with('variations')->with('brand')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }

        return view('livewire.admin.product.vendor-wise-product-component',compact('allProducts','vendors'))->layout('admin.adminbase');
    }
}
