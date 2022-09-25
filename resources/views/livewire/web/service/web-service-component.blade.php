<div>
    
            <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--start breadcrumb-->
                <section class="py-3 border-bottom d-none d-md-flex">
                    <div class="container">
                        <div class="page-breadcrumb d-flex align-items-center">
                            <h3 class="breadcrumb-title pe-3">Services</h3>
                            <div class="ms-auto">
                                <nav aria-label="breadcrumb">
                                    {{-- <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Shop Categories</li>
                                    </ol> --}}
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>
                <!--end breadcrumb-->



                <!--start Top Deals-->
                <section class="py-4" id="top_deals">
                    <div class="container">

                        <h4>Top Deals</h4>
                        <hr>
                        <div class="product-categories">
                            <div class="row row-cols-1 row-cols-lg-4">

                                @if($topDeals && $topDeals->service->count()>0)
                                @foreach ($topDeals->service as $key=>$value)
                                   
                                    @if($value->advertice_expire_date > (Carbon\Carbon::now()))
                                        
                                    
                                        <a href="{{ route('web.service_details',['id'=>$value->id]) }}"> 
                                            <div class="card">
                                                
                                                <div class="p-3 bg-dark-1">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <img src="{{ asset('') }}uploads/service/{{ $value->logo }}" width="60px" height="60px">
                                                        </div>
                                                        <div class="col-9">
                                                            <div class="address mb-3">
                                                                <p class="mb-0 text-uppercase text-white">{{ $value->company_name }}</p>
                                                                <p class="mb-0 font-12">{{ $value->service_category->name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </a>

                                    @endif


                                @endforeach
                                @endif


                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </section>
                <!--end Top Deals-->


                <!--start Best Deals-->
                <section class="py-4" id="best_deals">
                    <div class="container">

                        <h4>Best Deals</h4>
                        <hr>
                        <div class="product-categories">
                            <div class="row row-cols-1 row-cols-lg-4">

                                @if($bestDeals && $bestDeals->service->count()>0)
                                @foreach ($bestDeals->service as $key=>$value)
                                    
                                    @if($value->advertice_expire_date > (Carbon\Carbon::now()))
                                        <a href="{{ route('web.service_details',['id'=>$value->id]) }}"> 
                                            <div class="card">
                                                
                                                <div class="p-3 bg-dark-1">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <img src="{{ asset('') }}uploads/service/{{ $value->logo }}" width="60px" height="60px">
                                                        </div>
                                                        <div class="col-9">
                                                            <div class="address mb-3">
                                                                <p class="mb-0 text-uppercase text-white">{{ $value->company_name }}</p>
                                                                <p class="mb-0 font-12">{{ $value->service_category->name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </a>
                                    @endif


                                @endforeach
                                @endif


                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </section>
                <!--end Best Deals-->

                <!--start Featured Deals-->
                <section class="py-4" id="featured_deals">
                    <div class="container">

                        <h4>Featuerd Deals</h4>
                        <hr>
                        <div class="product-categories">
                            <div class="row row-cols-1 row-cols-lg-4">

                                @if($featuredDeals && $featuredDeals->service->count() > 0)
                                @foreach ($featuredDeals->service as $key=>$value)
                                    
                                    @if($value->advertice_expire_date > (Carbon\Carbon::now()))
                                        <a href="{{ route('web.service_details',['id'=>$value->id]) }}"> 
                                            <div class="card">
                                                
                                                <div class="p-3 bg-dark-1">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <img src="{{ asset('') }}uploads/service/{{ $value->logo }}" width="60px" height="60px">
                                                        </div>
                                                        <div class="col-9">
                                                            <div class="address mb-3">
                                                                <p class="mb-0 text-uppercase text-white">{{ $value->company_name }}</p>
                                                                <p class="mb-0 font-12">{{ $value->service_category->name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </a>
                                    @endif

                                @endforeach
                                @endif


                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </section>
                <!--end Featured Deals-->
                
            </div>
        </div>
        <!--end page wrapper -->



</div>
