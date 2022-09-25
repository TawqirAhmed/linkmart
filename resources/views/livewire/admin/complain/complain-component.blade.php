<div>
    


    <!-- Appointments -->
    <div class="col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <h3 class="card-title">All Complains</h3>
                    </div>
                    <div class="col-6">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        @if(Session::has('delete_message'))
                            <div class="alert alert-danger" role="alert">{{ Session::get('delete_message') }}</div>
                        @endif
                    </div>

                    
                </div>             
            </div>
            <br>

            <div class="col-md-6 offset-md-3" style="text-align:center;">
                

                <a class="btn btn-default" wire:click="setFilter(null)">All</a>
                <a class="btn btn-denger text-white" style="background-color: #ff0303;" wire:click="setFilter('pending')">Pending</a>
                <a class="btn btn-success text-white" style="background-color: #fab005;" wire:click="setFilter('checked')">Checked</a>
                <a class="btn btn-success text-white"style="background-color: #048a33;" wire:click="setFilter('solved')">Solved</a>

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
                        <th>Name</th>
                        <th wire:click="sortBy('email')">Email</th>
                        <th wire:click="sortBy('phone')">Phone</th>
                        <th style="width:15%">Complain</th>
                        <th wire:click="sortBy('status')">Status</th>
                        <th wire:click="sortBy('created_at')">Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($allComplain as $Key=>$value)
                            <tr class="text-center">
                                

                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name}}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->phone }}</td>
                                <td>{{ $value->description }}</td>
                                <td>

                                    @if($value->status == 'pending')
                                        <button class="btn btn-sm text-white" style="background-color: #ff0303; margin: auto;pointer-events: none;">{{ $value->status }}</button>
                                    @elseif($value->status == 'checked')
                                        <button class="btn btn-sm text-white" style="background-color: #fab005; margin: auto;pointer-events: none;">{{ $value->status }}</button>
                                    @elseif($value->status == 'solved')
                                        <button class="btn btn-sm text-white" style="background-color: #048a33; margin: auto;pointer-events: none;">{{ $value->status }}</button>
                                    
                                    @endif
                                    
                                </td>
                                <td>{{ $value->created_at }}</td>

                                <td>
                                    <a class="btn btn-sm text-white btn-secondary" wire:click="getItem('{{ $value->id }}')" data-toggle="modal" data-target="#modalEditItem">Change Status</a>
                                    
                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
                    {{ $allComplain->links() }}
            </div>
        </div>
    </div>
    <!-- Appointments -->



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
                            <h4 class="modal-title">Change  Status</h4>
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

                                        <select class="form-control" name="order_status" required wire:model="status">
                                            
                                            <option value="pending">Pending</option>
                                            <option value="checked">Checked</option>
                                            <option value="solved">Solved</option>

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
