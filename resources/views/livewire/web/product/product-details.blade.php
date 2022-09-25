<div>
    
    @push('meta')
        <meta name="description" content="{{ $productInfo->name }}">
        <meta name="keywords" content="{{ $productInfo->tags }}">
    @endpush


    @push('styles')

    <style type="text/css">
       /* #sync1 .item{
            background: #0c83e7;
            padding: 80px 0px;
            margin: 5px;
            color: #FFF;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            text-align: center;
        }
        #sync2 .item{
            background: #C9C9C9;
            padding: 10px 0px;
            margin: 5px;
            color: #FFF;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            text-align: center;
            cursor: pointer;
        }
        #sync2 .item h1{
          font-size: 18px;
        }
        #sync2 .synced .item{
          background: #0c83e7;
        }*/
    </style>

    @endpush

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--start breadcrumb-->
            <section class="py-3 border-bottom d-none d-md-flex">
                <div class="container">
                    <div class="page-breadcrumb d-flex align-items-center">
                        <h3 class="breadcrumb-title pe-3">{{ $productInfo->name }}</h3>
                        <div class="ms-auto">
                            {{-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                                </ol>
                            </nav> --}}
                        </div>
                    </div>
                </div>
            </section>
            <!--end breadcrumb-->
            <!--start product detail-->
            <section class="py-4">
                <div class="container">
                    <div class="product-detail-card">
                        <div class="product-detail-body">
                            <div class="row g-0">


                               <div class="col-12 col-lg-5" wire:ignore>
                                <div class="image-zoom-section">
                                    <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                        <div class="item">
                                            <img src="{{ asset('') }}uploads/products/{{ $productInfo->name }}/{{ $productInfo->image }}" class="img-fluid" alt="">
                                        </div>

                                        @php
                                            $imagenames = explode(",", $productInfo->images);
                                        @endphp

                                        @foreach($imagenames as $imgname)
                                            @if($imgname)
                                                <div class="item">
                                                    <img src="{{ asset('') }}uploads/products/{{ $productInfo->name }}/{{ $imgname }}" class="img-fluid" alt="">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                        <button class="owl-thumb-item">
                                            <img src="{{ asset('') }}uploads/products/{{ $productInfo->name }}/{{ $productInfo->image }}" class="" alt="">
                                        </button>

                                        @foreach($imagenames as $imgname)
                                            @if($imgname)
                                                <button class="owl-thumb-item">
                                                    <img src="{{ asset('') }}uploads/products/{{ $productInfo->name }}/{{ $imgname }}" class="" alt="">
                                                </button>
                                            @endif
                                        @endforeach
                                        


                                    </div>
                                </div>
                            </div> 
                                





                                <div class="col-12 col-lg-7">
                                    <div class="product-info-section p-3">
                                        <h3 class="mt-3 mt-lg-0 mb-0">{{ $productInfo->name }}</h3>
                                        <div class="product-rating d-flex align-items-center mt-2">

                                            @if($avg_rating)
                                            <div class="rates cursor-pointer font-13"> 
                                                <p style="font-size: 200%">{{ $avg_rating }} <i class="bx bxs-star text-warning"></i></p> 
                                                
                                            </div>
                                            <div class="ms-1">
                                                <p class="mb-0">({{ $productReviews->count() }} Ratings)</p>
                                            </div>
                                            @else
                                                <p style="font-size: 200%"> Product Not Yet Rated. </p>
                                            @endif

                                        </div>
                                        @if($productInfo->on_sale == 1 && $productInfo->sale_end > Carbon\Carbon::now())
                                            <div class="d-flex align-items-center mt-3 gap-2">
                                                <h5 class="mb-0 text-decoration-line-through text-light-3">৳{{ $productInfo->unit_price }}</h5>
                                                <h4 class="mb-0">৳{{ $productInfo->sale_price }}</h4>
                                            </div>
                                        @elseif($productInfo->on_sale == 1 && $productInfo->hot_sale == 1 && $hot_sale->sale_end_date > Carbon\Carbon::now())
                                            <div class="d-flex align-items-center mt-3 gap-2">
                                                <h5 class="mb-0 text-decoration-line-through text-light-3">৳{{ $productInfo->unit_price }}</h5>
                                                <h4 class="mb-0">৳{{ $productInfo->sale_price }}</h4>
                                            </div>
                                        @elseif($productInfo->on_sale == 1 && $productInfo->flash_sale == 1 && $flash_sale->sale_end_date > Carbon\Carbon::now())
                                            <div class="d-flex align-items-center mt-3 gap-2">
                                                <h5 class="mb-0 text-decoration-line-through text-light-3">৳{{ $productInfo->unit_price }}</h5>
                                                <h4 class="mb-0">৳{{ $productInfo->sale_price }}</h4>
                                            </div>
                                        @else
                                            <div class="d-flex align-items-center mt-3 gap-2">
                                                
                                                <h4 class="mb-0">৳{{ $productInfo->unit_price }}</h4>
                                            </div>
                                        @endif

                                        <dl class="row mt-3">   
                                            <h6 class="col-sm-3">Shop: </h6>
                                            <dd class="col-sm-9"><a href="{{ route('web.vendor_products',['key'=>$productInfo->vendors->id]) }}">{{ $productInfo->vendors->name }}</a></dd>  
                                        </dl>

                                        <dl class="row mt-3">   
                                            <h6 class="col-sm-3">Brand: </h6>
                                            <dd class="col-sm-9"><a href="{{ route('web.brand_products',['key'=>$productInfo->brand->id]) }}">{{ $productInfo->brand->name ?? '--'}}</a></dd>  
                                        </dl>

                                        <div class="mt-3">
                                            {{-- <h6>Discription :</h6>
                                            <p class="mb-0">{!! $productInfo->description !!}</p> --}}
                                        </div>
                                        
                                        <div class="row row-cols-auto align-items-center mt-3">
                                            <div class="col-4">
                                                <label class="form-label">Quantity</label>

                                                <div class="d-flex gap-2 justify-content-center justify-content-lg-end">

                                                <a wire:click="decreaseQty()" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-minus me-0'></i></a>

                                                <input type="number" class="form-control rounded-0" name="priduct_quantity" wire:model="product_quantity" readonly>

                                                <a wire:click.prevent="increaseQty()" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-plus me-0'></i></a>

                                                </div>

                                            </div>

                                            @if($productInfo->variations->count() > 1)
                                                @if($size_variations->count() > 1)

                                                <div class="col">
                                                    <label class="form-label">Size</label>
                                                    <select class="form-select form-select-sm" wire:model="product_size">
                                                        <option value="">Select</option>
                                                        @foreach($size_variations as $key=>$value)
                                                            <option value="{{ $value->size_id }}">{{ $value->size->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                    @if(!$size_variations->isEmpty())
                                                    <div class="col">
                                                        <label class="form-label">Color</label>
                                                        <select class="form-select form-select-sm" wire:model="product_color">
                                                            <option value="">Select</option>
                                                            @foreach($color_variations as $key=>$value)

                                                                @php
                                                                    $hex = DB::table('colors')->where('id',$value->color_id)->first();
                                                                @endphp

                                                                <option value="{{ $value->color_id }}">{{ $value->color->name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    @endif

                                                @elseif($color_variations->count() > 0)

                                                    

                                                    <div class="col">
                                                        <label class="form-label">Color</label>
                                                        <select class="form-select form-select-sm" wire:model="product_color">
                                                            <option value="">Select</option>
                                                            @foreach($color_variations as $key=>$value)
                                                                @if($value->color != null)
                                                                <option value="{{ $value->color_id }}">{{ $value->color->name }}</option>
                                                                @endif
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                @endif
                                            @else
                                            
                                            @endif

                                        </div>
                                        <!--end row-->
                                        <div class="d-flex gap-2 mt-3">

                                            <a class="btn btn-white btn-ecomm" wire:click.prevent="addToCart()"> <i class="bx bxs-cart-add"></i>Add to Cart</a> 
                                            <a class="btn btn-light btn-ecomm" wire:click.prevent="addToWishlist()"><i class="bx bx-heart"></i>Add to Wishlist</a>
                                        </div>
                                        {{-- <hr/>
                                        <div class="product-sharing">
                                            <ul class="list-inline">
                                                <li class="list-inline-item"> <a href="javascript:;"><i class='bx bxl-facebook'></i></a>
                                                </li>
                                                <li class="list-inline-item">   <a href="javascript:;"><i class='bx bxl-linkedin'></i></a>
                                                </li>
                                                <li class="list-inline-item">   <a href="javascript:;"><i class='bx bxl-twitter'></i></a>
                                                </li>
                                                <li class="list-inline-item">   <a href="javascript:;"><i class='bx bxl-instagram'></i></a>
                                                </li>
                                                <li class="list-inline-item">   <a href="javascript:;"><i class='bx bxl-google'></i></a>
                                                </li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </section>
            <!--end product detail-->



            

            <!--start product more info-->
            <section class="py-4">
                <div class="container">
                    <div class="product-more-info">
                        <ul class="nav nav-tabs mb-0" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#discription" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-title text-uppercase fw-500">Description</div>
                                    </div>
                                </a>
                            </li>
                            {{-- <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#more-info" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-title text-uppercase fw-500">More Info</div>
                                    </div>
                                </a>
                            </li> --}}
                            {{-- <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#tags" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-title text-uppercase fw-500">Tags</div>
                                    </div>
                                </a>
                            </li> --}}
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#reviews" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-title text-uppercase fw-500">({{ $productReviews->count() }}) Reviews</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content pt-3">
                            <div class="tab-pane fade show active" id="discription" role="tabpanel">
                                {!! $productInfo->description !!}
                            </div>
                            {{-- <div class="tab-pane fade" id="more-info" role="tabpanel">
                                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                            </div> --}}
                            <div class="tab-pane fade" id="tags" role="tabpanel">
                                <div class="tags-box w-50"> 



                                    @foreach($product_tags as $key=>$value)
                                        <a href="{{ route('web.searched_products' ,['key'=>$value]) }}" class="tag-link">{{ $value }}</a>
                                    @endforeach

                                    {{-- <a href="javascript:;" class="tag-link">Cloths</a> --}}
                                    
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <div class="row">
                                    <div class="col col-lg-12">
                                        @if($productReviews->count() > 0)
                                        <div class="product-review">
                                            <h5 class="mb-4">{{ $productReviews->count() }} Reviews For The Product</h5>
                                            <div class="review-list">

                                                @foreach($productReviews as $key=>$value)
                                                <div class="d-flex align-items-start">
                                                    {{-- <div class="review-user">
                                                        <img src="assets/images/avatars/avatar-1.png" width="65" height="65" class="rounded-circle" alt="" />
                                                    </div> --}}
                                                    <div class="review-content ms-3">
                                                        <div class="rates cursor-pointer fs-6"> 


                                                            @for ($i = 1; $i <= 5; $i++)
                                                                
                                                                @if($value->rating < $i)
                                                                <i class="bx bxs-star text-light-4"></i>
                                                                @else
                                                                <i class="bx bxs-star text-white"></i>
                                                                @endif
                                                            @endfor
                                                            

                                                        </div>
                                                        <div >
                                                            <h6 class="mb-0">{{ $value->user->name }}</h6>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <p class="mb-0" style="text-align: right;">{{ $value->created_at }}</p>
                                                        </div>
                                                        <p>{{ $value->description }}</p>
                                                    </div>

                                                </div>

                                                @foreach ($value->reply as $key=>$reply)
                                                    <div style="padding-left: 50px;">
                                                        <div >
                                                            <h6 class="mb-0">{{ $reply->replier }}</h6>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <p class="mb-0" style="text-align: right;">{{ $reply->created_at }}</p>
                                                        </div>
                                                        <p>{{ $reply->description }}</p>
                                                    </div>    
                                                @endforeach
                                                <hr/>
                                                @endforeach

                                            </div>
                                        </div>

                                        @else

                                            <h1>Product Not Yet Rated.</h1>

                                        @endif

                                    </div>
                                    {{-- <div class="col col-lg-4">
                                        <div class="add-review bg-dark-1">
                                            <div class="form-body p-3">
                                                <h4 class="mb-4">Write a Review</h4>
                                                <div class="mb-3">
                                                    <label class="form-label">Your Name</label>
                                                    <input type="text" class="form-control rounded-0">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Your Email</label>
                                                    <input type="text" class="form-control rounded-0">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Rating</label>
                                                    <select class="form-select rounded-0">
                                                        <option selected>Choose Rating</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="3">4</option>
                                                        <option value="3">5</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Example textarea</label>
                                                    <textarea class="form-control rounded-0" rows="3"></textarea>
                                                </div>
                                                <div class="d-grid">
                                                    <button type="button" class="btn btn-light btn-ecomm">Submit a Review</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <!--end row-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--end product more info-->
            <!--start similar products-->
            <section class="py-4">
                <div class="container">
                    <div class="d-flex align-items-center">
                        <h5 class="text-uppercase mb-0">Similar Products</h5>
                        {{-- <div class="d-flex align-items-center gap-0 ms-auto">   <a href="javascript:;" class="owl_prev_item fs-2"><i class='bx bx-chevron-left'></i></a>
                            <a href="javascript:;" class="owl_next_item fs-2"><i class='bx bx-chevron-right'></i></a>
                        </div> --}}
                    </div>
                    <hr/>
                    <div class="product-grid" wire:ignore>
                        <div class="similar-products owl-carousel owl-theme">
                            @foreach($similarProduct as $key=>$prods)

                                @if($prods->published == 1)

                                    <div class="item">
                                        <div class="card rounded-0 product-card">
                                            <div class="card-header bg-transparent border-bottom-0">
                                                <div class="d-flex align-items-center justify-content-end">
                                                    {{-- <a href="javascript:;">
                                                        <div class="product-wishlist"> <i class='bx bx-heart'></i>
                                                        </div>
                                                    </a> --}}
                                                </div>
                                            </div>
                                            <a href="{{ route('product_details' ,['id'=>$prods->id]) }}">
                                                <img src="{{ asset('') }}uploads/products/{{ $prods->name }}/{{ $prods->image }}" class="card-img-top" alt="...">
                                            </a>
                                            <div class="card-body">
                                                <div class="product-info">
                                                    <a href="javascript:;">
                                                        <p class="product-catergory font-13 mb-1">{{ $prods->category->name }}</p>
                                                    </a>
                                                    <a href="javascript:;">
                                                        <h6 class="product-name mb-2">{{ $prods->name }}</h6>
                                                    </a>
                                                    <div class="d-flex align-items-center">
                                                        <div class="mb-1 product-price"> 
                                                            @if($prods->on_sale == 1 && $prods->sale_end > Carbon\Carbon::now())
                                                                <div class="mb-1 product-price"> 
                                                                    <span class="me-1 text-decoration-line-through">৳{{ $prods->unit_price }}</span>
                                                                    <span class="text-white fs-5">৳{{ $prods->sale_price }}</span>
                                                                </div>
                                                            @elseif($prods->on_sale == 1  && $prods->hot_sale == 1 && $hot_sale->sale_end_date > Carbon\Carbon::now())
                                                                <div class="mb-1 product-price"> 
                                                                    <span class="me-1 text-decoration-line-through">৳{{ $prods->unit_price }}</span>
                                                                    <span class="text-white fs-5">৳{{ $prods->sale_price }}</span>
                                                                </div>
                                                            @elseif($prods->on_sale == 1  && $prods->flash_sale == 1 && $flash_sale->sale_end_date > Carbon\Carbon::now())
                                                                <div class="mb-1 product-price"> 
                                                                    <span class="me-1 text-decoration-line-through">৳{{ $prods->unit_price }}</span>
                                                                    <span class="text-white fs-5">৳{{ $prods->sale_price }}</span>
                                                                </div>
                                                            @else
                                                                <div class="mb-1 product-price"> 
                                                                    <span class="text-white fs-5">৳{{ $prods->unit_price }}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="cursor-pointer ms-auto">    
                                                            @if(avg_rating($prods->id) != null)    
                                                                <span>{{ avg_rating($prods->id) }}</span>  <i class="bx bxs-star text-white"></i>
                                                            @else
                                                                <p>No Rating</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="product-action mt-2">
                                                        {{-- <div class="d-grid gap-2">
                                                            <a href="javascript:;" class="btn btn-light btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a> 

                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                @endif

                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <!--end similar products-->
        </div>
    </div>
    <!--end page wrapper -->




    @push('scripts')


    <script src="{{ asset('assets/js/product-details.js') }}"></script>


        <script type="text/javascript">
        
            // $(document).ready(function(){
              $(".main-product").owlCarousel({
                loop:true,
                items: 1
              });
            
            $('.similar-products').owlCarousel({
                // loop:true,
                margin:10,
                // nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            });

        </script>
    @endpush


</div>
