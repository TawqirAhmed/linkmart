<?php

namespace App\Http\Livewire\Web\Usercomplain;

use Livewire\Component;

use App\Models\User;
use App\Models\Complain;


class UserComplainComponent extends Component
{
    public $name, $email, $phone, $description;


    public function Store()
    {
        $data = new Complain();

        $data->name = $this->name;
        $data->email = $this->email;
        $data->phone = $this->phone;
        $data->description = $this->description;

        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Complain Submited.We Will Solve Your Problem as Soon as Posible']);
        }

        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->description = null;
    }

    public function render()
    {
        return view('livewire.web.usercomplain.user-complain-component')->layout('web.base.base');
    }
}
