<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use App\Models\category;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CategoryComponent extends Component
{
    
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;

    public $name, $meta_title, $parent_id, $image;

    public $edit_id, $e_name, $e_meta_title, $e_parent_id ,$e_image;
    public $new_image;
    public $delete_id;

    public function storeCategory()
    {
        $data = new category();

        $data->name = $this->name;
        $data->meta_title = $this->meta_title;
        $data->parent_id = $this->parent_id;

        if ($this->image) {
            $imageName = $this->name."_".Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAs('categories/'.$this->name,$imageName);
            $data->image = $imageName;
        }

        $data->save();
        session()->flash('message','Category Created Successfully.');
        $this->emit('storeSomething');

        

        $this->name = null;
        $this->meta_title = null;
        $this->parent_id = null;
        $this->image = null;
    }


    public function getCategory($id)
    {
        $this->edit_id = $id;

        $data = category::find($id);

        $this->e_name = $data->name;
        $this->e_meta_title = $data->meta_title;
        $this->e_parent_id = $data->parent_id;
        $this->e_image = $data->image;
    }

    public function updateCategory()
    {
        $data = category::find($this->edit_id);

        $data->name = $this->e_name;
        $data->meta_title = $this->e_meta_title;
        $data->parent_id = $this->e_parent_id;

        if ($this->new_image) {
            $imageName = $this->e_name."_".Carbon::now()->timestamp.'.'.$this->new_image->extension();
            $this->new_image->storeAs('categories/'.$this->e_name,$imageName);
            $data->image = $imageName;
        }

        $data->save();
        session()->flash('message','Category Updated Successfully.');
        $this->emit('storeSomething');

        $this->edit_id = null;
        $this->e_name = null;
        $this->e_meta_title = null;
        $this->e_parent_id = null;
        $this->e_image = null;
        $this->new_image = null;
    }


    public function deleteID($id)
    {
        $this->delete_id = $id;
    }

    public function delete()
    {
        category::find($this->delete_id)->delete();

        session()->flash('message','Category Deleted Successfully.');
        $this->emit('storeSomething');

        $this->delete_id = null;
    }

    public function render()
    {
        $allCategories= category::with('parents')->paginate($this->paginate);

        // dd($allCategories);

        return view('livewire.admin.category.category-component',compact('allCategories'))->layout('admin.adminbase');
    }
}
