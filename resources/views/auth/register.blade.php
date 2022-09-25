@extends('web.base.base2')

@section('content')


<!--start shop cart-->
<section class="py-0 py-lg-5">
	<div class="container">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="row row-cols-1 row-cols-lg-1 row-cols-xl-2">
				<div class="col mx-auto">
					<div class="card mb-0">
						<div class="card-body">
							<div class="border p-4 rounded">
								<div class="text-center">
									<h3 class="">Sign Up</h3>
									<p>Already have an account? <a href="{{ route('login') }}">Sign in here</a>
									</p>
								</div>
								
								<div class="login-separater text-center mb-4"> <span>SIGN UP WITH EMAIL</span>
									<hr/>
								</div>
								<div class="form-body">

									<div style="color: red;">
										<x-jet-validation-errors class="mb-4" />
									</div>
									
									<form class="row g-3" method="POST" action="{{ route('register') }}">
										@csrf
										<div class="col-sm-12">
											<label for="name" class="form-label">Name</label>
											<input class="form-control" id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Full Name">
										</div>
										<div class="col-12">
											<label for="email" class="form-label">Email Address</label>
											<input type="email" class="form-control" id="email" placeholder="example@user.com" name="email" :value="old('email')" required >
										</div>
										<div class="col-12">
											<label for="mobile" class="form-label">Mobile No</label>
											<input type="text" class="form-control" id="mobile" name="mobile" :value="old('mobile')" required >
										</div>
										<div class="col-12">
											<label for="password" class="form-label">Password</label>
											<div class="input-group" id="show_hide_password">
												<input type="password" class="form-control border-end-0" id="password" name="password" required autocomplete="new-password" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
											</div>
										</div>
										<div class="col-12">
											<label for="password_confirmation" class="form-label">Confirm Password</label>
											<div class="input-group" id="confirm_show_hide_password">
												<input type="password" class="form-control border-end-0" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
											</div>
										</div>
										
										<div class="col-12">
											<div class="d-grid">
												<button type="submit" class="btn btn-light"><i class='bx bx-user'></i>Sign up</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end row-->
		</div>
	</div>
</section>
<!--end shop cart-->



@push('scripts')

<!--Password show & hide js -->
<script src="{{ asset('assets/js/show-hide-password.js') }}"></script>

@endpush

@endsection