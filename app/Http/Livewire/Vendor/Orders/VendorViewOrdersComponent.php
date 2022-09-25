<?php

namespace App\Http\Livewire\Vendor\Orders;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Order;
use App\Models\vendor;
use Auth;

class VendorViewOrdersComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "desc";

    // public $vendor_id;
    public $vendor_id, $vendor_id_array=[];

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

    public function mount()
    {
        // $user_id = Auth::id();

        // $vendor = vendor::where('user_id',$user_id)->first();
        // $this->vendor_id = $vendor->id;

        $user_id = Auth::id();

        $vendor = vendor::where('user_id',$user_id)->get();

        foreach ($vendor as $key => $value) {
            array_push($this->vendor_id_array, $value->id);

            $this->vendor_id = $value->id;
        }


    }


    public function render()
    {

        

        if ($this->filter != null) {
            
            $allOrders = Order::whereIn('vendor_id',$this->vendor_id_array)->with('user')->with('shipping')->with('transaction')->with('items')->with('vendor')->where('status',$this->filter)->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);

        }else{
            $allOrders = Order::whereIn('vendor_id',$this->vendor_id_array)->with('user')->with('shipping')->with('transaction')->with('items')->with('vendor')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }

        return view('livewire.vendor.orders.vendor-view-orders-component',compact('allOrders'))->layout('admin.adminbase');
    }
}
