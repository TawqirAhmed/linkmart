<div>
    


    <!-- Appointments -->
    <div class="col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <h3 class="card-title">All {{ $filter }} Services</h3>
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
                        <a href="{{ route('admin.add_service') }}" class="btn btn-success" style="float:right;">Add New Service</a>
                    </div>

                    
                </div>             
            </div>
            <br>

            <div class="col-md-6 offset-md-3" style="text-align:center;">
                

                <a class="btn btn-default" wire:click="setFilter(null)">All</a>
                <a class="btn btn-denger text-black" style="background-color: yellow;" wire:click="setFilter('Expiring')">Expiring</a>
                <a class="btn btn-success text-white" style="background-color: red;" wire:click="setFilter('Expired')">Expired</a>

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
                        <th wire:click="sortBy('company_name')">Company Name</th>
                        <th wire:click="sortBy('service_category ')">Service Category </th>
                        <th wire:click="sortBy('advertice_category ')">Advertice Category </th>
                        <th>Meta Tags </th>
                        <th wire:click="sortBy('payment_amount')">Payment Amount</th>
                        <th wire:click="sortBy('advertice_expire_date')">Advertice Expire</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($allService as $Key=>$value)
                            <tr class="text-center">
                                

                                <td>{{ $value->id }}</td>
                                <td>{{ $value->company_name }}</td>
                                <td>{{ $value->service_category->name }}</td>
                                <td>{{ $value->advertice_category->name }}</td>
                                <td>{{ $value->meta_tags}}</td>
                                <td>{{ $value->payment_amount }}</td>

                                <td 
                                    @if($value->advertice_expire_date < Carbon\Carbon::now()) 
                                        style="background-color:red;" 
                                    @endif
                                    @if($value->advertice_expire_date < Carbon\Carbon::now()->addDays(7)) 
                                        style="background-color:yellow;"
                                    @endif

                                >
                                    {{ $value->advertice_expire_date }}
                                </td>

                                <td>
                                    <a href="{{ route('admin.edit_service',['id'=>$value->id]) }}" class="btn btn-sm text-white btn-warning">Edit</a>
                                    
                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
                    {{ $allService->links() }}
            </div>
        </div>
    </div>
    <!-- Appointments -->




</div>
