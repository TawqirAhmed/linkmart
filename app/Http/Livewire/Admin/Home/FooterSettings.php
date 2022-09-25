<?php

namespace App\Http\Livewire\Admin\Home;

use Livewire\Component;

use App\Models\Footer;
use App\Models\category;
use App\Models\vendor;

class FooterSettings extends Component
{

    public $brands_array;
    public $categories_array;
    public $tags_array;

    public $contact_info;


    public function Update()
    {
        $data = Footer::find(1);

        $data->brands = json_encode($this->brands_array);
        $data->categories = json_encode($this->categories_array);
        $data->tags = json_encode($this->tags_array);
        $data->contact_info = $this->contact_info;

        $done = $data->save();

        if ($done) {
            
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Footer Updated.']);

            
        }
    }

    public function mount()
    {
        $data = Footer::find(1);
        $this->brands_array = json_decode($data->brands);
        $this->categories_array = json_decode($data->categories);
        $this->tags_array = json_decode($data->tags);

        $this->contact_info = $data->contact_info;
    }


    public function render()
    {
        $allCategories = category::all();
        $allVendors = vendor::all();

        return view('livewire.admin.home.footer-settings',compact('allCategories','allVendors'))->layout('admin.adminbase');
    }
}
