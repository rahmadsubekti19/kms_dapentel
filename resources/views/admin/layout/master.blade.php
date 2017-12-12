<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KMS Dapentel</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('image/logo-dapentel.png')}}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('admin/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css')}}">
   <!-- iCheck -->
   <link rel="stylesheet" href="{{ asset('admin/plugins/iCheck/all.css')}}">
   <link rel="stylesheet" href="{{ asset('admin/plugins/iCheck/flat/blue.css')}}">
   <!-- Select2 -->
   <link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css')}}">
   <!-- Morris chart -->
   <link rel="stylesheet" href="{{ asset('admin/plugins/morris/morris.css')}}">
   <!-- jvectormap -->
   <link rel="stylesheet" href="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
   <!-- Date Picker -->
   <link rel="stylesheet" href="{{ asset('admin/plugins/datepicker/datepicker3.css') }}">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
   <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
   <!-- Custom CSS -->
   <link rel="stylesheet" type="text/css" href="{{ asset('admin/style.css')}}">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css')}}">

   @yield('css')

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    @include('admin.include.header')

    @include('admin.include.mainsidebar')

    <div class="content-wrapper">
      @yield('content')
    </div>

    @include('admin.include.footer')

    @include('admin.include.mainsidebar')

    <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->

 </div>
 <!-- ./wrapper -->

 <!-- jQuery 2.2.3 -->
 <script src="{{ asset('admin/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<!-- Morris.js charts -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="{{ asset('admin/plugins/morris/morris.min.js')}}"></script> -->
  <!-- Sparkline -->
  <script src="{{ asset('admin/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
  <!-- jvectormap -->
  <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
  <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
  <!-- Select2 -->
  <script src="{{ asset('admin/plugins/select2/select2.full.min.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('admin/plugins/knob/jquery.knob.js')}}"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- datepicker -->
  <script src="{{ asset('admin/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
  <!-- DataTables -->
  <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
  <!-- Slimscroll -->
  <script src="{{ asset('admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
  <!-- iCheck -->
  <script src="{{ asset('admin/plugins/iCheck/icheck.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{ asset('admin/plugins/fastclick/fastclick.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('admin/dist/js/app.min.js')}}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="{{ asset('admin/dist/js/pages/dashboard.js')}}"></script> -->
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('admin/dist/js/demo.js')}}"></script>

  <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

  @stack('scripts')

  <script>
    $(function () {
      $("#example1").DataTable();
      $("#example2").DataTable();
      $("#example3").DataTable();
    });
  </script>

  <script src="{{ asset('js/main.js')}}" type="text/javascript"></script>
@yield('js')
</body>
</html>
