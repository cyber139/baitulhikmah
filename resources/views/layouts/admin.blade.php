<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('../../plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('../../dist/css/adminlte.min.css')}}">
  
  <!-- Theme style -->
  <link rel="stylesheet" href=".{{asset('./../dist/css/adminlte.min.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('../../plugins/summernote/summernote-bs4.css')}}">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('admin.partials._navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.partials._sidebar')
  {{-- @include('admin.partials._dashboard') --}}


  @yield('content')

 

  <footer class="main-footer">
    
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('../../plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('../../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('../../dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('../../dist/js/demo.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('../../plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{asset('../../plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
  </script>
</body>
</html>
