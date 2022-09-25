<?php

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Order;

class ViewOrdersComponent extends Component
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

        if ($this->filter != null) {
            
            $allOrders = Order::with('user')->with('user')->with('shipping')->with('transaction')->with('items')->with('vendor')->where('status',$this->filter)->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);

        }else{
            $allOrders = Order::with('user')->with('user')->with('shipping')->with('transaction')->with('items')->with('vendor')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }

        

        // dd($allOrders);

        return view('livewire.admin.orders.view-orders-component',compact('allOrders'))->layout('admin.adminbase');
    }
}
