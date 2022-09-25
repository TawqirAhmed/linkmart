<div>
    <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">Home Sliders</h3>
                        </div>
                        <div class="col-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                        </div>

                        <div class="col-3">
                            <a class="btn btn-success float-right text-white" data-toggle="modal" data-target="#modalAddItem">Add New Slider</a>
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
                            <th>Image</th>
                            <th>Line one</th>
                            <th>Line Two</th>
                            <th>Line Three</th>
                            <th>Search Tag</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($allSliders as $key=>$value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>
                                        <img src="{{ asset('') }}uploads/homesliders/{{ $value->image }}" alt="" width="80">
                                    </td>
                                    <td>{{ $value->line_one }}</td>
                                    <td>{{ $value->line_two }}</td>
                                    <td>{{ $value->line_three }}</td>
                                    <td>{{ $value->tags }}</td>
                                    <td>
                                        
                                        <a class="btn btn-warning btn-sm text-white" wire:click="getItem('{{ $value->id }}')" data-toggle="modal" data-target="#modalEditItem">Edit</a>

                                        
                                        <a class="btn btn-danger waves-effect waves-light btn-sm" wire:click="deleteID('{{ $value->id }}')" data-toggle="modal" data-target="#modalDeleteItem">Delete</a>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        
                </div>
            </div>
        </div>
        <!-- Appointments -->


        <!--==========================
          =  Modal window for Add Content    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalAddItem" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="Store()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Add Slider</h4>
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
                                        <strong>Line One:</strong>
                                        <input type="text" class="form-control" name="line_one" placeholder="Line One" required wire:model="line_one">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Line Two:</strong>
                                        <input type="text" class="form-control" name="line_two" placeholder="Line Two" required wire:model="line_two">
                                      </div>
                                    </div>
                                  </div>


                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Line Three:</strong>
                                        <input type="text" class="form-control" name="line_three" placeholder="Line Three" required wire:model="line_three">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Search Tag:</strong>
                                        <input type="text" class="form-control" name="tags" placeholder="Search Tag" required wire:model="tags">
                                      </div>
                                    </div>
                                  </div>
                                 
                                  
                                  <div class="form-group">          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Image:</strong>
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
        <div wire:ignore.self id="modalEditItem" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="Update()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Category</h4>
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
                                        <strong>Line One:</strong>
                                        <input type="text" class="form-control" name="e_line_one" placeholder="Line One" required wire:model="e_line_one">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Line Two:</strong>
                                        <input type="text" class="form-control" name="e_line_two" placeholder="Line Two" required wire:model="e_line_two">
                                      </div>
                                    </div>
                                  </div>


                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Line Three:</strong>
                                        <input type="text" class="form-control" name="e_line_three" placeholder="Line Three" required wire:model="e_line_three">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Search Tag:</strong>
                                        <input type="text" class="form-control" name="e_tags" placeholder="Search Tag" required wire:model="e_tags">
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
                                            <img src="{{ asset('') }}uploads/homesliders/{{ $e_image }}" width="120">
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
        <div wire:ignore.self id="modalDeleteItem" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Delete Item</h4>
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
                            <button type="button" wire:click.prevent="Delete()" class="btn btn-success waves-effect waves-light">Confirm</button>
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
