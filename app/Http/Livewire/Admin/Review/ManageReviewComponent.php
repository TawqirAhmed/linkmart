<?php

namespace App\Http\Livewire\Admin\Review;

use Livewire\Component;
use Livewire\WithPagination;


use App\Models\ProductReview;
use App\Models\ReviewReply;
use Carbon\Carbon;


class ManageReviewComponent extends Component
{
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;

    public $rating, $product_name, $sku, $vendor_name, $from, $to;

    public $searched = 0;

    public $review_id, $reply;

    public function getReviews()
    {
        
        $this->searched = 1;
        
    }

    public function Update()
    {
        $data = new ReviewReply();

        $data->product_review_id = $this->review_id;
        $data->replier = 'LinkMart';
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




        return view('livewire.admin.review.manage-review-component',compact('allReviews'))->layout('admin.adminbase');
    }
}
