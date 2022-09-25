<div>

    @push('styles')

    <style type="text/css">
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }

        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }
    </style>

    @endpush


    <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--start breadcrumb-->
                <section class="py-3 border-bottom d-none d-md-flex">
                    <div class="container">
                        <div class="page-breadcrumb d-flex align-items-center">
                            <h3 class="breadcrumb-title pe-3">Shop Cart</h3>
                            <div class="ms-auto">
                                {{-- <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Shop Cart</li>
                                    </ol>
                                </nav> --}}
                            </div>
                        </div>
                    </div>
                </section>
                <!--end breadcrumb-->
                <!--start shop cart-->
                <section class="py-4">
                    <div class="container">
                        <div class="shop-cart">
                            <div class="row">


                                <div class="col-12 col-xl-8">
                                    <div class="shop-cart-list mb-3 p-3">

                                        {{-- @php
                                            dd(Cart::instance('main')->content());
                                        @endphp --}}

                                        @if(!empty($all_cart_content))

                                            @foreach($all_cart_instance as $key=>$instance)

                                                @php
                                                    $vendor =App\Models\vendor::where('id',$instance)->first(); 
                                                @endphp

                                                <h5>{{ $vendor->name }}</h5>

                                                @foreach(Cart::instance($instance)->content() as $item)

                                                @php
                                                   $variation = App\Models\variation::where('id',$item->id)->with('size')->with('color')->with('product')->first(); 
                                                   // dd($variation);
                                                @endphp

                                                <br>
                                                {{-- <div class="my-4 border-top"></div> --}}
                                                <div class="row align-items-center g-3">

                                                    

                                                    <div class="col-12 col-lg-6">

                                                        <a href="{{ route('product_details',['id'=>$variation->product->id]) }}">

                                                        <div class="d-lg-flex align-items-center gap-2">
                                                            <div class="cart-img text-center text-lg-start">
                                                                <img src="{{ asset('') }}uploads/products/{{ $variation->product->name }}/{{ $variation->product->image }}" width="130" alt="">
                                                            </div>
                                                            <div class="cart-detail text-center text-lg-start">
                                                                <h6 class="mb-2">{{ $variation->product->name }}</h6>
                                                                <p class="mb-0">Size: 
                                                                    <span>
                                                                        @if($variation->size != null)
                                                                        {{ $variation->size->name }}
                                                                        @endif
                                                                    </span>
                                                                </p>
                                                                <p class="mb-2">Color: 
                                                                    <span>
                                                                        @if($variation->color != null)
                                                                        {{ $variation->color->name }}
                                                                        @endif
                                                                    </span>
                                                                </p>
                                                                <h5 class="mb-0">৳{{ $item->price }}</h5>
                                                            </div>
                                                        </div>

                                                        </a>

                                                    </div>

                                                    

                                                    <div class="col-12 col-lg-3">
                                                        <div class="d-flex gap-2 justify-content-center justify-content-lg-end">
                                                            <a wire:click="decreaseItem('{{ $item->rowId }}','{{ $item->qty }}','{{ $instance }}')" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-minus me-0'></i></a>

                                                            <input type="number" class="form-control rounded-0" value="{{ $item->qty }}" min="1" readonly>

                                                            <a wire:click="increaseItem('{{ $item->rowId }}','{{ $item->qty }}','{{ $item->id }}','{{ $instance }}')" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-plus me-0'></i></a>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-12 col-lg-3">
                                                        <div class="text-center">
                                                            <div class="d-flex gap-2 justify-content-center justify-content-lg-end"> 
                                                                <a wire:click="removeItem('{{ $item->rowId }}','{{ $instance }}','{{ $key }}')" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-x-circle'></i> Remove</a>
                                                                {{-- <a wire:click.prevent="sendToWishlist('{{ $item->rowId }}')" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-heart me-0'></i></a> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                                <div class="my-4 border-top"></div>

                                            @endforeach
                                        @else
                                            <h2>No item in Cart !</h2>
                                        @endif

                                        <div class="my-4 border-top"></div>
                                        <div class="d-lg-flex align-items-center gap-2">    <a href="/" class="btn btn-light btn-ecomm"><i class='bx bx-shopping-bag'></i> Go To Shoping</a>

                                            <a wire:click.prevent="clearCart()" class="btn btn-light btn-ecomm ms-auto"><i class='bx bx-x-circle'></i> Clear Cart</a>

                                            {{-- <a href="javascript:;" class="btn btn-white btn-ecomm"><i class='bx bx-refresh'></i> Update Cart</a> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-4">
                                    <div class="checkout-form p-3 bg-dark-1">

                                        @if(!session::has('coupon'))
                                        <div class="card rounded-0 border bg-transparent shadow-none">
                                            <div class="card-body">
                                                <p class="fs-5 text-white">Apply Discount Code</p>
                                                <div class="input-group">
                                                    <input type="text" class="form-control rounded-0" placeholder="Enter discount code" wire:model="coupon_code">
                                                    <button class="btn btn-light btn-ecomm" type="button" wire:click="applyCouponCode()" disabled>Apply Discount</button>
                                                </div>
                                            </div>
                                        </div>
                                        @if(session::has('coupon_message'))
                                            <div class="alert alert-danger" role="danger">
                                                {{ session::get('coupon_message') }}
                                            </div>
                                        @endif
                                        @endif

                                        {{-- <div class="card rounded-0 border bg-transparent shadow-none">
                                            <div class="card-body">
                                                <p class="fs-5 text-white">Estimate Shipping and Tax</p>
                                                <div class="my-3 border-top"></div>
                                                <div class="mb-3">
                                                    <label class="form-label">Country Name</label>
                                                    <select class="form-select rounded-0">
                                                        <option selected>United States</option>
                                                        <option value="1">Australia</option>
                                                        <option value="2">India</option>
                                                        <option value="3">Canada</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">State/Province</label>
                                                    <select class="form-select rounded-0">
                                                        <option selected>California</option>
                                                        <option value="1">Texas</option>
                                                        <option value="2">Canada</option>
                                                    </select>
                                                </div>
                                                <div class="mb-0">
                                                    <label class="form-label">Zip/Postal Code</label>
                                                    <input type="email" class="form-control rounded-0">
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                                            <div class="card-body">
                                                <p class="mb-2">Subtotal: <span class="float-end">৳{{ $subtotal_after_convert }}</span>
                                                </p>
                                                <p class="mb-2">Shipping: <span class="float-end">৳{{ $shipping_charge }}</span>
                                                </p>
                                                {{-- <p class="mb-2">Taxes: <span class="float-end">{{ Cart::instance('main')->tax() }}</span>
                                                </p> --}}


                                                <p class="mb-0">Discount: 
                                                    @if($discount_amount > 0)
                                                    <span class="float-end">৳{{ $discount_amount }}</span>
                                                    @else
                                                    <span class="float-end">--</span>
                                                    @endif
                                                </p>


                                                <div class="my-3 border-top"></div>
                                                <h5 class="mb-0">Order Total: <span class="float-end">৳{{ $total_after_discount + $shipping_charge }}</span></h5>
                                                <div class="my-4"></div>
                                                @if(!empty($all_cart_content))
                                                <div class="d-grid"> 
                                                    <a wire:click.prevent="checkout()" class="btn btn-white btn-ecomm">Proceed to Checkout</a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </section>
                <!--end shop cart-->
            </div>
        </div>
        <!--end page wrapper -->
</div>
