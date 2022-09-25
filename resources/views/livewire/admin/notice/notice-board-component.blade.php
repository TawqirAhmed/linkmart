<div>
    
    <br><br>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-8 offset-md-2">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Notice Board</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Notice" wire:model="search">
                  
                </div>
              </div>

              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>

                    @foreach ($allNotice as $key=>$value)
                        <tr>
                            <td class="mailbox-name"><a href="">LinkMart</a></td>
                            <td class="mailbox-subject"><b>{{ $value->title }}</b>
                            </td>
                            <td class="mailbox-attachment"></td>
                            <td class="mailbox-date">{{ $value->created_at }}</td>


                            @if(Route::has('login'))
                              @auth

                                @if(Auth::user()->user_type === 'vendor')
                                  <td class="mailbox-name"><a href="{{ route('vendor.notice_details',$value->id) }}">View Details</a></td>
                                @else

                                  <td class="mailbox-name"><a href="{{ route('admin.notice_details',$value->id) }}">View Details</a></td>
                                
                                @endif
                              @endif
                            @endif

                        </tr>
                    @endforeach
                      
                  </tbody>
                </table>
                <!-- /.table -->
                <br>
                <div class="float-right" style="padding-right: 10px;">
                    {{ $allNotice->links() }}
                </div>

              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->     


    <style type="text/css">
      html {
        font-size: .9rem;
      }
    </style>

</div>
