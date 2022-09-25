<?php

namespace App\Http\Livewire\Vendor\Product;

use Livewire\Component;
use Livewire\WithPagination;


use App\Models\product;
use App\Models\vendor;
use Auth;

class VendorsProductsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "asc";

    public $vendor_id, $vendor_id_array=[];

    public $filter;

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

    public function mount()
    {
        $user_id = Auth::id();

        $vendor = vendor::where('user_id',$user_id)->get();

        foreach ($vendor as $key => $value) {
            array_push($this->vendor_id_array, $value->id);

            $this->vendor_id = $value->id;
        }
        // $this->vendor_id = $vendor->id;
    }


    public function setFilter($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {

        if ($this->filter === 1) {
            $allProducts = product::whereIn('vendor_id',$this->vendor_id_array)->where('published',1)->with('vendors')->with('category')->with('variations')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }
        elseif($this->filter === 0){
            $allProducts = product::whereIn('vendor_id',$this->vendor_id_array)->where('published',0)->with('vendors')->with('category')->with('variations')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }
        else{
            $allProducts = product::whereIn('vendor_id',$this->vendor_id_array)->with('vendors')->with('category')->with('variations')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }

        // $allProducts = product::whereIn('vendor_id',$this->vendor_id_array)->with('vendors')->with('category')->with('variations')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);

        return view('livewire.vendor.product.vendors-products-component',compact('allProducts'))->layout('admin.adminbase');
    }
}
