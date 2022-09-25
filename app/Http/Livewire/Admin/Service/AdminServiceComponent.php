<?php

namespace App\Http\Livewire\Admin\Service;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Service;
use Carbon\Carbon;

class AdminServiceComponent extends Component
{
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "desc";

    public $filter;

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

        if ($this->filter == 'Expiring') {
            $allService = Service::where('advertice_expire_date','>',Carbon::now())->where('advertice_expire_date','<',Carbon::now()->addDays(7))->with('advertice_category','service_category')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }elseif($this->filter == 'Expired'){

            $allService = Service::where('advertice_expire_date','<',Carbon::now())->with('advertice_category','service_category')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);

        }else{
            $allService = Service::with('advertice_category','service_category')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }

        

        return view('livewire.admin.service.admin-service-component',compact('allService'))->layout('admin.adminbase');
    }
}
