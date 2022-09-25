<div>
    {{-- <a class="btn btn-success" href="{{ route('admin.add_product') }}">Add Products With Variations</a> --}}

    {{-- <a class="btn btn-primary" href="{{ route('admin.add_product_without_variations') }}">Add Products</a> --}}


    {{-- <a class="btn btn-danger" href="{{ route('admin.editproduct' ,['id'=>1]) }}">Edit Products</a> --}}


    <!-- Appointments -->
    <div class="col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <h3 class="card-title">All Orders</h3>
                    </div>
                    <div class="col-6">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        @if(Session::has('delete_message'))
                            <div class="alert alert-danger" role="alert">{{ Session::get('delete_message') }}</div>
                        @endif
                    </div>

                    {{-- <div class="col-2">
                        <a class="btn btn-success float-right" href="{{ route('admin.add_product') }}">Add Products With Variations</a>
                    </div>

                    <div class="col-2">
                        <a class="btn btn-primary float-right" href="{{ route('admin.add_product_without_variations') }}">Add Products</a>
                    </div> --}}
                </div>             
            </div>
            <br>

            <div class="col-md-6 offset-md-3" style="text-align:center;">
                

                <a class="btn btn-default" wire:click="setFilter(null)">All</a>
                <a class="btn btn-success text-white" wire:click="setFilter('ordered')">Ordered</a>
                <a class="btn btn-success text-white" style="background-color: #07dce3;" wire:click="setFilter('confirmed')">Confirmed</a>
                <a class="btn btn-success text-white"style="background-color: #0207a8;" wire:click="setFilter('onprocess')">Onprocess</a>
                <a class="btn btn-success text-white"style="background-color: #a205eb;" wire:click="setFilter('dispached')">Dispached</a>
                <a class="btn btn-success text-white"style="background-color: #dbdb07;" wire:click="setFilter('delivered')">Delivered</a>
                <a class="btn btn-success text-white"style="background-color: #b80202;" wire:click="setFilter('cancled')">Cancled</a>

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
                        <th wire:click="sortBy('id')">ID</th>
                        <th>Order No.</th>
                        <th>Brand</th>
                        <th>User</th>
                        <th wire:click="sortBy('name')">Bill To</th>
                        <th wire:click="sortBy('total')">Amount</th>
                        {{-- <th wire:click="sortBy('email')">User Email</th> --}}
                        <th wire:click="sortBy('status')">Order Status</th>
                        <th wire:click="sortBy('created_at')">Order Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($allOrders as $Key=>$value)
                            <tr class="text-center">
                                

                                <td>{{ $value->id }}</td>
                                <td>{{ $value->order_number }}</td>
                                <td>{{ $value->vendor->name }}</td>
                                <td>{{ $value->user->id }} : {{ $value->user->name }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->total }}</td>
                                {{-- <td>{{ $value->email }}</td> --}}
                                <td>

                                    @if($value->status == 'ordered')
                                        <button class="btn btn-sm text-white" style="background-color: #04942f; margin: auto;pointer-events: none;">{{ $value->status }}</button>
                                    @elseif($value->status == 'confirmed')
                                        <button class="btn btn-sm text-white" style="background-color: #07dce3; margin: auto;pointer-events: none;">{{ $value->status }}</button>
                                    @elseif($value->status == 'onprocess')
                                        <button class="btn btn-sm text-white" style="background-color: #0207a8; margin: auto;pointer-events: none;">{{ $value->status }}</button>
                                    @elseif($value->status == 'dispached')
                                        <button class="btn btn-sm text-white" style="background-color: #a205eb; margin: auto;pointer-events: none;">{{ $value->status }}</button>
                                    @elseif($value->status == 'delivered')
                                        <button class="btn btn-sm text-white" style="background-color: #dbdb07; margin: auto;pointer-events: none;">{{ $value->status }}</button>
                                    @elseif($value->status == 'cancled')
                                        <button class="btn btn-sm text-white" style="background-color: #b80202; margin: auto;pointer-events: none;">{{ $value->status }}</button>
                                    @endif
                                    
                                </td>
                                <td>{{ $value->created_at }}</td>

                                

                                <td>

                                    <div class="btn-group dropleft">
                                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-cogs"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


                                        <a class="btn btn-danger dropdown-item btn" href="{{ route('admin.manageOrder' ,['order_id'=>$value->id]) }}">Manage</a>
                                        
                                        {{-- <a class="dropdown-item btn btn-danger waves-effect waves-light btn-sm" wire:click="deleteID('{{ $value->id }}')" data-toggle="modal" data-target="#modalDeleteProduct"><i class="fas fa-trash"></i> Delete</a> --}}

                                        </div>
                                    </div>
                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
                    {{ $allOrders->links() }}
            </div>
        </div>
    </div>
    <!-- Appointments -->


</div>
