

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

		<!-- Product -->

		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#" style="background-color:#000000;color: white;">
				Product
				<i class="right fas fa-angle-down"></i>
			</a>
			<div class="dropdown-menu dropdown-menu dropdown-menu-right">
				
				
				<a href="{{ route('admin.brands') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Brands
				</a>

				<div class="dropdown-divider"></div>
				<a href="{{ route('admin.categories') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Categories
				</a>

				<div class="dropdown-divider"></div>
				<a href="{{ route('admin.color') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Colors
				</a>

				<div class="dropdown-divider"></div>
				<a href="{{ route('admin.size') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Size
				</a>

				<div class="dropdown-divider"></div>
				<a href="{{ route('admin.product') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Manage Products
				</a>
				
			</div>
		</li>&nbsp;&nbsp;

		<!-- Product-->

		<!-- Sell Management-->

		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#" style="background-color:#027559;color: white;">
				Sell Management
				<i class="right fas fa-angle-down"></i>
			</a>
			<div class="dropdown-menu dropdown-menu dropdown-menu-right">
				
				
				<a href="{{ route('admin.coupons') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Coupons
				</a>

				<div class="dropdown-divider"></div>
				<a href="{{ route('admin.orders') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Orders
				</a>

				<div class="dropdown-divider"></div>
				<a href="{{ route('admin.refund_request') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Refund Requests
				</a>

				<div class="dropdown-divider"></div>
				<a href="{{ route('admin.user_complain') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Complains
				</a>
				
			</div>
		</li>&nbsp;&nbsp;

		<!-- Sell Management-->

		<!-- Seller-->

		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#" style="background-color:#803703;color: white;">
				Seller
				<i class="right fas fa-angle-down"></i>
			</a>
			<div class="dropdown-menu dropdown-menu dropdown-menu-right">
				
				<a href="{{ route('admin.vendor') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Shop
				</a>
				{{-- <a href="{{ route('admin.manage_user') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Brand Owner/Seller Profiles
				</a> --}}

				<div class="dropdown-divider"></div>
				<a href="{{ route('admin.seller_registration') }}" class="dropdown-item">
					<i class="nav-icon bi bi-arrow-return-right"></i>
					Seller Registration Info
				</a>
				
			</div>
		</li>&nbsp;&nbsp;

		<!-- Seller-->

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

		

		

		

