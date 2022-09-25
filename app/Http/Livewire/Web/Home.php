<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;

use Carbon\Carbon;
use App\Models\product;
use App\Models\category;
use App\Models\AdvertiseBanner;
use App\Models\SectionsSetting;
use App\Models\Homeslider;
use App\Models\PromotionSetting;
use App\Models\Footer;
use App\Models\vendor;
use App\Models\OrderItem;
use App\Models\HomeCategorySettings;
use Cart;

use App\Models\FlashSale;
use App\Models\HotSale;

class Home extends Component
{
    public $quickView;
    public $temp;


    public function getInfo($id)
    {
        $this->temp=$id;
        $this->quickView = product::find($id);
        // dd($this->quickView->id.",".$id);
    }

    // public function mount()
    // {
    //     $this->quickView=collect();
    // }


    

    public function sectionsArray($sections)
    {
        $array=[];
        foreach ($sections as $key => $value) {
            
            array_push($array, $value->show);

        }

        return $array;

    }


    public function topCategories()
    {
        $items = OrderItem::with('variation')->get();
        // dd($items);

        $temp_array=[];

        foreach ($items as $key => $value) {
            
            $category = category::find($value->variation->product->category_id);


            if(array_key_exists($category->name,$temp_array)){
                $temp_array[$category->name]['qty']++;
            }else{
                
                $temp_array[$category->name]['qty']=1;
                $temp_array[$category->name]['id']=$category->id;

            }
            
        }

        arsort($temp_array);

        $final_array = [];

        $i=0;
        foreach ($temp_array as $key => $value) {
            
            $final_array[$key] = $value['id'];
            $i++;
            if ($i>=3) {
                break;
            }
        }

        return $final_array;
    }


    public function topVendors()
    {
        $items = OrderItem::with('variation')->get();
        // dd($items);

        $temp_array=[];

        foreach ($items as $key => $value) {
            
            $vendor = vendor::find($value->variation->product->vendor_id);


            if(array_key_exists($vendor->name,$temp_array)){
                $temp_array[$vendor->name]['qty']++;
            }else{
                
                $temp_array[$vendor->name]['qty']=1;
                $temp_array[$vendor->name]['id']=$vendor->id;
            }
            
        }

        arsort($temp_array);

        $final_array = [];

        $i=0;
        foreach ($temp_array as $key => $value) {
            
            $final_array[$key] = $value['id'];
            $i++;
            if ($i>=3) {
                break;
            }
        }

        return $final_array;
    }

    public function topProducts()
    {
        $temp_array=[];

        $items = OrderItem::with('variation')->get();
        // dd($items);

        $temp_array=[];

        foreach ($items as $key => $value) {
            
            if(array_key_exists($value->variation->product->name,$temp_array)){
                $temp_array[$value->variation->product->name]['qty']++;
            }else{
                
                $temp_array[$value->variation->product->name]['qty']=1;
                $temp_array[$value->variation->product->name]['id']=$value->variation->product->id;
            }
            
        }

        arsort($temp_array);

        $final_array = [];

        $i=0;
        foreach ($temp_array as $key => $value) {
            
            $final_array[$key] = $value['id'];
            $i++;
            if ($i>=3) {
                break;
            }
        }

        return $final_array;
    }

    public function render()
    {
        $products = product::where('published',1)->where('on_sale',1)->where('sale_end','>',Carbon::now())->with('category')->with('variations')->take(8)->get();

        $productFeatured = product::where('published',1)->where('featured',1)->with('category')->with('variations')->take(10)->get();

        // $allCategory = category::with('products')->take(12)->get();
        $home_categories = json_decode(HomeCategorySettings::find(1)->categories);
        $allCategory = category::whereIn('id',$home_categories)->with('products')->take(12)->get();
        // dd($allCategory);

        $allAddBanners = AdvertiseBanner:: with('category')->get();

        $allSections = self::sectionsArray(SectionsSetting::all());

        $homeSliders = Homeslider::all();

        $promotions = PromotionSetting:: with('vendors')->get();

        $footer = Footer::find(1);
        $brands_array = json_decode($footer->brands);
        $brands = vendor::whereIn('id',$brands_array)->get();

        $topCategories = self::topCategories();
        $topVendors = self::topVendors();
        $topProducts = self::topProducts();

        $flash_sale = FlashSale::find(1);
        $hot_sale = HotSale::find(1);
        // dd($brands);

        $martHall = product::where('published',1)->where('vendor_id',1)->with('category')->with('variations')->take(10)->get();
        // dd($martHall->count());

        $best_selling_products = best_selling_products(); //helper function

        $new_products = product::where('published',1)->orderBy('created_at','desc')->take(8)->get();
        
        return view('livewire.web.home',compact('products','productFeatured','allCategory','allAddBanners','allSections','homeSliders','promotions','brands','topCategories','topVendors','topProducts','flash_sale','hot_sale','martHall','best_selling_products','new_products'))->layout('web.base.base');
    }
}
