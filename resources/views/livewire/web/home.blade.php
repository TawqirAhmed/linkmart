<div>

    {{-- <section class="py-3">
        <div class="container">

            <div class="row">

                <div class="col-md-6">
                    <section class="py-3">
                        <div class="p-3 bg-dark-1" style="background-image: url(uploads/background/service.jpeg);background-repeat: no-repeat; background-size: cover;">
                        
                        
                            <div class="phone mb-3">

                                <div class="d-flex align-items-center">
                                    <h5 class="text-uppercase mb-0">Services</h5>
                                    
                                    <a href="/service" class="btn btn-light ms-auto rounded-0">View All<i class="bx bx-chevron-right"></i></a>
                                </div>
                                <hr>
                                <div class="card rounded-0 product-card">
                            
                                <div class="list-group list-group-flush">

                                     
                                    <a href="/service#top_deals" class="list-group-item bg-transparent d-flex justify-content-between align-items-center">
                                        Top Deals
                                    </a>
                                    <a href="/service#best_deals" class="list-group-item bg-transparent d-flex justify-content-between align-items-center">
                                        Best Deals
                                    </a>
                                    <a href="/service#featured_deals" class="list-group-item bg-transparent d-flex justify-content-between align-items-center">
                                        Featured Deals
                                    </a> 
                                                                        
                                </div>
                                
                            </div>
                            
                            
                        </div>
                    </section>

                </div>

                <div class="col-md-6">

                    <section class="py-3">
                        <div class="p-3 bg-dark-1" style="background-image: url(uploads/background/products.jpeg);background-repeat: no-repeat; background-size: cover;">
                        
                        
                            <div class="phone mb-3">
                                <div class="d-flex align-items-center">
                                    <h5 class="text-uppercase mb-0">Top Products</h5>
                                    
                                    <a href="/top_products" class="btn btn-light ms-auto rounded-0">Shop Now<i class="bx bx-chevron-right"></i></a>
                                </div>
                                <hr>
                                <div class="card rounded-0 product-card">
                            
                                <div class="list-group list-group-flush">

                                    @foreach ($topProducts as $key=>$value)
                                        <a href="{{ route('product_details' ,['id'=>$value]) }}" class="list-group-item bg-transparent d-flex justify-content-between align-items-center">
                                            {{ $key }}
                                        </a>  
                                    @endforeach 
                                                                       
                                </div>
                                
                            </div>
                            
                            
                        </div>
                    </section>

                </div>

            </div>
        </div>
    </section> --}}



    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    
                        <div class="card rounded-0 product-card"></div>
                        {{-- <div class="card rounded-0 product-card"></div> --}}
                    
                        {{-- <div class="card rounded-0 product-card">
                            
                            <div class="list-group list-group-flush">
                                <a href="javascript:;" class="list-group-item bg-transparent">
                                    <h6 class="mb-0 text-uppercase">Top Categories</h6>
                                </a> 

                                @foreach ($topCategories as $key=>$value)
                                    <a href="{{ route('web.single_category',['id'=>$value]) }}" class="list-group-item bg-transparent d-flex justify-content-between align-items-center">
                                        {{ $key }}
                                    </a>
                                @endforeach   
                                
                            </div>

                        </div> --}}    

                        <div class="card rounded-0 product-card" style="background-color:#416a59;">
                            
                             <div class="list-group list-group-flush">
                                
                                <div class="list-group-item bg-transparent">
                                    <a class="text-uppercase mb-0" style="font-size: 1.2rem;">Services</a>
                                    
                                    <a href="/service" class="btn btn-light ms-auto rounded-0" style="float:right;">View All<i class="bx bx-chevron-right"></i></a>
                                </div>
                                {{-- <a href="javascript:;" class="list-group-item bg-transparent">
                                    <h6 class="mb-0 text-uppercase">Services</h6>
                                </a> --}} 
                                {{-- <a href="/service" class="btn btn-light ms-auto rounded-0">View All<i class="bx bx-chevron-right"></i></a> --}}
                                
                                   

                                <a href="/service#top_deals" class="list-group-item bg-transparent d-flex justify-content-between align-items-center">
                                    Top Deals
                                </a>
                                <a href="/service#best_deals" class="list-group-item bg-transparent d-flex justify-content-between align-items-center">
                                    Best Deals
                                </a>
                                <a href="/service#featured_deals" class="list-group-item bg-transparent d-flex justify-content-between align-items-center">
                                    Featured Deals
                                </a>
                                
                            </div>

                        </div>                

                    
                        {{-- <div class="card rounded-0 product-card">
                            
                            <div class="list-group list-group-flush">
                                <a href="javascript:;" class="list-group-item bg-transparent">
                                    <h6 class="mb-0 text-uppercase">Top Brands</h6>
                                </a>    

                                @foreach ($topVendors as $key=>$value)
                                    <a href="{{ route('web.vendor_products',['key'=>$value]) }}" class="list-group-item bg-transparent d-flex justify-content-between align-items-center">
                                        {{ $key }}
                                    </a>
                                @endforeach 
                                
                            </div>

                        </div> --}}

                        <div class="card rounded-0 product-card" style="background-color:#39395f;">
                            
                             <div class="list-group list-group-flush">
                                
                                <div class="list-group-item bg-transparent">
                                    <a class="text-uppercase mb-0" style="font-size: 1.2rem;">Top Products</a>
                                    
                                    <a href="/top_products" class="btn btn-light ms-auto rounded-0" style="float:right;">View All<i class="bx bx-chevron-right"></i></a>
                                </div>
                                

                                @foreach ($topProducts as $key=>$value)
                                    <a href="{{ route('product_details' ,['id'=>$value]) }}" class="list-group-item bg-transparent d-flex justify-content-between align-items-center">
                                        {{ $key }}
                                    </a>  
                                @endforeach
                            </div>

                        </div> 
                    

                </div>

                <!--start slider section-->
                <div class="col-md-8">
                    <section class="slider-section">
                        <div class="first-slider">
                            <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
                                <ol class="carousel-indicators">
                                    
                                    {{-- <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
                                    <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li> --}}
                                    @foreach($homeSliders as $key=>$value)
                                    @if($key == 0)
                                        <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
                                    @else
                                        <li data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $key }}"></li>
                                    @endif
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">

                                    @foreach($homeSliders as $key=>$value)
                                        @if($key == 0)

                                            <div class="carousel-item active">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col d-none d-lg-flex justify-content-center">
                                                        <div class="">
                                                            <h3 class="h3 fw-light">{{ $value->line_one }}</h3>
                                                            <h1 class="h1">{{ $value->line_two }}</h1>
                                                            <p class="pb-3">{{ $value->line_three }}</p>
                                                            <div class=""> 
                                                                <a class="btn btn-white btn-ecomm" href="{{ route('web.searched_products',['key'=>$value->tags]) }}">Shop Now <i class='bx bx-chevron-right'></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <img src="{{ asset('') }}uploads/homesliders/{{ $value->image }}" class="img-fluid" alt="...">
                                                    </div>
                                                </div>
                                            </div>


                                        @else
                                            <div class="carousel-item">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col d-none d-lg-flex justify-content-center">
                                                        <div class="">
                                                            <h3 class="h3 fw-light">{{ $value->line_one }}</h3>
                                                            <h1 class="h1">{{ $value->line_two }}</h1>
                                                            <p class="pb-3">{{ $value->line_three }}</p>
                                                            <div class=""> 
                                                                <a class="btn btn-white btn-ecomm" href="{{ route('web.searched_products',['key'=>$value->tags]) }}">Shop Now <i class='bx bx-chevron-right'></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <img src="{{ asset('') }}uploads/homesliders/{{ $value->image }}" class="img-fluid" alt="...">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                                {{-- <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a> --}}
                            </div>
                        </div>
                    </section>
                </div>
                <!--end slider section-->
            </div>
        </div>
    </section>
    
    
    
    <section class="py-3">
        <div class="container">

            <div class="row">

                <div class="col-md-6">
                    <section class="py-3">
                        

                        @if($hot_sale->status == 1 && Carbon\Carbon::parse($hot_sale->sale_end_date) > Carbon\Carbon::now())
                            
                                <div class="p-3 bg-dark-1" style="background-image: url(uploads/background/{{ $hot_sale->image }});background-repeat: no-repeat; background-size: cover;border: 2px solid;">
                                    
                                    
                                    <div class="phone mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="mercado-countdown text-uppercase mb-0" data-expire="{{ Carbon\Carbon::parse($hot_sale->sale_end_date)->format('Y/m/d H:i:s') }}"></div>
                                            
                                            <a href="{{ route('web.hotsale_products') }}" class="btn btn-light ms-auto rounded-0">Shop Now<i class="bx bx-chevron-right"></i></a>
                                        </div>
                                        {{-- <hr> --}}
                                        {{-- Hot Sale --}}
                                        <p class="mb-0 text-uppercase text-white">Hot Sale</p>
                                        {{-- <p class="mb-0 font-13">Toll Free (123) 472-796</p>
                                        <p class="mb-0 font-13">Mobile : +91-9910XXXX</p> --}}
                                        {{-- <br><br><br><br><br><br> --}}
                                    </div>
                                    
                                </div>
                            
                        @endif

                        
                    </section>

                </div>

                <div class="col-md-6">

                    <section class="py-3">
                        

                        @if($flash_sale->status == 1 && Carbon\Carbon::parse($flash_sale->sale_end_date) > Carbon\Carbon::now())
                            
                            <div class="p-3 bg-dark-1" style="background-image: url(uploads/background/{{ $flash_sale->image }});background-repeat: no-repeat; background-size: cover;border: 2px solid;">
                                
                                
                                <div class="phone mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="mercado-countdown text-uppercase mb-0" data-expire="{{ Carbon\Carbon::parse($flash_sale->sale_end_date)->format('Y/m/d H:i:s') }}"></div>

                                        <a href="{{ route('web.flashsale_products') }}" class="btn btn-light ms-auto rounded-0">Shop Now<i class="bx bx-chevron-right"></i></a>
                                    </div>
                                    {{-- <hr> --}}
                                    {{-- Flash Sale --}}
                                    <p class="mb-0 text-uppercase text-white">Flash Sale</p>
                                    {{-- <p class="mb-0 font-13">Toll Free (123) 472-796</p>
                                    <p class="mb-0 font-13">Mobile : +91-9910XXXX</p> --}}
                                    {{-- <br><br><br><br><br><br> --}}
                                </div>
                                
                                
                            </div>
                            
                        @endif

                        
                    </section>

                </div>

            </div>

        </div>
    </section>

    @if($allSections[5] == 1)
    <!--start categories-->
    <section class="py-4">
        <div class="container">
            <div class="d-flex align-items-center">
                <h5 class="text-uppercase mb-0">Browse Catergory</h5>
                <a href="{{ route('web.product_categories') }}" class="btn btn-light ms-auto rounded-0">View All<i class='bx bx-chevron-right'></i></a>
            </div>
            <hr/>
            <div class="product-grid">
                <div class="browse-category owl-carousel owl-theme">

                    @foreach($allCategory as $key=>$cats)

                        @if($key < 6)
                        <div class="item">
                            <a href="{{ route('web.single_category',['id'=>$cats->id]) }}">
                                <div class="card rounded-0 product-card border">
                                    <div class="card-body">
                                        <img src="{{ asset('') }}uploads/categories/{{ $cats->name }}/{{ $cats->image }}" class="img-fluid" alt="...">
                                    </div>
                                    <div class="card-footer text-center">
                                        <h6 class="mb-1 text-uppercase">{{ $cats->name }}</h6>

                                        @php
                                            $product_count = $cats->products->count();
                                        @endphp

                                        <p class="mb-0 font-12 text-uppercase">{{ $product_count }} Products</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        @endif

                    @endforeach

                </div>
                <br>
                <div class="browse-category owl-carousel owl-theme">

                    @foreach($allCategory as $key=>$cats)

                        @if($key >= 6)
                        <div class="item">
                            <a href="{{ route('web.single_category',['id'=>$cats->id]) }}">
                                <div class="card rounded-0 product-card border">
                                    <div class="card-body">
                                        <img src="{{ asset('') }}uploads/categories/{{ $cats->name }}/{{ $cats->image }}" class="img-fluid" alt="...">
                                    </div>
                                    <div class="card-footer text-center">
                                        <h6 class="mb-1 text-uppercase">{{ $cats->name }}</h6>

                                        @php
                                            $product_count = $cats->products->count();
                                        @endphp

                                        <p class="mb-0 font-12 text-uppercase">{{ $product_count }} Products</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        @endif

                    @endforeach

                </div>

            </div>
        </div>
    </section>
    <!--end categories-->
    @endif



    @if($allSections[0] == 1)
    <!--start information-->
    {{-- <section class="py-3 border-top border-bottom">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-3 row-group align-items-center">
                <div class="col p-3">
                    <div class="d-flex align-items-center">
                        <div class="fs-1 text-white">   <i class='bx bx-taxi'></i>
                        </div>
                        <div class="info-box-content ps-3">
                            <h6 class="mb-0">FREE SHIPPING &amp; RETURN</h6>
                            <p class="mb-0">Free shipping on all orders over $49</p>
                        </div>
                    </div>
                </div>
                <div class="col p-3">
                    <div class="d-flex align-items-center">
                        <div class="fs-1 text-white">   <i class='bx bx-dollar-circle'></i>
                        </div>
                        <div class="info-box-content ps-3">
                            <h6 class="mb-0">MONEY BACK GUARANTEE</h6>
                            <p class="mb-0">100% money back guarantee</p>
                        </div>
                    </div>
                </div>
                <div class="col p-3">
                    <div class="d-flex align-items-center">
                        <div class="fs-1 text-white">   <i class='bx bx-support'></i>
                        </div>
                        <div class="info-box-content ps-3">
                            <h6 class="mb-0">ONLINE SUPPORT 24/7</h6>
                            <p class="mb-0">Awesome Support for 24/7 Days</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </section>
 --}}    <!--end information-->
    @endif


    @if($allSections[1] == 1)
    <!--start pramotion-->
    {{-- <section class="py-4">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">

                @foreach($promotions as $key=>$value)
                    @if($value->published == 1)
                        <div class="col">
                            <div class="card rounded-0">
                                <div class="row g-0 align-items-center">
                                    <div class="col">
                                        <img src="{{ asset('') }}uploads/vendors/{{ $value->vendors->image }}" class="img-fluid" alt="" />
                                    </div>
                                    <div class="col">
                                        <div class="card-body">
                                            <h5 class="card-title text-uppercase">{{ $value->vendors->name }}</h5>
                                            <p class="card-text text-uppercase">{{ $value->note }}</p>  <a href="{{ route('web.vendor_products',['key'=>$value->vendors->id]) }}" class="btn btn-light btn-ecomm">SHOP NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
            <!--end row-->
        </div>
    </section> --}}
    <!--end pramotion-->
    @endif




    @if($products->count() > 0 )
    @if($allSections[2] == 1)
    <!--start On Sale product-->
    <section class="py-4">
        <div class="container">
            <div class="d-flex align-items-center">
                <h5 class="text-uppercase mb-0">On Sale</h5>
                <a href="{{ route('web.onsale_products') }}" class="btn btn-light ms-auto rounded-0">More Products<i class='bx bx-chevron-right'></i></a>
            </div>
            <hr/>
            <div class="product-grid">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

                    @foreach($products as $key=>$prod)
                        @if($prod->on_sale ==1 && $prod->sale_end > Carbon\Carbon::now())

                            <div class="col">
                                <div class="card rounded-0 product-card">
                                    <div class="card-header bg-transparent border-bottom-0">
                                        {{-- <div class="d-flex align-items-center justify-content-end gap-3">
                                            <a href="javascript:;">
                                                <div class="product-compare"><span><i class='bx bx-git-compare'></i> Compare</span>
                                                </div>
                                            </a>
                                            <a href="javascript:;">
                                                <div class="product-wishlist"> <i class='bx bx-heart'></i>
                                                </div>
                                            </a>
                                        </div> --}}
                                    </div>
                                    <a href="{{ route('product_details' ,['id'=>$prod->id]) }}">
                                        <img src="uploads/products/{{ $prod->name }}/{{ $prod->image }}" class="card-img-top" alt="{{ $prod->name }}">
                                    </a>
                                    <div class="card-body">
                                        <div class="product-info">
                                            <a href="{{ route('web.single_category',['id'=>$prod->category->id]) }}">
                                                <p class="product-catergory font-13 mb-1">{{ $prod->category->name }}</p>
                                            </a>
                                            <a href="{{ route('product_details' ,['id'=>$prod->id]) }}">
                                                <h6 class="product-name mb-2">{{ $prod->name }}</h6>
                                            </a>
                                            <div class="d-flex align-items-center">

                                                @if($prod->on_sale == 1 && $prod->sale_end > Carbon\Carbon::now())
                                                <div class="mb-1 product-price">    <span class="me-1 text-decoration-line-through">৳{{ $prod->unit_price }}</span>
                                                    <span class="text-white fs-5">৳{{ $prod->sale_price }}</span>
                                                </div>
                                                @else
                                                    <div class="mb-1 product-price"> 
                                                        <span class="text-white fs-5">৳{{ $prod->unit_price }}</span>
                                                </div>
                                                @endif

                                                <div class="cursor-pointer ms-auto">    
                                                    @if(avg_rating($prod->id) != null)    
                                                        <span>{{ avg_rating($prod->id) }}</span>  <i class="bx bxs-star text-white"></i>
                                                    @else
                                                        <p>No Rating</p>
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- <div class="product-action mt-2">
                                                <div class="d-grid gap-2">
                                                    <a href="javascript:;" class="btn btn-light btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a>  
                                                    <a wire:click="getInfo('{{ $prod->id }}')" class="btn btn-link btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class='bx bx-zoom-in'></i>Quick View</a>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
                    @endforeach

                </div>
                <!--end row-->
            </div>
        </div>
    </section>
    <!--end On Sale product-->
    @endif
    @endif


    @if($allSections[3] == 1)
    <!--start FEATURED PRODUCTS-->
    <section class="py-4">
        <div class="container">
            <div class="d-flex align-items-center">
                <h5 class="text-uppercase mb-0">FEATURED PRODUCTS</h5>
                <a href="{{ route('web.featured_products') }}" class="btn btn-light ms-auto rounded-0">View All<i class='bx bx-chevron-right'></i></a>
            </div>
            <hr/>
            <div class="product-grid">
                <div class="new-arrivals owl-carousel owl-theme">
                    
                    @foreach($productFeatured as $key=>$prodf)
                    <div class="item">
                        <div class="card rounded-0 product-card">
                            <div class="card-header bg-transparent border-bottom-0">
                                {{-- <div class="d-flex align-items-center justify-content-end">
                                    <a href="javascript:;">
                                        <div class="product-wishlist"> <i class='bx bx-heart'></i>
                                        </div>
                                    </a>
                                </div> --}}
                            </div>
                            <a href="{{ route('product_details' ,['id'=>$prodf->id]) }}">
                                <img src="uploads/products/{{ $prodf->name }}/{{ $prodf->image }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <div class="product-info">
                                    <a href="{{ route('web.single_category',['id'=>$prodf->category->id]) }}">
                                        <p class="product-catergory font-13 mb-1">{{ $prodf->category->name }}</p>
                                    </a>
                                    <a href="{{ route('product_details' ,['id'=>$prodf->id]) }}">
                                        <h6 class="product-name mb-2">{{ $prodf->name }}</h6>
                                    </a>
                                    <div class="d-flex align-items-center">
                                        @if($prodf->on_sale == 1 && $prodf->sale_end > Carbon\Carbon::now())
                                            <div class="mb-1 product-price"> 
                                                <span class="me-1 text-decoration-line-through">৳{{ $prodf->unit_price }}</span>
                                                <span class="text-white fs-5">৳{{ $prodf->sale_price }}</span>
                                            </div>
                                        @elseif($prodf->on_sale == 1  && $prodf->hot_sale == 1 && $hot_sale->sale_end_date > Carbon\Carbon::now())
                                            <div class="mb-1 product-price"> 
                                                <span class="me-1 text-decoration-line-through">৳{{ $prodf->unit_price }}</span>
                                                <span class="text-white fs-5">৳{{ $prodf->sale_price }}</span>
                                            </div>
                                        @elseif($prodf->on_sale == 1  && $prodf->flash_sale == 1 && $flash_sale->sale_end_date > Carbon\Carbon::now())
                                            <div class="mb-1 product-price"> 
                                                <span class="me-1 text-decoration-line-through">৳{{ $prodf->unit_price }}</span>
                                                <span class="text-white fs-5">৳{{ $prodf->sale_price }}</span>
                                            </div>
                                        @else
                                            <div class="mb-1 product-price"> 
                                                <span class="text-white fs-5">৳{{ $prodf->unit_price }}</span>
                                            </div>
                                        @endif
                                        <div class="cursor-pointer ms-auto">

                                        @if(avg_rating($prodf->id) != null)    
                                            <span>{{ avg_rating($prodf->id) }}</span>  <i class="bx bxs-star text-white"></i>
                                        @else
                                            <p>No Rating</p>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="product-action mt-2">
                                        <div class="d-grid gap-2">
                                            {{-- <a href="javascript:;" class="btn btn-light btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a> 
                                            <a href="javascript:;" class="btn btn-link btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class='bx bx-zoom-in'></i>Quick View</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!--end FEATURED PRODUCTS-->
    @endif

    <!--start Mart Hall-->
    @if($martHall->count() > 0)

    <section class="py-4">
        <div class="container">
            <div class="d-flex align-items-center">
                <h5 class="text-uppercase mb-0">Mart Hall</h5>
                <a href="{{ route('web.vendor_products',['key'=>1]) }}" class="btn btn-light ms-auto rounded-0">View All<i class='bx bx-chevron-right'></i></a>
            </div>
            <hr/>
            <div class="product-grid">
                <div class="mart-hall owl-carousel owl-theme">
                    
                    @foreach($martHall as $key=>$prodf)
                    <div class="item">
                        <div class="card rounded-0 product-card">
                            <div class="card-header bg-transparent border-bottom-0">
                                {{-- <div class="d-flex align-items-center justify-content-end">
                                    <a href="javascript:;">
                                        <div class="product-wishlist"> <i class='bx bx-heart'></i>
                                        </div>
                                    </a>
                                </div> --}}
                            </div>
                            <a href="{{ route('product_details' ,['id'=>$prodf->id]) }}">
                                <img src="uploads/products/{{ $prodf->name }}/{{ $prodf->image }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <div class="product-info">
                                    <a href="{{ route('web.single_category',['id'=>$prodf->category->id]) }}">
                                        <p class="product-catergory font-13 mb-1">{{ $prodf->category->name }}</p>
                                    </a>
                                    <a href="{{ route('product_details' ,['id'=>$prodf->id]) }}">
                                        <h6 class="product-name mb-2">{{ $prodf->name }}</h6>
                                    </a>
                                    <div class="d-flex align-items-center">
                                        @if($prodf->on_sale == 1 && $prodf->sale_end > Carbon\Carbon::now())
                                            <div class="mb-1 product-price"> 
                                                <span class="me-1 text-decoration-line-through">৳{{ $prodf->unit_price }}</span>
                                                <span class="text-white fs-5">৳{{ $prodf->sale_price }}</span>
                                            </div>
                                        @elseif($prodf->on_sale == 1  && $prodf->hot_sale == 1 && $hot_sale->sale_end_date > Carbon\Carbon::now())
                                            <div class="mb-1 product-price"> 
                                                <span class="me-1 text-decoration-line-through">৳{{ $prodf->unit_price }}</span>
                                                <span class="text-white fs-5">৳{{ $prodf->sale_price }}</span>
                                            </div>
                                        @elseif($prodf->on_sale == 1  && $prodf->flash_sale == 1 && $flash_sale->sale_end_date > Carbon\Carbon::now())
                                            <div class="mb-1 product-price"> 
                                                <span class="me-1 text-decoration-line-through">৳{{ $prodf->unit_price }}</span>
                                                <span class="text-white fs-5">৳{{ $prodf->sale_price }}</span>
                                            </div>
                                        @else
                                            <div class="mb-1 product-price"> 
                                                <span class="text-white fs-5">৳{{ $prodf->unit_price }}</span>
                                            </div>
                                        @endif
                                        <div class="cursor-pointer ms-auto">

                                        @if(avg_rating($prodf->id) != null)    
                                            <span>{{ avg_rating($prodf->id) }}</span>  <i class="bx bxs-star text-white"></i>
                                        @else
                                            <p>No Rating</p>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="product-action mt-2">
                                        <div class="d-grid gap-2">
                                            {{-- <a href="javascript:;" class="btn btn-light btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a> 
                                            <a href="javascript:;" class="btn btn-link btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class='bx bx-zoom-in'></i>Quick View</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    @endif
    <!--end Mart Hall-->


    @if($allSections[4] == 1)
    <!--start Advertise banners-->
    <section class="py-4">
        <div class="container">
            <div class="add-banner">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">


                    @foreach($allAddBanners as $key=>$value)
                        @if($value->published == 1)
                            <div class="col d-flex">
                                <div class="card rounded-0 w-100">
                                    <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">up to {{ $value->percent }}%</span>
                                    </div>
                                    <div class="card-body text-center mt-5">
                                        <h5 class="card-title">{{ $value->title }}</h5>
                                        <p class="card-text">{{ $value->description }}</p> 
                                        <a href="{{ route('web.single_category',['id'=>$value->category->id]) }}" class="btn btn-light btn-ecomm text-uppercase">SHOP BY {{ $value->category->name }}</a>
                                    </div>
                                    <img src="{{ asset('') }}uploads/categories/{{ $value->category->name }}/{{ $value->category->image }}" class="card-img-top" alt="...">
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
                <!--end row-->
            </div>
        </div>
    </section>
    <!--end Advertise banners-->
    @endif

    




    


    @if($allSections[6] == 1)
    <!--start support info-->
    {{-- <section class="py-4 bg-dark-1">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-group">
                <div class="col">
                    <div class="text-center">
                        <div class="font-50 text-white">    <i class='bx bx-cart'></i>
                        </div>
                        <h2 class="fs-5 text-uppercase mb-0">Free delivery</h2>
                        <p class="text-capitalize">Free delivery over $199</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center">
                        <div class="font-50 text-white">    <i class='bx bx-credit-card'></i>
                        </div>
                        <h2 class="fs-5 text-uppercase mb-0">Secure payment</h2>
                        <p class="text-capitalize">We possess SSL / Secure сertificate</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center">
                        <div class="font-50 text-white">    <i class='bx bx-dollar-circle'></i>
                        </div>
                        <h2 class="fs-5 text-uppercase mb-0">Free returns</h2>
                        <p class="text-capitalize">We return money within 30 days</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center">
                        <div class="font-50 text-white">    <i class='bx bx-support'></i>
                        </div>
                        <h2 class="fs-5 text-uppercase mb-0">Customer Support</h2>
                        <p class="text-capitalize">Friendly 24/7 customer support</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </section> --}}
    <!--end support info-->
    @endif


    @if($allSections[7] == 1)
    <!--start brands-->
    <section class="py-4">
        <div class="container">
            <h3 class="d-none">Brands</h3>
            <div class="brand-grid">
                <div class="brands-shops owl-carousel owl-theme border">

                    @foreach($brands as $key=>$value)

                    <div class="item border-end">
                        <div class="p-4">
                            <a href="{{ route('web.vendor_products',['key'=>$value->id]) }}">
                                <img src="{{ asset('') }}uploads/vendors/{{ $value->image }}" class="img-fluid" alt="...">
                            </a>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!--end brands-->
    @endif


    <!--start bottom products section-->
    <section class="py-4 border-top">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">

                <div class="col">
                    <div class="bestseller-list mb-3">
                        <h6 class="mb-3 text-uppercase">Best Selling Products</h6>

                        @foreach ($best_selling_products as $key=>$value)
                            @if($key < 4)
                            <hr>
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="{{ route('product_details' ,['id'=>$value->id]) }}" style="padding-right: 5px;">
                                        <img src="{{ asset('') }}uploads/products/{{ $value->name }}/{{ $value->image }}" width="100" alt="">
                                    </a>
                                </div>
                                <div class="ms-0">
                                    <h6 class="mb-0 fw-light mb-1">{{ $value->name }}</h6>
                                    <div class="rating font-12">    
                                        @if(avg_rating($value->id) != null)    
                                            <span>{{ avg_rating($value->id) }}</span>  <i class="bx bxs-star text-white"></i>
                                        @else
                                            No Rating
                                        @endif
                                    </div>
                                    {{-- <p class="mb-0 text-white"><strong>৳59.00</strong>
                                    </p> --}}

                                    @if($value->on_sale == 1 && $value->sale_end > Carbon\Carbon::now())
                                        <div class="mb-1 product-price"> 
                                            <span class="me-1 text-decoration-line-through">৳{{ $value->unit_price }}</span>
                                            <span class="text-white fs-5">৳{{ $value->sale_price }}</span>
                                        </div>
                                    @elseif($value->on_sale == 1  && $value->hot_sale == 1 && $hot_sale->sale_end_date > Carbon\Carbon::now())
                                        <div class="mb-1 product-price"> 
                                            <span class="me-1 text-decoration-line-through">৳{{ $value->unit_price }}</span>
                                            <span class="text-white fs-5">৳{{ $value->sale_price }}</span>
                                        </div>
                                    @elseif($value->on_sale == 1  && $value->flash_sale == 1 && $flash_sale->sale_end_date > Carbon\Carbon::now())
                                        <div class="mb-1 product-price"> 
                                            <span class="me-1 text-decoration-line-through">৳{{ $value->unit_price }}</span>
                                            <span class="text-white fs-5">৳{{ $value->sale_price }}</span>
                                        </div>
                                    @else
                                        <div class="mb-1 product-price"> 
                                            <span class="text-white fs-5">৳{{ $value->unit_price }}</span>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            @endif
                            
                        @endforeach
                        
                    </div>
                </div>

                <div class="col">
                    <div class="featured-list mb-3">
                        <h6 class="mb-3 text-uppercase">&nbsp;</h6>

                        @foreach ($best_selling_products as $key=>$value)
                            @if($key > 3)
                            <hr>
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="{{ route('product_details' ,['id'=>$value->id]) }}" style="padding-right: 5px;">
                                        <img src="{{ asset('') }}uploads/products/{{ $value->name }}/{{ $value->image }}" width="100" alt="">
                                    </a>
                                </div>
                                <div class="ms-0">
                                    <h6 class="mb-0 fw-light mb-1">{{ $value->name }}</h6>
                                    <div class="rating font-12">    
                                        @if(avg_rating($value->id) != null)    
                                            <span>{{ avg_rating($value->id) }}</span>  <i class="bx bxs-star text-white"></i>
                                        @else
                                            No Rating
                                        @endif
                                    </div>
                                    {{-- <p class="mb-0 text-white"><strong>৳59.00</strong>
                                    </p> --}}

                                    @if($value->on_sale == 1 && $value->sale_end > Carbon\Carbon::now())
                                        <div class="mb-1 product-price"> 
                                            <span class="me-1 text-decoration-line-through">৳{{ $value->unit_price }}</span>
                                            <span class="text-white fs-5">৳{{ $value->sale_price }}</span>
                                        </div>
                                    @elseif($value->on_sale == 1  && $value->hot_sale == 1 && $hot_sale->sale_end_date > Carbon\Carbon::now())
                                        <div class="mb-1 product-price"> 
                                            <span class="me-1 text-decoration-line-through">৳{{ $value->unit_price }}</span>
                                            <span class="text-white fs-5">৳{{ $value->sale_price }}</span>
                                        </div>
                                    @elseif($value->on_sale == 1  && $value->flash_sale == 1 && $flash_sale->sale_end_date > Carbon\Carbon::now())
                                        <div class="mb-1 product-price"> 
                                            <span class="me-1 text-decoration-line-through">৳{{ $value->unit_price }}</span>
                                            <span class="text-white fs-5">৳{{ $value->sale_price }}</span>
                                        </div>
                                    @else
                                        <div class="mb-1 product-price"> 
                                            <span class="text-white fs-5">৳{{ $value->unit_price }}</span>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            @endif
                            
                        @endforeach
                        
                    </div>
                </div>

                <div class="col">
                    <div class="new-arrivals-list mb-3">
                        <h6 class="mb-3 text-uppercase">New arrivals</h6>

                        @foreach ($new_products as $key=>$value)
                            @if($key < 4)
                            <hr>
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="{{ route('product_details' ,['id'=>$value->id]) }}" style="padding-right: 5px;">
                                        <img src="{{ asset('') }}uploads/products/{{ $value->name }}/{{ $value->image }}" width="100" alt="">
                                    </a>
                                </div>
                                <div class="ms-0">
                                    <h6 class="mb-0 fw-light mb-1">{{ $value->name }}</h6>
                                    <div class="rating font-12">    
                                        @if(avg_rating($value->id) != null)    
                                            <span>{{ avg_rating($value->id) }}</span>  <i class="bx bxs-star text-white"></i>
                                        @else
                                            No Rating
                                        @endif
                                    </div>
                                    {{-- <p class="mb-0 text-white"><strong>৳59.00</strong>
                                    </p> --}}

                                    @if($value->on_sale == 1 && $value->sale_end > Carbon\Carbon::now())
                                        <div class="mb-1 product-price"> 
                                            <span class="me-1 text-decoration-line-through">৳{{ $value->unit_price }}</span>
                                            <span class="text-white fs-5">৳{{ $value->sale_price }}</span>
                                        </div>
                                    @elseif($value->on_sale == 1  && $value->hot_sale == 1 && $hot_sale->sale_end_date > Carbon\Carbon::now())
                                        <div class="mb-1 product-price"> 
                                            <span class="me-1 text-decoration-line-through">৳{{ $value->unit_price }}</span>
                                            <span class="text-white fs-5">৳{{ $value->sale_price }}</span>
                                        </div>
                                    @elseif($value->on_sale == 1  && $value->flash_sale == 1 && $flash_sale->sale_end_date > Carbon\Carbon::now())
                                        <div class="mb-1 product-price"> 
                                            <span class="me-1 text-decoration-line-through">৳{{ $value->unit_price }}</span>
                                            <span class="text-white fs-5">৳{{ $value->sale_price }}</span>
                                        </div>
                                    @else
                                        <div class="mb-1 product-price"> 
                                            <span class="text-white fs-5">৳{{ $value->unit_price }}</span>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            @endif
                            
                        @endforeach
                        
                    </div>
                </div>

                <div class="col">
                    <div class="top-rated-products-list mb-3">
                        <h6 class="mb-3 text-uppercase">&nbsp;</h6>

                        @foreach ($new_products as $key=>$value)
                            @if($key > 3)
                            <hr>
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="{{ route('product_details' ,['id'=>$value->id]) }}" style="padding-right: 5px;">
                                        <img src="{{ asset('') }}uploads/products/{{ $value->name }}/{{ $value->image }}" width="100" alt="">
                                    </a>
                                </div>
                                <div class="ms-0">
                                    <h6 class="mb-0 fw-light mb-1">{{ $value->name }}</h6>
                                    <div class="rating font-12">    
                                        @if(avg_rating($value->id) != null)    
                                            <span>{{ avg_rating($value->id) }}</span>  <i class="bx bxs-star text-white"></i>
                                        @else
                                            No Rating
                                        @endif
                                    </div>
                                    {{-- <p class="mb-0 text-white"><strong>৳59.00</strong>
                                    </p> --}}

                                    @if($value->on_sale == 1 && $value->sale_end > Carbon\Carbon::now())
                                        <div class="mb-1 product-price"> 
                                            <span class="me-1 text-decoration-line-through">৳{{ $value->unit_price }}</span>
                                            <span class="text-white fs-5">৳{{ $value->sale_price }}</span>
                                        </div>
                                    @elseif($value->on_sale == 1  && $value->hot_sale == 1 && $hot_sale->sale_end_date > Carbon\Carbon::now())
                                        <div class="mb-1 product-price"> 
                                            <span class="me-1 text-decoration-line-through">৳{{ $value->unit_price }}</span>
                                            <span class="text-white fs-5">৳{{ $value->sale_price }}</span>
                                        </div>
                                    @elseif($value->on_sale == 1  && $value->flash_sale == 1 && $flash_sale->sale_end_date > Carbon\Carbon::now())
                                        <div class="mb-1 product-price"> 
                                            <span class="me-1 text-decoration-line-through">৳{{ $value->unit_price }}</span>
                                            <span class="text-white fs-5">৳{{ $value->sale_price }}</span>
                                        </div>
                                    @else
                                        <div class="mb-1 product-price"> 
                                            <span class="text-white fs-5">৳{{ $value->unit_price }}</span>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            @endif
                            
                        @endforeach
                        
                    </div>
                </div>

            </div>
            <!--end row-->
        </div>
    </section>
    <!--end bottom products section-->



   {{-- @include('livewire.web.quickView') brands-shops --}}


   @push('scripts')

   <script src="{{ asset('assets/js/product-gallery.js') }}"></script>

        <script type="text/javascript">
        
        // $(document).ready(function(){
          $(".new-arrivals").owlCarousel({
            loop:false,
            margin:10,
            dots: false,
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

          $(".mart-hall").owlCarousel({
            loop: false,
            margin:10,
            dots: false,
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

          $(".browse-category").owlCarousel({
            loop:false,
            margin:10,
            dots: false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:6
                }
            }
          });

          $(".brands-shops").owlCarousel({
            dots: false,
            loop:true,
            autoplay:true,
            autoplayTimeout:2000,
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
        // });

    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js" integrity="sha512-lteuRD+aUENrZPTXWFRPTBcDDxIGWe5uu0apPEn+3ZKYDwDaEErIK9rvR0QzUGmUQ55KFE2RqGTVoZsKctGMVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script type="text/javascript">
        ;(function($) {
     
        var MERCADO_JS = {
          init: function(){
             this.mercado_countdown();
              
          }, 
        mercado_countdown: function() {
             if($(".mercado-countdown").length > 0){
                    $(".mercado-countdown").each( function(index, el){
                      var _this = $(this),
                      _expire = _this.data('expire');
                   _this.countdown(_expire, function(event) {
                            $(this).html( event.strftime('<span class="common"><b>%D</b> D</span> <span class="common"><b>%-H</b> H</span> <span class="common"><b>%M</b> M</span> <span class="common"><b>%S</b> S</span>'));
                        });
                    });
             }
          },
        
       }
        
      window.onload = function () {
         MERCADO_JS.init();
      }
    
      })(window.Zepto || window.jQuery, window, document);
    </script>

    <style type="text/css">
        .common{
            border: 2px solid;
            padding: 5px;
            width: 100px;
            border-radius: 5px;
            text-align: center;
            letter-spacing: 5px;
            display: inline-block;

        }
    </style>

   @endpush

</div>
