<?php

namespace App\Http\Livewire\Vendor\Statement;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Order;
use App\Models\vendor;

use Carbon\Carbon;
use Auth;

class VendorStatementComponent extends Component
{
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;

    public $vendor_id;
    
    public $from, $to, $temp_from, $temp_to;

    public function setValue()
    {
        $this->from = $this->temp_from;

        $date_to = ((Carbon::parse($this->temp_to))->addDays(1))->format('Y-m-d');

        $this->to = $date_to;

        // $allOrders = Order::where('vendor_id',$this->vendor_id)->where('status','delivered')->where('updated_at','>=',$this->from)->where('updated_at','<=',$this->to)->with('items','shipping','transaction')->get();
        // dd($date_to,$this->temp_to);
    }

    public function mount()
    {
        $data = vendor::where('user_id',Auth::id())->first();
        $this->vendor_id = $data->id;
    }

    public function render()
    {

        if ($this->from != null && $this->to != null) {
            $allOrders = Order::where('vendor_id',$this->vendor_id)->where('status','delivered')->where('updated_at','>=',$this->from)->where('updated_at','<=',$this->to)->with('items','shipping','transaction')->paginate($this->paginate);
        }else{
            $allOrders = new Order();
        }
        return view('livewire.vendor.statement.vendor-statement-component',compact('allOrders'))->layout('admin.adminbase');
    }
}
