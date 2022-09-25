<?php

namespace App\Http\Livewire\Admin\Refund;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Refund;


class RefundRequestComponent extends Component
{
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "desc";

    public $filter;


    public $request_id, $status;

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
        $this->request_id = $id;

        $data = Refund::find($id);
        $this->status = $data->status;
    }

    public function Update()
    {
        $data = Refund::find($this->request_id);

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
            
            $allRefunds = Refund::where('status',$this->filter)->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);

        }else{
            $allRefunds = Refund::orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }

        // dd($allRefunds);

        return view('livewire.admin.refund.refund-request-component',compact('allRefunds'))->layout('admin.adminbase');
    }
}
