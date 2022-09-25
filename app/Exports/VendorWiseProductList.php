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

use App\Models\product;
use App\Models\vendor;
use DB;

class VendorWiseProductList implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public $vendor_id;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($vendor_id)
    {
     $this->vendor_id = $vendor_id;
    }
    public function collection()
    {
        $temp = collect();

        $data = product::where('vendor_id',$this->vendor_id)
            ->with('category')
            ->get();

        $vendor = vendor::find($this->vendor_id);

        foreach ($data as $key => $value) {
            $data = collect();

            $data['id'] = $value->id;
            $data['name'] = $value->name;
            $data['description'] = $value->description ?? null;
            $data['unit'] = $value->unit ?? null;
            $data['tags'] = $value->tags ?? null;
            $data['featured'] = $value->user->featured ?? null;
            $data['category'] = $value->user->category->name ?? null;
            $data['vendor'] = $vendor->name ?? null;
            $data['unit_price'] = $value->unit_price ?? null;
            $data['sale_price'] = $value->sale_price ?? null;
            $data['on_sale'] = $value->on_sale ?? null;
            $data['sale_end'] = $value->sale_end ?? null;
            $data['max_order'] = $value->max_order ?? null;
            $data['base_shipping'] = $value->base_shipping ?? null;
            $data['extra_shipping'] = $value->extra_shipping ?? null;
            $data['order_threshold'] = $value->order_threshold ?? null;
            $data['published'] = $value->published ?? null;
            $data['hot_sale'] = $value->hot_sale ?? null;
            $data['flash_sale'] = $value->flash_sale ?? null;

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
            'S/N',
            'name',
            'description',
            'unit',
            'tags',
            'featured',
            'category',
            'vendor',
            'unit_price',
            'sale_price',
            'on_sale',
            'sale_end',
            'max_order',
            'base_shipping',
            'extra_shipping',
            'order_threshold',
            'published',
            'hot_sale',
            'flash_sale'
        ];
    }



}
