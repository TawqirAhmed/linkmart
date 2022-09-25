<?php

namespace App\Http\Livewire\Web\Cart;

use Livewire\Component;
use Session;
use Cart;

class CartCountComponent extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];

    public $cart_count_all = 0;

    public function render()
    {
        if (!(Session::has('cart_instance'))) {
        
        $temp = array();
        Session()->put('cart_instance',[
                    'vendors'=> json_encode($temp)
                ]);
        }   

        $cart_instance = json_decode(session()->get('cart_instance')['vendors']);

        $count = 0;

        foreach ($cart_instance as $key_ins => $instance) {
            $count = $count + Cart::instance($instance)->count();
        }

        $this->cart_count_all = $count;

        return view('livewire.web.cart.cart-count-component');
    }
}
