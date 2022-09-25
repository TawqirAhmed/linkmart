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

class CustomersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //customers Export

        $temp = collect();

        $users_info = User::where('user_type','user')->with('profile')->get();
        // dd($users_info);

        foreach ($users_info as $key => $value) {
            $data = collect();

            $data['name'] = $value->name;
            $data['email'] = $value->email;
            $data['mobile'] = $value->profile->mobile ?? null;
            $data['address_line1'] = $value->profile->address_line1 ?? null;
            $data['address_line2'] = $value->profile->address_line2 ?? null;
            $data['post_code'] = $value->profile->post_code ?? null;
            $data['city'] = $value->profile->city ?? null;

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
            'name',
            'email',
            'mobile',
            'address_line1',
            'address_line2',
            'post_code',
            'city'
        ];
    }
}
