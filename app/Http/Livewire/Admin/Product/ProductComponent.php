<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\WithPagination;


use App\Models\product;

class ProductComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "asc";

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

    public function setFilter($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        if ($this->filter === 1) {
            $allProducts = product::where('published',1)->with('category')->with('variations')->with('brand')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }
        elseif($this->filter === 0){
            $allProducts = product::where('published',0)->with('category')->with('variations')->with('brand')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }
        else{
            $allProducts = product::with('category')->with('variations')->with('brand')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }

        return view('livewire.admin.product.product-component',compact('allProducts'))->layout('admin.adminbase');
    }
}
