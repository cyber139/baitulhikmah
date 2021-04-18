@extends('layouts.admin')


@section('content')
    <div class="content-wrapper" style="margin-left: 250px" >
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">User Access Control</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">User Access Contol</li>
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
                <h3 class="card-title">User Access Control Table</h3>
                <button href="#" class="nav-link btn btn-sm btn-primary float-right"> <i class="fas fa-plus-circle"></i> Add User</Button>
                {{-- <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div> --}}
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover" id="userTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>E-mail</th>
                      <th>Edit</th>
                      {{-- <th>Status</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    {{-- Auth::user()->username  --}}
                    @foreach ($users as $user)     
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>
                        <a class="btn btn-info btn-sm" href="#"><i class="fas fa-user-edit"></i> Edit</a>
                        <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash-alt"></i> Delete</a>
                      </td>
                      {{-- <td>@if ($user->role =='1') Admin
                          @elseif ($user->role == '2') Student
                          @else Teacher
                          @endif</td>
                      <td>@if ($user->is_active =='0') Not-Active
                          @else Active
                          @endif</td> --}}
                    </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>E-mail</th>
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
