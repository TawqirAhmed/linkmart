<?php

namespace App\Http\Livewire\Web\Wishlist;

use Livewire\Component;
use Cart;
class WishlistComponent extends Component
{
    public function increaseItem($item_id,$quantity)
    {
        Cart::instance('wishlist')->update($item_id, ($quantity+1));

        $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Item Increased To Wishlist']);
        $this->emitTo('web.wishlist.wishlist-count-component','refreshComponent');
    }
    public function decreaseItem($item_id,$quantity)
    {
        Cart::instance('wishlist')->update($item_id, ($quantity-1));

        $this->dispatchBrowserEvent('alert', 
                ['type' => 'warning',  'message' => 'Item Decreased To Wishlist']);
        $this->emitTo('web.wishlist.wishlist-count-component','refreshComponent');
    }
    public function removeItem($item_id)
    {
        Cart::instance('wishlist')->remove($item_id);

        $this->dispatchBrowserEvent('alert', 
                ['type' => 'warning',  'message' => 'Item Removed From Wishlist']);
        $this->emitTo('web.wishlist.wishlist-count-component','refreshComponent');
    }

    public function sendToCart($item_id)
    {
        $item = Cart::instance('wishlist')->get($item_id);

        $data = array();
        $data['id'] =$item->id;
        $data['name'] =$item->name;
        $data['qty'] =$item->qty;
        $data['price'] =$item->price;

        $add = Cart::instance('main')->add($data);

        session()->flash('message', 'Item Added In Cart');

        
        if ($add) {
            Cart::instance('wishlist')->remove($item_id);
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Product Moved To Cart']);

            $this->emitTo('web.cart.cart-count-component','refreshComponent');
            $this->emitTo('web.wishlist.wishlist-count-component','refreshComponent');
        }
    }

    public function clearWishlist()
    {
        Cart::instance('wishlist')->destroy();
        
            
        $this->dispatchBrowserEvent('alert', 
            ['type' => 'success',  'message' => 'Wishlist has been cleared']);

        $this->emitTo('web.wishlist.wishlist-count-component','refreshComponent');
        
    }


    public function render()
    {
        return view('livewire.web.wishlist.wishlist-component')->layout('web.base.base');
    }
}
