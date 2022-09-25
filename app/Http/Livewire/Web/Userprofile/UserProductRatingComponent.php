<?php

namespace App\Http\Livewire\Web\Userprofile;

use Livewire\Component;

use App\Models\ProductReview;
use App\Models\variation;

use Auth;

class UserProductRatingComponent extends Component
{

    public $user_id, $product_id, $rating = 1, $description;

    public $variation_info;
    public $reviewed = false;



    public function StoreReview()
    {
        $data = new ProductReview();

        $data->user_id = $this->user_id;
        $data->product_id = $this->product_id;
        $data->rating = $this->rating;
        $data->description = $this->description;

        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Review Submited Successfuly.']);
        }

        $this->reviewed = true;

        // dd($data,$this->variation_info);
    }



    public function mount($user_id,$product_id,$variation_id)
    {

        if (!session()->get('rating_code')) {
            return redirect()->route('web.home');
        }

        if (session()->get('rating_code')['user_id'] != $user_id || session()->get('rating_code')['product_id'] != $product_id || session()->get('rating_code')['variation_id'] != $variation_id) {
            
            session()->forget('rating_code');

            return redirect()->route('web.home');
        }

        $this->user_id = $user_id;
        $this->product_id = $product_id;

        $this->variation_info = collect();

        $review = ProductReview::where('user_id',$user_id)->where('product_id',$product_id)->first();
        

        if ($review) {
            
            $this->reviewed = true;

        }
        

        $variation = variation::where('id',$variation_id)->with('product','size','color')->first();
        if ($variation) {
            $this->variation_info = $variation;  
        }else{
            return redirect()->route('web.home');
        }
            
        
    }

    public function render()
    {
        return view('livewire.web.userprofile.user-product-rating-component')->layout('web.base.base');
    }
}
