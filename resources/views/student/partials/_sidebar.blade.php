<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
    <img src="{{asset('images/logo.png')}}" alt="Baitul-Hikmah Logo" class="brand-image img-circle elevation-5"
        style="opacity: 1.8">
    <span class="brand-text font-weight-light"><b>BAITUL</b> HIKMAH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{asset('images/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">Student</a>
        {{-- <a href="#" class="d-block">{{ Auth::user()->username }}</a> --}}
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <li class="nav-item ">
                <a href="{{ url('/') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/student/subject') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Subjects <i class="fas fa-angle-left right"></i></p>
                
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/student/subject') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Subject</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/subject/tauhid') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tauhid</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="subject2.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Hafazan</p>
                    </a>
                </li> --}}
                </ul>
            </li>

            <li class="nav-item">
                <a href="calendar.php" class="nav-link">
                <i class="nav-icon fas fa-chalkboard"></i>
                <p>
                    Notice Board
                    <span class="badge badge-info right">2</span>
                </p>
                </a>
            </li>

            <li class="nav-header">Others</li>
            <li class="nav-item">
                <a href="calendar.php" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    Forum
                    <span class="badge badge-info right">2</span>
                </p>
                </a>
            {{-- </li>
            <li class="nav-item">
                <a href="pages/gallery.html" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                    Gallery
                </p>
                </a>
            </li> --}}
            <li class="nav-header"></li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt nav-icon"></i> Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>

            
        </ul>
    </nav>
    </div>
</aside>