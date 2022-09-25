<div>
    

    <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                
                <section class="py-4">
                    <div class="container">
                        <h3 class="d-none">Account</h3>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card shadow-none mb-3 mb-lg-0">
                                            <div class="card-body">
                                                <div class="list-group list-group-flush">   
                                                    
                                                    {{-- <a href="{{ route('user.user_profile', ['id'=>Auth::user()->id]) }}" class="list-group-item active d-flex justify-content-between align-items-center">Account Details <i class='bx bx-user-circle fs-5'></i></a> --}}
                                                    
                                                    @include('livewire.web.userprofile.side_menu')


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        
                                        <div class="card"> 
                                           
                                            <div class="card-body">

                                                <div>
                                                    <input type="text" class="form-control w-100" placeholder="Search for Order" wire:model="search">
                                                </div>

                                                <br>
                                                
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="table-light">
                                                            <tr style="text-align:center;">
                                                                <th>Order No</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            @foreach ($userOrders as $key=>$value)
                                                                
                                                                <tr style="text-align:center;">
                                                                    <td>{{ $value->order_number }}</td>
                                                                    <td>

                                                                        {{ Carbon\Carbon::parse($value->created_at)->format('d, F Y') }}

                                                                    </td>
                                                                    
                                                                    <td>
                                                                        <div class="badge rounded-pill bg-light w-100">
                                                                            {{ $value->status }}
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <a wire:click="Show('{{ $value->order_number }}')" class="btn btn-light btn-sm rounded-0">View</a>
                                                                    </td>
                                                                </tr>

                                                            @endforeach
                                                            

                                                        </tbody>
                                                    </table>

                                                    <div style="float: right;">
                                                        {{ $userOrders->links() }}
                                                    </div>


                                                </div>
                                            </div>   

                                        </div>  

                                        <br>

                                        @if($order_number)

                                        <div class="card"> 
                                           
                                            <div class="row">

                                                <div class="card-header col-md-6">
                                                    Order No: {{ $order_number }}
                                                </div>

                                                <div class="card-header col-md-6" style="text-align: right;">
                                                    <a wire:click="closeOrder()" class="btn btn-light btn-sm rounded-0">X</a>
                                                </div>

                                            </div>

                                            <div class="card-body">
                                            
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="table-light">
                                                            <tr style="text-align:center;">
                                                                <th>Name</th>
                                                                <th>Size</th>
                                                                <th>Color</th>
                                                                <th>Quantity</th>
                                                                <th>Price</th>
                                                                <th>Total</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            @foreach ($order_data->items as $key=>$value)
                                                            <tr style="text-align:center;">    
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
                                                                {{-- <td class="text-right">
                                                                    <a href="{{ route('user.user_product_ratings', ['user_id'=>Auth::user()->id, 'product_id'=>$value->variation->product->id, 'variation_id'=>$value->variation->id]) }}" class="btn btn-light btn-sm rounded-0" target="_blank">Give Rating</a>
                                                                </td> --}}

                                                                <td class="text-right">
                                                                    <a wire:click="giveReview('{{ Auth::user()->id }}','{{ $value->variation->product->id }}','{{ $value->variation->id }}')" class="btn btn-light btn-sm rounded-0" target="_blank">Give Rating</a>
                                                                </td>
                                                            </tr>

                                                            @endforeach
                                                            

                                                        </tbody>
                                                    </table>

                                                    <div class="row">
                                                        <div class="col-7"></div>
                                                        <div class="col-3">
                                                                
                                                            <table class="table">
                                                                <tr>
                                                                    <th>Subtotal:</th>
                                                                    <td style="text-align:right;">{{ $order_data->subtotal }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Shipping:</th>
                                                                    <td style="text-align:right;">{{ $order_data->shipping_charge }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Discount:</th>
                                                                    <td style="text-align:right;">{{ $order_data->discount }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Total:</th>
                                                                    <td style="text-align:right;">{{ $order_data->total }}</td>
                                                                </tr>
                                                            </table>

                                                        </div>

                                                        <div class="col-2"></div>
                                                    </div>


                                                </div>

                                            </div>
                                        
                                        </div>

                                        @endif                                 

                                    </div>
                                </div>
                                <!--end row-->
                                

                            </div>
                        </div>
                    </div>
                </section>
                <!--end shop cart-->
            </div>
        </div>
        <!--end page wrapper -->


</div>
