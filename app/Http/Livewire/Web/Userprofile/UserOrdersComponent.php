<?php

namespace App\Http\Livewire\Web\Userprofile;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\User;
use App\Models\UserProfile;
use Auth;

use App\Models\Order;

class UserOrdersComponent extends Component
{
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = "";


    public $user_id;

    public $order_number,$order_data;

    public function Show($order_id)
    {
        $this->order_data = collect();
        $this->order_number = $order_id;

        $order = Order::where('order_number',$order_id)->with('transaction', 'shipping','items')->first();

        $this->order_data = $order;        
        // dd($order);
    }

    public function closeOrder()
    {
        $this->order_number = null;
        $this->order_data = collect();
    }


    public function giveReview($u_id,$p_id,$v_id)
    {
        // {{ route('user.user_product_ratings', ['user_id'=>Auth::user()->id, 'product_id'=>$value->variation->product->id, 'variation_id'=>$value->variation->id]) }}

        if (session()->has('rating_code')) {
            
            session()->forget('rating_code');
        }


        session()->put('rating_code',[
                'user_id' => $u_id,
                'product_id' => $p_id,
                'variation_id' => $v_id
            ]);

        return redirect()->route('user.user_product_ratings', ['user_id'=>$u_id, 'product_id'=>$p_id, 'variation_id'=>$v_id]);
    }


    public function mount($id)
    {
        $this->user_id = $id;
    }

    public function render()
    {

        $userOrders = Order::where('user_id',$this->user_id)->orderBy('created_at','desc')->search(trim($this->search))->paginate(5);

        return view('livewire.web.userprofile.user-orders-component',compact('userOrders'))->layout('web.base.base');
    }
}
