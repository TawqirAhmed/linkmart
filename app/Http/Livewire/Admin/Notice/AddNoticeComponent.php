<?php

namespace App\Http\Livewire\Admin\Notice;

use Livewire\Component;

use App\Models\Notice;
use Auth;
class AddNoticeComponent extends Component
{


    public $title, $description;

    

    public function Store()
    {

        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = new Notice();

        $data->user_id = Auth::id();
        $data->title = $this->title;
        $data->description = $this->description;

        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Notice Posted Successfuly']);
        }

        $this->title = null;
        $this->description = null;

        $this->emit('reset_summernote');

    }


    public function render()
    {
        return view('livewire.admin.notice.add-notice-component')->layout('admin.adminbase');
    }
}
