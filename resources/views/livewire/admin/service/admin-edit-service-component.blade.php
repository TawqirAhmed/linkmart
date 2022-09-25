<div>
    
    <div class="card">

        <form role="form" enctype="multipart/form-data" wire:submit.prevent="Update()">
            @csrf
            <!--=====================================
                MODAL HEADER
            ======================================-->  
              <div class="modal-header">
                <h4 class="modal-title">Edit Service</h4>
                {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                
              </div>
              <!--=====================================
                MODAL BODY
              ======================================-->
              <div class="modal-body">
                <div class="box-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">

                        <div class="col-4">
                          <div class="form-group" wire:ignore>          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Company Name:</strong>

                                <input type="text" class="form-control" name="company_name" wire:model="company_name" required>


                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-4">
                          <div class="form-group" wire:ignore>          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Meta Tags:</strong>

                                <input type="text" class="form-control" name="meta_tags" wire:model="meta_tags" required>


                              </div>
                            </div>
                          </div>
                        </div>

                    
                    </div>

                    <div class="row">

                        <div class="col-4">
                          <div class="form-group" wire:ignore>          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Service Category:</strong>

                                <select class="form-control" name="order_status" required wire:model="service_category_id">
                                    
                                    <option value="">Select Service Category</option>

                                    @foreach ($service_categories as $key=>$value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach

                                </select>

                                @error('service_category_id') <span class="error">{{ $message }}</span> @enderror

                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group" wire:ignore>          
                                <div class="input-group">             
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Advertice Category:</strong>

                                    <select class="form-control" name="order_status" required wire:model="advertice_category_id">
                                        
                                        <option value="">Select Advertice Category</option>

                                        @foreach ($advertice_categories as $key=>$value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach

                                    </select>

                                    @error('advertice_category_id') <span class="error">{{ $message }}</span> @enderror

                                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">          
                                <div class="input-group">             
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Logo:</strong>

                                    <input type="file" class="input-file input-md" wire:model="logo">
                                        <br>
                                        
                                    @if($logo)
                                        <img src="{{ $logo->temporaryUrl() }}" width="120">
                                    @elseif($old_logo)
                                        <img src="{{ asset('') }}uploads/service/{{ $old_logo }}" width="120">
                                    @endif

                                  </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-4">
                          <div class="form-group" wire:ignore>          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Payment Amount:</strong>

                                <input type="number" class="form-control" name="payment_amount" wire:model="payment_amount" required>

                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-4">
                          <div class="form-group" wire:ignore>          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Advertice Expire Date:</strong>

                                <input type="date" class="form-control" name="advertice_expire_date" wire:model="advertice_expire_date" required>

                              </div>
                            </div>
                          </div>
                        </div>


                    </div>
                    
                    <div class="row">

                        <div class="col-4">
                          <div class="form-group" wire:ignore>          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Qualification:</strong>

                                <textarea id="qualification" class="form-control" wire:model="qualification">
                                    
                                </textarea>

                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-4">
                          <div class="form-group" wire:ignore>          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Experience:</strong>

                                <textarea id="experience" class="form-control" wire:model="experience">
                                    
                                </textarea>

                                @error('experience') <span class="error">{{ $message }}</span> @enderror

                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-4">
                          <div class="form-group" wire:ignore>          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Contact Info:</strong>

                                <textarea id="contact_info" class="form-control" wire:model="contact_info">
                                    
                                </textarea>


                              </div>
                            </div>
                          </div>
                        </div>


                    </div>
                  
                </div>
              </div>
              <!--=====================================
                MODAL FOOTER
              ======================================-->
              <div class="modal-footer">
                {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> --}}
                <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
              </div>
        </form>
        
    </div>



@push('scripts')

    <script type="text/javascript">
        
        $(document).ready(function() {

            var qualification = document.getElementById("qualification").value;

            $('#qualification').summernote({
                height: 200,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false,                 // set focus to editable area after initializing summernote
                
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('qualification', contents);
                    }
                }
            }).summernote('code', qualification);



            var experience = document.getElementById("experience").value;

            $('#experience').summernote({
                height: 200,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false,                 // set focus to editable area after initializing summernote
                
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('experience', contents);
                    }
                }
            }).summernote('code', experience);

            var contact_info = document.getElementById("contact_info").value;

            $('#contact_info').summernote({
                height: 200,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false,                 // set focus to editable area after initializing summernote
                
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('contact_info', contents);
                    }
                }
            }).summernote('code', contact_info);


          });

    </script>

@endpush



</div>
