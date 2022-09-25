<?php

namespace App\Http\Livewire\Admin\Home;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\category;
use App\Models\vendor;
use App\Models\Brand;
use App\Models\NavBar;

use Illuminate\Support\Str;
use Carbon\Carbon;

class HeaderSettings extends Component
{
    
    
    use WithFileUploads;

    public $categories_array;
    public $vendors_array;
    public $verified_vendors_array;

    public $old_logo, $logo, $header_contact, $fb_link, $insta_link;

    public function Update()
    {
        $data = NavBar::find(1);

        $data->categories = json_encode($this->categories_array);
        $data->vendors = json_encode($this->vendors_array);
        $data->verified_vendors = json_encode($this->verified_vendors_array);
        $data->header_contact = $this->header_contact;
        $data->fb_link = $this->fb_link;
        $data->insta_link = $this->insta_link;

        if ($this->logo) {
            $imageName = 'logo_main'.'.'.$this->logo->extension();
            $this->logo->storeAs('logo/',$imageName);
            $data->logo = $imageName;
        }


        $done = $data->save();

        if ($done) {
            
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Nav Bar Updated.']);

            
        }
    }

    public function mount()
    {
        $data = NavBar::find(1);
        $this->categories_array = json_decode($data->categories);
        //this is brand array
        $this->vendors_array = json_decode($data->vendors); //this is brand array
        //this is brand array
        $this->verified_vendors_array = json_decode($data->verified_vendors);
        $this->old_logo = $data->logo;
        $this->header_contact = $data->header_contact;
        $this->fb_link = $data->fb_link;
        $this->insta_link = $data->insta_link;
    }


    public function render()
    {
        $allCategories = category::all();

        $allBrands = Brand::all();

        $allVerifiedVendors = vendor::where('verified',1)->get();

        // dd($this->categories_array);

        return view('livewire.admin.home.header-settings',compact('allCategories','allBrands','allVerifiedVendors'))->layout('admin.adminbase');
    }
}
