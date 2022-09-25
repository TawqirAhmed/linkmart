<div>
    <li class="nav-item dropdown dropdown-large">
        <a href="{{ route('web.product_cart') }}" class="nav-link position-relative cart-link"> 
            <span class="alert-count">
                {{ $cart_count_all }}
            </span>
            <i class='bx bx-shopping-bag'></i>
        </a>
        {{-- <div class="dropdown-menu dropdown-menu-end">
            <a href="{{ route('web.product_cart') }}">
                <div class="cart-header">
                    <p class="cart-header-title mb-0">{{ Cart::instance('main')->content()->count() }} ITEMS</p>
                    <p class="cart-header-clear ms-auto mb-0">VIEW CART</p>
                </div>
            </a>
            <div class="cart-list">

                @if(Cart::instance('main')->count() >0)
                @foreach(Cart::instance('main')->content() as $item)

                @php
                   $variation = App\Models\variation::where('id',$item->id)->with('size')->with('color')->with('product')->first(); 
                   // dd($variation);
                @endphp

                <a class="dropdown-item" href="{{ route('product_details',['id'=>$variation->product->id]) }}">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="cart-product-title">{{ $variation->product->name }}</h6>
                            <p class="cart-product-price">{{ $item->qty }} X {{ $item->price }}</p>
                        </div>
                        <div class="position-relative">
                            <div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
                            </div>
                            <div class="cart-product">
                                <img src="{{ asset('') }}uploads/products/{{ $variation->product->name }}/{{ $variation->product->image }}" class="" alt="product image">
                            </div>
                        </div>
                    </div>
                </a>
                
                @endforeach
                @else
                    <p>No item in cart</p>
                @endif
            </div>
            <a href="javascript:;">
                <div class="text-center cart-footer d-flex align-items-center">
                    <h5 class="mb-0">TOTAL</h5>
                    <h5 class="mb-0 ms-auto">{{ Cart::instance('main')->total() }}</h5>
                </div>
            </a>
            <div class="d-grid p-3 border-top"> <a href="{{ route('web.product_cart') }}" class="btn btn-light btn-ecomm">Go To Cart</a>
            </div>
        </div> --}}
    </li>
</div>
