<div>
    
    <style type="text/css">
           /* The switch - the box around the slider */
            .switch {
              position: relative;
              display: inline-block;
              width: 60px;
              height: 34px;
            }

            /* Hide default HTML checkbox */
            .switch input {
              opacity: 0;
              width: 0;
              height: 0;
            }

            /* The slider */
            .slider {
              position: absolute;
              cursor: pointer;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0;
              background-color: #ccc;
              -webkit-transition: .4s;
              transition: .4s;
            }

            .slider:before {
              position: absolute;
              content: "";
              height: 26px;
              width: 26px;
              left: 4px;
              bottom: 4px;
              background-color: white;
              -webkit-transition: .4s;
              transition: .4s;
            }

            input:checked + .slider {
              /*background-color: #2196F3;*/
              background-color: #0fa83b;
            }

            input:focus + .slider {
              /*box-shadow: 0 0 1px #2196F3;*/
              box-shadow: 0 0 1px #0fa83b;
            }

            input:checked + .slider:before {
              -webkit-transform: translateX(26px);
              -ms-transform: translateX(26px);
              transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
              border-radius: 34px;
            }

            .slider.round:before {
              border-radius: 50%;
            } 
    </style>


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
                                    
                                    <strong>Shop:</strong>
                                    
                                    <select class="form-control" name="vendor_id" placeholder="Select Shop" required wire:model="vendor_id">
                                        <option value="" selected>Select Shop</option>
                                        @foreach($vendors as $ven)
                                          <option value="{{ $ven->id }}">{{ $ven->id }} : {{ $ven->name }}</option>
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
                                    
                                    <select class="form-control" name="brand_id" placeholder="Select Brand" required wire:model="brand_id">
                                        <option value="" selected>Select Brand</option>
                                        @foreach($brands as $ven)
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

                           <div class="col-6" wire:ignore>
                              <div class="form-group">          
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

                   <div class="col-4">
                      <div class="form-group">          
                        <div class="input-group">             
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <strong>Published:</strong>
                            

                            <select class="form-control" name="published" wire:model="published">
                              
                              <option value="0">Not Published</option>
                              <option value="1">Published</option>

                            </select>

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
                            <strong>Hot Sale:</strong>
                            

                            <select class="form-control" name="hot_sale" wire:model="hot_sale">
                              
                              <option value="0">Not Active</option>
                              <option value="1">Active</option>

                            </select>

                          </div>
                        </div>
                      </div>
                   </div>

                   <div class="col-4">
                      <div class="form-group">          
                        <div class="input-group">             
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <strong>Flash Sale:</strong>
                            

                            <select class="form-control" name="flash_sale" wire:model="flash_sale">
                              
                              <option value="0">Not Active</option>
                              <option value="1">Active</option>

                            </select>

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
                            <h3 class="card-title">Product Variations</h3>
                        </div>

                        {{-- <div class="col-6">
                            <!-- Rounded switch -->
                            <label style="margin:auto;">Make Variation:</label>
                            <label class="switch">
                              <input type="checkbox" wire:click="toggleVariation()">
                              <span class="slider round"></span>
                            </label>
                        </div> --}}
                        
                    </div>             
                </div>
                <br>

                    <div class="col-12">
                    <div class="row">

                       <div class="col-5">
                          <div class="form-group" wire:ignore>          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Sizes:</strong>
                            
                                <select class="form-control select2size" name="size_ids" placeholder="Select Sizes" wire:model="size_ids" multiple>
                                    <option value="" disabled selected>Select</option>
                                    @foreach($sizes as $size)
                                        {{-- <option value="{{ $size->id }}">{{ $size->name }}</option> --}}
                                        <option value="{{ $size->id }},{{ $size->name }}">{{ $size->name }}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                       </div>

                       <div class="col-5">
                          <div class="form-group" wire:ignore>          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Colors:</strong>
                            
                                <select class="form-control select2color" name="color_ids" placeholder="Select Colors" wire:model="color_ids" multiple>
                                    <option value="" disabled selected>Select</option>
                                    @foreach($colors as $color)
                                        <option value="{{ $color->id }},{{ $color->name }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                       </div>

                       <div class="col-2">
                          <div class="form-group" wire:ignore>          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                
                                <a wire:click="makeVariations()" class="btn btn-success text-white" style="margin-top: 22px;"> Make variations</a>
                                
                              </div>
                            </div>
                          </div>
                       </div>

                   </div>
               </div>

               <div>
                @foreach($variation_array as $key=>$vary) 

                
                <div class="col-12">
                    {{-- <label>{{ $vary }}:</label> --}}
                    <label>{{ $v_product_names[$key] }}:</label>{{-- </label>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" wire:click.prevent="removeVariation({{ $key }})">X</a> --}}
                    {{-- <label style="margin:auto;">Make Variation:</label> --}}
                    <label class="switch">
                      <input type="checkbox" wire:click="toggleInclude({{ $key }})">
                      <span class="slider round"></span>
                    </label>

                    <div class="row">

                        {{-- <div class="col-2">
                          <div class="form-group">          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Unit Price:</strong>
                                <input type="number" class="form-control" name="unit_price" placeholder="Unit Price" wire:model="v_product.{{ $key }}.unit_price">
                              </div>
                            </div>
                          </div>
                       </div>

                       <div class="col-2">
                          <div class="form-group">          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Sale Price:</strong>
                                <input type="number" class="form-control" name="sale_price" placeholder="Sale Price" wire:model="v_product.{{ $key }}.sale_price">
                              </div>
                            </div>
                          </div>
                       </div> --}}

                       <div class="col-2">
                          <div class="form-group">          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>SKU:</strong>
                                <input type="text" class="form-control" name="sku" placeholder="SKU" wire:model="v_product.{{ $key }}.sku">
                              </div>
                            </div>
                          </div>
                       </div>

                       <div class="col-3">
                          <div class="form-group">          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Quantity:</strong>
                                <input type="number" class="form-control" name="quantity" placeholder="Quantity" wire:model="v_product.{{ $key }}.quantity">
                              </div>
                            </div>
                          </div>
                       </div>

                       <div class="col-3">
                          <div class="form-group">          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Image:</strong>
                                    <input type="file" class="input-file input-md" wire:model="v_product.{{ $key }}.variation_image">
                                    <br>
                                    
                                    @if($v_product[$key]['variation_image'])
                                        <img src="{{ $v_product[$key]['variation_image']->temporaryUrl() }}" width="120">
                                    @endif
                              </div>
                            </div>
                          </div>
                       </div>

                    </div>
                </div>
                <hr>
                @endforeach
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
