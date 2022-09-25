<div>
        <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">Brands</h3>
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
                            <label>Column 1</label>
                            <hr>
                            @foreach($brands_array as $key=>$value)
                                @if($key < 3)
                                <label>Position {{ $key +1 }}</label>
                                <select class="form-control" wire:model="brands_array.{{ $key }}">
                                    <option value=""> Select Vendor</option>
                                    @foreach($allVendors as $key=>$value)
                                    <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-sm-4">
                            <label>Column 2</label>
                            <hr>
                            @foreach($brands_array as $key=>$value)
                                @if($key > 2 && $key < 6)
                                <label>Position {{ $key +1 }}</label>
                                <select class="form-control" wire:model="brands_array.{{ $key }}">
                                    <option value=""> Select Vendor</option>
                                    @foreach($allVendors as $key=>$value)
                                    <option value="{{ $value->id }}">{{ $value->id }} : {{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-sm-4">
                            <label>Column 3</label>
                            <hr>
                            @foreach($brands_array as $key=>$value)
                                @if($key > 5 && $key < 9)
                                <label>Position {{ $key +1 }}</label>
                                <select class="form-control" wire:model="brands_array.{{ $key }}">
                                    <option value=""> Select Vendor</option>
                                    @foreach($allVendors as $key=>$value)
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


        <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">Footer Categories</h3>
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
                            <label>Column 1</label>
                            <hr>
                            @foreach($categories_array as $key=>$value)
                                @if($key < 3)
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
                            <label>Column 2</label>
                            <hr>
                            @foreach($categories_array as $key=>$value)
                                @if($key > 2 && $key < 6)
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
                            <label>Column 3</label>
                            <hr>
                            @foreach($categories_array as $key=>$value)
                                @if($key > 5 && $key < 9)
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


        <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">Footer Tags</h3>
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
                            <label>Column 1</label>
                            <hr>
                            @foreach($tags_array as $key=>$value)
                                @if($key < 3)
                                <label>Position {{ $key +1 }}</label>
                                <input class="form-control" type="text" wire:model="tags_array.{{ $key }}">
                                @endif
                            @endforeach
                        </div>
                        <div class="col-sm-4">
                            <label>Column 2</label>
                            <hr>
                            @foreach($tags_array as $key=>$value)
                                @if($key > 2 && $key < 6)
                                <label>Position {{ $key +1 }}</label>
                                <input class="form-control" type="text" wire:model="tags_array.{{ $key }}">
                                @endif
                            @endforeach
                        </div>
                        <div class="col-sm-4">
                            <label>Column 3</label>
                            <hr>
                            @foreach($tags_array as $key=>$value)
                                @if($key > 5 && $key < 9)
                                <label>Position {{ $key +1 }}</label>
                                <input class="form-control" type="text" wire:model="tags_array.{{ $key }}">
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

 


        <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">Contact Info</h3>
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
                <div class="col-12" wire:ignore>

                    
                    <br>

                    <div class="row">
                        
                        <div class="col-md-6 offset-md-3">
                            <div>
                                <textarea class="form-control" id="contact_info" wire:model="contact_info" rows="5"></textarea>
                            </div>
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



    @push('scripts')

        <script type="text/javascript">
            
            $(document).ready(function() {

                var contact_info = document.getElementById("contact_info").value;

                $('#contact_info').summernote({
                    height: 200,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false,                 // set focus to editable area after initializing summernote
                    // toolbar
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                        ['fontname', ['fontname']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', []],
                        ['help', ['help']]
                    ],
                    callbacks: {
                        onChange: function(contents, $editable) {
                            @this.set('contact_info', contents);
                        }
                    }
                }).summernote('code', contact_info);


              });

            

        </script>


    @endpush



        <style type="text/css">
          html {
            font-size: .9rem;
          }
        </style>

</div>
