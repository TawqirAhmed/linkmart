<?php

namespace App\Http\Livewire\Web\Service;

use Livewire\Component;

use App\Models\Service;

class WebServiceDetailsComponent extends Component
{
    public $service_id;
    public function mount($id)
    {
        $this->service_id = $id;
    }


    public function render()
    {
        $Service = Service::where('id',$this->service_id)->with('service_category','advertice_category')->first();

        // dd($Service);


        return view('livewire.web.service.web-service-details-component',compact('Service'))->layout('web.base.base');
    }
}
