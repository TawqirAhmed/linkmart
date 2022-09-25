<?php

namespace App\Http\Livewire\Admin\Contacts;

use Livewire\Component;

use App\Models\Contact;

class EditContactComponent extends Component
{


    public $edit_id, $title, $description;

    public function Store()
    {

        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = Contact::find($this->edit_id);

        
        $data->title = $this->title;
        $data->description = $this->description;

        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Contact Info Updated Successfuly']);
        }

        

    }


    public function mount($id)
    {
        $this->edit_id = $id;

        $data = Contact::find($id);
        
        $this->title = $data->title;
        $this->description = $data->description;

    }

    public function render()
    {
        return view('livewire.admin.contacts.edit-contact-component')->layout('admin.adminbase');
    }
}
