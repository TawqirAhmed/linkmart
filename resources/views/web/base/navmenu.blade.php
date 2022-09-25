@php

	$nav_data = App\Models\NavBar::find(1);

	$nav_categories = json_decode($nav_data->categories);
	$nav_brands = json_decode($nav_data->brands); //brands
	$nav_verified_vendors = json_decode($nav_data->verified_vendors);

	$part_category = array_chunk($nav_categories, 12);
	$part_brand = array_chunk($nav_brands, 12);
	$part_verified_vendor = array_chunk($nav_verified_vendors, 12);

	$category_col_1 =App\Models\category::whereIn('id', $part_category[0])->get();
	$category_col_2 =App\Models\category::whereIn('id', $part_category[1])->get();
	$category_col_3 =App\Models\category::whereIn('id', $part_category[2])->get();

	// brands
	$brand_col_1 =App\Models\Brand::whereIn('id', $part_brand[0])->get();
	$brand_col_2 =App\Models\Brand::whereIn('id', $part_brand[1])->get();
	$brand_col_3 =App\Models\Brand::whereIn('id', $part_brand[2])->get();
	// brands

	$verified_vendor_col_1 =App\Models\vendor::whereIn('id', $part_verified_vendor[0])->get();
	$verified_vendor_col_2 =App\Models\vendor::whereIn('id', $part_verified_vendor[1])->get();
	$verified_vendor_col_3 =App\Models\vendor::whereIn('id', $part_verified_vendor[2])->get();

@endphp


<nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg">
	<div class="offcanvas-header">
		<button class="btn-close float-end"></button>
		<h5 class="py-2 text-white">Navigation</h5>
	</div>
	<ul class="navbar-nav">
		<li class="nav-item active"> <a class="nav-link" href="/">Home </a> 
		</li>
		<li class="nav-item dropdown"> 
			<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">Categories <i class='bx bx-chevron-down'></i></a>
			<div class="dropdown-menu dropdown-large-menu">
				<div><a href="/categories" class="large-menu-title">All Categories</a></div>
				<hr>
				<div class="row">
					<div class="col-md-4">
						{{-- <h6 class="large-menu-title">Fashion</h6> --}}
						<ul class="">

							@foreach($category_col_1 as $key=>$value)
							<li><a href="{{ route('web.single_category',['id'=>$value->id]) }}">{{ $value->name }}</a>
							</li>
							@endforeach

						</ul>
					</div>
					<!-- end col-3 -->
					<div class="col-md-4">
						{{-- <h6 class="large-menu-title">Electronics</h6> --}}
						<ul class="">

							@foreach($category_col_2 as $key=>$value)
							<li><a href="{{ route('web.single_category',['id'=>$value->id]) }}">{{ $value->name }}</a>
							</li>
							@endforeach

						</ul>
					</div>
					<!-- end col-3 -->
					<div class="col-md-4">
						<ul class="">

							@foreach($category_col_3 as $key=>$value)
							<li><a href="{{ route('web.single_category',['id'=>$value->id]) }}">{{ $value->name }}</a>
							</li>
							@endforeach

						</ul>
					</div>
					<!-- end col-3 -->
				</div>
				<!-- end row -->
			</div>
			<!-- dropdown-large.// -->
		</li>


		<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">Brands <i class='bx bx-chevron-down'></i></a>
			<div class="dropdown-menu dropdown-large-menu">
				<div><a href="/brands" class="large-menu-title">All Brands</a></div>
				<hr>
				<div class="row">
					<div class="col-md-4">
						{{-- <h6 class="large-menu-title">Fashion</h6> --}}

						<ul class="">
							
							@foreach($brand_col_1 as $key=>$value)
							<li><a href="{{ route('web.brand_products',['key'=>$value->id]) }}">{{ $value->name }}</a>
							</li>
							@endforeach

						</ul>

					</div>
					<!-- end col-3 -->
					<div class="col-md-4">
						{{-- <h6 class="large-menu-title">Electronics</h6> --}}

						<ul class="">
							
							@foreach($brand_col_2 as $key=>$value)
							<li><a href="{{ route('web.brand_products',['key'=>$value->id]) }}">{{ $value->name }}</a>
							</li>
							@endforeach

						</ul>

					</div>
					<!-- end col-3 -->
					<div class="col-md-4">

						<ul class="">
							
							@foreach($brand_col_3 as $key=>$value)
							<li><a href="{{ route('web.brand_products',['key'=>$value->id]) }}">{{ $value->name }}</a>
							</li>
							@endforeach

						</ul>

					</div>
					<!-- end col-3 -->
				</div>
				<!-- end row -->
			</div>
			<!-- dropdown-large.// -->
		</li>

		<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">Verified Seller <i class='bx bx-chevron-down'></i></a>
			<div class="dropdown-menu dropdown-large-menu">
				<div><a href="/verified_vendors" class="large-menu-title">All Verified Sellers</a></div>
				<hr>
				<div class="row">
					<div class="col-md-4">
						{{-- <h6 class="large-menu-title">Fashion</h6> --}}

						<ul class="">
							
							@foreach($verified_vendor_col_1 as $key=>$value)
							<li><a href="{{ route('web.vendor_products',['key'=>$value->id]) }}">{{ $value->name }}</a>
							</li>
							@endforeach

						</ul>

					</div>
					<!-- end col-3 -->
					<div class="col-md-4">
						{{-- <h6 class="large-menu-title">Electronics</h6> --}}

						<ul class="">
							
							@foreach($verified_vendor_col_2 as $key=>$value)
							<li><a href="{{ route('web.vendor_products',['key'=>$value->id]) }}">{{ $value->name }}</a>
							</li>
							@endforeach

						</ul>

					</div>
					<!-- end col-3 -->
					<div class="col-md-4">

						<ul class="">
							
							@foreach($verified_vendor_col_3 as $key=>$value)
							<li><a href="{{ route('web.vendor_products',['key'=>$value->id]) }}">{{ $value->name }}</a>
							</li>
							@endforeach

						</ul>

					</div>
					<!-- end col-3 -->
				</div>
				<!-- end row -->
			</div>
			<!-- dropdown-large.// -->
		</li>


		

		
		{{-- <li class="nav-item"> <a class="nav-link" href="/about_us">About Us </a> 
		</li> --}}
		{{-- <li class="nav-item"> <a class="nav-link" href="/contact_us">Contact Us </a> 
		</li> --}}
		{{-- <li class="nav-item"> <a class="nav-link" href="shop-categories.html">Our Store</a> 
		</li> --}}

		@if(Route::has('login'))
			@auth
				@if(Auth::user()->user_type === 'user')
					<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">My Account<i class='bx bx-chevron-down'></i></a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="{{ route('user.user_profile', ['id'=>Auth::user()->id]) }}">Account Details</a>
							</li>
							
							<li><a class="dropdown-item" href="{{ route('user.user_refund', ['id'=>Auth::user()->id]) }}">Apply For Refund</a>
							</li>

							<li>
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									<i class="fa fa-pencil-square-o"></i>Logout</a>
							</li>
							<form id="logout-form" method="POST" action="{{ route('logout') }}">
								@csrf
							</form>
						</ul>
					</li>
				@elseif(Auth::user()->user_type === 'vendor')
					<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">My Account<i class='bx bx-chevron-down'></i></a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="{{ route('vendor.dashboard') }}">Dashboard</a>
							</li>
							
							<li>
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									<i class="fa fa-pencil-square-o"></i>Logout</a>
							</li>
							<form id="logout-form" method="POST" action="{{ route('logout') }}">
								@csrf
							</form>
						</ul>
					</li>
				@else


					<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">My Account<i class='bx bx-chevron-down'></i></a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
							</li>
							
							<li>
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									<i class="fa fa-pencil-square-o"></i>Logout</a>
							</li>
							<form id="logout-form" method="POST" action="{{ route('logout') }}">
								@csrf
							</form>
						</ul>
					</li>

				@endif
			@else
				<li class="nav-item"> <a class="nav-link" href="{{ route('login') }}">Login</a>
				{{-- <li class="nav-item"> <a class="nav-link" href="{{ route('register') }}">Register</a> --}}
			@endif
		@endif

	</ul>
</nav>