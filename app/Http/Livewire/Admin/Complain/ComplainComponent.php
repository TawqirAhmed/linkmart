<?php

namespace App\Http\Livewire\Admin\Complain;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Complain;

class ComplainComponent extends Component
{
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "desc";

    public $filter;

    public $complain_id, $status;

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

    public function setFilter($filter)
    {
        $this->filter = $filter;
    }


     // for change Status-----------------------------------------------------------------
    public function getItem($id)
    {
        $this->complain_id = $id;

        $data = Complain::find($id);
        $this->status = $data->status;
    }

    public function Update()
    {
        $data = Complain::find($this->complain_id);

        $data->status = $this->status;

        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Status Updated']);
        }

        $this->emit('storeSomething');
    }

    // for change Status-----------------------------------------------------------------
    public function render()
    {

        if ($this->filter != null) {
            
            $allComplain = Complain::where('status',$this->filter)->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);

        }else{
            $allComplain = Complain::orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }

        // dd($allComplain);

        return view('livewire.admin.complain.complain-component',compact('allComplain'))->layout('admin.adminbase');
    }
}
