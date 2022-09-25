<div>
    


    <!-- Appointments -->
    <div class="col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3 class="card-title">Order No: {{ $Order->order_number }}</h3>
                    </div>

                    <div class="col-6">
                        <a href="{{ route('admin.make_order_slip',$Order->id) }}" class="btn btn-success" target="_blank" style="float:right;"> Seller Slip</a>
                    </div>
                    
                </div>             
            </div>
            <br>
            <div class="col-12">

                <div class="row">

                
                </div>
                <br>
                <table id="datatable-makesales" class="table table-bordered table-striped nowrap data-table-makesales" style="overflow-wrap: anywhere;" width="100%">
                    <thead style="text-align: center;">
                    <tr>
                        <th>Vendor</th>
                        <th>Name</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th style="width:10%">Quantity</th>
                        <th style="width:10%">Price</th>
                        <th style="width:10%">Total</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($Order->items as $Key=>$value)
                            <tr class="text-center">
                               
                                <td>{{ $value->variation->product->vendors->name }}</td>
                                <td>{{ $value->variation->product->name }}</td>

                                @if($value->variation->size != null)
                                <td>{{ $value->variation->size->name }}</td>
                                @else
                                <td>---</td>
                                @endif

                                @if($value->variation->color != null)
                                <td>{{ $value->variation->color->name }}</td>
                                @else
                                   <td>---</td>
                                @endif

                                <td>{{ $value->quantity }}</td>
                                <td class="text-right">{{ $value->price }}</td> 
                                <td class="text-right">{{ $value->price * $value->quantity}}</td>
                                

                            </tr>

                        @endforeach
                    </tbody>
                </table>


                <div class="row">
                    <div class="col-9"></div>
                    <div class="col-3">
                            
                        <table class="table table-bordered table-striped nowrap data-table-makesales">
                            <tr>
                                <th>Subtotal:</th>
                                <td class="text-right">{{ $Order->subtotal }}</td>
                            </tr>
                            <tr>
                                <th>Shipping:</th>
                                <td class="text-right">{{ $Order->shipping_charge }}</td>
                            </tr>
                            <tr>
                                <th>Discount:</th>
                                <td class="text-right">{{ $Order->discount }}</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td class="text-right">{{ $Order->total }}</td>
                            </tr>
                        </table>

                    </div>
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
                    <div class="col-2">
                        <h3 class="card-title">Billing Details</h3>
                    </div>
                    
                </div>             
            </div>
            <br>
            <div class="col-12">

                <div class="row">

                
                </div>
                <br>
                <table id="datatable-makesales" class="table table-bordered table-striped nowrap data-table-makesales" style="overflow-wrap: anywhere;" width="100%">
                    <thead style="text-align: center;">
                    <tr>
                        
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Post Code</th>
                        <th>City</th>
                        <th>Status</th>
                        <th></th>

                    </tr>
                    </thead>

                    <tbody>
                        
                        <tr class="text-center">
                           

                        <td>{{ $Order->name }}</td>
                        <td>{{ $Order->mobile }}</td>
                        <td>{{ $Order->email }}</td>
                        <td>
                            {{ $Order->address_line1 }} <br> {{ $Order->address_line2 }}
                        </td>
                        <td>{{ $Order->post_code }}</td>
                        <td>{{ $Order->city }}</td>
                        <td>
                            @if($Order->status == 'ordered')
                                <button class="btn btn-sm text-white" style="background-color: #04942f; margin: auto;pointer-events: none;">{{ $Order->status }}</button>
                            @elseif($Order->status == 'confirmed')
                                <button class="btn btn-sm text-white" style="background-color: #07dce3; margin: auto;pointer-events: none;">{{ $Order->status }}</button>
                            @elseif($Order->status == 'onprocess')
                                <button class="btn btn-sm text-white" style="background-color: #0207a8; margin: auto;pointer-events: none;">{{ $Order->status }}</button>
                            @elseif($Order->status == 'dispached')
                                <button class="btn btn-sm text-white" style="background-color: #a205eb; margin: auto;pointer-events: none;">{{ $Order->status }}</button>
                            @elseif($Order->status == 'delivered')
                                <button class="btn btn-sm text-white" style="background-color: #dbdb07; margin: auto;pointer-events: none;">{{ $Order->status }}</button>
                            @elseif($Order->status == 'cancled')
                                <button class="btn btn-sm text-white" style="background-color: #b80202; margin: auto;pointer-events: none;">{{ $Order->status }}</button>
                            @endif

                            

                        </td> 
                        <td>
                            <a class="btn btn-sm text-white btn-secondary" wire:click="getItem()" data-toggle="modal" data-target="#modalEditItem">Change Status</a>
                        </td>

                            

                        </tr>

                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- Appointments -->

    <!-- Appointments -->
    <div class="col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <h3 class="card-title">Shipping Details</h3>
                    </div>
                    
                </div>             
            </div>
            <br>

            @if($Order->shipping != null)
            <div class="col-12">

                <div class="row">

                
                </div>
                <br>
                <table id="datatable-makesales" class="table table-bordered table-striped nowrap data-table-makesales" style="overflow-wrap: anywhere;" width="100%">
                    <thead style="text-align: center;">
                    <tr>
                        
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Post Code</th>
                        <th>City</th>

                    </tr>
                    </thead>

                    <tbody>
                        
                        <tr class="text-center">
                           

                        <td>{{ $Order->shipping->name }}</td>
                        <td>{{ $Order->shipping->mobile }}</td>
                        <td>{{ $Order->shipping->email }}</td>
                        <td>
                            {{ $Order->shipping->address_line1 }} <br> {{ $Order->shipping->address_line2 }}
                        </td>
                        <td>{{ $Order->shipping->post_code }}</td>
                        <td>{{ $Order->shipping->city }}</td>


                        </tr>

                        
                    </tbody>
                </table>

            </div>
            @else

            <h3 class="text-center">Same As Billing Details</h3>

            @endif

        </div>
    </div>
    <!-- Appointments -->


    <!-- Appointments -->
    <div class="col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <h3 class="card-title">Transaction Details</h3>
                    </div>
                    
                </div>             
            </div>
            <br>
            <div class="col-12">

                <div class="row">

                
                </div>
                <br>
                <table id="datatable-makesales" class="table table-bordered table-striped nowrap data-table-makesales" style="overflow-wrap: anywhere;" width="100%">
                    <thead style="text-align: center;">
                    <tr>
                        
                        <th>Mode</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th></th>

                    </tr>
                    </thead>

                    <tbody>
                        
                        <tr class="text-center">
                           

                            <td>{{ $Order->transaction->mod }}</td>

                            <td>
                                {{-- {{ $Order->transaction->status }} --}}

                                @if($Order->transaction->status == 'pending')
                                <button class="btn btn-sm text-white" style="background-color: #f70000; margin: auto;pointer-events: none;">{{ $Order->transaction->status }}</button>
                                @elseif($Order->transaction->status == 'approved')
                                    <button class="btn btn-sm text-white" style="background-color: #009cf7; margin: auto;pointer-events: none;">{{ $Order->transaction->status }}</button>
                                @elseif($Order->transaction->status == 'declined')
                                    <button class="btn btn-sm text-white" style="background-color: #f700de; margin: auto;pointer-events: none;">{{ $Order->transaction->status }}</button>
                                @elseif($Order->transaction->status == 'refunded')
                                    <button class="btn btn-sm text-white" style="background-color: #0000f7; margin: auto;pointer-events: none;">{{ $Order->transaction->status }}</button>
                                @elseif($Order->transaction->status == 'paid')
                                    <button class="btn btn-sm text-white" style="background-color: #157a04; margin: auto;pointer-events: none;">{{ $Order->transaction->status }}</button>
                                
                                @endif
                                
                            </td>

                            <td>{{ $Order->transaction->created_at }}</td>
                             
                            <td>
                                <a class="btn btn-sm text-white btn-secondary" wire:click="getTransaction('{{ $Order->transaction->id  }}')" data-toggle="modal" data-target="#modalEditItemTransaction">Change Status</a>
                            </td>
                        </tr>

                        
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
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="Update()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Change Order Status</h4>
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

                                        <select class="form-control" name="order_status" required wire:model="order_status">
                                            
                                            <option value="ordered">ordered</option>
                                            <option value="confirmed">confirmed</option>
                                            <option value="onprocess">onprocess</option>
                                            <option value="dispached">dispached</option>
                                            <option value="delivered">delivered</option>
                                            <option value="cancled">cancled</option>

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




        <!-- sample modal content -->
        <div wire:ignore.self id="modalEditItemTransaction" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="updateTransaction()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Change Transaction Status</h4>
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

                                        <select class="form-control" name="transaction_status" required wire:model="transaction_status">
                                            
                                            <option value="pending">Pending</option>
                                            <option value="approved">Approved</option>
                                            <option value="declined">Declined</option>
                                            <option value="refunded">Refunded</option>
                                            <option value="paid">Paid</option>

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
