
	{{-- notification Count --}}
	@php
		// sale management
		$new_order = (App\Models\Order::where('status','ordered')->get())->count();
		$new_refund_request = (App\Models\Refund::where('status','pending')->get())->count();
		$new_complain = (App\Models\Complain::where('status','pending')->get())->count();

		$sell_manage_notification_count = $new_order + $new_refund_request + $new_complain;
		// sale management

		$new_seller = (App\Models\VendorProfile::where('seen',0)->get())->count();

	@endphp

	{{-- notification Count --}}



		<li class="nav-item">
			<a href="{{ route('admin.dashboard') }}" class="nav-link" style="background-color:#0000FF;">
				<i class="nav-icon fas fa-tachometer-alt"></i>
				<p>
					Dashboard
				</p>
			</a>
		</li>

		<!-- Product -->

		<li class="nav-item has-treeview">
			<a href="#" class="nav-link" style="background-color:#000000;">
				<i class="nav-icon fab fa-product-hunt"></i>
				<p>
				Product
				<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
			  

				<li class="nav-item">
					<a href="{{ route('admin.brands') }}" class="nav-link" style="background-color:#808000;"> 
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						
						<p>
							Brands
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.categories') }}" class="nav-link" style="background-color:#9A6324;">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						<p>
							Categories
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.color') }}" class="nav-link" style="background-color:#469990;">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						<p>
							Colors
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.size') }}" class="nav-link" style="background-color:#000075;">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						<p>
							Size
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.product') }}" class="nav-link" style="background-color:#000000;">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						<p>
							Manage Product
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.vendor_wise_product') }}" class="nav-link" style="background-color:#000000;">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						<p>
							Shop Wise Manage Product
						</p>
					</a>
				</li>

			</ul>
		</li>

		<!-- Product -->		

		<!-- Sell management -->
		<li class="nav-item has-treeview">
			<a href="#" class="nav-link" style="background-color:#027559;">
				<i class="nav-icon fas fa-money-bill"></i>
				<p>
				Sell Management

				<i class="right fas fa-angle-left"></i>
				
				<span class="badge badge-danger right">{{ $sell_manage_notification_count }}</span>

				</p>
			</a>
			<ul class="nav nav-treeview">
			  

				<li class="nav-item">
					<a href="{{ route('admin.coupons') }}" class="nav-link" style="background-color:#f58231;">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						
						<p>
							Coupons
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.orders') }}" class="nav-link" style="background-color:#3cb44b;">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						<p>
							Orders

							<span class="badge badge-danger right">{{ $new_order }}</span>
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.refund_request') }}" class="nav-link" style="background-color:#4363d8;">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						<p>
							Refund Request

							<span class="badge badge-danger right">{{ $new_refund_request }}</span>
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.user_complain') }}" class="nav-link" style="background-color:#911eb4;">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						<p>
							Complains

							<span class="badge badge-danger right">{{ $new_complain }}</span>
						</p>
					</a>
				</li>


			</ul>
		</li>
		<!-- Sell management -->

		<!-- Seller management -->

		<li class="nav-item has-treeview">
			<a href="#" class="nav-link" style="background-color:#803703;">
				<i class="nav-icon fas fa-money-bill"></i>
				<p>
				Seller
				<i class="right fas fa-angle-left"></i>

				<span class="badge badge-danger right">{{ $new_seller }}</span>

				</p>
			</a>
			<ul class="nav nav-treeview">
			  
			  	<li class="nav-item">
					<a href="{{ route('admin.vendor') }}" class="nav-link" style="background-color:#808000;"> 
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						
						<p>
							Shop
						</p>
					</a>
				</li>

				{{-- <li class="nav-item">
					<a href="{{ route('admin.manage_user') }}" class="nav-link" style="background-color:#808080;">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						
						<p>
							Brand Owner/Seller Profiles
						</p>
					</a>
				</li> --}}

				<li class="nav-item">
					<a href="{{ route('admin.seller_registration') }}" class="nav-link" style="background-color:#250396;">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						<p>
							Seller Registration Info

							<span class="badge badge-danger right">{{ $new_seller }}</span>

						</p>
					</a>
				</li>


			</ul>
		</li>

		<!-- Seller management -->

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
			<a href="#" class="nav-link" style="background-color:#8a0404;">
				<i class="nav-icon fas fa-money-bill"></i>
				<p>
				Finantial
				<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
			  

				<li class="nav-item">
					<a href="{{ route('admin.manage_review') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						
						<p>
							Review Management
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.statements') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						
						<p>
							Statement
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
			<a href="{{ route('admin.notice') }}" class="nav-link" style="background-color:#026902;">
				<i class="nav-icon fas fa-exclamation"></i>
				<p>
					Manage Notice
				</p>
			</a>
		</li>

		<li class="nav-item has-treeview">
			<a href="#" class="nav-link" style="background-color:#838704;">
				<i class="nav-icon fas fa-info"></i>
				<p>
				Support
				<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
			  

				<li class="nav-item">
					<a href="{{ route('admin.contacts') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						
						<p>
							Contacts
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.guidelines') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						
						<p>
							Guideline
						</p>
					</a>
				</li>


			</ul>
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