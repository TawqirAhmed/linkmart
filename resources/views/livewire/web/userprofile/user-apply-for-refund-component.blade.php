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

                                    <div class="col-lg-12">
                                        <div class="card shadow-none mb-3 mb-lg-0">

                                            <div>
                                                <h4 class="card-header">Refund Form</h4>
                                            </div>
                                            <div class="card-body">
                                                
                                                <form class="row g-3" role="form" enctype="multipart/form-data" wire:submit.prevent="plasceRefund()">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control" wire:model="name" readonly>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Email address</label>
                                                        <input type="text" class="form-control" wire:model="email" readonly>
                                                    </div>

                                                    <div class="col-6">
                                                        <label class="form-label">Contact No:</label>
                                                        <input type="text" class="form-control" wire:model="contact_no" placeholder="Contact No" required>

                                                        @error('contact_no')<span class="error"><strong style="color:red;">{{ $message }}</strong></span>@enderror
                                                    
                                                    </div>

                                                    <div class="col-6">
                                                        <label class="form-label">Order No:</label>
                                                        <input type="text" class="form-control" wire:model="order_no" placeholder="Order No" required>

                                                        @error('order_no')<span class="error"><strong style="color:red;">{{ $message }}</strong></span>@enderror

                                                    </div>

                                                    <div class="col-6">
                                                        <label class="form-label">Product Name:</label>
                                                        <input type="text" class="form-control" wire:model="product_name" placeholder="Product Name" required>

                                                        @error('product_name')<span class="error"><strong style="color:red;">{{ $message }}</strong></span>@enderror

                                                    </div>

                                                    <div class="col-6">
                                                        <label class="form-label">Product ID/ Veriation ID:</label>
                                                        <input type="text" class="form-control" wire:model="product_id" placeholder="Product ID/ Veriation ID" required>

                                                        @error('product_id')<span class="error"><strong style="color:red;">{{ $message }}</strong></span>@enderror

                                                    </div>

                                                    <div class="col-12">
                                                        <label class="form-label">Refund Reason:</label>

                                                        <textarea class="form-control" wire:model="refund_reason" rows="5" required maxlength="1000">
                                                            
                                                        </textarea>

                                                        @error('refund_reason')<span class="error"><strong style="color:red;">{{ $message }}</strong></span>@enderror

                                                    </div>


                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-light btn-ecomm" style="float: right;"> Submit </button>
                                                    </div>
                                                </form>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                                

                            </div>
                        </div>
                    </div>
                </section>
                <!--end shop cart-->
            </div>
        </div>
        <!--end page wrapper -->


</div>
