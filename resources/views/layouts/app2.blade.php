<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Baitul Hikmah</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> --}}
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}



    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('images/apple-touch-icon.png')}}">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="{{asset('css/versions.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <!-- Modernizer for Portfolio -->
    <script src="{{asset('js/modernizer.j')}}s"></script>
    <style>
        .help-block{
            color: red
        }
    </style>
    
</head>
{{-- <body  class="host_version"> --}}
    <body class="host_version" style="background: linear-gradient(rgba(139,0,0,1), rgba(0,0,0,0)),    url('{{asset('images/bg-1.jpg')}}')">

    <!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
    <!-- END LOADER -->	
    
    <!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				{{-- <a class="navbar-brand" href="index.html">
					<img src="{{url('smartedu/images/logo.png')}}" alt="" />
                </a> --}}
                <a href="{{url('/')}}" class="brand-link" style="color:white;">
                    <img src="{{asset('images/logo.png')}}" alt="Baitul-Hikmah Logo" class="brand-image img-circle elevation-5" style="opacity: 1.8;max-height:56px;">
                    {{-- <span class="brand-text font-weight-light"><b>BAITUL</b> HIKMAH</span> --}}
                    
                  </a>
				
				<div class="collapse navbar-collapse" id="navbars-host">
					<h1 ><a class="text-light" href="{{url('/')}}"><b>BAITUL</b> HIKMAH</a></h1>
					
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

    @yield('content')
    @section('footer')
    @show

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="{{asset('js/all.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('js/custom.js')}}"></script>
	<script src="{{asset('js/timeline.min.js')}}"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>

    {{-- @section('footer')
    @show

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <!-- jQuery -->
    {{-- <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('dist/js/adminlte.min.js')}}"></script> --}} 
</body>
</html>
