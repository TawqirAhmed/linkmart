<div>
    <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">All Category</h3>
                        </div>
                        <div class="col-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                        </div>

                        <div class="col-3">
                            <a class="btn btn-success float-right text-white" data-toggle="modal" data-target="#modalAddCategory">Add New Category</a>
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
                            <th style="width:5%">S/N</th>
                            <th style="width:10%">Image</th>
                            <th style="width:15%">Name</th>
                            <th style="width:30%">Meta Title</th>
                            <th style="width:20%">parent</th>
                            <th style="width:10%">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($allCategories as $pro=>$cat_all)
                                <tr>
                                    <td>{{ $cat_all->id }}</td>
                                    <td>
                                        <img src="{{ asset('') }}uploads/categories/{{ $cat_all->name }}/{{ $cat_all->image }}" alt="{{ $cat_all->name }}" width="80">
                                    </td>
                                    <td>{{ $cat_all->name }}</td>
                                    <td>{{ $cat_all->meta_title }}</td>
                                    <td>
                                        @if($cat_all->parents != null)
                                            {{ $cat_all->parents->name }}
                                        @endif
                                    </td>
                                    <td>
                                        
                                        <a class="btn btn-warning btn-sm text-white" wire:click="getCategory('{{ $cat_all->id }}')" data-toggle="modal" data-target="#modalEditCategory">Edit</a>

                                        
                                        <a class="btn btn-danger waves-effect waves-light btn-sm" wire:click="deleteID('{{ $cat_all->id }}')" data-toggle="modal" data-target="#modalDeleteCategory">Delete</a>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{ $allCategories->links() }}
                </div>
            </div>
        </div>
        <!-- Appointments -->


        <!--==========================
          =  Modal window for Add Content    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalAddCategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="storeCategory()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Add Category</h4>
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
                                        <strong>Meta Tags:</strong>
                                        <input type="text" class="form-control" name="meta_title" placeholder="Meta Tags" wire:model="meta_title">
                                      </div>
                                    </div>
                                  </div>


                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Parent:</strong>
                                        <select class="form-control" wire:model="parent_id">
                                            <option value="">Select Parent</option>

                                            @foreach($allCategories as $cate)
                                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                            @endforeach

                                        </select>
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
        <div wire:ignore.self id="modalEditCategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="updateCategory()">
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
                                        <strong>Name:</strong>
                                        <input type="text" class="form-control" name="e_name" placeholder="Name" required wire:model="e_name">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Meta Tags:</strong>
                                        <input type="text" class="form-control" name="e_meta_title" placeholder="Meta Tags" wire:model="e_meta_title">
                                      </div>
                                    </div>
                                  </div>


                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Parent:</strong>
                                        <select class="form-control" wire:model="e_parent_id">
                                            <option value="">Select Parent</option>

                                            @foreach($allCategories as $cate)
                                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                            @endforeach

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
                                            <img src="{{ asset('uploads/categories') }}/{{ $e_name }}/{{ $e_image }}" width="120">
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
        <div wire:ignore.self id="modalDeleteCategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Delete Category</h4>
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
