<?php

namespace App\Http\Livewire\Admin\Salemanagement;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\FlashSale;
use Carbon\Carbon;

class FlashSaleComponent extends Component
{

    use WithFileUploads;

    public $sale_end_date, $status, $image, $old_image;


    public function Update()
    {
        $validatedData = $this->validate([
            'sale_end_date' => 'required',
            'status' => 'required',
            
        ]);

        if ($this->image) {
            $validatedData = $this->validate([
                'image' =>'file|mimes:png,jpg,jpeg|max:500',
            ]);
        }

        $data = FlashSale::find(1);

        $data->sale_end_date = $this->sale_end_date;
        $data->status = $this->status;

        if ($this->image) {
            $imageName = 'flash_sale.'.$this->image->extension();
            $this->image->storeAs('background',$imageName);
            $data->image = $imageName;
        }
        
        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Flash Sale Date And Time Status Updated']);
        }

    }



    public function mount()
    {
        $data = FlashSale::find(1);

        if ($data == null) {
            
            $data = new FlashSale();
            $data->sale_end_date = date("Y-m-d\TH:i:s",strtotime('1990-09-29'));
            $data->status = 0;

            $data->save();

        }

        $data = FlashSale::find(1);


        $this->sale_end_date = date("Y-m-d\TH:i:s",strtotime($data->sale_end_date));
        $this->status = $data->status;
        $this->old_image = $data->image;

        // dd($data);
    }

    public function render()
    {
        return view('livewire.admin.salemanagement.flash-sale-component')->layout('admin.adminbase');
    }
}
