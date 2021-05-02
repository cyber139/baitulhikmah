@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create User (Admin)</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Create User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content col-lg-10 m-auto pb-1">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create New User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{route('uac.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="username">Title</label>
              <input type="text" class="form-control" placeholder="Enter Username" name="username" id="username" aria-describedby="">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" aria-describedby="">
            </div>
            <div class="form-group row">
              <label for="password" class="col-sm-2 col-form-label">Password</label>
             
                <input type="password" class="form-control" id="password" name="password">
              
            </div>
            <div class="form-group row">
              <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
              
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
              
            </div>

            
            {{-- <div class="form-group">
              <label>Role</label>
              <select class="form-control" name="role" id="role">
                <option value='2' selected='selected'>Student</option>
                <option value='3'>Teacher</option>
              </select>
            </div> --}}
            <div class="form-group">
              <label>isActive</label>
              <select class="form-control" name="isActive" id="isActive">
                <option value="Yes" selected='selected'>Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            {{-- <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> --}}
          </div>
          <!-- /.card-body -->

          

          <div class="card-footer text-center">
            <button type="submit" class="btn-lg btn-primary ">Submit</button>
          </div>
        </form>
      </div>


    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

