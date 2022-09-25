<?php

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use App\Models\variation;

class ManageOrderComponent extends Component
{
    public $order_id, $transaction_id;

    public $order_status, $transaction_status;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    // for order Status-----------------------------------------------------------------
    public function getItem()
    {
        $Order = Order::where('id',$this->order_id)->with('user','shipping','transaction','items')->first();
        $this->order_status = $Order->status;
    }

    public function Update()
    {
        $data = Order::find($this->order_id);

        $data->status = $this->order_status;


        if ($this->order_status === 'confirmed') {
            
            self::deductVariationQty();
        }


        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Order Status Updated']);
        }

        $this->emit('storeSomething');
    }

    public function deductVariationQty()
    {
        $order_items = OrderItem::where('order_id',$this->order_id)->get();

        foreach ($order_items as $key => $value) {
            
            $variation = variation::where('id',$value->product_variation_id)->first();

            $variation->quantity = $variation->quantity - $value->quantity;

            $variation->save();
        }

    }

    // for order Status-----------------------------------------------------------------

    // for Transaction Status-----------------------------------------------------------
    public function getTransaction($t_id)
    {
        $this->transaction_id = $t_id;

        $transaction = Transaction::find($t_id);
        $this->transaction_status = $transaction->status;
    }

    public function updateTransaction()
    {
        $data = Transaction::find($this->order_id);

        $data->status = $this->transaction_status;

        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Transaction Status Updated']);
        }

        $this->emit('storeSomething');
    }
    // for Transaction Status-----------------------------------------------------------



    public function render()
    {
        $Order = Order::where('id',$this->order_id)->with('user','shipping','transaction','items')->first();

        // dd($Order);

        return view('livewire.admin.orders.manage-order-component',compact('Order'))->layout('admin.adminbase');
    }
}
