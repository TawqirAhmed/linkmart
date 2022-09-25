<?php

namespace App\Http\Livewire\Vendor\Product;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\product;
use App\Models\variation;
use App\Models\category;
use App\Models\vendor;
use App\Models\size;
use App\Models\color;
use DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;

class VendorsAddProductsComponent extends Component
{
    use WithFileUploads;
    //for ptoduct Table
    public $name, $description, $unit, $tags, $image, $images, $warning, $featured, $category_id, $vendor_id, $product_unit_price, $sale_price, $on_sale, $sale_end; 
    public $max_order, $base_shipping, $extra_shipping, $order_threshold; 
    //for variation Table
    public $product_id, $color_id, $size_id, $unit_price, $sku, $quantity, $variation_image;
    public $color_ids, $size_ids;
    public $variation_array = [];
    public $toggle = false;
    public $v_product=[];
    public $v_product_names=[];

    // public $temp_vendor;
    public $user_id;
    

    public function makeVariations()
    {
        $this->variation_array = [];

        if ($this->color_ids || $this->size_ids) {

            if ($this->color_ids && $this->size_ids ==null) {
                $this->variation_array = $this->color_ids;

                foreach ($this->variation_array as $key => $value) {
            

                    $temp = explode("-", $value);

                    // $size = explode(",", $temp[0]);
                    $color = explode(",", $value);

                    array_push($this->v_product_names,"color:".$color[1]);

                    array_push($this->v_product,array("size_id"=>null,"color_id"=>$color[0],"unit_price"=>"","sale_price"=>"","sku"=>"","quantity"=>"","variation_image"=>"","include"=>false));
                }

            } 
            elseif ($this->size_ids && $this->color_ids==null) {
                $this->variation_array = $this->size_ids;

                foreach ($this->variation_array as $key => $value) {
            

                    // $temp = explode("-", $value);

                    $size = explode(",", $value);
                    // $color = explode(",", $temp[1]);

                    array_push($this->v_product_names,"size:".$size[1]);

                    array_push($this->v_product,array("size_id"=>$size[0],"color_id"=>null,"unit_price"=>"","sale_price"=>"","sku"=>"","quantity"=>"","variation_image"=>"","include"=>false));
                }


            } else{
                foreach ($this->color_ids as $col) {
                    foreach ($this->size_ids as $siz) {
                        
                        array_push($this->variation_array,$siz."-".$col);

                    }
                }


                foreach ($this->variation_array as $key => $value) {
            

                    $temp = explode("-", $value);

                    $size = explode(",", $temp[0]);
                    $color = explode(",", $temp[1]);

                    array_push($this->v_product_names,"size:".$size[1]."-"."color:".$color[1]);

                    array_push($this->v_product,array("size_id"=>$size[0],"color_id"=>$color[0],"unit_price"=>"","sale_price"=>"","sku"=>"","quantity"=>"","variation_image"=>"","include"=>false));
                }
            }
        }

        // foreach ($this->variation_array as $key => $value) {
            

        //     $temp = explode("-", $value);

        //     $size = explode(",", $temp[0]);
        //     $color = explode(",", $temp[1]);

        //     array_push($this->v_product_names,"size:".$size[1]."-"."color:".$color[1]);

        //     array_push($this->v_product,array("size_id"=>$size[0],"color_id"=>$color[0],"unit_price"=>"","sku"=>"","quantity"=>"","variation_image"=>"","include"=>false));


        //     // array_push($this->v_product,$key);
        //     // dd($this->v_product_names);
        // }
        // $this->v_product[0]['unit_price']=100;
        // dd($this->v_product);
    }

    public function toggleInclude($key)
    {
        if ($this->v_product[$key]['include'] == false) {
            $this->v_product[$key]['include'] = true;
        } else {
            $this->v_product[$key]['include'] = false;
        }
        // dd($this->v_product );
    }

    

    public function Store()
    {
        $databaseName = DB::connection()->getDatabaseName();
        $next_product_id_info = DB::select("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$databaseName' AND TABLE_NAME = 'products'");

        $next_product_id = $next_product_id_info[0]->AUTO_INCREMENT;

        //for product Table
        $product_data = new product();

        $product_data->name = $this->name;
        $product_data->description = $this->description;
        $product_data->unit = $this->unit;
        $product_data->tags = $this->tags;
        // $product_data-> = $this->image;
        // $product_data-> = $this->images;
        $product_data->warning = $this->warning;
        $product_data->featured = $this->featured;
        $product_data->category_id = $this->category_id;
        $product_data->vendor_id = $this->vendor_id;
        $product_data->unit_price = $this->product_unit_price;
        $product_data->sale_price = $this->sale_price;
        $product_data->sale_end = $this->sale_end;
        $product_data->on_sale = $this->on_sale;

        $product_data->max_order = $this->max_order; 
        $product_data->base_shipping = $this->base_shipping; 
        $product_data->extra_shipping = $this->extra_shipping; 
        $product_data->order_threshold = $this->order_threshold;

        $p_name = $this->name;

        if($this->image){
            $imageName = $this->name."_".Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAs('products/'.$p_name,$imageName);
            $product_data->image = $imageName;
        }


        if($this->images){

            $images_names='';

            foreach ($this->images as $key => $image) {
                $imageName = $this->name."_".$key."_".Carbon::now()->timestamp.'.'.$image->extension();
                $image->storeAs('products/'.$p_name,$imageName);
                $images_names = $images_names.','.$imageName;
            }

            $product_data->images = $images_names;
        }


        $product_data->save();

        // for variation table

        foreach ($this->v_product as $key => $value) {
            
            $v_data = new variation();

            if ($value['include'] == true) {
                
            
                $v_data->product_id = $next_product_id;
                $v_data->size_id = $value['size_id'];
                $v_data->color_id = $value['color_id'];
                // $v_data->unit_price = $value['unit_price'];
                // $v_data->sale_price = $value['sale_price'];
                $v_data->sku = $value['sku'];
                $v_data->quantity = $value['quantity'];

                if($value['variation_image']){
                    $imageName =$this->name."_".$key."_".Carbon::now()->timestamp.'.'.$value['variation_image']->extension();
                    $value['variation_image']->storeAs('products/'.$p_name,$imageName);
                    $v_data->image = $imageName;
                }

                $v_data->save();

            }
        }

        $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Product Added Successfuly.']);
        // dd("done. do not close. refresh the page. ");

        // dd($next_product_id );
        
    }

    public function mount($id)
    {
        $this->user_id = Auth::id();
        $vendor = vendor::where('user_id',$this->user_id)->get();

        // dd($id);

        foreach ($vendor as $key => $value) {

            if ($value->user_id == $this->user_id) {
                // $this->vendor_id = $value->id;
                // $this->temp_vendor = $value;
            }else{
                return redirect()->route('vendor.products');
            }

        }
        
        
    }


    public function render()
    {
        $categoris = category::all();
        $vendors = vendor::where('user_id',$this->user_id)->get();
        $sizes = size::all();
        $colors = color::all();
        return view('livewire.vendor.product.vendors-add-products-component',compact('categoris','vendors','sizes','colors'))->layout('admin.adminbase');
    }
}
