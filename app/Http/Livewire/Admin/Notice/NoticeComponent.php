<?php

namespace App\Http\Livewire\Admin\Notice;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Notice;

class NoticeComponent extends Component
{
    
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";

    public function render()
    {

        $allNotice = Notice::with('user')->orderBy('created_at','desc')->search(trim($this->search))->paginate($this->paginate);

        return view('livewire.admin.notice.notice-component',compact('allNotice'))->layout('admin.adminbase');
    }
}
