<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;

use Redirect;

class HomeSearchbarComponent extends Component
{

    public $search_for;


    public function searchFor()
    {
        return Redirect::to('/searched_products/'. $this->search_for);
    }

    public function render()
    {
        return view('livewire.web.home-searchbar-component');
    }
}
