<?php

namespace App\Http\Livewire\Web\Onsale;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\product;
use App\Models\category;
use Carbon\Carbon;

class OnsaleProductsComponent extends Component
{ 
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate = 8;

    public $sorting = 'default';


    public function render()
    {
        if ($this->sorting == 'default') {
            $allProducts = product::where('on_sale',1)->where('published',1)->where('sale_end','>',Carbon::now())->with('variations','category')->orderBy('name','ASC')->paginate($this->paginate);
        }
        elseif($this->sorting == 'price-asc'){
            $allProducts = product::where('on_sale',1)->where('published',1)->where('sale_end','>',Carbon::now())->with('variations','category')->orderBy('unit_price','ASC')->paginate($this->paginate);
        }
         elseif($this->sorting == 'price-desc') {
            $allProducts = product::where('on_sale',1)->where('published',1)->where('sale_end','>',Carbon::now())->with('variations','category')->orderBy('unit_price','DESC')->paginate($this->paginate);
        }
        else {
            $allProducts = product::where('on_sale',1)->where('published',1)->where('sale_end','>',Carbon::now())->with('variations','category')->orderBy('name','ASC')->paginate($this->paginate);
        }

        // dd($allProducts);

        return view('livewire.web.onsale.onsale-products-component',compact('allProducts'))->layout('web.base.base');
    }
}
