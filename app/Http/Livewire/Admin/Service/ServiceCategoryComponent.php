<?php

namespace App\Http\Livewire\Admin\Service;

use Livewire\Component;


use Livewire\WithPagination;

use App\Models\ServiceCategory;

class ServiceCategoryComponent extends Component
{
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "desc";

    public $name, $e_name, $edit_id;


    public function sortBy($field)
    {
        if ($this->sortDirection == "asc") {
            $this->sortDirection = "desc";
        }
        else
        {
            $this->sortDirection = "asc";
        }

        return $this->sortBy = $field;
    }


    public function Store()
    {
        $data = new ServiceCategory();

        $data->name = $this->name;

        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Service Category Updated Successfuly.']);
        }

        $this->emit('storeSomething');

        $this->name = null;

    }

    public function getItem($id)
    {
        $this->edit_id = $id;

        $data = ServiceCategory::find($id);

        $this->e_name = $data->name;
    }

    public function Update()
    {
        $data = ServiceCategory::find($this->edit_id);

        $data->name = $this->e_name;

        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Service Category Updated Successfuly.']);
        }

        $this->emit('storeSomething');

        $this->edit_id = null;
        $this->e_name = null;
    }

    public function render()
    {
        $allServiceCategory = ServiceCategory::orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);

        return view('livewire.admin.service.service-category-component',compact('allServiceCategory'))->layout('admin.adminbase');
    }
}
