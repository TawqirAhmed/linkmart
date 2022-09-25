<div>
    <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">All Advertise Banners</h3>
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
                    <table id="datatable-makesales" class="table table-bordered table-striped nowrap data-table-makesales" style="overflow-wrap: anywhere;" width="100%">
                        <thead style="text-align: center;">
                        <tr>
                            <th style="width:5%">S/N</th>
                            <th style="width:10%">Title</th>
                            <th style="width:15%">Description</th>
                            <th style="width:10%">Category</th>
                            <th style="width:10%">Percent</th>
                            <th style="width:10%">Published</th>
                            <th style="width:10%">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($allAdd as $key=>$value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->description }}</td>
                                    <td>{{ $value->category->name }}</td>
                                    <td>{{ $value->percent }}</td>
                                    @if($value->published == 1)
                                        <td>Published</td>
                                    @else
                                        <td>Not Published</td>
                                    @endif
                                    <td>
                                        
                                        <a class="btn btn-warning btn-sm text-white" wire:click="getItem('{{ $value->id }}')" data-toggle="modal" data-target="#modalEditItem">Edit</a>

                                        
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
          =  Modal window for Edit Content    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalEditItem" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="updateItem()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Advertise</h4>
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
                                        <strong>Title:</strong>
                                        <input type="text" class="form-control" name="title" placeholder="Title" required wire:model="title">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>description:</strong>
                                        <input type="text" class="form-control" name="description" placeholder="description" wire:model="description">
                                      </div>
                                    </div>
                                  </div>


                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>category:</strong>
                                        <select class="form-control" wire:model="category_id">
                                            <option value="">Select category</option>

                                            @foreach($allCategories as $cate)
                                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                            @endforeach

                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                 

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Percent:</strong>
                                        <input type="number" class="form-control" name="percent" placeholder="Percent" wire:model="percent">
                                      </div>
                                    </div>
                                  </div>


                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Publication:</strong>
                                        <select class="form-control" wire:model="published">
                                            <option value="">Publication Status</option>
                                            <option value="1">Publish</option>
                                            <option value="0">Hide</option>

                                        </select>
                                      </div>
                                    </div>
                                  </div>

                                  {{-- <div class="form-group">          
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
                                  </div> --}}
                                  
                              
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


       


        <style type="text/css">
          html {
            font-size: .9rem;
          }
        </style>

</div>
