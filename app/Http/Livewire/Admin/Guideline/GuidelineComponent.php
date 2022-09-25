<?php

namespace App\Http\Livewire\Admin\Guideline;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Guideline;

class GuidelineComponent extends Component
{
    
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";

    public function render()
    {
        $allGuideline = Guideline::orderBy('created_at','desc')->search(trim($this->search))->paginate($this->paginate);

        return view('livewire.admin.guideline.guideline-component',compact('allGuideline'))->layout('admin.adminbase');
    }
}
