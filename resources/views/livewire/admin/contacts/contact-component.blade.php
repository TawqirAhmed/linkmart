{{-- <div>
    
    <a href="{{ route('admin.add_notice') }}" class="btn btn-success">Add New Notice</a>


</div> --}}


<div>
    <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">All Contact Info</h3>
                        </div>
                        <div class="col-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                        </div>

                        <div class="col-3">
                            <a class="btn btn-success float-right text-white" href="{{ route('admin.add_contact') }}">Add New Contact Info</a>
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
                        <input type="search" wire:model="search" class="form-control input-sm" placeholder="Search">
                    </div>
                    </div>
                    <br>
                    <table id="datatable-makesales" class="table table-bordered table-striped nowrap data-table-makesales" style="overflow-wrap: anywhere;" width="100%">
                        <thead style="text-align: center;">
                        <tr>
                            <th style="width:5%">S/N</th>
                            <th style="width:15%">Title</th>
                            <th style="width:10%">Posted</th>
                            <th style="width:5%">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($allContact as $key=>$value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td style="text-align:center;">
                                        
                                        <a class="btn btn-warning btn-sm text-white" href="{{ route('admin.edit_contact',$value->id) }}">Edit</a>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{ $allContact->links() }}
                </div>
            </div>
        </div>
        <!-- Appointments -->


        


       


        <style type="text/css">
          html {
            font-size: .9rem;
          }
        </style>

</div>
