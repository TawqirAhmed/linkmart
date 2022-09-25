<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;

use PDF;

class OrderSlipController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $Order = Order::where('id',$id)->with('vendor','user','shipping','transaction','items')->first();
           
        
        

        $pdf = PDF::loadView('livewire.admin.orders.order_slip', compact('Order'));
     
        return $pdf->stream('tutsmake.pdf',array('Attachment'=>0));
        
        // return view('livewire.admin.orders.order_slip', compact('data'));

        
    }
}
