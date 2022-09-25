<?php

namespace App\Http\Livewire\Web\Brand;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Brand;
use App\Models\Footer;

class AllBrandComponent extends Component
{
    public function render()
    {
        $allBrands = Brand::with('products')->orderBy('name','ASC')->paginate(8);

        // $footer = Footer::find(1);
        // $brands_array = json_decode($footer->brands);
        // $brands = vendor::whereIn('id',$brands_array)->get();

        return view('livewire.web.brand.all-brand-component',compact('allBrands'))->layout('web.base.base');
    }
}
