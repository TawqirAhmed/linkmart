<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\product;
use App\Models\variation;
use App\Models\category;
use App\Models\vendor;
use App\Models\size;
use App\Models\color;
use App\Models\Brand;
use DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AddProductWithoutVariationComponent extends Component
{

    use WithFileUploads;
    //for ptoduct Table
    public $name, $description, $unit, $tags, $image, $images, $warning, $featured, $category_id, $vendor_id, $brand_id, $product_unit_price, $sale_price = 0, $on_sale, $sale_end, $published, $hot_sale = 0, $flash_sale = 0;  
    public $max_order, $base_shipping, $extra_shipping, $order_threshold;
    //for variation Table
    public $product_id, $color_id, $size_id, $unit_price, $sku, $quantity, $variation_image;




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
        $product_data->brand_id = $this->brand_id;
        $product_data->unit_price = $this->product_unit_price;
        $product_data->sale_price = $this->sale_price;
        $product_data->sale_end = $this->sale_end;
        $product_data->on_sale = $this->on_sale;

        $product_data->max_order = $this->max_order; 
        $product_data->base_shipping = $this->base_shipping; 
        $product_data->extra_shipping = $this->extra_shipping; 
        $product_data->order_threshold = $this->order_threshold;
        $product_data->published = $this->published;

        $product_data->hot_sale = $this->hot_sale;
        $product_data->flash_sale = $this->flash_sale;

        $p_name = $this->name;

        if($this->image){
            $imageName = $this->name."_".Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAs('products/'.$p_name,$imageName);
            $product_data->image = $imageName;
        }

        // dd($product_data);

        $product_data->save();

        // for variation table

        
        $v_data = new variation();         
            
        $v_data->product_id = $next_product_id;
        $v_data->unit_price = $this->product_unit_price;
        $v_data->sku = $this->sku;
        $v_data->quantity = $this->quantity;

        $v_data->save();

            

        $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Product Added Successfuly.']);
        // dd("done. do not close. refresh the page. ");

        // dd($next_product_id );
        
    }




    public function render()
    {
        $categoris = category::all();
        $vendors = vendor::all();
        $brands = Brand::all();

        return view('livewire.admin.product.add-product-without-variation-component',compact('categoris','vendors','brands'))->layout('admin.adminbase');
    }
}
