@extends('layouts.admin')


@section('content')
    <div class="content-wrapper" style="margin-left: 250px" >
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Class</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Class</li>
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
                <h3 class="card-title">Class Table</h3>
                <a href="{{route('grade.create')}}" class="nav-link btn btn-sm btn-primary float-right"> <i class="fas fa-plus-circle"></i> Add New Class</a>
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
                      <th>Title</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    {{-- Auth::user()->username  --}}
                    @foreach ($grades as $grade)     
                    <tr>
                      <td>{{$grade->grade_id}}</td>
                      <td>{{$grade->grade_title}}</td>                      
                      <td>
                        <a class="btn btn-info btn-sm mb-2" href="{{route('grade.edit',$grade->grade_id)}}"><i class="fas fa-user-edit"></i> Edit</a>
                      </td>
                      <td>
                        {{-- <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash-alt"></i> Delete</a> --}}
                        <form method="post" action="{{route('grade.destroy', $grade->grade_id)}}" enctype="multipart/form-data">
                          @csrf
                          @method('DELETE')
                          {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                          <button class="btn btn-danger btn-sm" type="submit"> <i class="fas fa-trash-alt"></i>  Delete  </button>
                        </form>
                      </td>
                      
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Edit</th>
                      <th>Delete</th>
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
