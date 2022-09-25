<?php

namespace App\Http\Livewire\Web\Product;

use Livewire\Component;

use App\Models\product;
use App\Models\variation;
use App\Models\ProductReview;
use App\Models\HotSale;
use App\Models\FlashSale;
use Cart;
use Carbon\Carbon;
class ProductDetails extends Component
{

    public $product_id, $size_variations, $color_variations;

    public $product_color, $product_size,$product_quantity=1;

    public $protuctInformation;

    public $cart_instance=array();

    public function increaseQty()
    {
        // dd('increaseQty()');
        if ($this->product_quantity < $this->protuctInformation->max_order) {

            $this->product_quantity++;

        } else {
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'warning',  'message' => 'Maximum order limit Reached']);
        }
        
    }

    public function decreaseQty()
    {
        if ($this->product_quantity > 1) {

            $this->product_quantity--;

        } else {
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'warning',  'message' => 'Minimum order is One']);
        }
    }



    public function addToCart()
    {

        $hot_sale_info = HotSale::find(1);
        $flash_sale_info = FlashSale::find(1);

        $product_variation;
        if ($this->product_color !=null && $this->product_size !=null) {
            $product_variation = variation::where('product_id',$this->product_id)->where('size_id',$this->product_size)->where('color_id',$this->product_color)->first();
        }
        
        if ($this->product_color ==null && $this->product_size !=null) {
            $product_variation = variation::where('product_id',$this->product_id)->where('size_id',$this->product_size)->first();
        }
        if ($this->product_color !=null && $this->product_size ==null) {
            $product_variation = variation::where('product_id',$this->product_id)->where('color_id',$this->product_color)->first();
        }
        if ($this->product_color ==null && $this->product_size ==null) {
            $product_variation = variation::where('product_id',$this->product_id)->first();
        }

        // dd($product_variation);
        $data = array();
        $data['id'] =$product_variation->id;
        $data['name'] =$this->protuctInformation->name;
        $data['qty'] =$this->product_quantity;
        // $data['price'] =$product_variation->unit_price;
        // $data['weight'] =1;

        if($this->protuctInformation->on_sale == 1 && $this->protuctInformation->sale_end > Carbon::now())
        {

            $data['price'] =$this->protuctInformation->sale_price;

        }
        elseif($this->protuctInformation->on_sale == 1 && $this->protuctInformation->flash_sale ==1 && $flash_sale_info->sale_end_date > Carbon::now())
        {

            $data['price'] =$this->protuctInformation->sale_price;

        }
        elseif($this->protuctInformation->on_sale == 1 && $this->protuctInformation->hot_sale ==1 && $hot_sale_info->sale_end_date > Carbon::now())
        {

            $data['price'] =$this->protuctInformation->sale_price;

        }
        else
        {

            $data['price'] =$this->protuctInformation->unit_price;

        }


        $cart_instance = json_decode(session()->get('cart_instance')['vendors']);

        if ($cart_instance == null) {
            $cart_instance = array();
        }

        $flag = 0;

        foreach ($cart_instance as $instance_key => $instance) {
            
            $content_main = Cart::instance($instance)->content();

            foreach ($content_main as $key => $value) {
                if($value->id == $product_variation->id){
                    $flag=1;
                    break;
                }
            }

            if($flag ==1){
                break;
            }
        }

        // $content_main = Cart::instance('main')->content();

        // $flag=0;

        // foreach ($content_main as $key => $value) {
        //     if($value->id == $product_variation->id){
        //         $flag=1;
        //         break;
        //     }
        // }



        $add=null;
        if ($flag == 1) {
            // dd('item already added to cart');
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'warning',  'message' => 'Item already in cart']);
            return;
        }else{
            $vendor_id = $this->protuctInformation->vendors->id;

            $cart_instance = json_decode(session()->get('cart_instance')['vendors']);

            if ($cart_instance == null) {
                $cart_instance = array();
            }

            if (in_array($vendor_id, $cart_instance)) {

                $add = Cart::instance($vendor_id)->add($data);

                session()->put('cart_instance',[
                    'vendors'=> json_encode($cart_instance)
                ]);

            }else{
                array_push($cart_instance, $vendor_id);
                $add = Cart::instance($vendor_id)->add($data);
                session()->put('cart_instance',[
                    'vendors'=> json_encode($cart_instance)
                ]);
            }
            // $add = Cart::instance('main')->add($data);
        }

        

        // $done = Cart::add($product_variation->id, $this->protuctInformation->name,$this->product_quantity,$product_variation->unit_price)->associate('App\models\variation');
        session()->flash('message', 'Item Added In Cart');

        // dd(Cart::content());
        if ($add) {
            // return redirect()->route('product_details',['id'=>$this->product_id]);
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Product Added To Cart']);

            // $this->dispatchBrowserEvent('alert', 
            //     ['type' => 'error',  'message' => 'Something is Wrong!']);

            // $this->dispatchBrowserEvent('alert', 
            //     ['type' => 'info',  'message' => 'Going Well!']);

            $this->emitTo('web.cart.cart-count-component','refreshComponent');
        }
    }


    public function addToWishlist()
    {
        $hot_sale_info = HotSale::find(1);
        $flash_sale_info = FlashSale::find(1);


        $product_variation;
        if ($this->product_color !=null && $this->product_size !=null) {
            $product_variation = variation::where('product_id',$this->product_id)->where('size_id',$this->product_size)->where('color_id',$this->product_color)->first();
        }
        
        if ($this->product_color ==null && $this->product_size !=null) {
            $product_variation = variation::where('product_id',$this->product_id)->where('size_id',$this->product_size)->first();
        }
        if ($this->product_color !=null && $this->product_size ==null) {
            $product_variation = variation::where('product_id',$this->product_id)->where('color_id',$this->product_color)->first();
        }
        if ($this->product_color ==null && $this->product_size ==null) {
            $product_variation = variation::where('product_id',$this->product_id)->first();
        }

        // dd($product_variation);
        $data = array();
        $data['id'] =$product_variation->id;
        $data['name'] =$this->protuctInformation->name;
        $data['qty'] =$this->product_quantity;
        // $data['price'] =$product_variation->unit_price;
        // $data['weight'] =1;

        if($this->protuctInformation->on_sale == 1 && $this->protuctInformation->sale_end > Carbon::now())
        {

            $data['price'] =$this->protuctInformation->sale_price;

        }
        elseif($this->protuctInformation->on_sale == 1 && $this->protuctInformation->flash_sale ==1 && $flash_sale_info->sale_end_date > Carbon::now())
        {

            $data['price'] =$this->protuctInformation->sale_price;

        }
        elseif($this->protuctInformation->on_sale == 1 && $this->protuctInformation->hot_sale ==1 && $hot_sale_info->sale_end_date > Carbon::now())
        {

            $data['price'] =$this->protuctInformation->sale_price;

        }
        else
        {

            $data['price'] =$this->protuctInformation->unit_price;

        }

        $add = Cart::instance('wishlist')->add($data);

        // $done = Cart::add($product_variation->id, $this->protuctInformation->name,$this->product_quantity,$product_variation->unit_price)->associate('App\models\variation');
        session()->flash('message', 'Item Added In Cart');

        // dd(Cart::content());
        if ($add) {
            // return redirect()->route('product_details',['id'=>$this->product_id]);
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Product Added To Wishlist']);

            // $this->dispatchBrowserEvent('alert', 
            //     ['type' => 'error',  'message' => 'Something is Wrong!']);

            // $this->dispatchBrowserEvent('alert', 
            //     ['type' => 'info',  'message' => 'Going Well!']);

            $this->emitTo('web.wishlist.wishlist-count-component','refreshComponent');
        }
    }




    public function mount($id)
    {
        
        $this->product_id = $id;
        $this->size_variations = collect();
        $this->color_variations = collect();
        $this->protuctInformation = product::where('id',$this->product_id)->with('variations')->with('category')->with('vendors')->first();
        // dd($this->protuctInformation);
    }

    public function render()
    {
        $productInfo = product::where('id',$this->product_id)->with('variations')->with('category')->with('vendors')->with('brand')->first();

        // dd($productInfo);

        $this->size_variations = variation::where('product_id',$this->product_id)->with('size')->select('size_id')->where('size_id','!=',null)->distinct()->get();

        // dd($this->size_variations);

        if ($this->product_size !=null) {
            $this->color_variations = variation::where('product_id',$this->product_id)->where('size_id',$this->product_size)->with('color')->select('color_id')->where('color_id','!=',null)->distinct()->get();
            // $this->product_color = null;
        }

        if ($this->size_variations->isEmpty()) {
            $this->color_variations = variation::where('product_id',$this->product_id)->with('color')->select('color_id')->distinct()->get();
            // dd($this->color_variations);
        }

        if ($this->size_variations->count() == 1) {
            $this->color_variations = variation::where('product_id',$this->product_id)->with('color')->select('color_id')->distinct()->get();
            // dd($this->color_variations);
        }
        
        $product_tags = explode(",", $productInfo->tags);

        // $similarProduct = product::where('category_id',$this->protuctInformation->category_id)->with('category')->with('variations')->take(10)->get();

        $similarProduct = collect();

        foreach ($product_tags as $key => $value) {

            $temp_collection = product::where('name','like','%'.$value.'%')->orWhere('tags','like','%'.$value.'%')->with('category')->with('variations')->get();
            $similarProduct = $similarProduct->merge($temp_collection);
        }

        $similarProduct =$similarProduct->unique();

        $productReviews = ProductReview::with('reply')->where('product_id',$this->product_id)->with('user')->orderBy('created_at','desc')->get();

        $avg_rating = ProductReview::avg_ratings($this->product_id);

        if ($avg_rating != null) {
            $avg_rating = number_format((float)$avg_rating, 2, '.','');
        }
        

        $hot_sale = HotSale::find(1);
        $flash_sale = FlashSale::find(1);

        // dd($avg_rating);

        return view('livewire.web.product.product-details',compact('productInfo','similarProduct','product_tags','productReviews','avg_rating','hot_sale','flash_sale'))->layout('web.base.base');
    }
}
