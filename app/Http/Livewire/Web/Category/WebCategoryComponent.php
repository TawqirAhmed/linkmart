<?php

namespace App\Http\Livewire\Web\Category;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\category;
use App\Models\vendor;
use App\Models\Footer;
class WebCategoryComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $allCategory = category::with('products')->orderBy('name','ASC')->paginate(8);

        // dd($allCategory);
        $footer = Footer::find(1);
        $brands_array = json_decode($footer->brands);
        $brands = vendor::whereIn('id',$brands_array)->get();

        return view('livewire.web.category.web-category-component',compact('allCategory','brands'))->layout('web.base.base');
    }
}
