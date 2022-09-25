<?php

namespace App\Http\Livewire\Vendor\Variation;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\color;

class ProductColor extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;

    public $name, $hex_code;
    public $edit_id, $e_name, $e_hex_code;
    public $delete_id;

    public function Store()
    {
        $data = new color();

        $data->name = $this->name;
        $data->hex_code = $this->hex_code;

        $data->save();
        session()->flash('message','Color Added Successfully.');
        $this->emit('storeSomething');

        $this->name = null;
        $this->hex_code = null;

    }


    public function Get($id)
    {
        $this->edit_id = $id; 

        $data = color::find($id);

        $this->e_name = $data->name; 
        $this->e_hex_code = $data->hex_code;
    }

    public function Update()
    {
        $data = color::find($this->edit_id);

        $data->name = $this->e_name;
        $data->hex_code = $this->e_hex_code;

        $data->save();
        session()->flash('message','Color Updated Successfully.');
        $this->emit('storeSomething');

        $this->edit_id = null;
        $this->e_name = null;
        $this->e_hex_code = null;

    }

    public function deleteID($id)
    {
        $this->delete_id = $id;
    }

    public function delete()
    {
        color::find($this->delete_id)->delete();

        session()->flash('message','Color Deleted Successfully.');
        $this->emit('storeSomething');

        $this->delete_id = null;
    }


    public function render()
    {

        $allcolors= color::paginate($this->paginate);
        
        return view('livewire.vendor.variation.product-color',compact('allcolors'))->layout('admin.adminbase');
    }
}
