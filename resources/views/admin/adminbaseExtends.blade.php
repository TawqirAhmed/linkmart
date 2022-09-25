<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LinkMart Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/images//favicon.ico') }}" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  
   <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">

  


  <!-- bootstrap-icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- Toster -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

  {{-- <link rel="stylesheet" href="{{ asset('select2/select2.min.css') }}"> --}}

        @livewireStyles
</head>
<body class="hold-transition sidebar-collapse sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  {{-- <nav class="main-header navbar navbar-expand navbar-white navbar-light"> --}}
    <nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

      @if(Route::has('login'))
        @auth

          @if(Auth::user()->user_type === 'vendor')
            <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ route('vendor.dashboard') }}" class="nav-link">Home</a>
            </li>
          @else

            <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
            </li>
          
          @endif
        @endif
      @endif
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('profile.show') }}" class="nav-link">Profile Settings</a>
      </li>
    </ul>

      
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->

      <!-- User Dropdown Menu -->

      @php

        $Sessionid=Auth::id();
        $Sessionuser=DB::table('users')->where('id',$Sessionid)->first();

      @endphp


      <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        
        <span class="hidden-xs">{{ $Sessionuser->name }}</span> </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            
            <p>{{ $Sessionuser->name }}</p>
          </li>
          <!-- Menu Body -->
                          <!-- Menu Footer-->
          
          <div style="padding: 10px">
            <li class="pull-right"><a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></i>Logout</a></li>
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
              @csrf
            </form>
          </div>

        </ul>
      </li>

      <!-- User Dropdown Menu -->

      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  {{-- <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #000080;"> --}}
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{URL::to('/')}}" class="brand-link">
      <img src="{{ asset('admin/images/logo/profilepic.jpg') }}"  class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">LinkMart</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

         @include('admin.nav_items')
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   

    <!-- Main content -->
      <main class="py-1">
            {{-- {{$slot}} --}}
            @yield('content')
      </main>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Select2 -->
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script> --}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script src='{{ asset('tinymce/tinymce.min.js') }}'></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>


<!--Toster-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

{{-- <script src='{{ asset('select2/select2.min.js') }}'></script> --}}

{{-- <script type="text/javascript">
  
  tinymce.init({
      selector: 'textarea#myTextarea',
      plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
      toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
  });

</script> --}}

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
    } );
</script>
<!-- SweetAlert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Toaster -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>


{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

{{-- <script>
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
      @endif
</script> --}}


        <script>
            $(document).on("click", "#login", function(e){
                e.preventDefault();
                var link = $(this).attr("href");
                swal({
                  title: "Good job!",
                  text: "You are now logedin!",
                  icon: "success",
                });
            });
        </script>

        <script>
            $(document).on("click", "#delete", function(e){
                e.preventDefault();
                var link = $(this).attr("href");
                swal({
                  title: "Are you want to delete?",
                  text: "Once deleted, you will never get it again!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    swal({title:"Poof! Your file has been deleted!", 
                      icon: "success",}).then(okay=>{
                      if(okay){
                            window.location.href = link;
                        }
                    });
                  } else {
                    swal("Your file is safe!");
                  }
                });
            });
            
        </script>

        <script>
            $(document).on("click", "#delete2", function(e){
                e.preventDefault();
                var link = $(this).attr("href");
                swal({
                  title: "Are You Relesing This Hold Order",
                  text: "This Record will Moved To Sales",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    swal({title:"Your record Moved to Sales!", 
                      icon: "success",}).then(okay=>{
                      if(okay){
                            window.location.href = link;
                        }
                    });
                  } else {
                    swal("Your file is safe!");
                  }
                });
            });
            
        </script>

  @livewireScripts

  @stack('scripts')

  <script type="text/javascript">
      window.livewire.on('storeSomething', () => {
          
          $('#modalAddCategory').modal('hide');
          $('#modalEditCategory').modal('hide');
          $('#modalDeleteCategory').modal('hide');

          $('#modalAddVendor').modal('hide');
          $('#modalEditVendor').modal('hide');
          $('#modalDeleteVendor').modal('hide');

          $('#modalEditColor').modal('hide');
          $('#modalDeleteColor').modal('hide');

          $('#modalAddProduct').modal('hide');
          $('#modalEditProduct').modal('hide');
          $('#modalDeleteProduct').modal('hide');
          $('#modalUpdateStock').modal('hide');
          $('#modalPrintBarcode').modal('hide');

          $('#modalAddCustomer').modal('hide');
          $('#modalEditCustomer').modal('hide');
          $('#modalDeleteCustomer').modal('hide');
          
          $('#modalEditItem').modal('hide');

          $('#modalAddItem').modal('hide');
          $('#modalEditItem').modal('hide');
          $('#modalDeleteItem').modal('hide');

      });
  </script>


  <script>
    window.addEventListener('alert', event => { 
                 toastr[event.detail.type](event.detail.message, 
                 event.detail.title ?? ''), toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                    }
                });
  </script>
  {{-- <script type="text/javascript">
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('#select-customer').select2();
            });
        </script> --}}

  {{-- <style type="text/css">
      html {
        font-size: .85rem;
      }
  </style> --}}

</body>
</html>

