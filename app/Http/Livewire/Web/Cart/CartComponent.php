<?php

namespace App\Http\Livewire\Web\Cart;

use Livewire\Component;

use Cart;
use App\Models\Coupon;
use App\Models\variation;
use Carbon\Carbon;
use Session;
use Auth;
class CartComponent extends Component
{

    public $coupon_code;
    public $discount_amount=0; 
    public $total_after_discount, $subtotal_after_convert;
    public $shipping_charge,$shipping_charge_array;


    public $all_cart_content,$all_cart_instance;

    

    public function increaseItem($item_id,$quantity,$variation_id,$instance_id)
    {

        $product_info = variation::where('id',$variation_id)->with('product')->first();

        if ($quantity < $product_info->product->max_order) {
            Cart::instance($instance_id)->update($item_id, ($quantity+1));

            self::calculateDiscount();

            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Item Increased To Cart']);
            $this->emitTo('web.cart.cart-count-component','refreshComponent');
        } else {
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'warning',  'message' => 'Maximum order limit Reached']);
        }
        

        // dd($product_info,$quantity);

        
    }
    public function decreaseItem($item_id,$quantity,$instance_id)
    {
        if ($quantity > 1) {
            Cart::instance($instance_id)->update($item_id, ($quantity-1));

            self::calculateDiscount();

            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'warning',  'message' => 'Item Decreased To Cart']);
            $this->emitTo('web.cart.cart-count-component','refreshComponent');
        } else {
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'warning',  'message' => 'Minimum order is One']);
        }
        
        
    }

    public function removeItem($item_id,$instance_id,$instance_key)
    {
        Cart::instance($instance_id)->remove($item_id);

        if (Cart::instance($instance_id)->count() == 0) {
            
            $cart_instance = json_decode(session()->get('cart_instance')['vendors']);


            Cart::instance($instance_id)->destroy();

            unset($cart_instance[$instance_key]);

            $cart_instance = array_values($cart_instance);

            // dd($cart_instance);

            session()->put('cart_instance',[
                    'vendors'=> json_encode($cart_instance)
                ]);

            $this->all_cart_instance = $cart_instance;

        }


        self::calculateDiscount();

        $this->dispatchBrowserEvent('alert', 
                ['type' => 'warning',  'message' => 'Item Removed from Cart']);
        $this->emitTo('web.cart.cart-count-component','refreshComponent');
        
        return redirect()->route('web.product_cart');

    }

    public function sendToWishlist($item_id)
    {
        $item = Cart::instance('main')->get($item_id);

        $data = array();
        $data['id'] =$item->id;
        $data['name'] =$item->name;
        $data['qty'] =$item->qty;
        $data['price'] =$item->price;

        $add = Cart::instance('wishlist')->add($data);

        session()->flash('message', 'Item Moved To Wishlist');

        
        if ($add) {
            Cart::instance('main')->remove($item_id);

            self::calculateDiscount();

            $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Product Moved To Wishlist']);

            $this->emitTo('web.cart.cart-count-component','refreshComponent');
            $this->emitTo('web.wishlist.wishlist-count-component','refreshComponent');
        }
    }


    public function clearCart()
    {
        // Cart::instance('main')->destroy();

        $cart_instance = json_decode(session()->get('cart_instance')['vendors']);

        foreach ($cart_instance as $key => $instance) {
            
            Cart::instance($instance)->destroy();

        }

        $temp = array();
        Session()->put('cart_instance',[
                    'vendors'=> json_encode($temp)
                ]);


        self::calculateDiscount();
            
        $this->dispatchBrowserEvent('alert', 
            ['type' => 'success',  'message' => 'Cart has been cleared']);

        $this->emitTo('web.cart.cart-count-component','refreshComponent');
        
        return redirect()->route('web.product_cart');
    }


    public function applyCouponCode()
    {

        $temp_sub = str_replace(",",'',Cart::instance('main')->subtotal());

        $coupon = Coupon::where('code',$this->coupon_code)->where('expiry_date','>=',Carbon::today())->where('cart_value','<=',$temp_sub)->first();
        

        if (!$coupon) {
            session()->flash('coupon_message','Coupon Code is Invalid For This Order or Expired!');
            return;
        }
        session()->put('coupon',[
            'code'=> $coupon->code,
            'type'=> $coupon->type,
            'value'=> $coupon->value,
            'cart_value'=> $coupon->cart_value,
            'max_discount'=> $coupon->max_discount
        ]);
        
        // dd($coupon);
    }

    public function calculateDiscount()
    {

        // $temp_sub = str_replace(",",'',Cart::instance('main')->subtotal());
        // if ($temp_sub < session()->get('coupon')['cart_value']) {
            
        //     session()->forget('coupon');
        //     $this->discount_amount=null;
        // }

        // dd(session::get('coupon'));
        if (session::has('coupon')) {

            $temp_sub = str_replace(",",'',Cart::instance('main')->subtotal());
            if ($temp_sub < session()->get('coupon')['cart_value']) {
                
                session()->forget('coupon');
                $this->discount_amount=null;
                self::calculateDiscount();
            }
            else{

                if (session()->get('coupon')['type'] == 'fixed') {
                    
                    $this->discount_amount = session()->get('coupon')['value'];

                    $temp_total = (float)str_replace(",",'',Cart::instance('main')->total());
                    $this->total_after_discount = $temp_total - $this->discount_amount;
                    $this->subtotal_after_convert = str_replace(",",'',Cart::instance('main')->subtotal());

                } else {
                    
                    $subtotal = str_replace(",",'',Cart::instance('main')->subtotal());

                    $dicount_value = ($subtotal/100)*(session()->get('coupon')['value']);

                    if ($dicount_value > session()->get('coupon')['max_discount']) {

                        $this->discount_amount = session()->get('coupon')['max_discount'];

                    }else{
                        $this->discount_amount = $dicount_value;
                    }

                     

                    $temp_total = (float)str_replace(",",'',Cart::instance('main')->total());
                    $this->total_after_discount = $temp_total - $this->discount_amount;
                    $this->subtotal_after_convert = str_replace(",",'',Cart::instance('main')->subtotal());
                    // dd($this->total_after_discount);
                }
            }
            
        }
        else{
            $subtotal=0;
            $total=0;

            // dd($cart_instance);
            foreach ($this->all_cart_instance as $key => $value) {
                $subtotal= $subtotal + str_replace(",",'',Cart::instance($value)->subtotal());
                $total=$total + str_replace(",",'',Cart::instance($value)->total());
            }

            $this->subtotal_after_convert = $subtotal;
            $this->total_after_discount = $total;
        }
    }

    public function checkout()
    {
        // dd($this->total_after_discount);
        if (Auth::check()) {
        
            return redirect()->route('user.checkOutDetails');
        
        } 
        else {

            return redirect()->route('login');
        
        }
        
    }
    public function setCheckoutAmount()
    {
        if (session()->has('coupon')) {
            
            session()->put('checkout',[
                'discount' => $this->discount_amount,
                'tax' => 0,
                'subtotal' => $this->subtotal_after_convert,
                'total' => $this->total_after_discount
            ]);

        } else {

            // $temp_sub = str_replace(",",'',Cart::instance('main')->subtotal());
            // $temp_total = str_replace(",",'',Cart::instance('main')->total());

            session()->put('checkout',[
                'discount' => 0,
                'shipping_charge' => $this->shipping_charge,
                // 'shipping_charge_array' => json_encode($this->shipping_charge_array),
                'shipping_charge_array' => $this->shipping_charge_array,
                'tax' => 0,
                'subtotal' => $this->subtotal_after_convert,
                'total' => $this->subtotal_after_convert + $this->shipping_charge
            ]);
        }
        
    }

    public function mount()
    {

        $cart_instance = json_decode(session()->get('cart_instance')['vendors']);

        $this->all_cart_instance = $cart_instance;

        $cart_component = array();

        foreach ($cart_instance as $key => $value) {
            
            array_push($cart_component, Cart::instance($value)->content());

        }

        $this->all_cart_content = $cart_component;

        if (!empty($this->all_cart_content)) {
            
            $subtotal=0;
            $total=0;

            // dd($cart_instance);
            foreach ($cart_instance as $key => $value) {
                $subtotal= $subtotal + str_replace(",",'',Cart::instance($value)->subtotal());
                $total=$total + str_replace(",",'',Cart::instance($value)->total());
            }

            $this->subtotal_after_convert = $subtotal;
            $this->total_after_discount = $total;
            self::calculateShipping();
            // dd($this->subtotal_after_convert,$this->total_after_discount);
        }
        



        // if(Cart::instance('main')->count() > 0){
        //     $this->subtotal_after_convert = str_replace(",",'',Cart::instance('main')->subtotal());
        //     $this->total_after_discount = str_replace(",",'',Cart::instance('main')->total());
        //     self::calculateShipping();
        // }
    }


    public function calculateShipping()
    {
        // if (Cart::instance('main')->count() > 0) {
            
        //     foreach(Cart::instance('main')->content() as $key => $value) {
                
        //         $variation_info = variation::where('id',$value->id)->with('product')->first();
                
        //         if($value->qty <= $variation_info->product->order_threshold){
        //             $this->shipping_charge = $variation_info->product->base_shipping;
        //         }else{
        //             $this->shipping_charge = $variation_info->product->base_shipping + $variation_info->product->extra_shipping;
        //         }
        //     }
        // }

        $local_shipping_charge=0;
        $local_shipping_charge_array = array();

        if (!empty($this->all_cart_content)) {

            foreach($this->all_cart_instance as $key_ins => $instance) {
                
                $sub_shipping=0;

                $temp_base_shipping = 0;
                $temp_extra_shipping = 0;
                $ex_flag = 0;

                foreach(Cart::instance($instance)->content() as $key => $value) {

                    $variation_info = variation::where('id',$value->id)->with('product')->first();

                    if ($temp_base_shipping < $variation_info->product->base_shipping) {
                        $temp_base_shipping = $variation_info->product->base_shipping;
                    }

                    if($value->qty <= $variation_info->product->order_threshold){
                        // $sub_shipping = $variation_info->product->base_shipping;
                    }else{
                        // $sub_shipping = $variation_info->product->base_shipping + $variation_info->product->extra_shipping;
                        $temp_extra_shipping = $temp_extra_shipping + $variation_info->product->extra_shipping;
                    }

                    if (Cart::instance($instance)->content()->count() > 2 && $ex_flag == 0) {
                        $temp_extra_shipping = $temp_extra_shipping + $temp_base_shipping;

                        $ex_flag = 1;
                    }

                    if (Cart::instance($instance)->content()->count() > 5 && $ex_flag == 1) {
                        $temp_extra_shipping = $temp_extra_shipping + $temp_base_shipping;

                        $ex_flag = 2;
                    }

                }

                $ex_flag = 0;

                // $local_shipping_charge = $local_shipping_charge + $sub_shipping;
                $local_shipping_charge = $local_shipping_charge + $temp_base_shipping + $temp_extra_shipping;

                // array_push($local_shipping_charge_array, array($instance=>$temp_base_shipping + $temp_extra_shipping)); 
                $local_shipping_charge_array[$instance] = $temp_base_shipping + $temp_extra_shipping;


            }

            $this->shipping_charge = $local_shipping_charge;

            $this->shipping_charge_array = $local_shipping_charge_array;
        }


    }


    public function render()
    {
        self::calculateShipping();
        
        if (session::has('coupon')) {

            $temp_sub = str_replace(",",'',Cart::instance('main')->subtotal());
            if ($temp_sub < session()->get('coupon')['cart_value']) {
                
                session()->forget('coupon');
                $this->discount_amount=null;
            }
            else{

                self::calculateDiscount();

            }
        }

        // dd(Cart::content());
        self::setCheckoutAmount();

        // $cart_instance = json_decode(session()->get('cart_instance')['vendors']);

        // $this->all_cart_instance = $cart_instance;
        // dd($this->shipping_charge_array);

        return view('livewire.web.cart.cart-component')->layout('web.base.base');
    }
}
