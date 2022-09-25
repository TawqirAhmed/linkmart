<div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                Reprot Download
            </div>
            
            
        </div>
    </div>

    
    <div class="container">
        <div class="card">
            <div class="card-header">
                All Information
            </div>
            <div class="card-body">
                <a href="{{ route('admin.customers_report') }}" class="btn btn-default text-white" style="background-color:#03962a;">Customer List</a>
                &nbsp;
                <a href="{{ route('admin.vendors_report') }}" class="btn btn-default text-white" style="background-color:#024f73;">Brand/Seller List</a>
            </div>
            
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                Sold Products
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.SoldProducts_report') }}">
                    @csrf

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>From</label>
                                <input type="date" name="from" class="form-control" required>
                                
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label>To</label>
                                <input type="date" name="to" class="form-control" required>
                                
                            </div>
                        </div>

                        <div class="col-4">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-success form-control">Download XLSX</button>
                        </div>
                    </div>

                </form>
            </div>
            
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                Valued Customers
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.valued_customers_report') }}">
                    @csrf

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>From</label>
                                <input type="date" name="from" class="form-control" required>
                                
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label>To</label>
                                <input type="date" name="to" class="form-control" required>
                                
                            </div>
                        </div>

                        <div class="col-4">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-success form-control">Download XLSX</button>
                        </div>
                    </div>

                </form>
            </div>
            
        </div>
    </div>


    <div class="container">
        <div class="card">
            <div class="card-header">
                Brand wise Sell Report
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.vendor_order_report') }}">
                    @csrf

                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>From</label>
                                <input type="date" name="from" class="form-control" required>
                                
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>To</label>
                                <input type="date" name="to" class="form-control" required>
                                
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>Select Brand</label>
                                <select name="vendor_id" class="form-control" required>
                                    <option value="">Select Brand</option>

                                    @foreach ($vendors as $value)
                                        <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>
                                    @endforeach

                                </select>
                                
                            </div>
                        </div>

                        <div class="col-3">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-success form-control">Download XLSX</button>
                        </div>
                    </div>

                </form>
            </div>
            
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                Brand wise Product List
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.vendor_product_list') }}">
                    @csrf

                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>Select Brand</label>
                                <select name="vendor_id" class="form-control" required>
                                    <option value="">Select Brand</option>

                                    @foreach ($vendors as $value)
                                        <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>
                                    @endforeach

                                </select>
                                
                            </div>
                        </div>
                        <div class="col-3">
                            
                        </div>

                        <div class="col-3">
                            
                        </div>

                        

                        <div class="col-3">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-success form-control">Download XLSX</button>
                        </div>
                    </div>

                </form>
            </div>
            
        </div>
    </div>

</div>
