<div>
    <br>
    <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">Review Management</h3>
                        </div>
                        <div class="col-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                        </div>

                        
                    </div>             
                </div>
                <br>



                <!--Search-->


                <div class="col-md-10 offset-md-1">
                    
                    <div class="row">
                        
                        <div class="col-md-2">
                            <div class="form-group">          
                                <div class="input-group">             
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Product Name:</strong>
                                        <input type="text" class="form-control" name="product_name" placeholder="Product Name" wire:model="product_name">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">          
                                <div class="input-group">             
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Product SKU:</strong>
                                        <input type="text" class="form-control" name="sku" placeholder="Product SKU" wire:model="sku">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">          
                                <div class="input-group">             
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Shop/Brand Name:</strong>
                                        <input type="text" class="form-control" name="vendor_name" placeholder="Shop/Brand Name" wire:model="vendor_name">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">          
                                <div class="input-group">             
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Rating(Star):</strong>
                                        {{-- <input type="text" class="form-control" name="product_name" placeholder="Product Name" wire:model="product_name"> --}}

                                        <select class="form-control" wire:model="rating">
                                            <option value="">Select Rating</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">          
                                <div class="input-group">             
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Start Date:</strong>
                                        <input type="date" class="form-control" name="from" wire:model="from">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">          
                                <div class="input-group">             
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>End Date:</strong>
                                        <input type="date" class="form-control" name="to" wire:model="to">
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="row">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <div class="form-group"> 
                                &nbsp;&nbsp;<a wire:click="getReviews()" class="btn btn-success text-white">Search</a>&nbsp;&nbsp;&nbsp;

                                <a href="{{ route('admin.manage_review') }}" class="btn btn-danger">Clear all</a>
                            </div>
                        </div>
                    </div>


                </div>

                <!--Search-->

                <div class="col-12">

                    <div class="row">

                    {{-- <label for="paginate" style="margin-top: auto;margin-left: auto;">Show</label> --}}
                    <div class="col-sm-2">
                    {{-- <select id="paginate" name="paginate" class="form-control input-sm" wire:model="paginate">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select> --}}
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
                            <th style="width:15%">Product</th>
                            <th style="width:15%">Brand/Seller</th>
                            <th style="width:5%">Reting(star)</th>
                            <th style="width:30%">Review</th>
                            <th style="width:10%">Date</th>
                            <th style="width:10%">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @if($searched == 1)
                                @foreach($allReviews as $key=>$value)
                                    <tr>
                                       <td>{{ $key + 1 }}</td>
                                       <td>{{ $value->product->name ?? '' }}</td>
                                       <td>{{ $value->product->vendors->name ?? '' }}</td>
                                       <td>{{ $value->rating ?? '' }}</td>
                                       <td>{{ $value->description ?? '' }}</td>
                                       <td>{{ $value->created_at ?? '' }}</td>
                                       <td>
                                            @if($value->reply->count()>0)

                                                <a class="btn btn-secondary btn-sm text-white" wire:click="getItem('{{ $value->id }}')" data-toggle="modal" data-target="#modalEditItem">Give Another Reply</a>
                                            @else
                                                <a class="btn btn-warning btn-sm text-white" wire:click="getItem('{{ $value->id }}')" data-toggle="modal" data-target="#modalEditItem">Give Reply</a>

                                            @endif
                                       </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    {{ $allReviews->links() }}
                    
                        
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
                            <h4 class="modal-title">Give Reply</h4>
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
                                        <strong>Reply:</strong>
                                        {{-- <input type="text" class="form-control" name="reply" placeholder="Reply" required wire:model="reply"> --}}

                                        <textarea class="form-control" name="reply" placeholder="Reply" required wire:model="reply">
                                            
                                        </textarea>

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
                            <button type="submit" class="btn btn-success waves-effect waves-light">Post</button>
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
