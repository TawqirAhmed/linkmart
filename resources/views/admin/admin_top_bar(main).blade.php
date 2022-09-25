

		<li class="nav-item">
			<a href="{{ route('admin.dashboard') }}" class="nav-link" style="background-color:#0000FF;color: white;">
				{{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
				<p>
					Dashboard
				</p>
			</a>
		</li>&nbsp;&nbsp;

		<li class="nav-item">
			<a href="{{ route('admin.categories') }}" class="nav-link" style="background-color:#9A6324;color: white;">
				{{-- <i class="nav-icon fas fa-bars"></i> --}}
				<p>
					Categories
				</p>
			</a>
		</li>&nbsp;&nbsp;

		<li class="nav-item">
			<a href="{{ route('admin.vendor') }}" class="nav-link" style="background-color:#808000;color: white;">
				{{-- <i class="nav-icon fas fa-truck-loading"></i> --}}
				<p>
					{{-- Vendors --}}
					Brands
				</p>
			</a>
		</li>&nbsp;&nbsp;

		<li class="nav-item">
			<a href="{{ route('admin.color') }}" class="nav-link" style="background-color:#469990;color: white;">
				{{-- <i class="nav-icon fas fa-palette"></i> --}}
				<p>
					Color
				</p>
			</a>
		</li>&nbsp;&nbsp;

		<li class="nav-item">
			<a href="{{ route('admin.size') }}" class="nav-link" style="background-color:#000075;color: white;">
				{{-- <i class="nav-icon fas fa-ruler-combined"></i> --}}
				<p>
					Size
				</p>
			</a>
		</li>&nbsp;&nbsp;

		<li class="nav-item">
			<a href="{{ route('admin.product') }}" class="nav-link" style="background-color:#000000;color: white;">
				{{-- <i class="nav-icon fab fa-product-hunt"></i> --}}
				<p>
					Products
				</p>
			</a>
		</li>&nbsp;&nbsp;

		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#" style="background-color:#e6194B;color: white;">
				Sale Management
				<i class="right fas fa-angle-down"></i>
			</a>
			<div class="dropdown-menu dropdown-menu dropdown-menu-right">
				
				
				<a href="{{ route('admin.hot_sale') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Hot Sale
				</a>

				<div class="dropdown-divider"></div>
				<a href="{{ route('admin.flash_sale') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Flash Sale
				</a>
				
			</div>
		</li>&nbsp;&nbsp;
		

		<li class="nav-item">
			<a href="{{ route('admin.coupons') }}" class="nav-link" style="background-color:#f58231;color: white;">
				{{-- <i class="nav-icon fas fa-tags"></i> --}}
				<p>
					Coupons
				</p>
			</a>
		</li>&nbsp;&nbsp;

		<li class="nav-item">
			<a href="{{ route('admin.orders') }}" class="nav-link" style="background-color:#3cb44b;color: white;">
				{{-- <i class="nav-icon fas fa-tags"></i> --}}
				<p>
					Orders
				</p>
			</a>
		</li>&nbsp;&nbsp;

		<li class="nav-item">
			<a href="{{ route('admin.refund_request') }}" class="nav-link" style="background-color:#4363d8;color: white;">
				{{-- <i class="nav-icon fas fa-money-check"></i> --}}
				<p>
					Refund Requests
				</p>
			</a>
		</li>&nbsp;&nbsp;

		<li class="nav-item">
			<a href="{{ route('admin.user_complain') }}" class="nav-link" style="background-color:#911eb4;color: white;">
				{{-- <i class="nav-icon fas fa-angry"></i> --}}
				<p>
					Complains
				</p>
			</a>
		</li>&nbsp;&nbsp;

		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#" style="background-color:#f032e6;color: white;">
				Service
				<i class="right fas fa-angle-down"></i>
			</a>
			<div class="dropdown-menu dropdown-menu dropdown-menu-right">
				
				
				<a href="{{ route('admin.service_category') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Service Category
				</a>

				<div class="dropdown-divider"></div>
				<a href="{{ route('admin.service') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Manage Service
				</a>
				
			</div>
		</li>	&nbsp;&nbsp;


		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#" style="background-color:#00008B;color: white;">
				Home Settings
				<i class="right fas fa-angle-down"></i>
			</a>
			<div class="dropdown-menu dropdown-menu dropdown-menu-right">
				
				
				<a href="{{ route('admin.sectionSettings') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Home Sections
				</a>

				<div class="dropdown-divider"></div>
				<a href="{{ route('admin.headerSettings') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Header Settings
				</a>

				<div class="dropdown-divider"></div>
				<a href="{{ route('admin.sliderSettings') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Home Sliders
				</a>

				<div class="dropdown-divider"></div>
				<a href="{{ route('admin.home_category') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Home Category
				</a>

				<div class="dropdown-divider"></div>
				<a href="{{ route('admin.promotionSettings') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Promotion Settings
				</a>

				<div class="dropdown-divider"></div>
				<a href="{{ route('admin.addBanners') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Advertise Banners
				</a>

				<div class="dropdown-divider"></div>
				<a href="{{ route('admin.footerSettings') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Footer Settings
				</a>
				
			</div>
		</li> &nbsp;&nbsp;

		<li class="nav-item">
			<a href="{{ route('admin.manage_user') }}" class="nav-link" style="background-color:#808080;color: white;">
				<p>
					Brand Owner Profiles
				</p>
			</a>
		</li>&nbsp;&nbsp;

		

		

