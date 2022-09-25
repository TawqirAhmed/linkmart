<div class="col-12 col-xl-8">
	<div class="checkout-payment">
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
					<a class="step-item active current" href="checkout-payment.html">
						<div class="step-progress"><span class="step-count">3</span>
						</div>
						<div class="step-label"><i class='bx bx-credit-card'></i>Payment</div>
					</a>
					<a class="step-item" href="checkout-review.html">
						<div class="step-progress"><span class="step-count">4</span>
						</div>
						<div class="step-label"><i class='bx bx-check-circle'></i>Review</div>
					</a>
				</div>
			</div>
		</div>
		<div class="card rounded-0 shadow-none">
			<div class="card-header border-bottom">
				<h2 class="h5 my-2">Choose Payment Method</h2>
			</div>
			<div class="card-body">
				<ul class="nav nav-pills mb-3 border p-3" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active rounded-0" data-bs-toggle="pill" href="#cash-on-delivery" role="tab" aria-selected="true">
							<div class="d-flex align-items-center">
								<div class="tab-icon"><i class='bx bx-credit-card font-18 me-1'></i>
								</div>
								<div class="tab-title">Cash On Delivery</div>
							</div>
						</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link rounded-0" data-bs-toggle="pill" href="#credit-card" role="tab" aria-selected="true" style="pointer-events: none;">
							<div class="d-flex align-items-center">
								<div class="tab-icon"><i class='bx bx-credit-card font-18 me-1'></i>
								</div>
								<div class="tab-title">Credit Card</div>
							</div>
						</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link rounded-0" data-bs-toggle="pill" href="#paypal-payment" role="tab" aria-selected="false" style="pointer-events: none;">
							<div class="d-flex align-items-center">
								<div class="tab-icon"><i class='bx bxl-paypal font-18 me-1'></i>
								</div>
								<div class="tab-title">Paypal</div>
							</div>
						</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link rounded-0" data-bs-toggle="pill" href="#net-banking" role="tab" aria-selected="false" style="pointer-events: none;">
							<div class="d-flex align-items-center">
								<div class="tab-icon"><i class='bx bx-mobile font-18 me-1'></i>
								</div>
								<div class="tab-title">Net Banking</div>
							</div>
						</a>
					</li>
				</ul>
				<div class="tab-content" id="pills-tabContent">

					<div class="tab-pane fade show active" id="cash-on-delivery" role="tabpanel">
						<div class="p-3 border">
							
							<input class="form-check-input" type="checkbox" style="transform: scale(2);" wire:click.prevent="paymentMethod('cash_on_delivery')" @if($payment_method != null) checked @endif>
                            <label class="form-check-label" for="gridCheck">&nbsp;&nbsp;&nbsp;Confirm Cash on Delivery</label>

						</div>
					</div>

					<div class="tab-pane fade" id="credit-card" role="tabpanel">
						<div class="p-3 border">
							<form>
								<div class="mb-3">
									<label class="form-label">Card Owner</label>
									<input type="text" class="form-control rounded-0" placeholder="Card Owner name">
								</div>
								<div class="mb-3">
									<label class="form-label">Card number</label>
									<div class="input-group">
										<input type="text" class="form-control rounded-0" placeholder="Valid Owner number">	<span class="input-group-text rounded-0"><img src="assets/images/icons/mastercard.png" width="35" alt=""></span>
										<span class="input-group-text rounded-0"><img src="assets/images/icons/visa.png" width="35" alt=""></span>
										<span class="input-group-text rounded-0"><img src="assets/images/icons/american-express.png" width="35" alt=""></span>
									</div>
								</div>
								<div class="row">
									<div class="col-12 col-lg-8">
										<div class="mb-3">
											<label class="form-label">Expiration Date</label>
											<div class="input-group">
												<input type="text" class="form-control rounded-0" placeholder="MM">
												<input type="text" class="form-control rounded-0" placeholder="YY">
											</div>
										</div>
									</div>
									<div class="col-12 col-lg-4">
										<div class="mb-3">
											<label class="form-label">CVV</label>
											<input type="text" class="form-control rounded-0" placeholder="Three digit CCV number">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="d-grid">	<a href="javascript:;" class="btn btn-white btn-ecomm rounded-0">Confirm Payment</a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="tab-pane fade" id="paypal-payment" role="tabpanel">
						<div class="p-3 border">
							<div class="mb-3">
								<p>Select your Paypal Account type</p>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
									<label class="form-check-label" for="inlineRadio1">Domestic</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
									<label class="form-check-label" for="inlineRadio2">International</label>
								</div>
							</div>
							<div class="mb-3">
								<div class="d-block">	<a href="javscript:;" class="btn btn-light rounded-0"><i class='bx bxl-paypal'></i>Login to my Paypal</a>
								</div>
							</div>
							<div class="mb-3">
								<p class="mb-0">Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order.</p>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="net-banking" role="tabpanel">
						<div class="p-3 border">
							<div class="mb-3">
								<p>Select your Bank</p>
								<select class="form-select rounded-0" aria-label="Default select example">
									<option selected>--Please Select Your Bank--</option>
									<option value="1">Bank Name 1</option>
									<option value="2">Bank Name 2</option>
									<option value="3">Bank Name 3</option>
								</select>
							</div>
							<div class="mb-3">
								<div class="d-block"> <a href="javscript:;" class="btn btn-light rounded-0"><i class='bx bxl-paypal'></i>Login to my Paypal</a>
								</div>
							</div>
							<div class="mb-3">
								<p class="mb-0">Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card rounded-0 shadow-none">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						{{-- <div class="d-grid">	<a href="javascript:;" class="btn btn-light btn-ecomm"><i class="bx bx-chevron-left"></i>Back to Details</a>
						</div> --}}
					</div>
					<div class="col-md-6">
						<div class="d-grid">
						@if($payment_method != null)  	
							<a wire:click.prevent="goToReview()" class="btn btn-white btn-ecomm" >Review Your Order<i class="bx bx-chevron-right"></i></a>
						@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>