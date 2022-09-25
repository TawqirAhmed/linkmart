
@if(Route::has('login'))
	@auth

	@if(Auth::user()->user_type === 'vendor')

		@include('admin.vendor_nav_items')

	@else
		@include('admin.admin_nav_items')

	@endif

	
	@endif
@endif
