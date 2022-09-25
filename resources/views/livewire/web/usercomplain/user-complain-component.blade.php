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
                                                <h4 class="card-header">Complain Form</h4>
                                            </div>
                                            <div class="card-body">
                                                
                                                <form class="row g-3" role="form" enctype="multipart/form-data" wire:submit.prevent="Store()">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control" wire:model="name">
                                                        @error('name')<span class="error"><strong style="color:red;">{{ $message }}</strong></span>@enderror
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Email</label>
                                                        <input type="text" class="form-control" wire:model="email">
                                                        @error('email')<span class="error"><strong style="color:red;">{{ $message }}</strong></span>@enderror
                                                    </div>

                                                    <div class="col-6">
                                                        <label class="form-label">Contact No:</label>
                                                        <input type="text" class="form-control" wire:model="phone" placeholder="Contact No" required>

                                                        @error('phone')<span class="error"><strong style="color:red;">{{ $message }}</strong></span>@enderror
                                                    
                                                    </div>

                                                    

                                                    
                                                    

                                                    <div class="col-12">
                                                        <label class="form-label">Complain:</label>

                                                        <textarea class="form-control" wire:model="description" rows="5" required maxlength="500">
                                                            
                                                        </textarea>

                                                        @error('description')<span class="error"><strong style="color:red;">{{ $message }}</strong></span>@enderror

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
