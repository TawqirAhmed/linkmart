<div>
    
    <div class="card">

        <form role="form" enctype="multipart/form-data" wire:submit.prevent="Update()">
            @csrf
            <!--=====================================
                MODAL HEADER
            ======================================-->  
              <div class="modal-header">
                <h4 class="modal-title">Flash Sale</h4>
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
                          <div class="form-group">          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Sale End Date(mm/dd/yyyy --:-- --):</strong>
                                <input type="datetime-local" class="form-control" name="sale_end_date" placeholder="Sale End Date" wire:model="sale_end_date">
                              </div>
                            </div>
                          </div>
                       </div>

                        <div class="col-4">
                          <div class="form-group">          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Status:</strong>

                                <select class="form-control" wire:model="status">

                                    <option value="0">Not Active</option>
                                    <option value="1">Active</option>
                                    
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
                                <strong>Background Image:</strong>
                                <br>
                                <input type="file" name="image" wire:model="image">
                                <div style="padding: 20px;">
                                  @if($image)
                                      <img src="{{ $image->temporaryUrl() }}" width="600">
                                  @elseif($old_image)
                                      <img src="{{ asset('') }}uploads/background/{{ $old_image }}" width="600">
                                  @endif
                                </div>

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







</div>
