<div>

    <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">Logo And Header Contact</h3>
                        </div>
                        <div class="col-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                        </div>

                        {{-- <div class="col-3">
                            <a class="btn btn-success float-right text-white" data-toggle="modal" data-target="#modalAddCategory">Add New Category</a>
                        </div> --}}
                    </div>             
                </div>
                <br>
                <div class="col-12">

                    
                    <br>

                    <div class="row">
                        <div class="col-sm-6">
                             <div class="form-group">          
                                <div class="input-group">             
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Logo:</strong>
                                    <input type="file" class="input-file input-md" wire:model="logo">
                                    <br>
                                    
                                    @if($logo)
                                        <img src="{{ $logo->temporaryUrl() }}" width="120">
                                    @elseif($old_logo)
                                        <img src="{{ asset('uploads/logo') }}/{{ $old_logo }}" width="120" alt="logo">
                                    @endif
                                  </div>
                                </div>
                              </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">          
                                <div class="input-group">             
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Header Contact:</strong>
                                    <input type="text" class="form-control" name="header_contact" wire:model="header_contact">
                                  </div>
                                </div>
                            </div>

                            <div class="form-group">          
                                <div class="input-group">             
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Facebook Link:</strong>
                                    <input type="text" class="form-control" name="fb_link" wire:model="fb_link">
                                  </div>
                                </div>
                            </div>

                            <div class="form-group">          
                                <div class="input-group">             
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Instagram Link:</strong>
                                    <input type="text" class="form-control" name="insta_link" wire:model="insta_link">
                                  </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    
                    <br>
                    <div class="modal-footer">
                        <a class="btn btn-success float-right" wire:click.prevent="Update()">Update</a>

                    </div>

                </div>
            </div>
        </div>
        <!-- Appointments -->




    <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">Nav Bar Categories</h3>
                        </div>
                        <div class="col-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                        </div>

                        {{-- <div class="col-3">
                            <a class="btn btn-success float-right text-white" data-toggle="modal" data-target="#modalAddCategory">Add New Category</a>
                        </div> --}}
                    </div>             
                </div>
                <br>
                <div class="col-12">

                    
                    <br>

                    <div class="row">
                        <div class="col-sm-4">
                            <label>Column 1</label>
                            <hr>
                            @foreach($categories_array as $key=>$value)
                                @if($key < 12)
                                <label>Position {{ $key +1 }}</label>
                                <select class="form-control" wire:model="categories_array.{{ $key }}">
                                    <option value=""> Select Category</option>
                                    @foreach($allCategories as $key=>$value)
                                    <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-sm-4">
                            <label>Column 2</label>
                            <hr>
                            @foreach($categories_array as $key=>$value)
                                @if($key > 11 && $key < 24)
                                <label>Position {{ $key +1 }}</label>
                                <select class="form-control" wire:model="categories_array.{{ $key }}">
                                    <option value=""> Select Category</option>
                                    @foreach($allCategories as $key=>$value)
                                    <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-sm-4">
                            <label>Column 3</label>
                            <hr>
                            @foreach($categories_array as $key=>$value)
                                @if($key > 23 && $key < 36)
                                <label>Position {{ $key +1 }}</label>
                                <select class="form-control" wire:model="categories_array.{{ $key }}">
                                    <option value=""> Select Category</option>
                                    @foreach($allCategories as $key=>$value)
                                    <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    
                    <br>
                    <div class="modal-footer">
                        <a class="btn btn-success float-right" wire:click.prevent="Update()">Update</a>

                    </div>

                </div>
            </div>
        </div>
        <!-- Appointments -->



        <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">Nav Bar Brands</h3>
                        </div>
                        <div class="col-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                        </div>

                        {{-- <div class="col-3">
                            <a class="btn btn-success float-right text-white" data-toggle="modal" data-target="#modalAddCategory">Add New Category</a>
                        </div> --}}
                    </div>             
                </div>
                <br>
                <div class="col-12">

                    
                    <br>

                    <div class="row">
                        <div class="col-sm-4">
                            <label>Column 1</label>
                            <hr>
                            @foreach($vendors_array as $key=>$value)
                                @if($key < 12)
                                <label>Position {{ $key +1 }}</label>
                                <select class="form-control" wire:model="vendors_array.{{ $key }}">
                                    <option value=""> Select Brand</option>
                                    @foreach($allBrands as $key=>$value)
                                    <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-sm-4">
                            <label>Column 2</label>
                            <hr>
                            @foreach($vendors_array as $key=>$value)
                                @if($key > 11 && $key < 24)
                                <label>Position {{ $key +1 }}</label>
                                <select class="form-control" wire:model="vendors_array.{{ $key }}">
                                    <option value=""> Select Brand</option>
                                    @foreach($allBrands as $key=>$value)
                                    <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-sm-4">
                            <label>Column 3</label>
                            <hr>
                            @foreach($vendors_array as $key=>$value)
                                @if($key > 23 && $key < 36)
                                <label>Position {{ $key +1 }}</label>
                                <select class="form-control" wire:model="vendors_array.{{ $key }}">
                                    <option value=""> Select Brand</option>
                                    @foreach($allBrands as $key=>$value)
                                    <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    
                    <br>
                    <div class="modal-footer">
                        <a class="btn btn-success float-right" wire:click.prevent="Update()">Update</a>

                    </div>

                </div>
            </div>
        </div>
        <!-- Appointments -->
        

        <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">Nav Bar Verified Brands</h3>
                        </div>
                        <div class="col-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                        </div>

                        {{-- <div class="col-3">
                            <a class="btn btn-success float-right text-white" data-toggle="modal" data-target="#modalAddCategory">Add New Category</a>
                        </div> --}}
                    </div>             
                </div>
                <br>
                <div class="col-12">

                    
                    <br>

                    <div class="row">
                        <div class="col-sm-4">
                            <label>Column 1</label>
                            <hr>
                            @foreach($verified_vendors_array as $key=>$value)
                                @if($key < 12)
                                <label>Position {{ $key +1 }}</label>
                                <select class="form-control" wire:model="verified_vendors_array.{{ $key }}">
                                    <option value=""> Select Seller</option>
                                    @foreach($allVerifiedVendors as $key=>$value)
                                    <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-sm-4">
                            <label>Column 2</label>
                            <hr>
                            @foreach($verified_vendors_array as $key=>$value)
                                @if($key > 11 && $key < 24)
                                <label>Position {{ $key +1 }}</label>
                                <select class="form-control" wire:model="verified_vendors_array.{{ $key }}">
                                    <option value=""> Select Seller</option>
                                    @foreach($allVerifiedVendors as $key=>$value)
                                    <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-sm-4">
                            <label>Column 3</label>
                            <hr>
                            @foreach($verified_vendors_array as $key=>$value)
                                @if($key > 23 && $key < 36)
                                <label>Position {{ $key +1 }}</label>
                                <select class="form-control" wire:model="verified_vendors_array.{{ $key }}">
                                    <option value=""> Select Seller</option>
                                    @foreach($allVerifiedVendors as $key=>$value)
                                    <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    
                    <br>
                    <div class="modal-footer">
                        <a class="btn btn-success float-right" wire:click.prevent="Update()">Update</a>

                    </div>

                </div>
            </div>
        </div>
        <!-- Appointments -->
       


        <style type="text/css">
          html {
            font-size: .9rem;
          }
        </style>

</div>
