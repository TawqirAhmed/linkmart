<?php

namespace App\Http\Livewire\Vendor\Contacts;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Contact;

class VendorContactComponent extends Component
{
    
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";

    public $title, $description;

    public function getItem($id)
    {
        $data = Contact::find($id);
        $this->title = $data->title;
        $this->description = $data->description;        
    }


    public function render()
    {
        $allContact = Contact::orderBy('created_at','desc')->search(trim($this->search))->paginate($this->paginate);

        return view('livewire.vendor.contacts.vendor-contact-component',compact('allContact'))->layout('admin.adminbase');
    }
}
