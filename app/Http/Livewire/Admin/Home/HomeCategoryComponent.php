<?php

namespace App\Http\Livewire\Admin\Home;

use Livewire\Component;

use App\Models\category;
use App\Models\HomeCategorySettings;

class HomeCategoryComponent extends Component
{

    public $categories_array;

    public function Update()
    {
        $data = HomeCategorySettings::find(1);

        $data->categories = json_encode($this->categories_array);

        $done = $data->save();

        if ($done) {
            
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Home Category Updated.']);

            
        }
    }

    public function mount()
    {
        $data = HomeCategorySettings::find(1);
        $this->categories_array = json_decode($data->categories);
    }
    
    public function render()
    {
        $allCategories = category::all();

        return view('livewire.admin.home.home-category-component',compact('allCategories'))->layout('admin.adminbase');
    }
}
