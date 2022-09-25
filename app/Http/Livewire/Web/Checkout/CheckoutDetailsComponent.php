<?php

namespace App\Http\Livewire\Web\Checkout;

use Livewire\Component;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use App\Models\vendor;
use Auth;
use Cart;
use Session;

class CheckoutDetailsComponent extends Component
{
    public $payment_method;
    public $step = 2;
    public $same_address = 0;
    public $order_number;
    public $s_name, $s_email, $s_phone, $s_city, $s_post_code, $s_address1, $s_address2;
    public $b_name, $b_email, $b_phone, $b_city, $b_post_code, $b_address1, $b_address2;

    public $all_cart_instance;


    public function toggleAddress()
    {
        if ($this->same_address == 0) {
            $this->same_address = 1;
        } else {
            $this->same_address = 0;
        }
        
    }

    public function paymentMethod($payment)
    {
        // dd($payment);
        if ($this->payment_method == null) {
            $this->payment_method = $payment;
        }
        else
        {
            $this->payment_method = null;
        }
        
        
        
    }

    public function goToPayment()
    {
        // dd($this->b_name, $this->b_email, $this->b_phone, $this->b_city, $this->b_post_code, $this->b_address1, $this->b_address2);
        $this->step = 3;
    }

    public function goToReview()
    {
        // dd($this->b_name, $this->b_email, $this->b_phone, $this->b_city, $this->b_post_code, $this->b_address1, $this->b_address2);
        $this->step = 4;
    }


    public function placeOrder()
    {
        $this->validate([
            'b_name' => 'required',
            'b_email' => 'required',
            'b_phone' => 'required',
            'b_city' => 'required',
            'b_post_code' => 'required',
            'b_address1' => 'required'
        ]);

        $cart_instance = json_decode(session()->get('cart_instance')['vendors']);

        // $shipping_charge_array = json_decode(session()->get('checkout')['shipping_charge_array']);

        $shipping_charge_array = session()->get('checkout')['shipping_charge_array'];

        // dd($shipping_charge_array[7]);

        foreach ($cart_instance as $key_ins => $instance) {
            
            $temp_subtotal = str_replace(",",'',Cart::instance($instance)->subtotal());
            $temp_total = str_replace(",",'',Cart::instance($instance)->total()) + $shipping_charge_array[$instance];
            
            $vendor_info = vendor::find($instance);

            $rand = self::randNum();

            $order_data = new Order();

            $order_data->user_id = Auth::user()->id; 
            $order_data->vendor_id = $instance;
            $order_data->products = Cart::instance($instance)->content(); 
            $order_data->order_number = $this->order_number."-".$rand.$instance;
            $order_data->subtotal = $temp_subtotal; 
            $order_data->discount = session()->get('checkout')['discount']; 
            $order_data->shipping_charge = $shipping_charge_array[$instance];
            $order_data->tax = session()->get('checkout')['tax']; 
            $order_data->total = $temp_total; 
            $order_data->name = $this->b_name; 
            $order_data->mobile = $this->b_phone;
            $order_data->email = $this->b_email; 
            $order_data->address_line1 = $this->b_address1; 
            $order_data->address_line2 = $this->b_address2; 
            $order_data->post_code = $this->b_post_code; 
            $order_data->city = $this->b_city; 
            $order_data->status = 'ordered'; 
            $order_data->is_shipping_different = $this->same_address ;
            $order_data->commission_percentage = $vendor_info->commission_percentage;

            $order_data->save();

            foreach (Cart::instance($instance)->content() as $key => $item) {
                
                $orderItem_data = new OrderItem();

                $orderItem_data->product_variation_id = $item->id;
                $orderItem_data->order_id = $order_data->id;
                $orderItem_data->price = $item->price;
                $orderItem_data->quantity = $item->qty;

                $orderItem_data->save();
            }

            if ($this->same_address == 0) {
                
                $this->validate([
                    's_name' => 'required',
                    's_email' => 'required',
                    's_phone' => 'required',
                    's_city' => 'required',
                    's_post_code' => 'required',
                    's_address1' => 'required'
                ]);

                $shipping_data = new Shipping();
                
                $shipping_data->order_id = $order_data->id;
                $shipping_data->name = $this->s_name; 
                $shipping_data->mobile = $this->s_phone;
                $shipping_data->email = $this->s_email; 
                $shipping_data->address_line1 = $this->s_address1; 
                $shipping_data->address_line2 = $this->s_address2; 
                $shipping_data->post_code = $this->s_post_code; 
                $shipping_data->city = $this->s_city;

                $shipping_data->save();
            }

            if ($this->payment_method == 'cash_on_delivery') {
                
                $transaction_data = new Transaction();

                $transaction_data->user_id = Auth::user()->id;
                $transaction_data->order_id = $order_data->id;
                $transaction_data->mod = 'cash_on_delivery';
                $transaction_data->status = 'pending';

                $transaction_data->save();

            }

        }

        foreach ($cart_instance as $key => $instance) {
            
            Cart::instance($instance)->destroy();

        }

        $temp = array();
        Session()->put('cart_instance',[
                    'vendors'=> json_encode($temp)
                ]);
        


        session()->forget('checkout');
        session()->forget('coupon');
        // return redirect()->route('user/checkOutPayment', ['order_key' => $order_data->id]);
        return redirect()->route('user.checkOutComplete');
    }


    public function mount()
    {
        $today = date("md");
        $time = time();
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));

        $this->order_number = '#'.$today.'-'.$time.'-'.$rand;


        $this->all_cart_instance = json_decode(session()->get('cart_instance')['vendors']);



    }

    public function randNum()
    {
        return strtoupper(substr(uniqid(sha1(time())),0,4));
    }

    public function render()
    {
        return view('livewire.web.checkout.checkout-details-component')->layout('web.base.base');
    }
}
