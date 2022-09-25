<div>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-none d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Checkout</h3>
                    <h3 class="breadcrumb-title pe-3"></h3>
                    <h3 class="breadcrumb-title pe-3">Order No: {{ $order_number }}</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            {{-- <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol> --}}
                        </nav>
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


                        {{-- <div class="col-12 col-xl-8">
                            <div class="checkout-details">

                                @include('livewire.web.checkout.checkout-progress-bar')
                                


                                <div class="card rounded-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                                <p class="mb-0">{{ Auth::user()->email }}</p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card rounded-0">
                                    <div class="card-body">
                                        <div class="border p-3">
                                            <h2 class="h5 mb-0">Billing Address</h2>
                                            <div class="my-3 border-bottom"></div>
                                            <div class="form-body">
                                                <form class="row g-3" role="form" enctype="multipart/form-data" wire:submit.prevent="goToPayment()">
                                                    @csrf
                                                    <div class="col-md-12">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control rounded-0" wire:model="b_name">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">E-mail</label>
                                                        <input type="text" class="form-control rounded-0" wire:model="b_email">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Phone Number</label>
                                                        <input type="text" class="form-control rounded-0"  wire:model="b_phone">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">City</label>
                                                        <select class="form-select rounded-0" wire:model="b_city">
                                                            <option value="Dhaka">Dhaka</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Zip/Postal Code</label>
                                                        <input type="text" class="form-control rounded-0" wire:model="b_post_code">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Address 1</label>
                                                        <textarea class="form-control rounded-0" wire:model="b_address1"></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Address 2</label>
                                                        <textarea class="form-control rounded-0" wire:model="b_address2"></textarea>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <h6 class="mb-0 h5">Shipping Address</h6>
                                                        <div class="my-3 border-bottom"></div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" wire:click.prevent="toggleAddress()" @if($same_address) checked @endif>
                                                            <label class="form-check-label" for="gridCheck">Same as billing address</label>
                                                        </div>
                                                    </div>

                                                    @if($same_address == 0)
                                                    <div class="col-md-12">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control rounded-0" wire:model="s_name">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">E-mail</label>
                                                        <input type="text" class="form-control rounded-0" wire:model="s_email">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Phone Number</label>
                                                        <input type="text" class="form-control rounded-0" wire:model="s_phone">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">City</label>
                                                        <select class="form-select rounded-0" wire:model="s_city">
                                                            <option value="Dhaka">Dhaka</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Zip/Postal Code</label>
                                                        <input type="text" class="form-control rounded-0" wire:model="s_post_code">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Address 1</label>
                                                        <textarea class="form-control rounded-0" wire:model="s_address1"></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Address 2</label>
                                                        <textarea class="form-control rounded-0" wire:model="s_address2"></textarea>
                                                    </div>
                                                    @endif

                                                    <div class="col-md-6">
                                                        <div class="d-grid">    <a href="javascript:;" class="btn btn-light btn-ecomm"><i class='bx bx-chevron-left'></i>Back to Cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="d-grid">    
                                                            <button type="submit" class="btn btn-white btn-ecomm">Proceed to Checkout<i class='bx bx-chevron-right'></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        @if($step == 2)
                            @include('livewire.web.checkout.checkout-address')
                        @elseif($step == 3)
                            @include('livewire.web.checkout.checkout-payment')
                        @elseif($step == 4)
                            @include('livewire.web.checkout.checkout-preview')
                        @endif

                        <div class="col-12 col-xl-4" style="margin-top:209px;">

                            <div class="order-summary">
                                <div class="card rounded-0">
                                    <div class="card-body">
                                        
                                        <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                                            <div class="card-body">
                                                <p class="mb-2">Subtotal: <span class="float-end">৳{{ session()->get('checkout')['subtotal'] }}</span>
                                                </p>
                                                <p class="mb-2">Shipping: <span class="float-end">৳{{ session()->get('checkout')['shipping_charge'] }}</span>
                                                </p>
                                                {{-- <p class="mb-2">Taxes: <span class="float-end">0</span>
                                                </p> --}}
                                                <p class="mb-0">Discount: <span class="float-end">৳{{ session()->get('checkout')['discount'] }}</span>
                                                </p>
                                                <div class="my-3 border-top"></div>
                                                <h5 class="mb-0">Order Total: <span class="float-end">৳{{ session()->get('checkout')['total'] }}</span></h5>
                                            </div>
                                        </div>
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
