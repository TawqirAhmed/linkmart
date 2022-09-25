<div>
    
    {{-- <div class="row"> --}}
        <div class="col-xs-8">
            <!-- Appointments -->
            <div class="col-lg-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-3">
                                <h3 class="card-title">Add New Color</h3>
                            </div>
                            <div class="col-9">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                            </div>
                        </div>             
                    </div>
                    <br>
                    
                    <div>
                        <form role="form" enctype="multipart/form-data" wire:submit.prevent="Store()">
                            @csrf
                            
                              
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row" style="margin: auto;">
                                <div class="col-4">
                                   <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Name:</strong>
                                        <input type="text" class="form-control" name="name" placeholder="Name" required wire:model="name">
                                      </div>
                                    </div>
                                  </div>     
                                </div>
                                
                                <div class="col-4">
                                   <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Hex Code:</strong>
                                        <input type="text" class="form-control" name="hex_code" placeholder="Hex Code" required wire:model="hex_code">
                                      </div>
                                    </div>
                                  </div>     
                                </div>  
                                
                                <div class="col-4">
                                    <button type="submit" class="btn btn-success waves-effect waves-light" style="margin-top:22px;">Add</button>
                                </div>
                                  
                            </div>
                              

                              
                              {{-- <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
                              </div> --}}
                        </form>
                    </div>

                </div>
            </div>
            <!-- Appointments -->
        </div>

        <div class="col-xs-4">
            <!-- Appointments -->
            <div class="col-lg-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-3">
                                <h3 class="card-title">All Colors</h3>
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
                                <th>Name</th>
                                <th>Hex Code</th>
                                <th style="width:10%">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($allcolors as $pro=>$color_all)
                                    <tr>
                                        <td>{{ $color_all->id }}</td>
                                        <td>
                                            <div style="float: left;
                                              width: 30px;
                                              height: 20px;
                                              /*margin: 5px;*/
                                              border: 1px solid rgba(0, 0, 0, .2);
                                              background: {{ $color_all->hex_code }};">
                                               
                                              </div>
                                            &nbsp;{{ $color_all->name }}
                                        </td>
                                        <td>{{ $color_all->hex_code }}</td>
                                        
                                        <td>
                                            
                                            <a class="btn btn-warning btn-sm text-white" wire:click="Get('{{ $color_all->id }}')" data-toggle="modal" data-target="#modalEditColor">Edit</a>

                                            
                                            <a class="btn btn-danger waves-effect waves-light btn-sm" wire:click="deleteID('{{ $color_all->id }}')" data-toggle="modal" data-target="#modalDeleteColor">Delete</a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                            {{ $allcolors->links() }}
                    </div>
                </div>
            </div>
            <!-- Appointments -->    
        </div>


        <!--==========================
          =  Modal window for Edit Content    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalEditColor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="Update()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Color</h4>
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
                                    <strong>Hex Code:</strong>
                                    <input type="text" class="form-control" name="e_hex_code" placeholder="Hex Code" required wire:model="e_hex_code">
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
        <div wire:ignore.self id="modalDeleteColor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Delete Color</h4>
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


    {{-- </div> --}}
    <style type="text/css">
          html {
            font-size: .9rem;
          }
        </style>
</div>
