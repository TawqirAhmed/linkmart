<?php

namespace App\Http\Livewire\Admin\Home;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\AdvertiseBanner;
use App\Models\category;
use Illuminate\Support\Str;
use Carbon\Carbon;
class AdvertiseBannersComponent extends Component
{
    use WithFileUploads;

    public $title, $description, $category_id, $image, $percent, $published;
    public $add_id; 


    // public function store()
    // {
    //     $data = new AdvertiseBanners();

    //     $data->title = $this->title;
    //     $data->description = $this->description;
    //     $data->category_id = $this->category_id;
    //     // $data->image = $this->image;
    //     $data->percent = $this->percent;
    //     $data->published = $this->published;




    //     if($this->image){
    //         $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
    //         $this->image->storeAs('addBanners',$imageName);
    //         $product_data->image = $imageName;
    //     }

    //     $data->save();

    // }

    public function getItem($id)
    {
        $this->add_id = $id;

        $data = AdvertiseBanner::find($this->add_id);

        $this->title = $data->title;
        $this->description = $data->description;
        $this->category_id = $data->category_id;
        // $data->image = $this->image;
        $this->percent = $data->percent;
        $this->published = $data->published;


    }


    public function updateItem()
    {
        

        $data = AdvertiseBanner::find($this->add_id);

        $data->title = $this->title;
        $data->description = $this->description;
        $data->category_id = $this->category_id;
        // $data->image = $this->image;
        $data->percent = $this->percent;
        $data->published = $this->published;


        $data->save();

        $this->emit('storeSomething');

        $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Advertise Updated']);
    }


    public function render()
    {

        $allAdd = AdvertiseBanner::with('category')->get();
        $allCategories = category::all();

        return view('livewire.admin.home.advertise-banners-component',compact('allAdd', 'allCategories'))->layout('admin.adminbase');
    }
}
