<div>
    <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">All Brands</h3>
                        </div>
                        <div class="col-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                        </div>

                        <div class="col-3">
                            {{-- <a class="btn btn-success float-right text-white" data-toggle="modal" data-target="#modalAddVendor">Add New Brand</a> --}}
                        </div>
                    </div>             
                </div>
                <br>
                <div class="col-12">

                    <div class="row">

                    <label for="paginate" style="margin-top: auto;margin-left: auto;">Show</label>
                    <div class="col-sm-2">
                    <select id="paginate" name="paginate" class="form-control input-sm" wire:model="paginate">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    </div>  
                    <div class="col-sm-6"></div>
                    <div class="col-sm-3">
                        {{-- <input type="search" wire:model="search" class="form-control input-sm" placeholder="Search"> --}}
                    </div>
                    </div>
                    <br>
                    <table id="datatable-makesales" class="table table-bordered table-striped nowrap data-table-makesales" style="overflow-wrap: anywhere;" width="100%">
                        <thead style="text-align: center;">
                        <tr>
                            <th>S/N</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Owner</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th>Address</th>
                            <th>Payment Info</th>
                            <th>Verified</th>
                            {{-- <th style="width:10%">Action</th> --}}
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($allVendors as $pro=>$ven_all)
                                <tr style="text-align:center;">
                                    <td>{{ $ven_all->id }}</td>
                                    <td>
                                        <img src="{{ asset('') }}uploads/vendors/{{ $ven_all->image }}" alt="{{ $ven_all->name }}" width="80">
                                    </td>
                                    <td>{{ $ven_all->name }}</td>
                                    <td>{{ $ven_all->user->name }}</td>
                                    <td>{{ $ven_all->email }}</td>
                                    <td>{{ $ven_all->phone }}</td>
                                    <td>{{ $ven_all->address }}</td>
                                    <td>{{ $ven_all->payment_info }}</td>

                                    <td>
                                        @if($ven_all->verified ==1)
                                            <button class="btn btn-success" desable>Verified</button>
                                        @else
                                            <button class="btn btn-danger" desable>Not Verified</button>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        
                                        {{-- <a class="btn btn-warning btn-sm text-white" wire:click="getVendor('{{ $ven_all->id }}')" data-toggle="modal" data-target="#modalEditVendor">Edit</a> --}}

                                        
                                        {{-- <a class="btn btn-danger waves-effect waves-light btn-sm" wire:click="deleteID('{{ $ven_all->id }}')" data-toggle="modal" data-target="#modalDeleteVendor">Delete</a> --}}
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{ $allVendors->links() }}
                </div>
            </div>
        </div>
        <!-- Appointments -->


        <!--==========================
          =  Modal window for Add Content    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalAddVendor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="storeVendor()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Add Brand</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
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

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Name:</strong>
                                        <input type="text" class="form-control" name="name" placeholder="Name" required wire:model="name">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Email:</strong>
                                        <input type="email" class="form-control" name="email" placeholder="Email" required wire:model="email">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Phone:</strong>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone" required wire:model="phone">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        {{-- <strong>Vendor Profile:</strong> --}}
                                        <strong>Brand Owner Profile:</strong>

                                         @error('user_id') <span class="error">{{ $message }}</span> @enderror

                                        <select class="form-control" name="user_id" placeholder="Vendor Profile" required wire:model="user_id">
                                            
                                            <option value="">Select Owner Profile</option>
                                            <option value="{{ Auth::id() }}">Admin</option>
                                            @foreach($allVendorsProfile as $key=>$value)
                                                <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>
                                            @endforeach

                                        </select>

                                        {{-- @error('user_id') <span class="error">{{ $message }}</span> @enderror --}}

                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Address:</strong>
                                        <textarea class="form-control" name="address" placeholder="Address" required wire:model="address"></textarea>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Payment Info:</strong>
                                        <textarea class="form-control" name="payment_info" placeholder="Payment Info" wire:model="payment_info"></textarea>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Commission Percentage:</strong>
                                        <input type="number" class="form-control" name="commission_percentage" placeholder="Commission Percentage" required wire:model="commission_percentage">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Meta Tags:</strong>
                                        <input type="text" class="form-control" name="meta_tags" placeholder="Meta Tags" wire:model="meta_tags">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Verify Status:</strong>
                                        
                                        <select class="form-control" name="verified"  wire:model="verified">
                                            
                                            <option value="0">Not Verified</option>
                                            <option value="1">Verified</option>

                                        </select>

                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group">          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Logo:</strong>
                                        <input type="file" class="input-file input-md" wire:model="image">
                                        <br>
                                        
                                        @if($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="120">
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
                            <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
                          </div>
                    </form>
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


       <!--==========================
          =  Modal window for Edit Content    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalEditVendor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="updateVendor()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            {{-- <h4 class="modal-title">Edit Vendor</h4> --}}
                            <h4 class="modal-title">Edit Brand</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
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

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Name:</strong>
                                        <input type="text" class="form-control" name="e_name" placeholder="Name" required wire:model="e_name">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Email:</strong>
                                        <input type="email" class="form-control" name="e_email" placeholder="Email" required wire:model="e_email">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Phone:</strong>
                                        <input type="text" class="form-control" name="e_phone" placeholder="Phone" required wire:model="e_phone">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        {{-- <strong>Vendor Profile:</strong> --}}
                                        <strong>Brand Owner Profile:</strong>
                                        <select class="form-control" name="e_user_id" placeholder="Vendor Profile" required wire:model="e_user_id">
                                            
                                            <option value="">Select Owner Profile</option>
                                            <option value="{{ Auth::id() }}">Admin</option>
                                            @foreach($allVendorsProfile as $key=>$value)
                                                <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>
                                            @endforeach

                                        </select>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Address:</strong>
                                        <textarea class="form-control" name="e_address" placeholder="Address" required wire:model="e_address"></textarea>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Payment Info:</strong>
                                        <textarea class="form-control" name="e_payment_info" placeholder="Payment Info" wire:model="e_payment_info"></textarea>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Commission Percentage:</strong>
                                        <input type="number" class="form-control" name="e_commission_percentage" placeholder="Commission Percentage" required wire:model="e_commission_percentage">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Meta Tags:</strong>
                                        <input type="text" class="form-control" name="e_meta_tags" placeholder="Meta Tags" wire:model="e_meta_tags">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Verify Status:</strong>
                                        
                                        <select class="form-control" name="e_verified"  wire:model="e_verified">
                                            
                                            <option value="0">Not Verified</option>
                                            <option value="1">Verified</option>

                                        </select>

                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Image:</strong>
                                        <input type="file" class="input-file input-md" wire:model="new_image">
                                        <br>
                                        
                                        @if($new_image)
                                            <img src="{{ $new_image->temporaryUrl() }}" width="120">
                                        @elseif($e_image)
                                            <img src="{{ asset('') }}uploads/vendors/{{ $e_image }}" width="120">
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
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <!--==========================
          =  Modal window for Delete    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalDeleteVendor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Delete Vendor</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
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


                                 <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h2 class="text-center" style="color:red;">Are you want to delete?</h2>
                                      </div>
                                    </div>
                                  </div>
                                  
                              
                            </div>
                          </div>
                          <!--=====================================
                            MODAL FOOTER
                          ======================================-->
                          <div class="modal-footer">
                            <button type="button" wire:click.prevent="delete()" class="btn btn-success waves-effect waves-light">Confirm</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                          </div>
                    
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <style type="text/css">
          html {
            font-size: .9rem;
          }
        </style>

</div>
