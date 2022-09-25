<?php

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;

use PDF;

class OrderSlipComponent extends Component
{
    public $order_id;


    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        // $Order = Order::where('id',$this->order_id)->with('user','shipping','transaction','items')->first();

        $data = [
            'title' => 'Welcome to Tutsmake.com',
            'date' => date('m/d/Y')
        ];
           
        $pdf = PDF::loadView('livewire.admin.orders.order-slip-component', $data);
        // return $pdf->download('test.pdf');

        return view('livewire.admin.orders.order-slip-component',compact('data'));
    }
}
