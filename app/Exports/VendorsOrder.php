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
use DB;

class VendorsOrder implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{

    public $vendor_id;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(String $from = null , String $to = null, $vendor_id)
    {
     $this->from = $from;
     $this->to   = $to;

     $this->vendor_id   = $vendor_id;
    }
    public function collection()
    {
        $data = Order::where('vendor_id',$this->vendor_id)->where('status','delivered')
            ->select('order_number','subtotal','discount','total','status','created_at','updated_at')
            ->where('created_at','>=',$this->from)->where('created_at','<=', $this->to)
            ->get();

        return $data;
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
            'Order No.',
            'Subtotal',
            'Discount',
            'Total(With Delivery Charge)',
            'Status',
            'Order Placed',
            'Last Uodated'
        ];
    }

}
