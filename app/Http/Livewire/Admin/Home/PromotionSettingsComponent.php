<?php

namespace App\Http\Livewire\Admin\Home;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\PromotionSetting;
use App\Models\vendor;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PromotionSettingsComponent extends Component
{
    use WithFileUploads;

    public $note, $vendor_id, $image, $published;
    public $add_id; 

    public function getItem($id)
    {
        $this->add_id = $id;

        $data = PromotionSetting::find($this->add_id);

        $this->note = $data->note;
        $this->description = $data->description;
        $this->vendor_id = $data->vendor_id;
        $this->published = $data->published;


    }


    public function updateItem()
    {
        

        $data = PromotionSetting::find($this->add_id);

        $data->note = $this->note;
        $data->vendor_id = $this->vendor_id;
        $data->published = $this->published;


        $data->save();

        $this->emit('storeSomething');

        $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Promotion Updated']);
    }

    public function render()
    {
        $allPromotion = PromotionSetting::with('vendors')->get();
        $allVendor = vendor::all();

        return view('livewire.admin.home.promotion-settings-component',compact('allPromotion','allVendor'))->layout('admin.adminbase');
    }
}
