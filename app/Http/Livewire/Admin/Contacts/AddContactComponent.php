<?php

namespace App\Http\Livewire\Admin\Contacts;

use Livewire\Component;

use App\Models\Contact;

class AddContactComponent extends Component
{

    public $title, $description;

    public function Store()
    {

        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = new Contact();

        
        $data->title = $this->title;
        $data->description = $this->description;

        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Contact Added Successfuly']);
        }

        $this->title = null;
        $this->description = null;

        $this->emit('reset_summernote');

    }

    public function render()
    {
        return view('livewire.admin.contacts.add-contact-component')->layout('admin.adminbase');
    }
}
