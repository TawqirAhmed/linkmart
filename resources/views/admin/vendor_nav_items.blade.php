

		<li class="nav-item">
			<a href="{{ route('vendor.dashboard') }}" class="nav-link" style="background-color:#0000FF;">
				<i class="nav-icon fas fa-tachometer-alt"></i>
				<p>
					Dashboard
				</p>
			</a>
		</li>

		{{-- <li class="nav-item">
			<a href="{{ route('vendor.product_color') }}" class="nav-link">
				<i class="nav-icon fas fa-palette"></i>
				<p>
					Product Colors
				</p>
			</a>
		</li> --}}

		{{-- <li class="nav-item">
			<a href="{{ route('vendor.products') }}" class="nav-link">
				<i class="nav-icon fas fa-tags"></i>
				<p>
					Manage Products
				</p>
			</a>
		</li> --}}

		@php
			$vendor_id;
			$user_id = Auth::id();

	        $vendor = App\Models\vendor::where('user_id',$user_id)->get();

	        foreach ($vendor as $key => $value) {
	            // array_push($this->vendor_id_array, $value->id);

	            $vendor_id = $value->id;
	        }
		@endphp

		<li class="nav-item has-treeview">
			<a href="#" class="nav-link" style="background-color:#e6194B;">
				<i class="nav-icon fas fa-money-bill"></i>
				<p>
				Manage Products
				<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
			  
			  	<li class="nav-item">
					<a href="{{ route('vendor.products') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						
						<p>
							All Products
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('vendor.product_color') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						
						<p>
							Product Colors
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('vendor.add_products' ,['id'=>$vendor_id]) }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						
						<p>
							Add Product With Variations
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('vendor.add_products_without_variation' ,['id'=>$vendor_id]) }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						<p>
							Add Product
						</p>
					</a>
				</li>


			</ul>
		</li>


		<li class="nav-item">
			<a href="{{ route('vendor.orders') }}" class="nav-link" style="background-color:#3cb44b;">
				<i class="nav-icon fas fa-tags"></i>
				<p>
					Manage Orders
				</p>
			</a>
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
					<a href="{{ route('vendor.manage_review') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						
						<p>
							Review Management
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('vendor.statements') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						
						<p>
							Stetements
						</p>
					</a>
				</li>


			</ul>
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
					<a href="{{ route('vendor.contacts') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						
						<p>
							Contacts
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('vendor.guidelines') }}" class="nav-link">
						<i class="nav-icon bi bi-arrow-return-right" style="margin-left: 20px;"></i>
						
						<p>
							Guidelines
						</p>
					</a>
				</li>


			</ul>
		</li>

		<li class="nav-item">
			<a href="{{ route('vendor.account_settings') }}" class="nav-link" style="background-color:#440261;">
				<i class="nav-icon fas fa-cogs"></i>
				<p>
					Account Settings
				</p>
			</a>
		</li>