


	<li class="nav-item">
		<a href="{{ route('vendor.dashboard') }}" class="nav-link" style="background-color:#0000FF;color: white;">
			{{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
			<p>
				Dashboard
			</p>
		</a>
	</li>&nbsp;&nbsp;

	@php
		$vendor_id;
		$user_id = Auth::id();

        $vendor = App\Models\vendor::where('user_id',$user_id)->get();

        foreach ($vendor as $key => $value) {
            // array_push($this->vendor_id_array, $value->id);

            $vendor_id = $value->id;
        }
	@endphp

	<li class="nav-item dropdown">
		<a class="nav-link" data-toggle="dropdown" href="#" style="background-color:#e6194B;color: white;">
			Manage Products
			<i class="right fas fa-angle-down"></i>
		</a>
		<div class="dropdown-menu dropdown-menu dropdown-menu-right">
			
			
			<a href="{{ route('vendor.products') }}" class="dropdown-item">
				<i class="nav-icon bi bi-arrow-return-right"></i>
				All Products
			</a>

			<div class="dropdown-divider"></div>
			<a href="{{ route('vendor.product_color') }}" class="dropdown-item">
				<i class="nav-icon bi bi-arrow-return-right"></i>
				Product Colors
			</a>
			<div class="dropdown-divider"></div>
			<a href="{{ route('vendor.add_products' ,['id'=>$vendor_id]) }}" class="dropdown-item">
				<i class="nav-icon bi bi-arrow-return-right"></i>
				Add Product With Variations
			</a>
			<div class="dropdown-divider"></div>
			<a href="{{ route('vendor.add_products_without_variation' ,['id'=>$vendor_id]) }}" class="dropdown-item">
				<i class="nav-icon bi bi-arrow-return-right"></i>
				Add Product
			</a>
			
		</div>
	</li>&nbsp;&nbsp;

	<li class="nav-item">
		<a href="{{ route('vendor.orders') }}" class="nav-link" style="background-color:#3cb44b;color: white;">
			{{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
			<p>
				Manage Orders
			</p>
		</a>
	</li>&nbsp;&nbsp;