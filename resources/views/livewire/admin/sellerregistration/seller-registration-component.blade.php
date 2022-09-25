<div>
    


    <!-- Appointments -->
    <div class="col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <h3 class="card-title">All {{ $filter }} Requests</h3>
                    </div>
                    <div class="col-6">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        @if(Session::has('delete_message'))
                            <div class="alert alert-danger" role="alert">{{ Session::get('delete_message') }}</div>
                        @endif
                    </div>

                    <div class="col-4">
                        {{-- <a href="{{ route('admin.add_service') }}" class="btn btn-success" style="float:right;">Add New Service</a> --}}
                    </div>

                    
                </div>             
            </div>
            <br>

            <div class="col-md-6 offset-md-3" style="text-align:center;">
                

                <a class="btn btn-default" wire:click="setFilter(null)">All</a>
                <a class="btn btn-warning text-white" wire:click="setFilter('submitted')">Submitted</a>
                <a class="btn btn-default text-white" style="background-color:#469990;color: white;" wire:click="setFilter('accepted')">Accepted</a>
                <a class="btn btn-success text-white"  wire:click="setFilter('done')">Done</a>
                <a class="btn btn-danger text-white"  wire:click="setFilter('rejected')">Rejected</a>

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
                    <input type="search" wire:model="search" class="form-control input-sm" placeholder="Search">
                </div>
                </div>
                <br>
                <table id="datatable-makesales" class="table table-bordered table-striped nowrap data-table-makesales" style="overflow-wrap: anywhere;" width="100%">
                    <thead style="text-align: center;">
                    <tr>
                        <th>ID</th>
                        <th>Shop Name</th>
                        <th>Shop Address </th>
                        <th>Owner Name </th>
                        <th>Owner Email</th>
                        <th>Owner Phone</th>
                        <th>Product Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($allRequests as $Key=>$value)
                            <tr class="text-center">
                                

                                <td>{{ $value->id }}</td>
                                <td>{{ $value->shop_name }}</td>
                                <td>{{ $value->shop_address }}</td>
                                <td>{{ $value->owner_name }}</td>
                                <td>{{ $value->owner_email}}</td>
                                <td>{{ $value->owner_phone }}</td>
                                <td>{{ $value->product_type }}</td>

                                <td>
                                    @if($value->status == 'accepted')
                                        <button class="btn btn-default" style="background-color:#469990;color: white;" disabled>Accepted</button>
                                    @elseif($value->status == 'done')
                                        <button class="btn btn-success" disabled>Done</button>
                                    @elseif($value->status == 'rejected')
                                        <button class="btn btn-danger" disabled>Rejected</button>
                                    @elseif($value->status == 'submitted')
                                        <button class="btn btn-warning" disabled>Submitted</button>
                                    @endif
                                </td>

                                <td>
                                    <a class="btn btn-sm text-white btn-secondary" wire:click="getItem({{ $value->id }})" data-toggle="modal" data-target="#modalEditItem">Change Status</a>
                                    
                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
                    {{ $allRequests->links() }}
            </div>
        </div>
    </div>
    <!-- Appointments -->



    <!--==========================
          =  Modal window for Edit Content    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalEditItem" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="Update()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Change Rewuest Status</h4>
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
                                        <strong>Status:</strong>
                                        {{-- <input type="text" class="form-control" name="order_status" placeholder="Status" required wire:model="order_status"> --}}

                                        <select class="form-control" name="status" required wire:model="status">
                                            
                                            <option value="accepted">accepted</option>
                                            <option value="done">done</option>
                                            <option value="rejected">rejected</option>
                                            <option value="submitted">submitted</option>

                                        </select>

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


</div>
