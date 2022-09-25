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

                                

                                
                                <div class="form-body">



                                    <div style="color:red;">
                                        <x-jet-validation-errors class="mb-4" />
                                    </div>

                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf

                                        <div  style="margin-left: 500px; margin-right: 500px;">
                                            
                                        </div>


                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                        <div class="block">
                                            <x-jet-label for="email" value="{{ __('Email') }}" />
                                            <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="password" value="{{ __('Password') }}" />
                                            <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                            <x-jet-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            {{-- <x-jet-button>
                                                {{ __('Reset Password') }}
                                            </x-jet-button> --}}
                                            <button type="submit" class="btn btn-light">Reset Password</button>
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