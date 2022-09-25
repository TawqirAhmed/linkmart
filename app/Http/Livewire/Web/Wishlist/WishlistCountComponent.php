<?php

namespace App\Http\Livewire\Web\Wishlist;

use Livewire\Component;

class WishlistCountComponent extends Component
{

    protected $listeners = ['refreshComponent'=>'$refresh'];
    
    public function render()
    {
        return view('livewire.web.wishlist.wishlist-count-component');
    }
}
