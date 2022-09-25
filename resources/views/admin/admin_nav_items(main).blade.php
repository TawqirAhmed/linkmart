

		<li class="nav-item">
			<a href="{{ route('admin.dashboard') }}" class="nav-link" style="background-color:#0000FF;">
				<i class="nav-icon fas fa-tachometer-alt"></i>
				<p>
					Dashboard
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('admin.categories') }}" class="nav-link" style="background-color:#9A6324;">
				<i class="nav-icon fas fa-bars"></i>
				<p>
					Categories
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('admin.vendor') }}" class="nav-link" style="background-color:#808000;">
				<i class="nav-icon fas fa-truck-loading"></i>
				<p>
					{{-- Vendors --}}
					Brands
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('admin.color') }}" class="nav-link" style="background-color:#469990;">
				<i class="nav-icon fas fa-palette"></i>
				<p>
					Color
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('admin.size') }}" class="nav-link" style="background-color:#000075;">
				<i class="nav-icon fas fa-ruler-combined"></i>
				<p>
					Size
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('admin.product') }}" class="nav-link" style="background-color:#000000;">
				<i class="nav-icon fab fa-product-hunt"></i>
				<p>
					Products
				</p>
			</a>
		</li>

		<li class="nav-item has-treeview">
			<a href="#" class="nav-link" style="background-color:#e6194B;">
				<i class="nav-icon fas fa-money-bill"></i>
				<p>
				Sale Management
				<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
			  

				<li class="nav-item">
					<a href="{{ route('admin.hot_sale') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						
						<p>
							Hot Sale
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.flash_sale') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						<p>
							Flash Sale
						</p>
					</a>
				</li>


			</ul>
		</li>

		<li class="nav-item">
			<a href="{{ route('admin.coupons') }}" class="nav-link" style="background-color:#f58231;">
				<i class="nav-icon fas fa-tags"></i>
				<p>
					Coupons
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('admin.orders') }}" class="nav-link" style="background-color:#3cb44b;">
				<i class="nav-icon fas fa-tags"></i>
				<p>
					Orders
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('admin.refund_request') }}" class="nav-link" style="background-color:#4363d8;">
				<i class="nav-icon fas fa-money-check"></i>
				<p>
					Refund Requests
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('admin.user_complain') }}" class="nav-link" style="background-color:#911eb4;">
				<i class="nav-icon fas fa-angry"></i>
				<p>
					Complains
				</p>
			</a>
		</li>


		<li class="nav-item has-treeview">
			<a href="#" class="nav-link" style="background-color:#f032e6;">
				<i class="nav-icon fas fa-ad"></i>
				<p>
				Service
				<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
			  
			  	<li class="nav-item">
					<a href="{{ route('admin.service_category') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						{{-- <i class="nav-icon fas fa-angle-double-right"></i> --}}
						{{-- <i class="nav-icon fas fa-cog"></i> --}}
						<p>
							Service Category
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.service') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						{{-- <i class="nav-icon fas fa-angle-double-right"></i> --}}
						{{-- <i class="nav-icon fas fa-cog"></i> --}}
						<p>
							Manage Service
						</p>
					</a>
				</li>

				

			</ul>
		</li>



		<li class="nav-item has-treeview">
			<a href="#" class="nav-link" style="background-color:#00008B;">
				<i class="nav-icon fas fa-cogs"></i>
				<p>
				Home Settings
				<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
			  

				<li class="nav-item">
					<a href="{{ route('admin.sectionSettings') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						{{-- <i class="nav-icon fas fa-angle-double-right"></i> --}}
						{{-- <i class="nav-icon fas fa-cog"></i> --}}
						<p>
							Home Sections
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.headerSettings') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						{{-- <i class="nav-icon fas fa-angle-double-right"></i> --}}
						{{-- <i class="nav-icon fas fa-cog"></i> --}}
						<p>
							Header Settings
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.sliderSettings') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						{{-- <i class="nav-icon fas fa-angle-double-right"></i> --}}
						{{-- <i class="nav-icon fas fa-cog"></i> --}}
						<p>
							Home Sliders
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.home_category') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						{{-- <i class="nav-icon fas fa-angle-double-right"></i> --}}
						{{-- <i class="nav-icon fas fa-cog"></i> --}}
						<p>
							Home Category
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.promotionSettings') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						{{-- <i class="nav-icon fas fa-angle-double-right"></i> --}}
						{{-- <i class="nav-icon fas fa-cog"></i> --}}
						<p>
							Promotion Settings
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.promotionSettings') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						{{-- <i class="nav-icon fas fa-angle-double-right"></i> --}}
						{{-- <i class="nav-icon fas fa-cog"></i> --}}
						<p>
							Promotion Settings
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.addBanners') }}" class="nav-link">

						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						{{-- <i class="nav-icon fas fa-angle-double-right"></i> --}}
						{{-- <i class="nav-icon fas fa-ad"></i> --}}
						<p>
							Advertise Banners
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.footerSettings') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						{{-- <i class="nav-icon fas fa-angle-double-right"></i> --}}
						{{-- <i class="nav-icon fas fa-cog"></i> --}}
						<p>
							Footer Settings
						</p>
					</a>
				</li>

			</ul>
		</li>

		<li class="nav-item">
			<a href="{{ route('admin.manage_user') }}" class="nav-link" style="background-color:#808080;">
				<i class="nav-icon fas fa-users"></i>
				<p>
					Brand Owner Profiles
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('admin.manage_admin') }}" class="nav-link" style="background-color:#eb2348;">
				<i class="nav-icon fas fa-users"></i>
				<p>
					Admin Profiles
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('admin.seller_registration') }}" class="nav-link" style="background-color:#250396;">
				<i class="nav-icon fas fa-users"></i>
				<p>
					Seller Registration Request
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('admin.report_download') }}" class="nav-link" style="background-color:#786801;">
				<i class="nav-icon fas fa-chart-line"></i>
				<p>
					Report Download
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('admin.test_page') }}" class="nav-link">
				<i class="nav-icon fas fa-tachometer-alt"></i>
				<p>
					Test Page
				</p>
			</a>
		</li>