<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Baitul Hikmah</title>
    
      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('images/apple-touch-icon.png')}}">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('../../dist/css/adminlte.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('../../css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('../../css/style.css')}}">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="{{asset('../../css/versions.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('../../css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('../../css/custom.css')}}">

    <!-- Modernizer for Portfolio -->
    <script src="{{asset('../../js/modernizer.j')}}s"></script>
</head>
<body  class="host_version">

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
		<nav class="navbar navbar-expand-lg navbar-light bg-light logo">
			<div class="container-fluid">
				{{-- <a class="navbar-brand" href="index.html">
					<img src="{{url('smartedu/images/logo.png')}}" alt="" />
                </a> --}}
                <a href="{{url('/')}}" class="brand-link" style="color:white;">
                    <img src="{{asset('images/logo.png')}}" alt="Baitul-Hikmah Logo" class="brand-image img-circle elevation-5" style="opacity: 1.8;">
                    {{-- <span class="brand-text font-weight-light"><b>BAITUL</b> HIKMAH</span> --}}
                    {{-- <h1><a class="text-light" href="{{url('/')}}"><b>BAITUL</b> HIKMAH</a></h1> --}}
                </a>
                <h1 class="py-3"><a class="text-light" href="{{url('/')}}" ><b>BAITUL</b> HIKMAH</a></h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="#overviews">About Us</a></li>
						{{-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Course </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="course-grid-2.html">Course Grid 2 </a>
								<a class="dropdown-item" href="course-grid-3.html">Course Grid 3 </a>
								<a class="dropdown-item" href="course-grid-4.html">Course Grid 4 </a>
							</div>
						</li> --}}
						<li class="nav-item"><a class="nav-link" href="#news">News</a></li>
						<li class="nav-item"><a class="nav-link" href="#ct">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                        <li class="px-1"><a class="hover-btn-new log orange" href="{{url('/login')}}"><span>Login</span></a></li>
                        <li><a class="hover-btn-new log orange" href="{{url('/register')}}"><span>Register</span></a></li>
                        {{-- <li><a href="{{ url('/login') }}"><i class="fas fa-sign-in-alt nav-icon"> Login</i></a></li> --}}
                        {{-- <li><a href="{{ url('/register') }}">Register</a></li> --}}
                        @else
                        <li><a href="{{ url('/home') }}" class="nav-link" ><i class="nav-icon fa fa-tachometer"></i> Dashboard</a></li>
                        <li><a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            <i class="fa fa-btn fa-sign-out"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        {{-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle text-light" data-toggle="dropdown" role="button" aria-expanded="false">
                                <b>{{ Auth::user()->username }} </b></h3><span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/home') }}"><i class="nav-icon fa fa-tachometer"></i> Dashboard</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </li> --}}
                    @endif
                    </ul>
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
    <script src="{{asset('../../js/all.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('../../js/custom.js')}}"></script>
	<script src="{{asset('../../js/timeline.min.js')}}"></script>
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
