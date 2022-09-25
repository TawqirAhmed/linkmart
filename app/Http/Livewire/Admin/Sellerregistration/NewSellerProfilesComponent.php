<?php

namespace App\Http\Livewire\Admin\Sellerregistration;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\VendorProfile;
use App\Models\vendor;

class NewSellerProfilesComponent extends Component
{
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "desc";

    public $filter;

    public $profile_id, $vendor_id;

    public $commission_percentage, $verified;

    public function getItem($id)
    {
        $profile_info =  VendorProfile::where('user_id',$id)->first();

        $this->profile_id = $profile_info->id;

        $vendor_info =  vendor::where('user_id',$id)->first();
        $this->vendor_id = $vendor_info->id;

        // dd($vendor_info,$profile_info,$id);

        $this->commission_percentage = $vendor_info->commission_percentage;
        $this->verified = $vendor_info->verified;
    }

    public function Update()
    {
        $profile_info = VendorProfile::where('id',$this->profile_id)->first();

        $profile_info->seen = 1;

        $profile_info->save();

        $vendor_info = vendor::where('id',$this->vendor_id)->first();

        $vendor_info->commission_percentage = $this->commission_percentage;
        $vendor_info->verified = $this->verified;

        $done = $vendor_info->save();

        $this->emit('storeSomething');

        if ($done) {
            
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Seller Profile Marked As Seen.']);

            
        }

        $this->profile_id = null;
        $this->vendor_id = null;
        $this->commission_percentage = null;
        $this->verified = null;

    }

    public function downloadNID($id)
    {
        // dd($id);

        $data = VendorProfile::find($id);

        $filePath = public_path("uploads/seller_NIDs/".$data->nid);
        $headers = ['Content-Type: application/png/jpg/jpeg'];
        $fileName = $data->nid;

        return response()->download($filePath, $fileName, $headers);
    }


    public function downloadTradeLicense($id)
    {
        // dd($id);

        $data = VendorProfile::find($id);

        $filePath = public_path("uploads/seller_Trade_licenses/".$data->trade_license);
        $headers = ['Content-Type: application/pdf'];
        $fileName = $data->trade_license;

        return response()->download($filePath, $fileName, $headers);
    }

    public function sortBy($field)
    {
        if ($this->sortDirection == "asc") {
            $this->sortDirection = "desc";
        }
        else
        {
            $this->sortDirection = "asc";
        }

        return $this->sortBy = $field;
    }

    public function setFilter($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        if ($this->filter == 'seen') {
            $allVendorsProfile = VendorProfile::with('user')->where('seen',1)->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }elseif($this->filter == 'not_seen'){
            $allVendorsProfile = VendorProfile::with('user')->where('seen',0)->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }else{
            $allVendorsProfile = VendorProfile::with('user')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        }

        // dd($allVendorsProfile);

        return view('livewire.admin.sellerregistration.new-seller-profiles-component',compact('allVendorsProfile'))->layout('admin.adminbase');
    }
}
