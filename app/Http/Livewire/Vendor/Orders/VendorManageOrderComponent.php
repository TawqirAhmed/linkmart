<?php

namespace App\Http\Livewire\Vendor\Orders;

use Livewire\Component;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use App\Models\vendor;
use Auth;

class VendorManageOrderComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $Order = Order::find($order_id);
        $vendor = vendor::find($Order->vendor_id);
        $user_id = Auth::id();

        if ($user_id == $vendor->user_id) {
            $this->order_id = $order_id;
        } else {
            return redirect()->route('vendor.orders');
        }
        
    }

    public function render()
    {
        $Order = Order::where('id',$this->order_id)->with('user','shipping','transaction','items')->first();

        return view('livewire.vendor.orders.vendor-manage-order-component',compact('Order'))->layout('admin.adminbase');
    }
}
