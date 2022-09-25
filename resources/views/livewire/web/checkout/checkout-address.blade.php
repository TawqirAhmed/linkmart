<div class="col-12 col-xl-8">
    <div class="checkout-details">

        @include('livewire.web.checkout.checkout-progress-bar')
        


        <div class="card rounded-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="">
                        {{-- <img src="assets/images/avatars/avatar-1.png" width="90" alt="" class="rounded-circle p-1 border"> --}}
                    </div>
                    <div class="ms-2">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <p class="mb-0">{{ Auth::user()->email }}</p>
                    </div>
                    {{-- <div class="ms-auto">   <a href="javascript:;" class="btn btn-light btn-ecomm"><i class='bx bx-edit'></i> Edit Profile</a>
                    </div> --}}
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
                                <input type="text" class="form-control rounded-0" wire:model="b_name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">E-mail</label>
                                <input type="email" class="form-control rounded-0" wire:model="b_email" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control rounded-0"  wire:model="b_phone" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <select class="form-select rounded-0" wire:model="b_city" required>
                                	<option value="">Select City</option>
                                    <option value="Dhaka">Dhaka</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Zip/Postal Code</label>
                                <input type="text" class="form-control rounded-0" wire:model="b_post_code" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Address 1</label>
                                <textarea class="form-control rounded-0" wire:model="b_address1" required></textarea>
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
                                <input type="text" class="form-control rounded-0" wire:model="s_name" @if($same_address == 0) required @endif>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">E-mail</label>
                                <input type="text" class="form-control rounded-0" wire:model="s_email" @if($same_address == 0) required @endif>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control rounded-0" wire:model="s_phone" @if($same_address == 0) required @endif>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <select class="form-select rounded-0" wire:model="s_city" @if($same_address == 0) required @endif>
                                    <option value="">Select City</option>
                                    <option value="Dhaka">Dhaka</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Zip/Postal Code</label>
                                <input type="text" class="form-control rounded-0" wire:model="s_post_code" @if($same_address == 0) required @endif>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Address 1</label>
                                <textarea class="form-control rounded-0" wire:model="s_address1" @if($same_address == 0) required @endif></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Address 2</label>
                                <textarea class="form-control rounded-0" wire:model="s_address2"></textarea>
                            </div>
                            @endif

                            <div class="col-md-6">
                                <div class="d-grid">    <a href="{{ route('web.product_cart') }}" class="btn btn-light btn-ecomm"><i class='bx bx-chevron-left'></i>Back to Cart</a>
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
</div>