<?php

namespace App\Http\Livewire\Vendor\Review;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\vendor;
use App\Models\ProductReview;
use App\Models\ReviewReply;
use Carbon\Carbon;

use Auth;

class VendorManageReviewComponent extends Component
{
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;

    public $rating, $product_name, $sku, $vendor_name, $from, $to;

    public $searched = 0;

    public $review_id, $replier, $reply;

    public $vendor_shops = [];

    public function getReviews()
    {
        
        $this->searched = 1;
        
    }

    public function Update()
    {


        $data = new ReviewReply();

        $data->product_review_id = $this->review_id;
        $data->replier = $this->replier;
        $data->description = $this->reply;

        $done = $data->save();

        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Reply Posted.']);
        }

        $this->emit('storeSomething');
    }


    public function getItem($id)
    {
        $this->review_id = $id;

        $data = ProductReview::where('id',$id)->with('product')->first();

        $this->replier = $data->product->vendors->name;
        // dd($this->replier);
    }


    public function mount()
    {
        $data = vendor::where('user_id',Auth::id())->get();

        foreach ($data as $key => $value) {
            array_push($this->vendor_shops, $value->id);
        }
    }

    public function render()
    {
        
        if ($this->searched == 1) {
            if ($this->from == null) {
            
                $this->from = '2001-01-01';
            }

            if ($this->to == null) {
                
                $this->to = Carbon::now();
            }
        }


        $allReviews = ProductReview::with('user','product','reply')
                ->where(function($query){
                    
                        $query->whereHas('product', function($query){
                            $query->whereHas('vendors', function($query){
                                    $query->whereIn('id',$this->vendor_shops);
                                });
                        });
                    
                })
                ->whereBetween('created_at', [$this->from, $this->to])
                ->where(function($query){
                    if ($this->rating != null) {
                        $query->where('rating',$this->rating);
                    }
                })
                
                ->where(function($query){
                    if ($this->product_name != null) {
                        $query->whereHas('product', function($query){
                            $query->where('name',$this->product_name);
                        });
                    }
                })

                ->where(function($query){
                    if ($this->sku != null) {
                        $query->whereHas('product', function($query){
                            $query->whereHas('variations', function($query){
                                    $query->where('sku',$this->sku);
                                });
                        });
                    }
                })

                ->where(function($query){
                    if ($this->vendor_name != null) {
                        $query->whereHas('product', function($query){
                            $query->whereHas('vendors', function($query){
                                    $query->where('name',$this->vendor_name);
                                });
                        });
                    }
                })
                ->paginate(10);


        return view('livewire.vendor.review.vendor-manage-review-component',compact('allReviews'))->layout('admin.adminbase');
    }
}
