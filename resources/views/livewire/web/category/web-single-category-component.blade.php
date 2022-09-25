<div>
        @push('meta')
            <meta name="description" content="{{ $category_name }}">
            <meta name="keywords" content="{{ $meta_tags }}">
        @endpush

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--start breadcrumb-->
                <section class="py-3 border-bottom d-none d-md-flex">
                    <div class="container">
                        <div class="page-breadcrumb d-flex align-items-center">
                            <h3 class="breadcrumb-title pe-3">{{ $category_name }}</h3>
                            <div class="ms-auto">
                                <nav aria-label="breadcrumb">
                                    {{-- <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Shop Grid Filter Top</li>
                                    </ol> --}}
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>
                <!--end breadcrumb-->
                <!--start shop area-->
                <section class="py-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-xl-12">
                                <div class="product-wrapper">
                                    <div class="toolbox d-lg-flex align-items-center mb-3 gap-2 p-3 bg-dark-1">
                                        <div class="d-flex flex-wrap flex-grow-1 gap-1">
                                            {{-- <div class="">
                                                <select class="form-select rounded-0">
                                                    <option selected="selected">Size</option>
                                                    <option>Small</option>
                                                    <option>Small</option>
                                                    <option>Small</option>
                                                    <option>Extra Large</option>
                                                </select>
                                            </div>
                                            <div class="">
                                                <select class="form-select rounded-0">
                                                    <option selected="selected">Color</option>
                                                    <option>Red</option>
                                                    <option>Yellow</option>
                                                    <option>Black</option>
                                                    <option>White</option>
                                                    <option>Green</option>
                                                    <option>Blue</option>
                                                </select>
                                            </div>
                                            <div class="">
                                                <select class="form-select rounded-0">
                                                    <option selected="selected">Price</option>
                                                    <option>$5 to $49</option>
                                                    <option>$49 to $99</option>
                                                    <option>$99 to $149</option>
                                                    <option>$149 to $300</option>
                                                    <option>$300 to $500</option>
                                                    <option>Above $1000</option>
                                                </select>
                                            </div> --}}
                                            <div class="d-flex align-items-center flex-nowrap">
                                                <select class="form-select rounded-0" wire:model="sorting">
                                                    <option value="default" selected="selected">Default sorting</option>
                                                    <option value="price-asc">price: low to high</option>
                                                    <option value="price-desc">price: high to low</option>
                                                    <option value="order-asc">popularity: high to low</option>
                                                </select>
                                            </div>
                                            {{-- <div class="">
                                                <button type="button" class="btn btn-light rounded-0 text-uppercase">Search</button>
                                            </div> --}}
                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <div class="d-flex align-items-center flex-nowrap">
                                                <p class="mb-0 font-13 text-nowrap text-white">Show:</p>
                                                <select class="form-select ms-3 rounded-0" wire:model="paginate">
                                                    <option>8</option>
                                                    <option>12</option>
                                                    <option>16</option>
                                                    <option>20</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div>   <a href="shop-grid-filter-on-top.html" class="btn btn-white rounded-0"><i class='bx bxs-grid me-0'></i></a>
                                        </div>
                                        <div>   <a href="shop-list-filter-on-top.html" class="btn btn-light rounded-0"><i class='bx bx-list-ul me-0'></i></a>
                                        </div> --}}
                                    </div>
                                    <div class="product-grid">
                                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

                                            @if($allProducts->count() >0)
                                            @foreach($allProducts as $key=>$value)
                                            <div class="col">
                                                <div class="card rounded-0 product-card">
                                                    <div class="card-header bg-transparent border-bottom-0">
                                                        <div class="d-flex align-items-center justify-content-end gap-3">
                                                            {{-- <a href="javascript:;">
                                                                <div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
                                                                </div>
                                                            </a>
                                                            <a href="javascript:;">
                                                                <div class="product-wishlist"> <i class="bx bx-heart"></i>
                                                                </div>
                                                            </a> --}}
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('product_details' ,['id'=>$value->id]) }}">
                                                        <img src="{{ asset('') }}uploads/products/{{ $value->name }}/{{ $value->image }}" class="card-img-top" alt="...">
                                                    </a>
                                                    <div class="card-body">
                                                        <div class="product-info">
                                                            <a href="{{ route('web.single_category',['id'=>$value->category->id]) }}">
                                                                <p class="product-catergory font-13 mb-1">{{ $category_name }}</p>
                                                            </a>
                                                            <a href="{{ route('product_details' ,['id'=>$value->id]) }}">
                                                                <h6 class="product-name mb-2">{{ $value->name }}</h6>
                                                            </a>
                                                            <div class="d-flex align-items-center">
                                                                @if($value->on_sale == 1 && $value->sale_end > Carbon\Carbon::now())
                                                                <div class="mb-1 product-price">    <span class="me-1 text-decoration-line-through">৳{{ $value->unit_price }}</span>
                                                                    <span class="text-white fs-5">৳{{ $value->sale_price }}</span>
                                                                </div>
                                                                @elseif($value->on_sale == 1 && $value->hot_sale == 1 && $hot_sale->sale_end_date > Carbon\Carbon::now())
                                                                <div class="mb-1 product-price">    <span class="me-1 text-decoration-line-through">৳{{ $value->unit_price }}</span>
                                                                    <span class="text-white fs-5">৳{{ $value->sale_price }}</span>
                                                                </div>
                                                                @elseif($value->on_sale == 1 && $value->flash_sale == 1 && $flash_sale->sale_end_date > Carbon\Carbon::now())
                                                                <div class="mb-1 product-price">    <span class="me-1 text-decoration-line-through">৳{{ $value->unit_price }}</span>
                                                                    <span class="text-white fs-5">৳{{ $value->sale_price }}</span>
                                                                </div>
                                                                @else
                                                                    <div class="mb-1 product-price"> 
                                                                        <span class="text-white fs-5">৳{{ $value->unit_price }}</span>
                                                                </div>
                                                                @endif
                                                                <div class="cursor-pointer ms-auto">    
                                                                    @if(avg_rating($value->id) != null)    
                                                                        <span>{{ avg_rating($value->id) }}</span>  <i class="bx bxs-star text-white"></i>
                                                                    @else
                                                                        <p>No Rating</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="product-action mt-2">
                                                                <div class="d-grid gap-2">
                                                                    {{-- <a href="javascript:;" class="btn btn-light btn-ecomm"> <i class="bx bxs-cart-add"></i>Add to Cart</a>  

                                                                    <a href="javascript:;" class="btn btn-link btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @else
                                            <h4>Sorry!!! No Products Are Here.</h4>
                                            @endif
                                            
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <hr>
                                    <nav class="d-flex justify-content-between" aria-label="Page navigation">
                                        
                                        {{ $allProducts->links() }}

                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </section>
                <!--end shop area-->
            </div>
        </div>
        <!--end page wrapper --> 



</div>
