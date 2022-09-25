<div>
    
    <br><br>
    <div class="card col-md-6 offset-md-3">

        <form role="form" enctype="multipart/form-data" wire:submit.prevent="Store()">
            @csrf
            <!--=====================================
                MODAL HEADER
            ======================================-->  
              <div class="modal-header">
                <h4 class="modal-title">Edit Contact Info</h4>
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

                        <div class="col-12">
                          <div class="form-group">          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Title:</strong>
                                <input type="text" class="form-control" name="title" placeholder="Title" wire:model="title" required>
                              </div>
                            </div>
                          </div>
                       </div>

                        <div class="col-12">
                          <div class="form-group">          
                            <div class="input-group" wire:ignore>             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Description:</strong>


                                <textarea class="form-control" wire:model="description" id="description"></textarea>


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


                // Livewire.on('reset_summernote', () => {
                //     $('#description').summernote('reset');
                // });

            </script>

        @endpush


</div>
