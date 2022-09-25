<div>
    
    {{-- <!-- Appointments -->
    <div class="col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <h3 class="card-title">
                            Account Info
                        </h3>
                    </div>
                    

                    

                    
                </div>             
            </div>
            

            <div class="card-body">

                
            </div>
        </div>
    </div>
    <!-- Appointments --> --}}


    <!-- Profile Info -->
    <div class="col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <h3 class="card-title">
                            Account Info
                        </h3>
                    </div>
                    

                    

                    
                </div>             
            </div>
            

            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <h3>Shop Name: {{ $profile_info->shop_name }}</h3>

                        <h5><b>Owner Name:</b> {{ $profile_info->owner_name }}</h5>
                        <h5><b>Owner Email:</b> {{ $profile_info->owner_email }}</h5>
                        <h5><b>Owner Phone:</b> {{ $profile_info->owner_phone }}</h5>
                        <h5><b>Seller Type:</b> {{ $profile_info->seller_type }}</h5>
                    </div>

                    <div class="col-4">
                        <h5><b>Shop Address:</b></h5>
                        <p>{{ $profile_info->shop_address }}</p>
                    </div>
                    <div class="col-4">
                        <h5><b>Shop Logo:</b></h5>
                        @if ($vendor_info->image )
                           <img src="{{ asset('') }}uploads/vendors/{{ $vendor_info->image }}" style="max-width:120px"> 
                        @else
                            Logo Not Given
                        @endif
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Profile Info -->
    <br>


    <!-- Shop Logo -->
    <div class="col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <h3 class="card-title">
                            Shop Logo
                        </h3>
                    </div>
                    
                </div>             
            </div>
            

            <div class="card-body">

                <form role="form" enctype="multipart/form-data" wire:submit.prevent="updateLogo()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            {{-- <h4 class="modal-title">Edit Category</h4> --}}
                            {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                            
                          </div>
                          <!--=====================================
                            MODAL BODY
                          ======================================-->
                          <div class="modal-body">
                            <div class="box-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                  
                                 
                                  <div class="form-group">          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Shop Logo: (Max: Width=300, Height=300)</strong>
                                        <br>
                                        <input type="file" class="input-file input-md" wire:model="new_logo">
                                        <br>
                                        
                                        @if($new_logo)
                                            <img src="{{ $new_logo->temporaryUrl() }}" width="120">
                                        @elseif($logo)
                                            <img src="{{ asset('uploads/vendors') }}/{{ $logo }}" width="120">
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                                  
                              
                            </div>
                          </div>
                          <!--=====================================
                            MODAL FOOTER
                          ======================================-->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                          </div>
                    </form>

            </div>
        </div>
    </div>
    <!-- Shop Logo -->

    <!-- Appointments -->
    <div class="col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <h3 class="card-title">
                            Payment info and Document
                        </h3>
                    </div>
                    

                    

                    
                </div>             
            </div>
            

            <div class="card-body">

                 <form role="form" enctype="multipart/form-data" wire:submit.prevent="updateProfile()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            {{-- <h4 class="modal-title">Edit Category</h4> --}}
                            {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                            
                          </div>
                          <!--=====================================
                            MODAL BODY
                          ======================================-->
                          <div class="modal-body">
                            <div class="box-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="row">

                                    <div class="col-4">
                                         <div class="form-group">          
                                            <div class="input-group">             
                                              <div class="col-xs-12 col-sm-12 col-md-12">
                                                <strong>Payment Info:</strong>
                                                {{-- <input type="text" class="form-control" name="meta_title" placeholder="Meta Tags" wire:model="meta_title"> --}}


                                                <textarea class="form-control" name="payment_info" placeholder="Payment Info" wire:model="payment_info" rows="6">
                                                    
                                                </textarea>

                                              </div>
                                            </div>
                                          </div>
                                    </div>

                                    <div class="col-4">
                                        @if($profile_info->seller_type === 'personal')
                                            <div class="form-group">          
                                                <div class="input-group">             
                                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <strong>NID: (If Not Given)</strong>
                                                    <br>
                                                    <input type="file" class="input-file input-md" wire:model="new_nid">
                                                    <br>
                                                    
                                                    @if($new_nid)
                                                        <img src="{{ $new_nid->temporaryUrl() }}" width="120">
                                                    @elseif($nid)
                                                        <img src="{{ asset('uploads/seller_NIDs') }}/{{ $nid }}" width="120">
                                                    @endif
                                                  </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if($profile_info->seller_type === 'business')
                                            <div class="form-group">          
                                                <div class="input-group">             
                                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <strong>Trade License: (If Not Given)</strong>
                                                    <br>
                                                    <input type="file" class="input-file input-md" wire:model="trade_license">
                                                    <br>
                                                    
                                                    
                                                  </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                </div>  
                                 
                                
                                  
                              
                            </div>
                          </div>
                          <!--=====================================
                            MODAL FOOTER
                          ======================================-->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                          </div>
                    </form>
                
            </div>
        </div>
    </div>
    <!-- Appointments -->


</div>
