<div class="col-12 col-xl-8">
	<div class="checkout-review">
		<div class="card bg-transparent rounded-0 shadow-none">
			<div class="card-body">
				<div class="steps steps-light">
					<a class="step-item active" href="shop-cart.html">
						<div class="step-progress"><span class="step-count">1</span>
						</div>
						<div class="step-label"><i class='bx bx-cart'></i>Cart</div>
					</a>
					<a class="step-item active" href="checkout-details.html">
						<div class="step-progress"><span class="step-count">2</span>
						</div>
						<div class="step-label"><i class='bx bx-user-circle'></i>Details</div>
					</a>
					<a class="step-item active" href="checkout-payment.html">
						<div class="step-progress"><span class="step-count">4</span>
						</div>
						<div class="step-label"><i class='bx bx-credit-card'></i>Payment</div>
					</a>
					<a class="step-item active current" href="checkout-review.html">
						<div class="step-progress"><span class="step-count">5</span>
						</div>
						<div class="step-label"><i class='bx bx-check-circle'></i>Review</div>
					</a>
				</div>
			</div>
		</div>
		<div class="card  rounded-0 shadow-none">
			<div class="card-body">
				<h5 class="mb-0">Review Your Order</h5>
				

				@foreach($all_cart_instance as $key_ins=>$instance)

					@if(Cart::instance($instance)->count() > 0)
	                @foreach(Cart::instance($instance)->content() as $item)

		               @php
		                  $variation = App\Models\variation::where('id',$item->id)->with('size')->with('color')->with('product')->first(); 
		                   // dd($variation);
		               @endphp
							{{-- <div class="my-4 border-top"></div> --}}
							<div class="row align-items-center g-3">
								<div class="col-12 col-lg-6">
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
											<h5 class="mb-0">{{ $item->price }}</h5>
										</div>
									</div>
								</div>
								<div class="col-12 col-lg-3">
									<div class="cart-action text-center">
										<input type="number" class="form-control rounded-0" value="{{ $item->qty }}" min="1" readonly>
									</div>
								</div>
								<div class="col-12 col-lg-3">
									{{-- <div class="text-center">
										<div class="d-flex gap-2 justify-content-center justify-content-lg-end"> <a href="javascript:;" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-x-circle me-0'></i></a>
											<a href="javascript:;" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-edit'></i> Edit</a>
										</div>
									</div> --}}
								</div>
							</div>
							<br>
							@endforeach

							<div class="my-4 border-top"></div>
							
					@endif
				@endforeach
				
			</div>
		</div>
		<div class="card rounded-0 shadow-none">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="shipping-aadress">
							<h5 class="mb-3">Shipping to:</h5>
							@if($same_address == 0)
							<p class="mb-1"><span class="text-light">Customer:</span> {{ $s_name }}</p>
							<p class="mb-1"><span class="text-light">Address:</span> {{ $s_address1 }}</p>
							<p class="mb-1"><span class="text-light">Phone:</span> {{ $s_phone }}</p>
							@else
							<p class="mb-1"><span class="text-light">Customer:</span> {{ $b_name }}</p>
							<p class="mb-1"><span class="text-light">Address:</span> {{ $b_address1 }}</p>
							<p class="mb-1"><span class="text-light">Phone:</span> {{ $b_phone }}</p>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="payment-mode">
							<h5 class="mb-3">Payment Mode:</h5>
							{{-- <img src="assets/images/icons/visa.png" width="150" class="p-2 border bg-light rounded" alt=""> --}}
							@if($payment_method == 'cash_on_delivery')
								<img src="{{ asset('assets/images/icons/cod.png') }}" width="150" class="p-2 border bg-light rounded" alt="">
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card rounded-0 shadow-none">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						{{-- <div class="d-grid">	<a href="javascript:;" class="btn btn-light btn-ecomm"><i class="bx bx-chevron-left"></i>Back to Payment</a>
						</div> --}}
					</div>
					<div class="col-md-6">
						<div class="d-grid">	
							<a wire:click.prevent="placeOrder()" class="btn btn-white btn-ecomm">Complete Order<i class="bx bx-chevron-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>