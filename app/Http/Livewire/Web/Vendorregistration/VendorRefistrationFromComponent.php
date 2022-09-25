<?php

namespace App\Http\Livewire\Web\Vendorregistration;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\SellerRequest;

use App\Models\User;
use App\Models\VendorProfile;
use App\Models\vendor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Illuminate\Auth\Events\Registered;


class VendorRefistrationFromComponent extends Component
{

    use WithFileUploads;

    public $shop_name, $shop_address, $owner_name, $owner_email, $owner_phone, $product_type, $password, $password_confirmation;

    public $seller_type, $nid, $trade_license, $payment_info;


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            
            'shop_name' => 'required|unique:vendors,name',
            'shop_address' => 'required',
            'owner_name' => 'required',
            'owner_email' => 'required|email|unique:vendors,email',
            'owner_phone' => 'required',
            'product_type' => 'required',
            'password' => 'required|min:8|max:15',
            'password_confirmation' => 'required|same:password|min:8|max:15',
            'seller_type' => 'required',
            'payment_info' => 'required',
        ]);

        if ($this->nid) {
            $this->validateOnly($propertyName, [
            
                'nid' =>'file|mimes:png,jpg,jpeg|max:500',
            ]);
        }

        if ($this->trade_license) {
            $this->validateOnly($propertyName, [
            
                'trade_license' =>'file|mimes:pdf|max:1000',
            ]);
        }

    }

    public function Store()
    {

        $validatedData = $this->validate([
            'shop_name' => 'required|unique:vendors,name',
            'shop_address' => 'required',
            'owner_name' => 'required',
            'owner_email' => 'required|email|unique:vendors,email',
            'owner_phone' => 'required',
            'product_type' => 'required',
            'password' => 'required|min:8|max:15',
            'password_confirmation' => 'required|same:password|min:8|max:15',
            'seller_type' => 'required',
            'payment_info' => 'required',
        ]);
        

        if ($this->nid) {
            $validatedData = $this->validate([
                'nid' =>'file|mimes:png,jpg,jpeg|max:500',
            ]);
        }

        if ($this->trade_license) {
            $validatedData = $this->validate([
                'trade_license' =>'file|mimes:pdf|max:1000',
            ]);
        }


        // $data = new SellerRequest();

        // $data->shop_name = $this->shop_name;
        // $data->shop_address = $this->shop_address;
        // $data->owner_name = $this->owner_name;
        // $data->owner_email = $this->owner_email;
        // $data->owner_phone = $this->owner_phone;
        // $data->product_type = $this->product_type;

        // $done = $data->save();


        //for user table -------------------------------------------------
        $data = new User();

        $data->name = $this->owner_name;
        $data->email = $this->owner_email;
        $data->password = Hash::make($this->password);
        $data->user_type = 'vendor';
        $data->mobile = $this->owner_phone;

        $user_done = $data->save();


        if ($user_done) {
            // $data->sendEmailVerificationNotification();
            event(new Registered($data));
        }

        //for user table -------------------------------------------------

        if ($user_done) {
            
            //for vendor_profiles table -------------------------------------------------
            $profile_data = new VendorProfile();

            $profile_data->user_id = $data->id;
            $profile_data->shop_name = $this->shop_name;
            $profile_data->shop_address = $this->shop_address;
            $profile_data->owner_name = $this->owner_name;
            $profile_data->owner_email = $this->owner_email;
            $profile_data->owner_phone = $this->owner_phone;
            $profile_data->product_type = $this->product_type;
            $profile_data->payment_info = $this->payment_info;
            $profile_data->seller_type = $this->seller_type;
            // $profile_data->nid = $this->;

            if ($this->nid) {
                $fileName = $this->shop_name.'_NID_'.$this->owner_name.'_'.$this->nid->extension();
                $this->nid->storeAs('seller_NIDs',$fileName);
                $profile_data->nid = $fileName;
            }

            // $profile_data->trade_license = 

            if ($this->trade_license) {
                $fileName = $this->shop_name.'_Trade_License_'.$this->owner_name.'_'.$this->trade_license->extension();
                $this->trade_license->storeAs('seller_Trade_licenses',$fileName);
                $profile_data->trade_license = $fileName;
            }

            $profile_done = $profile_data->save();

            //for vendor_profiles table -------------------------------------------------

            //for vendors table -------------------------------------------------

            if ($profile_done) {
                
                $vendor_data = new vendor();

                $vendor_data->user_id = $data->id;
                $vendor_data->name = $this->shop_name;
                $vendor_data->email = $this->owner_email;
                $vendor_data->phone = $this->owner_phone;
                $vendor_data->payment_info = $this->payment_info;
                $vendor_data->address = $this->shop_address;

                $done = $vendor_data->save();

                if ($done) {
                    $this->dispatchBrowserEvent('alert', 
                            ['type' => 'success',  'message' => 'Your Seller Profile Created']);
                }
            }

            //for vendors table -------------------------------------------------

        }


        

        $this->shop_name = null;
        $this->shop_address = null;
        $this->owner_name = null;
        $this->owner_email = null;
        $this->owner_phone = null;
        $this->product_type = null;
        $this->password = null;
        $this->password_confirmation = null;
        $this->seller_type = null;
        $this->nid = null;
        $this->trade_license = null;
        $this->payment_info = null;
    }

    public function render()
    {
        return view('livewire.web.vendorregistration.vendor-refistration-from-component')->layout('web.base.base');
    }
}
