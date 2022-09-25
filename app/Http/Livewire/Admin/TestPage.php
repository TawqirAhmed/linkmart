<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Order;
use App\Models\product;
use App\Models\category;
use App\Models\OrderItem;
use App\Models\variation;
use App\Models\size;
use App\Models\User;
use App\Models\vendor;
use App\Models\UserProfile;
use App\Models\ProductReview;

use App\Models\HotSale;
use App\Models\FlashSale;

use Illuminate\Support\Facades\Storage;
use Cart;
use DB;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
class TestPage extends Component
{
    use WithFileUploads;



    // public $rating = 5, $product_name = 'Teddy Bear Toy', $sku = 'toyteddy420A', $vendor_name = 'Humpty Dumpty Collection';

    public $rating, $product_name = 'Teddy Bear Toy', $sku, $vendor_name, $from = '2022-04-18', $to = '2022-05-31';

    public function randNum()
    {

        $data = ProductReview::with('user','product','reply')
                ->whereBetween('created_at', [$this->from, $this->to])
                ->where(function($query)
                    {
                        $query->where('rating',$this->rating)
                                ->orWhereHas('product', function($query){
                                    $query->where('name',$this->product_name)
                                            ->orWhereHas('vendors', function($query){
                                                $query->where('name',$this->vendor_name);
                                            })
                                            ->orWhereHas('variations', function($query){
                                                $query->where('sku',$this->sku);
                                            });
                                });
                    })
                ->paginate(1);
            
        dd($data);
    }



      
    public function render()
    {

       
        $vendors = vendor::all();

        return view('livewire.admin.test-page',compact('vendors'))->layout('admin.adminbase');
    }
}
