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

class VendorsEditProductsComponent extends Component
{
    use WithFileUploads;
    //for ptoduct Table
    public $name, $description, $unit, $tags, $image, $images, $warning, $featured, $category_id, $vendor_id, $product_unit_price, $sale_price, $on_sale, $sale_end;
    public $max_order, $base_shipping, $extra_shipping, $order_threshold; 

    public $new_image,$new_images;

    //for variation Table
    public $product_id, $color_id, $size_id, $unit_price, $sku, $quantity, $variation_image;
    public $color_ids, $size_ids;
    public $variation_array = [];
    public $toggle = false;
    public $v_product=[];
    public $v_product_names=[];

    //for new variation Table
    public $n_variations =[], $n_size = [], $n_color = [], $n_unit_price = [], $n_sale_price = [], $n_sku = [], $n_quantity = [], $n_image = []; 
    public $variation_input_count = 0;

    public $e_product_id;

    public $temp_vendor;
    // public $user_id;

    public function Update()
    {
        

        //for product Table
        $product_data = product::find($this->e_product_id);

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
        if ($this->sale_end !="") {
            $product_data->sale_end = $this->sale_end;
        } else {
            $product_data->sale_end = null;
        }
        
        
        $product_data->on_sale = $this->on_sale;


        $product_data->max_order = $this->max_order; 
        $product_data->base_shipping = $this->base_shipping; 
        $product_data->extra_shipping = $this->extra_shipping; 
        $product_data->order_threshold = $this->order_threshold;



        $p_name = $this->name;

        // dd($this->sale_end);
        // dd("not found");

        if($this->new_image){
            $imageName = $this->name."_".Carbon::now()->timestamp.'.'.$this->new_image->extension();
            $this->new_image->storeAs('products/'.$p_name,$imageName);
            $product_data->image = $imageName;
        }

        if($this->new_images){

            $images_names='';

            foreach ($this->new_images as $key => $image) {
                $imageName = $this->name."_".$key."_".Carbon::now()->timestamp.'.'.$image->extension();
                $image->storeAs('products/'.$p_name,$imageName);
                $images_names = $images_names.','.$imageName;
            }

            $product_data->images = $images_names;
        }


        $product_data->save();
        // dd($this->v_product);

        // for variation table

        foreach ($this->v_product as $key => $value) {
            
            $v_data = variation::find($value['id']);

            if ($value['include'] == true) {
                
            
                $v_data->product_id = $this->e_product_id;
                $v_data->size_id = $value['size_id'];
                $v_data->color_id = $value['color_id'];
                $v_data->unit_price = $value['unit_price'];
                $v_data->sale_price = $value['sale_price'];
                $v_data->sku = $value['sku'];
                $v_data->quantity = $value['quantity'];

                if($value['variation_new_image']){
                    $imageName =$this->name."_".$key."_".Carbon::now()->timestamp.'.'.$value['variation_new_image']->extension();
                    $value['variation_new_image']->storeAs('products/'.$p_name,$imageName);
                    $v_data->image = $imageName;
                }

                $v_data->save();

            }
        }


        // for new variations

        foreach ($this->n_variations as $key => $value) {
            
            $n_v_data = new variation();

            $temp_n_size = null;
            $temp_n_color = null;
            // $temp_n_unit_price = null;
            // $temp_n_sale_price = null;
            $temp_n_sku = null;
            $temp_n_quantity = null;
            $temp_n_image = null;

            if (array_key_exists($key, $this->n_size)) {
                 
                 $temp_size = explode(",", $this->n_size[$key]);
                 $temp_n_size = $temp_size[0];
            }

            if (array_key_exists($key, $this->n_color)) {
                 
                 $temp_color = explode(",", $this->n_color[$key]);
                 $temp_n_color = $temp_color[0];
            }

            // if (array_key_exists($key, $this->n_unit_price)) {
                 
            //      $temp_n_unit_price = $this->n_unit_price[$key];
            // }

            // if (array_key_exists($key, $this->n_sale_price)) {
                 
            //      $temp_n_sale_price = $this->n_sale_price[$key];
            // }

            if (array_key_exists($key, $this->n_sku)) {
                 
                 $temp_n_sku = $this->n_sku[$key];
            }
            if (array_key_exists($key, $this->n_quantity)) {
                 
                 $temp_n_quantity = $this->n_quantity[$key];
            }

            if (array_key_exists($key, $this->n_image)) {
                 
                 $temp_n_image = $this->n_image[$key];
            }

            $n_v_data->product_id = $this->e_product_id;
            $n_v_data->size_id = $temp_n_size;
            $n_v_data->color_id = $temp_n_color;
            // $n_v_data->unit_price = $temp_n_unit_price;
            // $n_v_data->sale_price = $temp_n_sale_price;
            $n_v_data->sku = $temp_n_sku;
            $n_v_data->quantity = $temp_n_quantity;

            if($temp_n_image){
                $imageName =$this->name."_".$key.rand()."_".Carbon::now()->timestamp.'.'.$temp_n_image->extension();
                $temp_n_image->storeAs('products/'.$p_name,$imageName);
                $n_v_data->image = $imageName;
            }

            $n_v_data->save();



        }

        $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Product Updated Successfuly.']);

        // dd("Updated. do not close. refresh the page. ");

        // dd($next_product_id );
        
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




    public function nVariation()
    {
        
        

        array_push($this->n_variations,$this->variation_input_count);

        $this->variation_input_count++;

        // dd($this->n_size, $this->n_color);
    }

    public function nVariationRemove($key)
    {
        unset($this->n_variations[$key]);
    }


    public function mount($id,$v_id)
    {

        $data =  product::where('id',$id)->with('category')->with('variations')->first();
        
        $user_id = Auth::id();
        $vendor = vendor::where('user_id',$user_id)->where('id',$v_id)->first();

        // dd($id,$v_id,$user_id,$vendor,$data);

        // if ($data->vendor_id == $v_id && $vendor->id == $v_id) {
        //     $this->vendor_id = $vendor->id;
        //     $this->temp_vendor = $vendor;
        // }else{
        //     return redirect()->route('vendor.products');
        // }

        if ($vendor->user_id == $user_id && $vendor->id == $v_id) {
            $this->vendor_id = $vendor->id;
            $this->temp_vendor = $vendor;
        }else{
            return redirect()->route('vendor.products');
        }




        $this->e_product_id=$id;
        // $data =  product::where('id',$id)->with('category')->with('variations')->first();
        // dd($data);
        // $this->id = $data->;
        $this->name = $data->name;
        $this->description = $data->description;
        $this->unit = $data->unit;
        $this->tags = $data->tags;
        $this->image = $data->image;
        $this->images = $data->images;
        $this->warning = $data->warning;
        $this->featured = $data->featured;
        $this->category_id = $data->category_id;
        $this->vendor_id = $vendor->id;
        $this->product_unit_price = $data->unit_price;
        $this->sale_price = $data->sale_price;
        $this->on_sale = $data->on_sale;
        $this->sale_end = date("Y-m-d\TH:i:s",strtotime($data->sale_end));

        $this->max_order = $data->max_order; 
        $this->base_shipping = $data->base_shipping; 
        $this->extra_shipping = $data->extra_shipping; 
        $this->order_threshold = $data->order_threshold;
        
        foreach ($data->variations as $key => $variation) {

            $size_name = null;
            $color_name = null;

            if($variation->size_id != null){
                $size_name = $variation->size->name;
            }

            if ($variation->color_id != null) {
                $color_name = $variation->color->name;
            }

            array_push($this->v_product,array("id"=>$variation->id,"size_id"=>$variation->size_id,"color_id"=>$variation->color_id,"unit_price"=>$variation->unit_price,"sale_price"=>$variation->sale_price,"sku"=>$variation->sku,"quantity"=>$variation->quantity,"variation_image"=>$variation->image,"variation_new_image"=>null,"include"=>true,"v_name"=>"size:".$size_name."-"."color:".$color_name));
        }
        
        // dd($data);
        // dd($this->v_product);

    }


    public function render()
    {
        $categoris = category::all();
        $vendors = vendor::all();
        $sizes = size::all();
        $colors = color::all();
        return view('livewire.vendor.product.vendors-edit-products-component',compact('categoris','vendors','sizes','colors'))->layout('admin.adminbase');
    }
}
