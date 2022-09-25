<div>

    
    <!-- Appointments -->
    <div class="col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">
                        <h3 class="card-title">Home Categories</h3>
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

                <div class="row">
                    <div class="col-sm-4">
                        {{-- <label>Column 1</label>
                        <hr> --}}
                        @foreach($categories_array as $key=>$value)
                            @if($key < 4)
                            <label>Position {{ $key +1 }}</label>
                            <select class="form-control" wire:model="categories_array.{{ $key }}">
                                <option value=""> Select Category</option>
                                @foreach($allCategories as $key=>$value)
                                <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>
                                @endforeach
                            </select>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-sm-4">
                        {{-- <label>Column 2</label>
                        <hr> --}}
                        @foreach($categories_array as $key=>$value)
                            @if($key > 3 && $key < 8)
                            <label>Position {{ $key +1 }}</label>
                            <select class="form-control" wire:model="categories_array.{{ $key }}">
                                <option value=""> Select Category</option>
                                @foreach($allCategories as $key=>$value)
                                <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>
                                @endforeach
                            </select>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-sm-4">
                        {{-- <label>Column 3</label>
                        <hr> --}}
                        @foreach($categories_array as $key=>$value)
                            @if($key > 7 && $key < 12)
                            <label>Position {{ $key +1 }}</label>
                            <select class="form-control" wire:model="categories_array.{{ $key }}">
                                <option value=""> Select Category</option>
                                @foreach($allCategories as $key=>$value)
                                <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>
                                @endforeach
                            </select>
                            @endif
                        @endforeach
                    </div>
                </div>
                
                <br>
                <div class="modal-footer">
                    <a class="btn btn-success float-right" wire:click.prevent="Update()">Update</a>

                </div>

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
