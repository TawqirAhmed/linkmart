<div>

    @push('meta')
        <meta name="description" content="{{ $Service->company_name }}">
        <meta name="keywords" content="{{ $Service->meta_tags }}">
    @endpush
    
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--start breadcrumb-->
            <section class="py-3 border-bottom d-none d-md-flex">
                <div class="container">
                    <div class="page-breadcrumb d-flex align-items-center">
                        <h3 class="breadcrumb-title pe-3">{{ $Service->company_name }}</h3>
                        {{-- <div class="ms-auto">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript:;">Blog</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Single Post</li>
                                </ol>
                            </nav>
                        </div> --}}
                    </div>
                </div>
            </section>
            <!--end breadcrumb-->
            <!--start page content-->
            <section class="py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="blog-right-sidebar p-3">
                                <div class="card shadow-none bg-transparent">
                                    
                                    <div class="card-body p-0">
                                        
                                        <h3 class="mt-4">{{ $Service->company_name }}</h3>
                                        <div class="list-inline mt-4">  
                                                <a href="{{ route('web.service') }}" class="list-inline-item" style="border-right: 1.5px solid rgb(255 255 255 / 34%); padding-right: 1rem!important;">Level: {{ $Service->advertice_category->name }}</a>

                                                <a href="{{ route('web.service') }}" class="list-inline-item">Service Type: {{ $Service->service_category->name }}</a>
                                            </div>
                                        <br>



                                        <h5 class="mt-4">Qualification</h5>
                                        <hr>
                                            {!! $Service->qualification !!}

                                        <h5 class="mt-4">Experience</h5>
                                        <hr>
                                            {!! $Service->experience !!}
                                        <h5 class="mt-4">Contact</h5>
                                        <hr>
                                            {!! $Service->contact_info !!}
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    <!--end row-->
                </div>
            </section>
            <!--end start page content-->
        </div>
    </div>
    <!--end page wrapper -->



</div>
