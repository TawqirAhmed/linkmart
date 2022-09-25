<!doctype html>
<html lang="en">




@php
	if (!(Session::has('cart_instance'))) {
		
		$temp = array();
		Session()->put('cart_instance',[
                    'vendors'=> json_encode($temp)
                ]);
	}
	// else{
	// 	dd(Session()->get('cart_instance'));
	// }
@endphp


<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">

	@stack('meta')
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--favicon-->
	<link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{asset('assets/plugins/OwlCarousel/dist/assets/owl.carousel.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/OwlCarousel/dist/assets/owl.theme.default.min.css')}}" rel="stylesheet" />
	{{-- <link href="{{asset('assets/plugins/OwlCarousel/css/owl.carousel.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/OwlCarousel/css/owl.theme.default.min.css')}}" rel="stylesheet" /> --}}
	<link href="{{asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/nouislider/nouislider.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />
	{{-- <script src="{{asset('assets/js/pace.min.js')}}"></script> --}}
	<!-- Bootstrap CSS -->
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">

	<!-- Toster -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

	<title>LinkMart</title>

	@stack('styles')

	@livewireStyles


	


</head>

<body class="bg-theme bg-theme2">	<b class="screen-overlay"></b>
	<!--wrapper-->
	<div class="wrapper">
		<!--start top header wrapper-->
		<div class="header-wrapper bg-dark-1">

			<div class="top-menu border-bottom">
				<div class="container">
					<nav class="navbar navbar-expand">
						{{-- <div class="shiping-title text-uppercase font-13 text-white d-none d-sm-flex">Welcome to our eTrans store!</div> --}}
						<ul class="navbar-nav ms-auto d-none d-lg-flex">
							<li class="nav-item"> <a class="nav-link" href="{{ route('web.vendor_registration') }}">Register As Seller</a>
							</li>
							<li class="nav-item"> <a class="nav-link" href="{{ route('login') }}">Login As Seller</a>
							</li>
							
						</ul>
						
						@php
							$nav_data = App\Models\NavBar::find(1);
						@endphp

						<ul class="navbar-nav social-link ms-lg-2 ms-auto">
							<li class="nav-item"> <a class="nav-link" href="{{ $nav_data->fb_link }}" target="_blank"><i class='bx bxl-facebook'></i></a>
							</li>
							<li class="nav-item"> <a class="nav-link" href="{{ $nav_data->insta_link }}" target="_blank"><i class='bx bxl-instagram'></i></a>
							</li>
						</ul>
					</nav>
				</div>
			</div>

			<div class="top-menu border-bottom">
				<div class="container">
					
					

				</div>
			</div>
			<div class="header-content pb-3 pb-md-0">
				<div class="container" style="max-width: 1366px;">
					<div class="row align-items-center">

						<div class="col col-md-auto">
							<div class="d-flex align-items-center">

								<div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main"><i class='bx bx-menu'></i>
								</div>
								
								@php
									$nav_info = App\Models\NavBar::find(1);
									$db_logo = $nav_info->logo;
								@endphp

								<div class="logo d-none d-lg-flex">
									<a href="/">
										<img src="{{ asset('uploads/logo') }}/{{ $db_logo }}" class="logo-icon" />
									</a>
								</div>
							</div>
						</div>

						<div class="col col-md-auto">
							<div class="mobile-toggle-menu d-lg-none px-lg-2" style="text-align: center;">
								<a href="/">
									{{-- <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon"  style="width:50%" /> --}}
									<img src="{{ asset('uploads/logo') }}/{{ $db_logo }}" class="logo-icon" style="width:50%"/>
								</a>
							</div>
						</div>

						<div class="col-12 col-md-auto order-4 order-md-2">
							
							{{-- @livewire('web.home-searchbar-component') --}}
							<div class="primary-menu">
								<div class="container">
									
									
									
									@include('web.base.navmenu')

								</div>
							</div>


						</div>

						<div class="col col-md-auto order-3 d-none d-xl-flex align-items-center">
							

							@livewire('web.home-searchbar-component')

						</div>
						<div class="col col-md-auto order-2 order-md-4">
							<div class="top-cart-icons">
								<nav class="navbar navbar-expand">
									<ul class="navbar-nav ms-auto">
										
										@livewire('web.cart.cart-count-component')
										
										@livewire('web.wishlist.wishlist-count-component')

										

									</ul>
								</nav>
							</div>
						</div>
					</div>
					<!--end row-->
				</div>
			</div>
			{{-- <div class="primary-menu border-top">
				<div class="container">
					
					
					
					@include('web.base.navmenu')

				</div>
			</div>
 --}}		</div>
		<!--end top header wrapper-->


			<div class="mobile-toggle-menu d-lg-none px-lg-2" style="text-align: center;">
				@livewire('web.home-searchbar-component')
			</div>


				



				<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

				
				{{-- @yield('content') --}}
				{{ $slot }}


				


			</div>
		</div>
		<!--end page wrapper -->



		@php
			$footer_data = App\Models\Footer::find(1);

			$footer_categories_array = json_decode($footer_data->categories);
			$footer_categories = App\Models\category::whereIn('id',$footer_categories_array)->get();
			$footer_tags = json_decode($footer_data->tags);
			
			$footer_contact_info = $footer_data->contact_info;

		@endphp


		<!--start footer section-->
		<footer>
			<section class="py-4 bg-dark-1">
				<div class="container">
					<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
						<div class="col">
							<div class="footer-section1 mb-4">
								<h6 class="mb-3 text-uppercase">Contact Info</h6>

								{{-- <div class="address mb-3">
									<p class="mb-0 font-12">Aura International Limited</p>
									<p class="mb-0 font-12">10/2, Purana Paltan, Dhaka 1000</p>
								</div>
								<div class="phone mb-3">
									<p class="mb-0 text-uppercase text-white">Phone</p>
									<p class="mb-0 font-13">TNT 02226663220</p>
									
								</div> --}}

								<div class="address mb-3">
									{!! $footer_contact_info !!}
								</div>
								
							</div>
						</div>
						<div class="col">

							

							<div class="footer-section2 mb-3">
								<h6 class="mb-3 text-uppercase">Categories</h6>
								<ul class="list-unstyled">

									@foreach($footer_categories as $key=>$value)
									<li class="mb-1"><a href="{{ route('web.single_category',['id'=>$value->id]) }}"><i class='bx bx-chevron-right'></i> {{ $value->name }}</a>
									</li>
									@endforeach

								</ul>
							</div>
						</div>
						<div class="col">
							<div class="footer-section3 mb-3">
								<h6 class="mb-3 text-uppercase">Popular Tags</h6>
								<div class="tags-box">

									{{-- @php
										dd($footer_tags);
									@endphp --}}

									@foreach($footer_tags as $key=>$value)

									@if(!empty($value))
										<a href="{{ route('web.searched_products' ,['key'=>$value]) }}" class="tag-link">{{ $value }}</a>
									@endif
									
									@endforeach
									

								</div>
							</div>
						</div>
						<div class="col">
							<div class="footer-section4 mb-4">
								{{-- <h6 class="mb-3 text-uppercase">Stay informed</h6>
								<div class="subscribe">
									<input type="text" class="form-control radius-30" placeholder="Enter Your Email" />
									<div class="mt-2 d-grid">	<a href="javascript:;" class="btn btn-white btn-ecomm radius-30">Subscribe</a>
									</div>
									<p class="mt-2 mb-0 font-13">Subscribe to our newsletter to receive early discount offers, updates and new products info.</p>
								</div> --}}
								<div class="download-app mt-3">
									<h6 class="mb-3 text-uppercase">Download our app</h6>
									<div class="d-flex align-items-center gap-2">
										<a href="javascript:;">
											<img src="{{ asset('assets/images/icons/apple-store.png') }}" class="" width="160" />
										</a>
										<a href="javascript:;"></a>
										<img src="{{ asset('assets/images/icons/play-store.png') }}" class="" width="160" />
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end row-->
					<hr/>
					<div class="row row-cols-1 row-cols-md-2 align-items-center">
						<div class="col">
							<p class="mb-0">Copyright © Aura International. All right reserved.</p>
						</div>
						<div class="col text-end">
							{{-- <div class="payment-icon">
								<div class="row row-cols-auto g-2 justify-content-end">
									<div class="col">
										<img src="{{ asset('assets/images/icons/visa.png') }}" />
									</div>
									<div class="col">
										<img src="{{ asset('assets/images/icons/paypal.png') }}" />
									</div>
									<div class="col">
										<img src="{{ asset('assets/images/icons/mastercard.png') }}" />
									</div>
									<div class="col">
										<img src="{{ asset('assets/images/icons/american-express.png') }}" />
									</div>
								</div>
							</div> --}}
						</div>
					</div>
					<!--end row-->
				</div>
			</section>
		</footer>
		<!--end footer section-->
		
		{{-- floating button --}}

		<a href="{{ route('web.complain') }}" class="float btn btn-light btn-ecomm">
			{{-- <i class="fa fa-plus my-float"></i> --}}
			Complain Box
		</a>

		{{-- floating button --}}



		<!--Start Back To Top Button--> 
		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	{{-- <div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		
	</div> --}}
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/OwlCarousel/dist/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	{{-- <script src="{{ asset('assets/plugins/OwlCarousel/js/owl.carousel.min.js') }}"></script> --}}
	<script src="{{ asset('assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('assets/js/app.js') }}"></script>
	{{-- <script src="{{ asset('assets/js/index.js') }}"></script> --}}
	<!--Toster-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	

	<script>
		window.addEventListener('alert', event => { 
		             toastr[event.detail.type](event.detail.message, 
		             event.detail.title ?? ''), toastr.options = {
		                    "closeButton": true,
		                    "progressBar": true,
		                }
		            });
	</script>


	<script type="text/javascript">
		// jquery ready start
		 $(document).ready(function() {
		  // jQuery code

		  $("[data-trigger]").on("click", function(e){
		    e.preventDefault();
		    e.stopPropagation();
		    var offcanvas_id =  $(this).attr('data-trigger');
		    $(offcanvas_id).toggleClass("show");
		    $('body').toggleClass("offcanvas-active");
		    $(".screen-overlay").toggleClass("show");
		  }); 

		  // Close menu when pressing ESC
		  $(document).on('keydown', function(event) {
		    if(event.keyCode === 27) {
		    $(".mobile-offcanvas").removeClass("show");
		    $("body").removeClass("overlay-active");
		    }
		  });

		  $(".btn-close, .screen-overlay").click(function(e){
		    $(".screen-overlay").removeClass("show");
		    $(".mobile-offcanvas").removeClass("show");
		    $("body").removeClass("offcanvas-active");


		  }); 


		}); // jquery end
	</script>

	<style type="text/css">
		.float{
			position:fixed;
			/*width:80px;*/
			/*height:60px;*/
			bottom:120px;
			right:10px;
			/*background-color:#0C9;*/
			/*color:#FFF;*/
			border-radius:12px;
			/*text-align:center;*/
			/*box-shadow: 2px 2px 3px #999;*/
		}

		/*.my-float{
			margin-top:22px;
		}*/
	</style>
	

	@stack('scripts')

	@livewireScripts
</body>

</html>


