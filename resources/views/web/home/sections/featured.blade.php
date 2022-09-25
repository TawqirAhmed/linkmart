<!--start Featured product-->
				<section class="py-4">
					<div class="container">
						<div class="d-flex align-items-center">
							<h5 class="text-uppercase mb-0">FEATURED PRODUCTS</h5>
							<a href="javascript:;" class="btn btn-light ms-auto rounded-0">More Products<i class='bx bx-chevron-right'></i></a>
						</div>
						<hr/>
						<div class="product-grid">
							<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

								@foreach($products as $key=>$prod)
        							@if($prod->on_sale ==1 && $prod->sale_end > Carbon\Carbon::now())

										<div class="col">
											<div class="card rounded-0 product-card">
												<div class="card-header bg-transparent border-bottom-0">
													<div class="d-flex align-items-center justify-content-end gap-3">
														<a href="javascript:;">
															<div class="product-compare"><span><i class='bx bx-git-compare'></i> Compare</span>
															</div>
														</a>
														<a href="javascript:;">
															<div class="product-wishlist"> <i class='bx bx-heart'></i>
															</div>
														</a>
													</div>
												</div>
												<a href="product-details.html">
													<img src="uploads/products/{{ $prod->name }}/{{ $prod->image }}" class="card-img-top" alt="{{ $prod->name }}">
												</a>
												<div class="card-body">
													<div class="product-info">
														<a href="javascript:;">
															<p class="product-catergory font-13 mb-1">{{ $prod->category->name }}</p>
														</a>
														<a href="javascript:;">
															<h6 class="product-name mb-2">{{ $prod->name }}</h6>
														</a>
														<div class="d-flex align-items-center">
															<div class="mb-1 product-price">	<span class="me-1 text-decoration-line-through">{{ $prod->unit_price }}</span>
																<span class="text-white fs-5">{{ $prod->sale_price }}</span>
															</div>
															<div class="cursor-pointer ms-auto">	<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
															</div>
														</div>
														<div class="product-action mt-2">
															<div class="d-grid gap-2">
																<a href="javascript:;" class="btn btn-light btn-ecomm">	<i class='bx bxs-cart-add'></i>Add to Cart</a>	<a href="javascript:;" class="btn btn-link btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class='bx bx-zoom-in'></i>Quick View</a>
															</div>
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
					</div>
				</section>
				<!--end Featured product-->





				<!--start quick view product-->
				<!-- Modal -->
				<div class="modal fade" id="QuickViewProduct">
					<div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
						<div class="modal-content bg-dark-4 rounded-0 border-0">
							<div class="modal-body">
								<button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
								<div class="row g-0">
									<div class="col-12 col-lg-6">
										<div class="image-zoom-section">
											<div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
												<div class="item">
													<img src="assets/images/product-gallery/01.png" class="img-fluid" alt="">
												</div>
												<div class="item">
													<img src="assets/images/product-gallery/02.png" class="img-fluid" alt="">
												</div>
												<div class="item">
													<img src="assets/images/product-gallery/03.png" class="img-fluid" alt="">
												</div>
												<div class="item">
													<img src="assets/images/product-gallery/04.png" class="img-fluid" alt="">
												</div>
											</div>
											<div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
												<button class="owl-thumb-item">
													<img src="assets/images/product-gallery/01.png" class="" alt="">
												</button>
												<button class="owl-thumb-item">
													<img src="assets/images/product-gallery/02.png" class="" alt="">
												</button>
												<button class="owl-thumb-item">
													<img src="assets/images/product-gallery/03.png" class="" alt="">
												</button>
												<button class="owl-thumb-item">
													<img src="assets/images/product-gallery/04.png" class="" alt="">
												</button>
											</div>
										</div>
									</div>
									<div class="col-12 col-lg-6">
										<div class="product-info-section p-3">
											<h3 class="mt-3 mt-lg-0 mb-0">Allen Solly Men's Polo T-Shirt</h3>
											<div class="product-rating d-flex align-items-center mt-2">
												<div class="rates cursor-pointer font-13">	<i class="bx bxs-star text-warning"></i>
													<i class="bx bxs-star text-warning"></i>
													<i class="bx bxs-star text-warning"></i>
													<i class="bx bxs-star text-warning"></i>
													<i class="bx bxs-star text-light-4"></i>
												</div>
												<div class="ms-1">
													<p class="mb-0">(24 Ratings)</p>
												</div>
											</div>
											<div class="d-flex align-items-center mt-3 gap-2">
												<h5 class="mb-0 text-decoration-line-through text-light-3">$98.00</h5>
												<h4 class="mb-0">$49.00</h4>
											</div>
											<div class="mt-3">
												<h6>Discription :</h6>
												<p class="mb-0">Virgil Abloh’s Off-White is a streetwear-inspired collection that continues to break away from the conventions of mainstream fashion. Made in Italy, these black and brown Odsy-1000 low-top sneakers.</p>
											</div>
											<dl class="row mt-3">	<dt class="col-sm-3">Product id</dt>
												<dd class="col-sm-9">#BHU5879</dd>	<dt class="col-sm-3">Delivery</dt>
												<dd class="col-sm-9">Russia, USA, and Europe</dd>
											</dl>
											<div class="row row-cols-auto align-items-center mt-3">
												<div class="col">
													<label class="form-label">Quantity</label>
													<select class="form-select form-select-sm">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													</select>
												</div>
												<div class="col">
													<label class="form-label">Size</label>
													<select class="form-select form-select-sm">
														<option>S</option>
														<option>M</option>
														<option>L</option>
														<option>XS</option>
														<option>XL</option>
													</select>
												</div>
												<div class="col">
													<label class="form-label">Colors</label>
													<div class="color-indigators d-flex align-items-center gap-2">
														<div class="color-indigator-item bg-primary"></div>
														<div class="color-indigator-item bg-danger"></div>
														<div class="color-indigator-item bg-success"></div>
														<div class="color-indigator-item bg-warning"></div>
													</div>
												</div>
											</div>
											<!--end row-->
											<div class="d-flex gap-2 mt-3">
												<a href="javascript:;" class="btn btn-white btn-ecomm">	<i class="bx bxs-cart-add"></i>Add to Cart</a>	<a href="javascript:;" class="btn btn-light btn-ecomm"><i class="bx bx-heart"></i>Add to Wishlist</a>
											</div>
										</div>
									</div>
								</div>
								<!--end row-->
							</div>
						</div>
					</div>
				</div>
				<!--end quick view product-->