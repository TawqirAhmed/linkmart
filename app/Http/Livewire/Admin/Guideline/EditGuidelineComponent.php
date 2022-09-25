<?php

namespace App\Http\Livewire\Admin\Guideline;

use Livewire\Component;

use App\Models\Guideline;

class EditGuidelineComponent extends Component
{


    public $edit_id, $title, $description;

    public function Store()
    {

        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = Guideline::find($this->edit_id);

        
        $data->title = $this->title;
        $data->description = $this->description;

        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Guideline Updated Successfuly']);
        }

        

    }


    public function mount($id)
    {
        $this->edit_id = $id;

        $data = Guideline::find($id);
        
        $this->title = $data->title;
        $this->description = $data->description;

    }

    public function render()
    {
        return view('livewire.admin.guideline.edit-guideline-component')->layout('admin.adminbase');
    }
}
