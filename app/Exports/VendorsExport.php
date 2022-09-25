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

use App\Models\User;

class VendorsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //vendors Export

        $temp = collect();

        $users_info = User::where('user_type','vendor')->with('vendor')->get();
        // dd($users_info);

        // foreach ($users_info as $key => $value) {
        //     $data = collect();

        //     $data['owner_name'] = $value->name ?? null;
        //     $data['owner_email'] = $value->email ?? null;
        //     $data['vendor_shop_id'] = $value->vendor->id ?? null;
        //     $data['shop_name'] = $value->vendor->name ?? null;
        //     $data['shop_email'] = $value->vendor->email ?? null;
        //     $data['shop_phone'] = $value->vendor->phone ?? null;
        //     $data['shop_address'] = $value->vendor->address ?? null;
        //     $data['shop_payment_info'] = $value->vendor->payment_info ?? null;

        //     $temp->push($data);
        // }
        foreach ($users_info as $key => $value) {
            $data = collect();

            $data['owner_name'] = $value->name ?? null;
            $data['owner_email'] = $value->email ?? null;

            foreach ($value->vendor as $key2 => $value2) {

                if ($key2 > 0) {
                    $data['owner_name'] = '';
                    $data['owner_email'] = '';
                }

                $data['vendor_shop_id'] = $value2->id ?? null;
                $data['shop_name'] = $value2->name ?? null;
                $data['shop_email'] = $value2->email ?? null;
                $data['shop_phone'] = $value2->phone ?? null;
                $data['shop_address'] = $value2->address ?? null;
                $data['shop_payment_info'] = $value2->payment_info ?? null;

                $temp->push($data); 
                $data = collect();  
            }

            
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
            'owner_name',
            'owner_email',
            'vendor_shop_id',
            'shop_name',
            'shop_email',
            'shop_phone',
            'shop_address',
            'shop_payment_info'
        ];
    }
}
