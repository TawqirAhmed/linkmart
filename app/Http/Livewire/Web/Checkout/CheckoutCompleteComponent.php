<?php

namespace App\Http\Livewire\Web\Checkout;

use Livewire\Component;

class CheckoutCompleteComponent extends Component
{
    public function render()
    {
        return view('livewire.web.checkout.checkout-complete-component')->layout('web.base.base');
    }
}
