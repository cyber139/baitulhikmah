@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>All Notices</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            {{-- <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div> --}}

           
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Owner</th>
                  <th>Title</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($notice as $notice)
                <tr>
                  <td>{{$notice->id}}</td>
                  <td>{{$notice->user->name}}</td>
                  <td><a href="{{route('notice-detail', $notice->id)}}" >{{$notice->title}}</a></td>
                  <td> {{$notice->created_at->diffForHumans()}}</td>
                  <td> {{$notice->updated_at->diffForHumans()}}</td>
                  <td>
                    <a class="btn btn-info btn-sm" href="#"> <i class="fas fa-pencil-alt"></i>  Edit  </a>
                    <a class="btn btn-danger btn-sm" href="#"> <i class="fas fa-trash-alt"></i>  Delete  </a>
                  </td>
                </tr>
                @endforeach
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Owner</th>
                  <th>Title</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

