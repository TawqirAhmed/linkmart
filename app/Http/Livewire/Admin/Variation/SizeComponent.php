<?php

namespace App\Http\Livewire\Admin\Variation;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\size;

class SizeComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;

    public $name;
    public $edit_id, $e_name;
    public $delete_id;

    public function Store()
    {
        $data = new size();

        $data->name = $this->name;

        $data->save();
        session()->flash('message','Size Added Successfully.');
        $this->emit('storeSomething');

        $this->name = null;

    }


    public function Get($id)
    {
        $this->edit_id = $id; 

        $data = size::find($id);

        $this->e_name = $data->name;
    }

    public function Update()
    {
        $data = size::find($this->edit_id);

        $data->name = $this->e_name;

        $data->save();
        session()->flash('message','Size Updated Successfully.');
        $this->emit('storeSomething');

        $this->edit_id = null;
        $this->e_name = null;

    }

    public function deleteID($id)
    {
        $this->delete_id = $id;
    }

    public function delete()
    {
        size::find($this->delete_id)->delete();

        session()->flash('message','Size Deleted Successfully.');
        $this->emit('storeSomething');

        $this->delete_id = null;
    }

    public function render()
    {
        $allcolors= size::paginate($this->paginate);

        // dd($allcolors);
        return view('livewire.admin.variation.size-component',compact('allcolors'))->layout('admin.adminbase');
    }
}
