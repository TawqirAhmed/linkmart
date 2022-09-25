<div id="so_category_slider_home2" class="container-slider module  item-1">
	<div class="page-top">
		<h3 class="modtitle">
			<span>	Mobile &amp; Tablet </span>
		</h3>
		<div class="item-sub-cat">
			<ul>
				<li>
					<a href="category.html" title="Tange manue" target="_self">	Tange manue	</a>
				</li>
				<li>
					<a href="category-v2.html" title="Punge nenune" target="_self">	Punge nenune </a>
				</li>
				<li>
					<a href="category-v3.html" title="Hanet magente" target="_self"> Hanet magente </a>
				</li>
			</ul>
		</div>
	</div> <!-- /.page-top -->
	<!-- /.item-cat-image -->
	<div class="item-cat-image">
		<a href="#" title="Banner"><img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="image/demo/banner/img-cat-1.png" alt="Banner"></a>      			
	</div> 
	<!-- /.item-cat-image -->
	<div class="modcontent">
		<div class="categoryslider-content products-list grid show preset01-4 preset02-3 preset03-2 preset04-2 preset05-1">
			<div class="slider so-category-slider not-js product-layout">
				






				@foreach($products as $key=>$prod)


				<div class="item product-layout">
					<div class="item-inner product-thumb transition product-item-container">
						<div class="left-block">
							<div class="product-image-container second_img">
								<div class="image">
									{{-- <span class="label label-sale">Sale</span> --}}
									<a class="lt-image" href="{{ route('product_details' ,['id'=>$prod->id]) }}" target="_self" title="{{ $prod->name }}">

										<img class="lazyload img-1 img-responsive" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="uploads/products/{{ $prod->name }}/{{ $prod->image }}" alt="{{ $prod->name }}">


										<img class="lazyload img-2 img-responsive" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="uploads/products/{{ $prod->name }}/{{ $prod->variations[0]->image }}" alt="{{ $prod->name }}">
										

									</a>
								</div> 
							</div>
						</div>
						<div class="right-block">
							<div class="caption">
								<div class="rating">
									<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
									<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
									<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
									<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
									<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
								</div> 
								<h4 class="item-title">
									<a href="{{ route('product_details' ,['id'=>$prod->id]) }}" title="{{ $prod->name }}" target="_self">{{ $prod->name }}</a>
								</h4>
								<p class="price">

									@if($prod->on_sale == 1 && $prod->sale_end > Carbon\Carbon::now())
										<span class="price-new">TK.{{ $prod->sale_price }}</span> <span class="price-old">TK.{{ $prod->unit_price }}</span>
									@else
										<span class="price-new">TK.{{ $prod->unit_price }}</span>
									@endif

								</p>
							</div>
						</div>
						<div class="button-group">
							<button class="wishlist btn-button" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('42');"><i class="fa fa-heart"></i></button>
							<button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs"></span></button>
							<button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
							<a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview"> <i class="fa fa-search"></i> </a>
						</div>
					</div> 
				</div>
				


				@endforeach



			</div> 
		</div>
	</div>
</div>