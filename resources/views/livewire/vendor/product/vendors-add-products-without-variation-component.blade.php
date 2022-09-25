<div>
    
    


        <form role="form" enctype="multipart/form-data" wire:submit.prevent="Store()">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="card-title">Product Information</h3>
                        </div>
                        
                    </div>             
                </div>
                <br>
                <div class="col-12">

                   <div class="row">

                       <div class="col-6">
                          <div class="form-group">          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Product Name:</strong>
                                <input type="text" class="form-control" name="name" placeholder="Product Name" required wire:model="name">
                              </div>
                            </div>
                          </div>
                       </div>

                       <div class="col-6">
                          <div class="form-group">          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Tags:</strong>
                                <input type="text" class="form-control" name="tags" placeholder="Tags" required wire:model="tags">
                              </div>
                            </div>
                          </div>
                       </div>

                   </div>

                   <div class="row">
                    
                           <div class="col-6">
                              <div class="form-group">          
                                <div class="input-group">             
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Category:</strong>
                                    
                                    <select class="form-control" name="category_id" placeholder="Select Category" required wire:model="category_id">
                                        <option value="" selected>Select Category</option>
                                        @foreach($categoris as $cat)
                                          <option value="{{ $cat->id }}">{{ $cat->id }} : {{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                </div>
                              </div>
                           </div>

                           <div class="col-6">
                              <div class="form-group">          
                                <div class="input-group">             
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    
                                    <strong>Brand:</strong>
                                    {{-- <h5>{{ $temp_vendor->name }}</h5> --}}

                                    <select class="form-control" name="vendor_id" placeholder="Select Brand" required wire:model="vendor_id">
                                        <option value="" selected>Select Vendor</option>
                                        @foreach($vendors as $ven)
                                          <option value="{{ $ven->id }}">{{ $ven->id }} : {{ $ven->name }}</option>
                                        @endforeach
                                    </select>

                                  </div>
                                </div>
                              </div>
                           </div>

                    </div>

                    <div class="row">

                           <div class="col-6">
                              <div class="form-group">          
                                <div class="input-group">             
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Warning Threshhold:</strong>
                                    <input type="number" class="form-control" name="warning" placeholder="Warning Threshhold" required wire:model="warning">
                                  </div>
                                </div>
                              </div>
                           </div>

                           <div class="col-6">
                              <div class="form-group">          
                                <div class="input-group">             
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Unit Price:</strong>
                                    <input type="number" class="form-control" name="product_unit_price" placeholder="Unit Price" required wire:model="product_unit_price">
                                  </div>
                                </div>
                              </div>
                           </div>

                           

                       </div>


                       <div class="row">

                           <div class="col-6">
                              <div class="form-group" wire:ignore>          
                                <div class="input-group">             
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Description:</strong>
                                    <textarea class="form-control" name="description" placeholder="Description" required wire:model="description" id="description"></textarea>
                                  </div>
                                </div>
                              </div>
                           </div>

                           <div class="col-6">
                              <div class="form-group">          
                                <div class="input-group">             
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Unit:</strong>
                                     <input type="text" class="form-control" name="unit" placeholder="Unit(Pc,Liter,KG etc... )" required wire:model="unit">
                                  </div>
                                </div>
                              </div>
                           </div>

                       </div>


                       <div class="row">

                           <div class="col-6">
                              <div class="form-group">          
                                <div class="input-group">             
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Image:</strong>
                                    <input type="file" class="input-file input-md" wire:model="image">
                                    <br>
                                    
                                    @if($image)
                                        <img src="{{ $image->temporaryUrl() }}" width="120">
                                    @endif
                                  </div>
                                </div>
                              </div>
                           </div>

                           <div class="col-6">
                              <div class="form-group">          
                                <div class="input-group">             
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Images:</strong>
                                     <input type="file" class="input-file input-md" wire:model="images" multiple>
                                     <br>

                                        @if ($images)
                                            Photo Preview:
                                            <div class="row">
                                                @foreach ($images as $images)
                                                <div class="col-3 card me-1 mb-1">
                                                    <img src="{{ $images->temporaryUrl() }}">
                                                </div>
                                                @endforeach
                                            </div>
                                        @endif


                                  </div>
                                </div>
                              </div>
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
                        <div class="col-6">
                            <h3 class="card-title">Others</h3>
                        </div>
                        
                    </div>             
                </div>
                <br>


                <div class="row">

                   <div class="col-4">
                      <div class="form-group">          
                        <div class="input-group">             
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <strong>Sale Price:</strong>
                            <input type="number" class="form-control" name="sale_price" placeholder="Sale Price" wire:model="sale_price">
                          </div>
                        </div>
                      </div>
                   </div>

                   <div class="col-4">
                      <div class="form-group">          
                        <div class="input-group">             
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <strong>Onsale Status:</strong>
                        
                            <select class="form-control" name="on_sale" placeholder="Select Onsale Status" required wire:model="on_sale">
                                <option value="" selected>Select</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                               
                            </select>
                          </div>
                        </div>
                      </div>
                   </div>
                   
                   <div class="col-4">
                      <div class="form-group">          
                        <div class="input-group">             
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <strong>Sale End Date(mm/dd/yyyy --:-- --):</strong>
                            <input type="datetime-local" class="form-control" name="sale_end" placeholder="Sale End Date" wire:model="sale_end">
                          </div>
                        </div>
                      </div>
                   </div>
                   

                </div>

                <div class="row">

                   <div class="col-4">
                      <div class="form-group">          
                        <div class="input-group">             
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <strong>Featured:</strong>
                        
                            <select class="form-control" name="featured" placeholder="Select Featured" required wire:model="featured">
                                <option value="" selected>Select</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                               
                            </select>
                          </div>
                        </div>
                      </div>
                   </div>

                   <div class="col-4">
                      <div class="form-group">          
                        <div class="input-group">             
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <strong>Max Order:</strong>
                            <input type="number" class="form-control" name="max_order" placeholder="Max Order" wire:model="max_order">
                          </div>
                        </div>
                      </div>
                   </div>

                   <div class="col-4">
                      <div class="form-group">          
                        <div class="input-group">             
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <strong>Order Threshhold:</strong>
                            <input type="number" class="form-control" name="order_threshold" placeholder="Order Threshhold" wire:model="order_threshold">
                          </div>
                        </div>
                      </div>
                   </div>
                   

                </div>

                <div class="row">

                   

                   <div class="col-4">
                      <div class="form-group">          
                        <div class="input-group">             
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <strong>Base Shipping Charge:</strong>
                            <input type="number" class="form-control" name="base_shipping" placeholder="Base Shipping Charge" wire:model="base_shipping">
                          </div>
                        </div>
                      </div>
                   </div>

                   <div class="col-4">
                      <div class="form-group">          
                        <div class="input-group">             
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <strong>Extra Shipping Charge:</strong>
                            <input type="number" class="form-control" name="extra_shipping" placeholder="Extra Shipping Charge" wire:model="extra_shipping">
                          </div>
                        </div>
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
                        <div class="col-6">
                            <h3 class="card-title">Stock</h3>
                        </div>
                        
                    </div>             
                </div>
                <br>


                <div class="row">

                        {{-- <div class="col-3">
                          <div class="form-group">          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Unit Price:</strong>
                                <input type="number" class="form-control" name="unit_price" placeholder="Unit Price" wire:model="unit_price">
                              </div>
                            </div>
                          </div>
                       </div> --}}

                       <div class="col-3">
                          <div class="form-group">          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>SKU:</strong>
                                <input type="text" class="form-control" name="sku" placeholder="SKU" wire:model="sku">
                              </div>
                            </div>
                          </div>
                       </div>

                       <div class="col-3">
                          <div class="form-group">          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Quantity:</strong>
                                <input type="number" class="form-control" name="quantity" placeholder="Quantity" wire:model="quantity">
                              </div>
                            </div>
                          </div>
                       </div>

                       

                    </div>

                
               


            </div>
        </div>
        <!-- Appointments -->
       





          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
          </div>


    </form>




        @push('scripts')

            
            <script type="text/javascript">
                $(function () {
                    $('.select2size').select2({
                        theme: 'bootstrap4'
                    }).on('change', function () {
                        @this.set('size_ids',$(this).val());
                    });

                    $('.select2color').select2({
                        theme: 'bootstrap4'
                    }).on('change', function () {
                        @this.set('color_ids',$(this).val());
                    });
                })
            </script>

            <script type="text/javascript">

              $(document).ready(function() {

                  var description = document.getElementById("description").value;

                  $('#description').summernote({
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
                        // ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        // ['height', ['height']],
                        // ['table', ['table']],
                        // ['insert', ['link', 'picture', 'hr']],
                        ['view', ['fullscreen'/*, 'codeview' */]],   // remove codeview button 
                        ['help', ['help']]
                      ],
                      callbacks: {
                          onChange: function(contents, $editable) {
                              @this.set('description', contents);
                          }
                      }
                  }).summernote('code', description);


                });


            </script>

        @endpush





</div>
