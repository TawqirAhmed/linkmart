<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class VendorManageComponent extends Component
{
    
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";


    public $name, $email, $password, $mobile;

    public $edit_id, $e_name, $e_email, $e_mobile;


    public function Store()
    {
        $data = new User();

        $data->name = $this->name;
        $data->email = $this->email;
        $data->password = Hash::make($this->password);
        $data->user_type = 'vendor';
        $data->mobile = $this->mobile;
        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Brand Owner Created']);
        }

        $this->emit('storeSomething');

        $this->name = null;
        $this->email = null;
        $this->password = null;
    }

    public function getItem($id)
    {
        $this->edit_id = $id;

        $data = User::find($id);

        $this->e_name = $data->name;
        $this->e_email = $data->email;
        $this->e_mobile = $data->mobile;
    }

    public function Update()
    {
        $data = User::find($this->edit_id);

        $data->name = $this->e_name;
        $data->email = $this->e_email;
        $data->mobile = $this->e_mobile;

        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Brand Owner Updated']);
        }

        $this->emit('storeSomething');

        $this->e_name = null;
        $this->e_email = null;
        $this->edit_id = null;
    }



    public function render()
    {

        $allVendorUser = User::where('user_type','vendor')->with('vendor')->search(trim($this->search))->paginate($this->paginate);

        // dd($allVendorUser);

        return view('livewire.admin.user.vendor-manage-component',compact('allVendorUser'))->layout('admin.adminbase');
    }
}
