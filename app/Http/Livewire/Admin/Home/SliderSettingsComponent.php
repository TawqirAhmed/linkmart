<?php

namespace App\Http\Livewire\Admin\Home;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Homeslider;
use Illuminate\Support\Str;
use Carbon\Carbon;
class SliderSettingsComponent extends Component
{
    use WithFileUploads;

    public $line_one, $line_two, $line_three, $image, $tags;

    public $edit_id, $e_line_one, $e_line_two, $e_line_three, $e_image, $e_tags, $new_image;

    public $delete_id;

    public function Store()
    {
        $data = new Homeslider();

        $data->line_one = $this->line_one;
        $data->line_two = $this->line_two;
        $data->line_three = $this->line_three;
        $data->tags = $this->tags;


        if($this->image){
            $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAs('homesliders',$imageName);
            $data->image = $imageName;
        }

        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Home Slider Added.']);
        }
        
        $this->emit('storeSomething');

        $this->line_one = null;
        $this->line_two = null;
        $this->line_three = null;
        $this->image = null;
        $this->tags = null;

    }

    public function getItem($id)
    {
        $this->edit_id = $id;

        $data = Homeslider::find($this->edit_id);

        $this->e_line_one = $data->line_one;
        $this->e_line_two = $data->line_two;
        $this->e_line_three = $data->line_three;
        $this->e_tags = $data->tags;
        $this->e_image = $data->image;
    }

    public function Update()
    {
        $data = Homeslider::find($this->edit_id);

        $data->line_one = $this->e_line_one;
        $data->line_two = $this->e_line_two;
        $data->line_three = $this->e_line_three;
        $data->tags = $this->e_tags;


        if($this->new_image){
            $imageName = Carbon::now()->timestamp.'.'.$this->new_image->extension();
            $this->new_image->storeAs('homesliders',$imageName);
            $data->image = $imageName;
        }

        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Home Slider Updated.']);
        }
        
        $this->emit('storeSomething');

        $this->e_line_one = null;
        $this->e_line_two = null;
        $this->e_line_three = null;
        $this->e_image = null;
        $this->new_image = null;
        $this->e_tags = null;
    }


    public function deleteID($id)
    {
        $this->delete_id = $id;
    }

    public function Delete()
    {
       $done = Homeslider::find($this->delete_id)->delete();

       

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'error',  'message' => 'Home Slider Deleted.']);
        }
        
        $this->emit('storeSomething');

        $this->delete_id = null;
    }

    public function render()
    {
        $allSliders = Homeslider::all();

        return view('livewire.admin.home.slider-settings-component',compact('allSliders'))->layout('admin.adminbase');
    }
}
