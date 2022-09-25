<?php

namespace App\Http\Livewire\Admin\Home;

use Livewire\Component;

use App\Models\SectionsSetting;
class SectionsSettingsComponent extends Component
{


    public function updateSection($id)
    {
        $data = SectionsSetting::find($id);

        if ($data->show == 1) {
          $data->show = 0;
        } else {
          $data->show = 1;
        }  
        
        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Section Updated']);
        }
    }

    public function render()
    {
        $allSections = SectionsSetting::all();
        return view('livewire.admin.home.sections-settings-component',compact('allSections'))->layout('admin.adminbase');
    }
}
