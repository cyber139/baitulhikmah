@extends('layouts.master')


@section('content')
    <div class="content-wrapper"  >
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Teacher</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Teacher</li>
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
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
                <h3 class="card-title">Teacher </h3>
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
                      <th>isActive</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)     
                    <tr>
                      <td>{{$user->id}}</td>
                      <td><a href="{{route('teacherDetail',$user->id)}}"> {{$user->username}} </a></td>
                      <td>{{$user->email}}</td>
                      <td><ul>
                      @forelse ($user->roles as $role)
                      <li>{{ $role->name }}</li>
                      @empty
                      <li>Not defined</li>
                      @endforelse
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
