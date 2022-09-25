<?php

namespace App\Http\Livewire\Admin\Sellerregistration;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\SellerRequest;

class SellerRegistrationComponent extends Component
{
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "desc";

    public $filter;

    public $request_id, $status;

    public function getItem($id)
    {
        $this->request_id = $id;

        $data = SellerRequest::find($id);

        $this->status = $data->status;
    }

    public function Update()
    {
        

        $data = SellerRequest::find($this->request_id);

        $data->status = $this->status;

        $done = $data->save();

        $this->emit('storeSomething');
        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Status Updated.']);
        }

        $this->status = null;
    }


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
    public function render()
    {

        if ($this->filter == 'accepted') {
            $allRequests = SellerRequest::where('status','accepted')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }elseif($this->filter == 'done'){ 
            $allRequests = SellerRequest::where('status','done')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }elseif($this->filter == 'rejected'){ 
            $allRequests = SellerRequest::where('status','rejected')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }elseif($this->filter == 'submitted'){ 
            $allRequests = SellerRequest::where('status','submitted')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }else{
            $allRequests = SellerRequest::orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }

        return view('livewire.admin.sellerregistration.seller-registration-component',compact('allRequests'))->layout('admin.adminbase');
    }
}
