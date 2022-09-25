<div>

    <br><br>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
        <div class="col-md-8 offset-md-2">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Notice</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>{{ $notice->title }}</h5>
                <h6>From: LinkMart
                  <span class="mailbox-read-time float-right">{{ $notice->created_at }}</span></h6>
              </div>
              <!-- /.mailbox-read-info -->
              
              <div class="mailbox-read-message">
                
                {!! $notice->description !!}
                
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-white">
              <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                
              </ul>
            </div>
            <!-- /.card-footer -->
            <div class="card-footer">
              
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->






</div>
