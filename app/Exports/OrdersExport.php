<?php

namespace App\Exports;

use App\Models\Order;

use App\Models\variation;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrdersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $temp=collect();

        $orders = Order::with('user','shipping','transaction')->get();
        // dd($orders);
        foreach ($orders as $order_key => $order_value) {
            // code...
        

            $products = json_decode($order_value->products);

            $data = collect();

            $data['order_date'] = $order_value->created_at ?? 'null';

            $data['order_number'] = $order_value->order_number;
            $data['billing_address'] = "Name: ".$order_value->name. ", Mobile: ".$order_value->mobile.", Email: ".$order_value->email.", Address_1: ".$order_value->address_line1.", Address_2: ".$order_value->address_line2.", Post Code: ".$order_value->post_code.", City:".$order_value->city;

            if ($order_value->is_shipping_different == 1) {
                $data['shipping_address'] = "same as Billing address";
            }else{

                $data['shipping_address'] = "Name: ".$order_value->shipping->name. ", Mobile: ".$order_value->shipping->mobile.", Email: ".$order_value->shipping->email.", Address_1: ".$order_value->shipping->address_line1.", Address_2: ".$order_value->shipping->address_line2.", Post Code: ".$order_value->shipping->post_code.", City:".$order_value->shipping->city;
            }

            $data['user'] = $order_value->user->name;

            $data['transaction_mod'] = $order_value->transaction->mod;
            $data['transaction_status'] = $order_value->transaction->status;

            foreach ($products as $key => $value) {
                
                $variation = variation::where('id',$value->id)->with('product','color','size')->first();

                
                

                $data['product_id'] = $variation->product->id;
                $data['product_name'] = $variation->product->name;
                $data['variation_id'] = $value->id;
                $data['variation_color'] = $variation->color->name ?? 'null';
                $data['variation_size'] = $variation->size->name ?? 'null';
                $data['Quantity'] = $value->qty;

                
                $temp->push($data);

                $data = collect();
                $data['order_date'] = ",,";
                $data['order_number'] = ",,";
                $data['billing_address'] = ",,";
                $data['shipping_address'] = ",,";
                $data['user'] = ",,";
                $data['transaction_mod'] = ",,";
                $data['transaction_status'] = ",,";
            }

                $data = collect();
                $data['order_date'] = "";
                $data['order_number'] = "";
                $data['billing_address'] = "";
                $data['shipping_address'] = "";
                $data['user'] = "";
                $data['transaction_mod'] = "";
                $data['transaction_status'] = "";
                $data['product_id'] = "";
                $data['product_name'] = "";
                $data['variation_id'] = "";
                $data['variation_color'] = "";
                $data['variation_size'] = "";
                $data['Quantity'] = "";

                $temp->push($data);
        }


       
        // dd($temp);
        // return Order::all();
        return $temp;
    }


    /**
    * @return array
    */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
    
    //function header in excel
     public function headings(): array
     {
         return [
            'order_date',
            'order_number',
            'billing_address',
            'shipping_address',
            'user',
            'transaction_mod',
            'transaction_status',
            'product_id',
            'product_name',
            'variation_id',
            'variation_color',
            'variation_size',
            'Quantity',
        ];
    }



}
