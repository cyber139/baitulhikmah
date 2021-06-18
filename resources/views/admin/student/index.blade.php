@extends('layouts.admin')


@section('content')
    <div class="content-wrapper"  >
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Student Access Control</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Student Access Contol</li>

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
                <h3 class="card-title">User Access Control Table</h3>
                <a href="{{url('/admin/uac/create')}}" class="nav-link btn btn-sm btn-primary float-right"> <i class="fas fa-plus-circle"></i> Add User</a>
                {{-- <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div> --}}
              </div>
              @if(session('message'))
            {{-- <div class="col-lg-10 m-auto alert alert-danger">{{session('message')}}</div> --}}

            <div class="card alert alert-danger col-lg-10 mx-auto my-2">
            <div class="card-header">
              <h3 class="card-title ">{{session('message')}}</h3>
              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>
          </div>
            
            @elseif(session('user-created-message'))
            {{-- <div class="col-lg-10 m-auto alert alert-success">{{session('notice-created-message')}}</div> --}}

            <div class="card alert alert-success col-lg-10 mx-auto my-2">
            <div class="card-header">
              <h3 class="card-title ">{{session('user-created-message')}}</h3>
              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>
          </div>

            @elseif(session('user-updated-message'))
            {{-- <div class="col-lg-10 m-auto alert alert-success">{{session('notice-updated-message')}}</div> --}}

            <div class="card alert alert-success col-lg-10 mx-auto my-2">
            <div class="card-header">
              <h3 class="card-title ">{{session('user-updated-message')}}</h3>
              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>
          </div>
        @endif
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
                      <th>Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    {{-- Auth::user()->username  --}}
                    @foreach ($users as $user)     
                    <tr>
                      <td>{{$user_id = $user->id}}</td>
                      <td>{{$user->username}}</td>
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
                      <td>
                        <a class="btn btn-info btn-sm mb-2" href="{{route('student.edit',$user->id)}}"><i class="fas fa-user-edit"></i> Edit</a>
                      </td>
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
                      <th>Edit</th>
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

@section('content2')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 </strong>
    All rights reserved.
  
  </footer>
@endsection
