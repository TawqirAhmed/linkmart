<?php

namespace App\Http\Livewire\Web\Userprofile;

use Livewire\Component;

use App\Models\User;
use App\Models\Refund;
use Auth;

class UserApplyForRefundComponent extends Component
{
    public $user_id;

    public $name, $email, $contact_no, $order_no, $product_name, $product_id, $refund_reason;

    public function mount($id)
    {
        $this->user_id = $id;

        if(Auth::user()->id != $id){
            return redirect()->route('web.home');
        }

        $user = User::find($id);

        $this->name = $user->name;
        $this->email = $user->email;


    }


    public function plasceRefund()
    {
        $validatedData = $this->validate([
            'contact_no' => 'required|string|max:255',
            'order_no' => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'product_id' => 'required|string|max:255',
            'refund_reason' => 'required|string|max:1000',
        ]);
        
        $data = new Refund();

        $data->user_id = $this->user_id;
        $data->name = $this->name;
        $data->email = $this->email;
        $data->contact_no = $this->contact_no;
        $data->order_no = $this->order_no;
        $data->product_name = $this->product_name;
        $data->product_id = $this->product_id;
        $data->refund_reason = $this->refund_reason;


        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Refund Request Submited.']);
        }

        $this->contact_no = null;
        $this->order_no = null;
        $this->product_name = null;
        $this->product_id = null;
        $this->refund_reason = null;

    }

    public function render()
    {
        return view('livewire.web.userprofile.user-apply-for-refund-component')->layout('web.base.base');
    }
}
