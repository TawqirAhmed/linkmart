<?php

namespace App\Http\Livewire\Web\Vendor;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\vendor;
use App\Models\Footer;

class AllVerifiedVendorComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $allVendor = vendor::where('verified',1)->with('products')->orderBy('name','ASC')->paginate(8);

        $footer = Footer::find(1);
        $brands_array = json_decode($footer->brands);
        $brands = vendor::whereIn('id',$brands_array)->get();

        return view('livewire.web.vendor.all-verified-vendor-component',compact('allVendor','brands'))->layout('web.base.base');
    }
}
