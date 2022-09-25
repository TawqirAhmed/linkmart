<?php

namespace App\Http\Livewire\Admin\Notice;

use Livewire\Component;

use App\Models\Notice;

class NoticeDetailsComponent extends Component
{

    public $notice_id;

    public function mount($id)
    {
        $this->notice_id = $id;
    }

    public function render()
    {

        $notice = Notice::where('id',$this->notice_id)->with('user')->first();

        return view('livewire.admin.notice.notice-details-component',compact('notice'))->layout('admin.adminbase');
    }
}
