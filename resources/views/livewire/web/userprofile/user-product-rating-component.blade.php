<div>
    

    <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                
                <section class="py-4">
                    <div class="container">
                        <h3 class="d-none">Account</h3>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    {{-- <div class="col-lg-4">
                                        <div class="card shadow-none mb-3 mb-lg-0">
                                            <div class="card-body">
                                                <div class="list-group list-group-flush">   

                                                    
                                                    @include('livewire.web.userprofile.side_menu')


                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-5">

                                        <div class="card">
                                            <div class="card-body">
                                                <h3>Product Details</h3>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <img src="{{ asset('') }}uploads/products/{{ $variation_info->product->name }}/{{ $variation_info->product->image }}" width="130" alt="">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <strong>Name: </strong>{{ $variation_info->product->name }}
                                                        <br>
                                                        <strong>Size: </strong>{{ $variation_info->size->name ?? '--' }}
                                                        <br>
                                                        <strong>Color: </strong>{{ $variation_info->color->name ?? '--' }}
                                                        <br>
                                                        <strong>Price: </strong>{{ $variation_info->product->unit_price }}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-7">
                                        
                                        @if ($reviewed)
                                            
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3>You Alrady Gave A rewiew To this Product.</h3>
                                                </div>
                                            </div>

                                        @else

                                            <div class="card">
                                                <div class="card-body">
                                                    <h3>Review Form</h3>
                                                    <hr>
                                                    <form class="row g-3" role="form" enctype="multipart/form-data" wire:submit.prevent="StoreReview()">
                                                    @csrf
                                                        <div class="col-md-12">
                                                            <label class="form-label">Rating</label>
                                                            <select class="form-select form-select-sm" wire:model="rating" required>

                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label">Description</label>
                                                            <textarea class="form-control" wire:model="description" maxlength="299" rows="5" required></textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-light btn-ecomm" style="float: right;">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        @endif                   

                                    </div>

                                </div>
                                <!--end row-->
                                

                            </div>
                        </div>
                    </div>
                </section>
                <!--end shop cart-->
            </div>
        </div>
        <!--end page wrapper -->


</div>
