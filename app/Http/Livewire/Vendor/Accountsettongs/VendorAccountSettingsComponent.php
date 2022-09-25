<?php

namespace App\Http\Livewire\Vendor\Accountsettongs;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\VendorProfile;
use App\Models\vendor;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Auth;

class VendorAccountSettingsComponent extends Component
{
    use WithFileUploads;

    public $user_id;

    public $logo, $new_logo;

    public $nid, $new_nid, $trade_license, $payment_info;

    public function updated($propertyName)
    {

        if ($this->new_logo) {
            $this->validateOnly($propertyName, [
            
                'new_logo' =>'file|mimes:png,jpg,jpeg|max:500|dimensions:max_width=300,max_height=300',
            ]);
        }

        if ($this->new_nid) {
            $this->validateOnly($propertyName, [
            
                'new_nid' =>'file|mimes:png,jpg,jpeg|max:500',
            ]);
        }

        if ($this->trade_license) {
            $this->validateOnly($propertyName, [
            
                'trade_license' =>'file|mimes:pdf|max:1000',
            ]);
        }

    }


    public function updateProfile()
    {
        if ($this->new_nid) {
            $validatedData = $this->validate([
                'new_nid' =>'file|mimes:png,jpg,jpeg|max:500',
            ]);
        }

        if ($this->trade_license) {
            $validatedData = $this->validate([
                'trade_license' =>'file|mimes:pdf|max:1000',
            ]);
        }


        $vendor_info = vendor::where('user_id',Auth::id())->first();

        $vendor_info->payment_info = $this->payment_info;
        $vendor_info->save();

        $profile_info = VendorProfile::where('user_id',Auth::id())->first();

        if ($this->new_nid) {
            $fileName = $profile_info->shop_name.'_NID_'.$profile_info->owner_name.'_.'.$this->new_nid->extension();
            $this->new_nid->storeAs('seller_NIDs',$fileName);
            $profile_info->nid = $fileName;
        }

        if ($this->trade_license) {
            $fileName = $profile_info->shop_name.'_Trade_License_'.$profile_info->owner_name.'_.'.$this->trade_license->extension();
            $this->trade_license->storeAs('seller_Trade_licenses',$fileName);
            $profile_info->trade_license = $fileName;
        }

        $done = $profile_info->save(); 

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Information Updated']);
        }

    }

    public function updateLogo()
    {

        if ($this->new_logo) {
            $validatedData = $this->validate([
                'new_logo' =>'file|mimes:png,jpg,jpeg|max:500|dimensions:max_width=300,max_height=300',
            ]);
        }


        $vendor_info = vendor::where('user_id',Auth::id())->first();

        if($this->new_logo){
            $imageName = Carbon::now()->timestamp.'.'.$this->new_logo->extension();
            $this->new_logo->storeAs('vendors',$imageName);
            $vendor_info->image = $imageName;
        }

        $done = $vendor_info->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Shop Logo Updated']);
        }

        $this->new_logo = null;
    }

    public function mount()
    {
        $this->user_id = Auth::id();

        $vendor_info = vendor::where('user_id',Auth::id())->first();
        $this->logo = $vendor_info->image;

        $profile_info = VendorProfile::where('user_id',Auth::id())->first();
        $this->payment_info = $profile_info->payment_info;
        $this->nid = $profile_info->nid;
    }

    public function render()
    {
        $profile_info = VendorProfile::where('user_id',Auth::id())->first();

        $vendor_info = vendor::where('user_id',Auth::id())->first();

        return view('livewire.vendor.accountsettongs.vendor-account-settings-component',compact('profile_info','vendor_info'))->layout('admin.adminbase');
    }
}
