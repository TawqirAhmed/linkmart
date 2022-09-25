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

class SoldProducts implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    // varible form and to 
    public function __construct(String $from = null , String $to = null)
    {
     $this->from = $from;
     $this->to   = $to;
    }

    public function collection()
    {

        $temp=collect();

        $orders = Order::where('status','delivered')->select('products')
                    ->where('created_at','>=',$this->from)->where('created_at','<=', $this->to)
                    ->get();

        foreach ($orders as $order_key => $order_value) {
            // code...
        

            $products = json_decode($order_value->products);

            
            foreach ($products as $key => $value) {
                
                $variation = variation::where('id',$value->id)->with('product','color','size')->first();

                
                $data = collect();

                $data['product_id'] = $variation->product->id;
                $data['product_name'] = $variation->product->name;
                $data['variation_id'] = $value->id;
                $data['variation_color'] = $variation->color->name ?? 'null';
                $data['variation_size'] = $variation->size->name ?? 'null';
                $data['Quantity'] = $value->qty;

                
                $temp->push($data);
            }

        }


        $temp_sorted = $temp->sortBy('product_id');
        return $temp_sorted;
        
        
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
             'Product ID',
             'Product Name',
             'Variation ID',
             'Variation Color',
             'Variation Size',
             'Quantity',
        ];
    }


}
