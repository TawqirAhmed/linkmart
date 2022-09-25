<div class="module so-deals">
	<h3 class="modtitle"><span>On Sale</span></h3>
	<div class="modcontent">
	    <div id="so_deals_14513931681482050581" class="so-deal modcontent products-list grid clearfixbutton-type1 style2">
        	<div class="extraslider-inner product-layout deal-slider">   	

        		@foreach($products as $key=>$prod)
        			@if($prod->on_sale ==1 && $prod->sale_end > Carbon\Carbon::now())
		                <div class="product-thumb transition product-item-container">
							<div class="left-block">
								<div class="product-image-container">
									<div class="image">
										<span class="label label-sale">Sale</span>
										<a class="lt-image" href="{{ route('product_details' ,['id'=>$prod->id]) }}" target="_self">
											<img  class="lazyload img-1 img-responsive" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ asset('') }}uploads/products/{{ $prod->name }}/{{ $prod->image }}" alt="{{ $prod->name }}" title="{{ $prod->name }}"/>
											<img  class="lazyload img-2 img-responsive" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ asset('') }}uploads/products/{{ $prod->name }}/{{ $prod->variations[0]->image }}" alt="{{ $prod->name }}" title="{{ $prod->name }}"/>
										</a>
										{{-- <div class="item-time">
											<div class="item-timer">
												<div class="defaultCountdown-30"></div>
												
												


											</div>
										</div> --}}
									</div>
								</div>
							</div>
							<div class="right-block">
								<div class="caption">
									<div class="rating">
									<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
									<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
									<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
									<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
									<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
									</div>
									<h4><a href="{{ route('product_details' ,['id'=>$prod->id]) }}" target="_self" title="Juren tima chuk..">{{ $prod->name }}</a></h4>
									<p class="price">
									
										@if($prod->on_sale == 1 && $prod->sale_end > Carbon\Carbon::now())
										<span class="price-new">TK.{{ $prod->sale_price }}</span> <span class="price-old">TK.{{ $prod->unit_price }}</span>
										@else
											<span class="price-new">TK.{{ $prod->unit_price }}</span>
										@endif

									</p>							
								</div>	
							</div>
							<!-- End right block -->
						</div>
					@endif
				@endforeach

			</div>
		</div>
	    
	</div><!--/.modcontent-->


	
{{-- 
		<script>
		// Set the date we're counting down to
		var countDownDate = new Date("Jan 5, 2022 15:37:25").getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

		  // Get today's date and time
		  var now = new Date().getTime();
		    
		  // Find the distance between now and the count down date
		  var distance = countDownDate - now;
		    
		  // Time calculations for days, hours, minutes and seconds
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		    
		  // Output the result in an element with id="demo"
		  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
		  + minutes + "m " + seconds + "s ";
		    
		  // If the count down is over, write some text 
		  if (distance < 0) {
		    clearInterval(x);
		    document.getElementById("demo").innerHTML = "EXPIRED";
		  }
		}, 1000);
		</script> --}}

		

	


</div>