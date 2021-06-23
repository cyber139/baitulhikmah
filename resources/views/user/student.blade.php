@extends('layouts.master')


@section('content')
    <div class="content-wrapper"  >
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Student </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Student </li>

              </ol>
            </div><!-- /.col -->
            {{-- <div class="col-sm-12">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a class="btn btn-primary btn-sm" href="#">
                  <i class="fas fa-plus-circle"></i>
                  Add
              </a></li>
              </ol>
            </div> --}}
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Student</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover" id="userTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>E-mail</th>
                      <th>Role</th>
                      <th>Class</th>
                      <th>isActive</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    {{-- Auth::user()->username  --}}
                    @foreach ($users as $user)     
                    <tr>
                      <td>{{$user_id = $user->id}}</td>
                      <td><a href="{{route('studentDetail',$user->id)}}"> {{$user->username}} </a></td>
                      <td>{{$user->email}}</td>
                      <td>
                        <ul>
                          @forelse ($user->roles as $role)
                          <li>{{ $role->name }}</li>
                          @empty
                          <li>Not defined</li>
                          @endforelse
                        </ul>
                      </td>
                      <td>
                        <ul>
                        @foreach ($studentList as $student)
                        @foreach ($gradeList as $grade)

                        @if ($student->user_id == $user_id)
                          @if ($grade->id == $student->grade_id)
                          <li>{{$grade->grade_title}}</li>
                          @break
                          {{-- <li>{{$student->user_id}}</li> --}}
                          {{-- <li>{{$user_id}}</li> --}}
                          @endif
                        @endif

                        @endforeach
                        @endforeach
                        </ul>

                      </td>
                      <td>{{$user->isActive}}</td>

                    </tr>

                    @endforeach
                    
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>E-mail</th>
                      <th>Role</th>
                      <th>Class</th>
                      <th>isActive</th>
                    </tr>
                    </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>

    
@endsection


@section('footer')
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 </strong>
    All rights reserved.
  
  </footer>
@endsection
