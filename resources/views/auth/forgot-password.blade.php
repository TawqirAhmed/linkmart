@extends('web.base.base2')

@section('content')


<!--start logon content-->
<section class="">
    <div class="container">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="row row-cols-1 row-cols-xl-2">
                <div class="col mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">

                                {{-- <div class="text-center">
                                    <h3 class="">Sign in</h3>
                                    <p>Don't have an account yet? <a href="{{ route('register') }}">Sign up here</a>
                                    </p>
                                </div> --}}

                                <div class="login-separater text-center mb-4"> 
                                    {{-- <span> SIGN IN WITH EMAIL</span>
                                    <hr/> --}}
                                </div>
                                <div class="form-body">

                                    
                                    <div class="mb-4 text-sm text-gray-600">
                                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                    </div>

                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600" style="color:green;">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <div style="color:red;">
                                        <x-jet-validation-errors class="mb-4" />
                                    </div>

                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf

                                        <div class="block">
                                            <x-jet-label for="email" value="{{ __('Email') }}" />
                                            <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            {{-- <x-jet-button>
                                                {{ __('Email Password Reset Link') }}
                                            </x-jet-button> --}}
                                            <button type="submit" class="btn btn-light">Email Password Reset Link</button>

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
<!--end logon content-->


@endsection