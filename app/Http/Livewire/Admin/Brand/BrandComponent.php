<?php

namespace App\Http\Livewire\Admin\Brand;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use App\Models\Brand;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BrandComponent extends Component
{
    
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;

    public $name, $image;

    public $edit_id, $e_name,$e_image;
    public $new_image;
    public $delete_id;


    public function storeItem()
    {
        $data = new Brand();

        $data->name = $this->name;

        if ($this->image) {
            $imageName = $this->name."_".Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAs('brands',$imageName);
            $data->image = $imageName;
        }

        $done = $data->save();
        // session()->flash('message','Brand Created Successfully.');
        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Brand Created Successfully.']);
        }

        $this->emit('storeSomething');

        

        $this->name = null;
        $this->image = null;
    }

    public function getItem($id)
    {
        $this->edit_id = $id;

        $data = Brand::find($id);

        $this->e_name = $data->name;
        $this->e_image = $data->image;
    }

    public function updateItem()
    {
        $data = Brand::find($this->edit_id);

        $data->name = $this->e_name;

        if ($this->new_image) {
            $imageName = $this->e_name."_".Carbon::now()->timestamp.'.'.$this->new_image->extension();
            $this->new_image->storeAs('brands',$imageName);
            $data->image = $imageName;
        }

        $done = $data->save();
        // session()->flash('message','Category Updated Successfully.');
        $this->emit('storeSomething');

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Brand Updated Successfully.']);
        }

        $this->edit_id = null;
        $this->e_name = null;
        $this->e_image = null;
        $this->new_image = null;
    }

    public function render()
    {
        $allBrands = Brand::paginate($this->paginate);

        return view('livewire.admin.brand.brand-component',compact('allBrands'))->layout('admin.adminbase');
    }
}
