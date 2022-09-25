<div>
   
    <!-- Appointments -->
    <div class="col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <h3 class="card-title">All Products</h3>
                    </div>
                    <div class="col-6">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        @if(Session::has('delete_message'))
                            <div class="alert alert-danger" role="alert">{{ Session::get('delete_message') }}</div>
                        @endif
                    </div>

                    <div class="col-2">
                        <a class="btn btn-success float-right" href="{{ route('admin.add_product') }}">Add Products With Variations</a>
                    </div>

                    <div class="col-2">
                        <a class="btn btn-primary float-right" href="{{ route('admin.add_product_without_variations') }}">Add Products</a>
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

                <div class="col-sm-6" style="text-align:center;">
                    <a class="btn btn-default" wire:click="setFilter(null)">All</a> &nbsp;
                    <a class="btn btn-success" style="color:white;" wire:click="setFilter(1)">Published</a> &nbsp;
                    <a class="btn btn-danger" style="color:white;" wire:click="setFilter(0)">Not Published</a> &nbsp;
                </div>

                <div class="col-sm-3">
                    <input type="search" wire:model="search" class="form-control input-sm" placeholder="Search">
                </div>
                </div>
                <br>
                <table id="datatable-makesales" class="table table-bordered table-striped nowrap data-table-makesales" style="overflow-wrap: anywhere;" width="100%">
                    <thead style="text-align: center;">
                    <tr>
                        <th wire:click="sortBy('id')">S/N</th>
                        <th>Image</th>
                        <th wire:click="sortBy('name')">Name</th>
                        <th wire:click="sortBy('vendor_id')">Vendor</th>
                        <th>Brand</th>
                        <th>Variations</th>
                        <th wire:click="sortBy('description')">Des</th>
                        <th wire:click="sortBy('published')">Published</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($allProducts as $pro=>$pro_all)
                            <tr>
                                

                                <td>{{ $pro_all->id }}</td>
                                <td>
                                    <img src="{{ asset('') }}uploads/products/{{ $pro_all->name }}/{{ $pro_all->image }}" alt="{{ $pro_all->name }}" width="80">
                                </td>
                                <td>{{ $pro_all->name }}</td>
                                <td>{{ $pro_all->vendors->name }}</td>
                                <td>{{ $pro_all->brand->name ?? '--'}}</td>

                                <td>
                                    @foreach ($pro_all->variations as $key=>$value)
                                        @if($key != 0)
                                           <hr> 
                                        @endif
                                        <p>
                                            <b>Size:</b> {{ $value->size->name ?? '--' }}, 
                                            <b>Color:</b> {{ $value->color->name ?? '--' }}, 
                                            <b>SKU:</b> {{ $value->sku }}, 
                                            <b>Qty:</b> {{ $value->quantity }}
                                        </p>
                                    @endforeach
                                </td>

                                <td>{{ $pro_all->description }}</td>

                                <td style="text-align:center;">
                                    @if($pro_all->published == 1)
                                        <button class="btn btn-success" disabled>Published</button>
                                    @else
                                        <button class="btn btn-danger" disabled>Not Published</button>
                                    @endif
                                </td>

                                

                                <td>

                                    <div class="btn-group dropleft">
                                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-cogs"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


                                        <a class="btn btn-danger dropdown-item btn" href="{{ route('admin.editproduct' ,['id'=>$pro_all->id]) }}">Edit</a>
                                        
                                        {{-- <a class="dropdown-item btn btn-danger waves-effect waves-light btn-sm" wire:click="deleteID('{{ $pro_all->id }}')" data-toggle="modal" data-target="#modalDeleteProduct"><i class="fas fa-trash"></i> Delete</a> --}}

                                        </div>
                                    </div>
                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
                    {{ $allProducts->links() }}
            </div>
        </div>
    </div>
    <!-- Appointments -->


</div>
