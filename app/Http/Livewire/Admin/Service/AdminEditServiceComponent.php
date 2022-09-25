<?php

namespace App\Http\Livewire\Admin\Service;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\AdverticeCategory;
use Carbon\Carbon;

class AdminEditServiceComponent extends Component
{

    use WithFileUploads;

    public $company_name, $qualification, $experience, $contact_info, $service_category_id, $advertice_category_id, $payment_amount, $advertice_expire_date, $logo, $old_logo, $meta_tags;

    public $service_id;



    public function Update()
    {
        $validatedData = $this->validate([
            'company_name' => 'required',
            'qualification' => 'required',
            'experience' => 'required',
            'contact_info' => 'required',
            'service_category_id' => 'required',
            'advertice_category_id' => 'required',
            'payment_amount' => 'required',
            'advertice_expire_date' => 'required'
        ]);

        if ($this->logo) {
            $validatedData = $this->validate([
                'logo' => 'image|max:500|mimes:jpg,png,jpeg|dimensions:max_width=500,max_height=500',
            ]);
        }

        $data = Service::find($this->service_id);

        $data->company_name = $this->company_name;
        $data->qualification = $this->qualification;
        $data->experience = $this->experience;
        $data->contact_info = $this->contact_info;
        $data->service_category_id = $this->service_category_id;
        $data->advertice_category_id = $this->advertice_category_id;
        $data->payment_amount = $this->payment_amount;
        $data->advertice_expire_date = $this->advertice_expire_date;
        $data->meta_tags = $this->meta_tags;

        if ($this->logo) {
            $imageName = Carbon::now()->timestamp.'.'.$this->logo->extension();
            $this->logo->storeAs('service/',$imageName);
            $data->logo = $imageName;
        }

        $done = $data->save(); 
        
        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Service Updated Successfuly.']);
        }


    }



    public function mount($id)
    {
        $this->service_id = $id;

        $data = Service::find($this->service_id);  
        
        // dd($data);

        $this->company_name = $data->company_name;
        $this->qualification = $data->qualification;
        $this->experience = $data->experience;
        $this->contact_info = $data->contact_info;
        $this->service_category_id = $data->service_category_id;
        $this->advertice_category_id = $data->advertice_category_id;
        $this->payment_amount = $data->payment_amount;
        $this->advertice_expire_date = $data->advertice_expire_date;
        $this->old_logo = $data->logo;
        $this->meta_tags = $data->meta_tags;

        // dd($this->qualification);
    }

    public function render()
    {

        $advertice_categories = AdverticeCategory::all();
        $service_categories = ServiceCategory::all();

        return view('livewire.admin.service.admin-edit-service-component',compact('advertice_categories','service_categories'))->layout('admin.adminbase');
    }
}
