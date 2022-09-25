<?php

namespace App\Http\Livewire\Admin\Statement;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Order;
use App\Models\vendor;

use Carbon\Carbon;
use Auth;

class AdminStatementComponent extends Component
{
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;

    public $vendor_id, $temp_vendor_id;
    
    public $from, $to, $temp_from, $temp_to;

    public function setValue()
    {
        $this->vendor_id = $this->temp_vendor_id;

        $this->from = $this->temp_from;

        $date_to = ((Carbon::parse($this->temp_to))->addDays(1))->format('Y-m-d');

        $this->to = $date_to;

    }

    public function render()
    {

        if ($this->from != null && $this->to != null) {
            $allOrders = Order::where('vendor_id',$this->vendor_id)->where('status','delivered')->where('updated_at','>=',$this->from)->where('updated_at','<=',$this->to)->with('items','shipping','transaction')->paginate($this->paginate);
        }else{
            $allOrders = new Order();
        }

        $all_vendors = vendor::all();

        return view('livewire.admin.statement.admin-statement-component',compact('allOrders','all_vendors'))->layout('admin.adminbase');
    }
}
