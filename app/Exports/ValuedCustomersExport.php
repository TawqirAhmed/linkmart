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

class ValuedCustomersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(String $from = null , String $to = null)
    {
     $this->from = $from;
     $this->to   = $to;
    }

    public function collection()
    {
        //Valued Customers Export

        $temp = collect();

        $order_info = Order::select('user_id',DB::raw('sum(total) as price'))->groupBy('user_id')->with('user')
            ->where('created_at','>=',$this->from)->where('created_at','<=', $this->to)
            ->get();
        // dd($order_info);

        foreach ($order_info as $key => $value) {
            $data = collect();

            $data['total_amount'] = $value->price;
            $data['customer_id'] = $value->user_id ?? null;
            $data['customer_name'] = $value->user->name ?? null;
            $data['customer_email'] = $value->user->email ?? null;
            $data['mobile'] = $value->user->profile->mobile ?? null;
            $data['address_line1'] = $value->user->profile->address_line1 ?? null;
            $data['address_line2'] = $value->user->profile->address_line2 ?? null;
            $data['post_code'] = $value->user->profile->post_code ?? null;
            $data['city'] = $value->user->profile->city ?? null;

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
            'Total_amount (TK)',
            'customer_id',
            'customer_name',
            'customer_email',
            'mobile',
            'address_line1',
            'address_line2',
            'post_code',
            'city'
        ];
    }
}
