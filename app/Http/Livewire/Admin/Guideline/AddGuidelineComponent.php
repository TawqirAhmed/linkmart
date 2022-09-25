<?php

namespace App\Http\Livewire\Admin\Guideline;

use Livewire\Component;

use App\Models\Guideline;

class AddGuidelineComponent extends Component
{

    public $title, $description;

    public function Store()
    {

        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = new Guideline();

        
        $data->title = $this->title;
        $data->description = $this->description;

        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Guideline Added Successfuly']);
        }

        $this->title = null;
        $this->description = null;

        $this->emit('reset_summernote');

    }
    public function render()
    {
        return view('livewire.admin.guideline.add-guideline-component')->layout('admin.adminbase');
    }
}
