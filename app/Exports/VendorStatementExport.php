<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Order;

use Carbon\Carbon;

class VendorStatementExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{

    public $from, $to, $vendor_id;
    // varible form and to 
    public function __construct($vendor_id,String $from = null , String $to = null)
    {
     $this->from = $from;
     $this->to   = $to;
     $this->vendor_id = $vendor_id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $temp=collect();

        $allOrders = Order::where('vendor_id',$this->vendor_id)->where('status','delivered')->where('updated_at','>=',$this->from)->where('updated_at','<=',$this->to)->with('items','shipping','transaction')->get();


        foreach($allOrders as $key=>$value){

            $data = collect();
            $data['date'] = $value->updated_at;
            $data['transaction_type'] = $value->transaction->mod;
            $data['transaction_number'] = "";
            $data['order_number'] = $value->order_number;
            $data['details'] = "Subtotal: ".$value->subtotal."\nDiscount: ".$value->discount."\nVAT: ".$value->tax;
            $data['grand_total'] = $value->total;
            $data['Commission_percent'] = $value->commission_percentage;

            $temp->push($data);
                            
        }


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
            'Date',
            'Transaction Type',
            'Transaction Number',
            'Order Number',
            'Details',
            'Grand Total(BDT)',
            'Commission %',
        ];
    }
}
