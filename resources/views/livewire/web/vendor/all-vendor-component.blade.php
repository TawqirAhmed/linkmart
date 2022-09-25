<div>
    
            <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--start breadcrumb-->
                <section class="py-3 border-bottom d-none d-md-flex">
                    <div class="container">
                        <div class="page-breadcrumb d-flex align-items-center">
                            <h3 class="breadcrumb-title pe-3">Brands</h3>
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
                <!--start shop categories-->
                <section class="py-4">
                    <div class="container">
                        <div class="product-categories">
                            <div class="row row-cols-1 row-cols-lg-4">

                                @foreach($allVendor as $key=>$value)
                                <div class="col">
                                    <div class="card rounded-0 product-card">
                                        <a href="{{ route('web.vendor_products',['key'=>$value->id]) }}">

                                            @if($value->image)
                                                <img src="{{ asset('') }}uploads/vendors/{{ $value->image }}" class="card-img-top border-bottom bg-dark-1" alt="...">
                                            @else
                                                <img src="{{ asset('') }}uploads/logo/default_logo.png" class="card-img-top border-bottom bg-dark-1" alt="...">
                                            @endif
                                        </a>
                                        <div class="list-group list-group-flush">
                                            <a href="{{ route('web.vendor_products',['key'=>$value->id]) }}" class="list-group-item bg-transparent">
                                                <h6 class="mb-0 text-uppercase">{{ $value->name }}</h6>
                                            </a>    
                                            <a href="{{ route('web.vendor_products',['key'=>$value->id]) }}" class="list-group-item bg-transparent d-flex justify-content-between align-items-center">
                                            Total Products
                                              <span class="badge bg-light rounded-pill">{{ $value->products->count() }}</span>
                                            </a>
                                           
                                        </div>
                                    </div>
                                </div>
                                @endforeach



                            </div>
                            <!--end row-->

                            {{ $allVendor->links() }}

                        </div>
                    </div>
                </section>
                <!--end shop categories-->

                {{-- <!--start brand-->
                <section class="py-4">
                    <div class="container">
                        <div class="popular-brands">
                            <div class="text-center">
                                <h2 class="text-uppercase mb-0">Popular Brands</h2>
                                <hr>
                            </div>
                            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-xl-5">

                                @foreach($brands as $ke=>$value)
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <a href="{{ route('web.vendor_products',['key'=>$value->id]) }}">
                                                <img src="{{ asset('') }}uploads/vendors/{{ $value->image }}" class="img-fluid" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </section>
                <!--end brand--> --}}
                
            </div>
        </div>
        <!--end page wrapper -->



</div>
