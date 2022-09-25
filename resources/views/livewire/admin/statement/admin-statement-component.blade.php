<div>
    <br>
    <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">Statement</h3>
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

                <div class="row">
                    <div class="col-sm-3"></div>
                    
                    <div class="col-sm-6" style="text-align:center;">

                        <form role="form" enctype="multipart/form-data" wire:submit.prevent="setValue()">
                        @csrf

                            <div class="row">
                                
                                <div class="col-md-3">
                                    <div class="form-group">          
                                        <div class="input-group">             
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                            <strong>Vendor</strong>
                                                {{-- <input type="date" class="form-control" name="temp_from" wire:model="temp_from" required> --}}
                                                <select class="form-control" name="temp_vendor_id" wire:model="temp_vendor_id" required>
                                                    
                                                    <option value="">Select Vendor</option>

                                                    @foreach ($all_vendors as $key=>$value)
                                                        
                                                        <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>

                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">          
                                        <div class="input-group">             
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                            <strong>Start Date:(m/d/y)</strong>
                                                <input type="date" class="form-control" name="temp_from" wire:model="temp_from" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">          
                                        <div class="input-group">             
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                            <strong>End Date:(m/d/y)</strong>
                                                <input type="date" class="form-control" name="temp_to" wire:model="temp_to" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">submit</button>
                                </div>
                            </div>

                        </form>


                    </div>

                    

                    <div class="col-sm-3" style="text-align:center;">

                        <form role="form" enctype="multipart/form-data" method="POST" action="{{ route('admin.statement_download') }}">
                        @csrf

                            <div class="row">
                                
                                <input type="hidden" name="vendor_id" wire:model="vendor_id">

                                <div class="col-md-4">
                                    <div class="form-group">          
                                        <div class="input-group">             
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                            {{-- <strong>Start Date:</strong> --}}
                                                <input type="hidden" class="form-control" name="from" wire:model="from" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">          
                                        <div class="input-group">             
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                            {{-- <strong>End Date:</strong> --}}
                                                <input type="hidden" class="form-control" name="to" wire:model="to" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    @if($from != null && $to != null)
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Download Statement</button>
                                    @endif
                                </div>
                            </div>

                        </form>


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
                            <th>S/N</th>
                            <th>Date</th>
                            <th>Transaction Type</th>
                            <th>Transaction Number</th>
                            <th>Order Number</th>
                            <th>Details</th>
                            <th>Grand Total(BDT)</th>
                            <th>Commission %</th>
                        </tr>
                        </thead>

                        <tbody>
                            @if ($from != null && $to != null)
                                @foreach ($allOrders as $key=>$value)
                                    <tr>

                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $value->updated_at }}</td>
                                        <td>{{ $value->transaction->mod }}</td>
                                        <td></td>
                                        <td>{{ $value->order_number }}</td>
                                        <td>
                                              <p>Subtotal: {{ $value->subtotal }}</p>
                                              <p>Discount: {{ $value->discount }}</p>
                                              <p>VAT: {{ $value->tax }}</p>   
                                        </td>
                                        <td>{{ $value->total }}</td>
                                        <td>{{ $value->commission_percentage }}</td>

                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    @if ($from != null && $to != null)
                        {{ $allOrders->links() }}
                    @endif
                        
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
