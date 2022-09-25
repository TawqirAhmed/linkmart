<?php

namespace App\Http\Livewire\Admin\Vendor;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use App\Models\vendor;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Illuminate\Validation\Rule;

class VendorComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;

    public $name, $email, $phone, $address, $payment_info, $image, $user_id, $commission_percentage, $verified, $meta_tags;

    public $edit_id, $e_name, $e_email, $e_phone, $e_address, $e_payment_info, $e_image, $new_image, $e_user_id, $e_commission_percentage, $e_verified, $e_meta_tags;

    public $delete_id;


    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName, [
    //         'user_id' => 'required|unique:vendors',
    //     ],
    //     [
    //         'user_id.required' => 'This Owner Alrady Assigned to a Brand.',
    //     ]
    //     );

    // }


    public function storeVendor()
    {

        // $validatedData = $this->validate([
        //     'user_id' => 'required|unique:vendors',
        // ],
        // [
        //     'user_id.required' => 'This Owner Alrady Assigned to a Brand.',
        // ]
        // );


        $data = new vendor();

        $data->name = $this->name;
        $data->email = $this->email;
        $data->phone = $this->phone;
        $data->address = $this->address;
        $data->payment_info = $this->payment_info;
        $data->user_id = $this->user_id;
        $data->commission_percentage = $this->commission_percentage;
        $data->verified = $this->verified;
        $data->meta_tags = $this->meta_tags;

        if($this->image){
            $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAs('vendors',$imageName);
            $data->image = $imageName;
        }

        $data->save();
        session()->flash('message','Brand Created Successfully.');
        $this->emit('storeSomething');


        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->address = null;
        $this->payment_info = null;
        $this->image = null;
        $this->user_id = null;
        $this->verified = null;
        $this->meta_tags = null;
    }

    public function getVendor($id)
    {
        $this->edit_id = $id;

        $data = vendor::find($id);

        $this->e_name = $data->name;
        $this->e_email = $data->email;
        $this->e_phone = $data->phone;
        $this->e_address = $data->address;
        $this->e_payment_info = $data->payment_info;
        $this->e_image = $data->image;
        $this->e_user_id = $data->user_id;
        $this->e_commission_percentage = $data->commission_percentage;
        $this->e_verified = $data->verified;
        $this->e_meta_tags = $data->meta_tags;
    }

    public function updateVendor()
    {

        // $validatedData = $this->validate([
        //     'e_user_id' => ['required', Rule::unique('vendors')->ignore($this->edit_id)],
        // ]);


        $data = vendor::find($this->edit_id);

        $data->name = $this->e_name;
        $data->email = $this->e_email;
        $data->phone = $this->e_phone;
        $data->address = $this->e_address;
        $data->payment_info = $this->e_payment_info;
        $data->user_id = $this->e_user_id;
        $data->commission_percentage = $this->e_commission_percentage;
        $data->verified = $this->e_verified;
        $data->meta_tags = $this->e_meta_tags;

        if($this->new_image){
            $imageName = Carbon::now()->timestamp.'.'.$this->new_image->extension();
            $this->new_image->storeAs('vendors',$imageName);
            $data->image = $imageName;
        }


        $data->save();
        session()->flash('message','Brand Updated Successfully.');
        $this->emit('storeSomething');

        $this->edit_id = null;
        $this->e_name = null;
        $this->e_email = null;
        $this->e_phone = null;
        $this->e_address = null;
        $this->e_payment_info = null;
        $this->e_image = null;
        $this->new_image = null;
        $this->e_user_id = null;
        $this->e_verified = null;
        $this->e_meta_tags = null;
    }

    public function deleteID($id)
    {
        $this->delete_id = $id;
    }

    public function delete()
    {
        vendor::find($this->delete_id)->delete();

        session()->flash('message','Brand Deleted Successfully.');
        $this->emit('storeSomething');

        $this->delete_id = null;
    }


    public function render()
    {
        $allVendors = vendor::with('user')->paginate($this->paginate);

        $allVendorsProfile = User::where('user_type','vendor')->select('id','name')->get();

        // dd($allVendors);

        return view('livewire.admin.vendor.vendor-component',compact('allVendors','allVendorsProfile'))->layout('admin.adminbase');
    }
}
