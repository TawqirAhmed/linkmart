<?php

namespace App\Http\Livewire\Admin\Coupon;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Coupon;

class CouponComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;

    public $code, $type, $value, $cart_value, $max_discount, $expiry_date;

    public $edit_id, $e_code, $e_type, $e_value, $e_cart_value, $e_max_discount, $e_expiry_date;

    public $delete_id;

    public function Store()
    {
        $data = new Coupon();

        $data->code = $this->code;
        $data->type = $this->type;
        $data->value = $this->value;
        $data->cart_value = $this->cart_value;
        $data->max_discount = $this->max_discount;
        $data->expiry_date = $this->expiry_date;


        $done = $data->save();

        $this->emit('storeSomething');

        if ($done) {
            
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Coupon Added.']);

            
        }

        $this->code = null;
        $this->type = null;
        $this->value = null;
        $this->cart_value = null;
        $this->max_discount = null;
        $this->expiry_date = null;

    }

    public function getItem($id)
    {
        $this->edit_id = $id;

        $data = Coupon::find($this->edit_id);

        $this->e_code = $data->code;
        $this->e_type = $data->type;
        $this->e_value = $data->value;
        $this->e_cart_value = $data->cart_value;
        $this->e_max_discount = $data->max_discount;
        $this->e_expiry_date = $data->expiry_date;

    }

    public function Update()
    {
        $data = Coupon::find($this->edit_id);

        $data->code = $this->e_code;
        $data->type = $this->e_type;
        $data->value = $this->e_value;
        $data->cart_value = $this->e_cart_value;
        $data->max_discount = $this->e_max_discount;
        $data->expiry_date = $this->e_expiry_date;

        $done = $data->save();

        $this->emit('storeSomething');

        if ($done) {
            
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Coupon Updated.']);

            
        }

        $this->edit_id = null;
        $this->e_code = null;
        $this->e_type = null;
        $this->e_value = null;
        $this->e_cart_value = null;
        $this->e_max_discount = null;
        $this->e_expiry_date = null;
    }

    public function deleteID($id)
    {
        $this->delete_id = $id;

    }

    public function delete()
    {
        Coupon::find($this->delete_id)->delete();

        $this->emit('storeSomething');

        $this->dispatchBrowserEvent('alert', 
                ['type' => 'warning',  'message' => 'Coupon Deleted.']);

    }

    public function render()
    {
        $allCoupons = Coupon::paginate($this->paginate);

        return view('livewire.admin.coupon.coupon-component',compact('allCoupons'))->layout('admin.adminbase');
    }
}
