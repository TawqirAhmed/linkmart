{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout> --}}


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
                                    {{-- <hr/> --}}
                                </div>
                                <div class="form-body">

                                    
                                    <div class="mb-4 text-sm text-gray-600">
                                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                    </div>

                                    @if (session('status') == 'verification-link-sent')
                                        <div class="mb-4 font-medium text-sm text-green-600" style="color:green">
                                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                        </div>
                                    @endif

                                    <div class="mt-4 flex items-center justify-between">
                                        <form method="POST" action="{{ route('verification.send') }}">
                                            @csrf

                                            <div>
                                                {{-- <x-jet-button type="submit">
                                                    {{ __('Resend Verification Email') }}
                                                </x-jet-button> --}}

                                                <button type="submit" class="btn btn-light">Resend Verification Email</button>

                                            </div>
                                        </form>

                                        <br>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <button type="submit" class="btn btn-light">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                    </div>


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