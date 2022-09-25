<?php

namespace App\Http\Livewire\Admin\Notice;

use Livewire\Component;

use App\Models\Notice;
use Auth;

class EditNoticeComponent extends Component
{


    public $edit_id, $title, $description;

    

    public function Store()
    {

        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = Notice::find($this->edit_id);

        // $data->user_id = Auth::id();
        $data->title = $this->title;
        $data->description = $this->description;

        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Notice Updated Successfuly']);
        }

        // $this->title = null;
        // $this->description = null;

        // $this->emit('reset_summernote');

    }


    public function mount($id)
    {
        $this->edit_id = $id;

        $data = Notice::find($id);
        
        $this->title = $data->title;
        $this->description = $data->description;

    }

    public function render()
    {
        return view('livewire.admin.notice.edit-notice-component')->layout('admin.adminbase');
    }
}
