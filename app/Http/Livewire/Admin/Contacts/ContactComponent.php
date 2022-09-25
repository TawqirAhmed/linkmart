<?php

namespace App\Http\Livewire\Admin\Contacts;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Contact;

class ContactComponent extends Component
{
    
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";

    public function render()
    {
        $allContact = Contact::orderBy('created_at','desc')->search(trim($this->search))->paginate($this->paginate);

        return view('livewire.admin.contacts.contact-component',compact('allContact'))->layout('admin.adminbase');
    }
}
