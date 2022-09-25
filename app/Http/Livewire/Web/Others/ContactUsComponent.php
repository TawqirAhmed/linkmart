<?php

namespace App\Http\Livewire\Web\Others;

use Livewire\Component;


use App\Models\Footer;

class ContactUsComponent extends Component
{

    


    public function render()
    {
        $address = Footer::where('id',1)->select('contact_info')->first();
        
        return view('livewire.web.others.contact-us-component',compact('address'))->layout('web.base.base');
    }
}
