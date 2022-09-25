<?php

namespace App\Http\Livewire\Web\Checkout;

use Livewire\Component;

class CheckoutPaymentComponent extends Component
{
    public function render()
    {
        return view('livewire.web.checkout.checkout-payment-component')->layout('web.base.base');
    }
}
