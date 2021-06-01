<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{url('/home')}}" class="brand-link">
  <img src="{{asset('/images/logo.png')}}" alt="Baitul-Hikmah Logo" class="brand-image img-circle elevation-5"
      style="opacity: 1.8">
  <span class="brand-text font-weight-light"><b>BAITUL</b> HIKMAH</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
      {{-- <img src="{{asset('/images/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> --}}
      @if ($profile != null)

      @if ($profile->profile_image != null)
        <div><a href="{{$profile->profile_image}}" data-toggle="lightbox" data-title="{{$profile->full_name}}">
        <img class="img-circle elevation-2" src="{{$profile->profile_image}}" alt="{{$profile->full_name}}" style="height: 34px; width: 34px;" >
        </a> </div>
        @else
        <div><img class="img-circle elevation-2" h src="http://placehold.it/128x128.jpg&text=No+Uploaded" alt="{{ucfirst($user->username)}}" ></div>
        @endif

     @else

     <div><img class="img-circle elevation-2" h src="http://placehold.it/128x128.jpg&text=No+Uploaded" alt="{{ucfirst($user->username)}}" ></div>

    @endif
      </div>
      <div class="info">
      <a href="{{route('user.index',auth()->user())}}" class="d-block">{{ ucfirst(Auth::user()->username) }}</a>
      {{-- {{ Auth::user()->username }} --}}
      </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
          <li class="nav-item ">
              <a href="{{ url('/home') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                  Dashboard
              </p>
              </a>
          </li>
          <li class="nav-item ">
              <a href="{{ route('teacher.subject.index') }}" class="nav-link">
                <i class="nav-icon fas fa-swatchbook"></i>
              <p>
                Subjects
              </p>
              </a>
          </li>
          <li class="nav-item ">
              <a href="{{route('notice')}}" class="nav-link">
                <i class="nav-icon fas fa-chalkboard"></i>
              <p>
                Notice Board
              </p>
              </a>
          </li>
          {{-- <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-swatchbook"></i>
              <p>Subjects <i class="fas fa-angle-left right"></i> </p>
             
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('teacher.subject.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> All Subject</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ url('/subject1') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tauhid</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="subject2.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hafazan</p>
                  </a>
              </li>
              </ul>
          </li> --}}
          {{-- <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Class  </p>
             
              </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('subject.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"><i class="fas fa-angle-left right"></i></i>
                  <p>All Subject</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ url('/subject1') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tauhid</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="subject2.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hafazan</p>
                  </a>
              </li>
              </ul>
          </li> --}}
          <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>User Access Contol <i class="fas fa-angle-left right"></i></p>
              
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All User</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{url('/admin/teacher')}}" class="nav-link">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>All Teacher</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{url('/admin/student')}}" class="nav-link">
                  <i class="fas fa-user-graduate nav-icon"></i>
                  <p>All Student</p>
                  </a>
              </li>
              
              </ul>
          </li>

          {{-- <li class="nav-item">
              <a href="{{url('/notice')}}" class="nav-link">
              <i class="nav-icon fas fa-chalkboard"></i>
              <p>
                  Notice Board
                  <span class="badge badge-info right">2</span>
              </p>
              </a>
          </li> --}}
            {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chalkboard"></i>
                <p>Notice Board<i class="fas fa-angle-left right"></i></p>
                
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Preview Notice Board
                                <span class="badge badge-info right">2</span>
                            </p>
                            </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('notice')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Notice</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/admin/notice/create')}}" class="nav-link">
                        <i class="fas fa-plus-circle  nav-icon"></i>
                        <p>Add Notice</p>
                        </a>
                    </li>
                
                </ul>
            </li> --}}

          {{-- <li class="nav-header">Others</li>
          <li class="nav-item">
              <a href="calendar.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                  Calendar
                  <span class="badge badge-info right">2</span>
              </p>
              </a>
          </li> --}}

            <li class="nav-header "></li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt nav-icon"></i> <p>Logout</p></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
      </ul>
  </nav>
  </div>
</aside>