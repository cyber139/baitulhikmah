@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User Forum</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">User Forum</li>
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
            <div class="card-header">
              <h3 class="card-title">User Forum</h3>
              <a href="{{route('forum.create')}}" class="nav-link btn btn-sm btn-primary float-right"> <i class="fas fa-plus-circle"></i> Add New Forum</a>
            </div>


           
            <!-- /.card-header -->
            <div class="card-body">
              <table id="forumTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Owner</th>
                  <th>Title</th>
                  <th>Publish</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($forums as $forum)
                <tr>
                  <td>{{$forum->id}}</td>
                  <td>{{$forum->user->username}}</td>
                  <td><a href="{{route('forum-detail', $forum->id)}}" >{{$forum->title}}</a></td>
                  <td> {{$forum->publish}}</td>
                  <td> {{$forum->created_at->diffForHumans()}}</td>
                  <td> {{$forum->updated_at->diffForHumans()}}</td>
                  <td>
                    <a class="btn btn-info btn-sm" href="{{route('forum.edit', $forum->id)}}"> <i class="fas fa-pencil-alt"></i>  Edit  </a>
                  </td>
                  <td>
                    <div class="pt-1">
                      <form method="post" action="{{route('forum.destroy', $forum->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                        <button class="btn btn-danger btn-sm" type="submit"> <i class="fas fa-trash-alt"></i>  Delete  </button>
                      </form>
                    </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Owner</th>
                  <th>Title</th>
                  <th>Publish</th>
                  <th>Created At</th>
                  <th>Updated At</th>
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

