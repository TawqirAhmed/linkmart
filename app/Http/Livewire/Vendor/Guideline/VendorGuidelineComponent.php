<?php

namespace App\Http\Livewire\Vendor\Guideline;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Guideline;

class VendorGuidelineComponent extends Component
{
    
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";

    public $title, $description;

    public function getItem($id)
    {
        $data = Guideline::find($id);
        $this->title = $data->title;
        $this->description = $data->description;        
    }


    public function render()
    {
        $allGuideline = Guideline::orderBy('created_at','desc')->search(trim($this->search))->paginate($this->paginate);

        return view('livewire.vendor.guideline.vendor-guideline-component',compact('allGuideline'))->layout('admin.adminbase');
    }
}
