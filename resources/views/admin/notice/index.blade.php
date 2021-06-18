@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Notice Post</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Notice Post</li>
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
              <h3 class="card-title">Notice Post</h3>
              <a href="{{url('/admin/notice/create')}}" class="nav-link btn btn-sm btn-primary float-right"> <i class="fas fa-plus-circle"></i> Add Post</a>
            </div>
            {{-- MESSAGE UPDATED --}}
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
            
            @elseif(session('notice-created-message'))
            {{-- <div class="col-lg-10 m-auto alert alert-success">{{session('notice-created-message')}}</div> --}}

            <div class="card alert alert-success col-lg-10 mx-auto my-2">
            <div class="card-header">
              <h3 class="card-title ">{{session('notice-created-message')}}</h3>
              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>
          </div>

            @elseif(session('notice-updated-message'))
            {{-- <div class="col-lg-10 m-auto alert alert-success">{{session('notice-updated-message')}}</div> --}}

            <div class="card alert alert-success col-lg-10 mx-auto my-2">
            <div class="card-header">
              <h3 class="card-title ">{{session('notice-updated-message')}}</h3>
              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>
          </div>
        @endif

           
            <!-- /.card-header -->
            <div class="card-body">
              <table id="noticeTable" class="table table-bordered table-hover">
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
                  @foreach ($notice as $notice)
                <tr>
                  <td>{{$notice->id}}</td>
                  <td>{{$notice->user->username}}</td>
                  <td><a href="{{route('notice-detail', $notice->id)}}" >{{$notice->title}}</a></td>
                  <td> {{$notice->publish}}</td>
                  <td> {{$notice->created_at->diffForHumans()}}</td>
                  <td> {{$notice->updated_at->diffForHumans()}}</td>
                  <td>
                    <a class="btn btn-info btn-sm" href="{{route('notice.edit', $notice->id)}}"> <i class="fas fa-pencil-alt"></i>  Edit  </a>
                  </td>
                  <td>
                    <div class="pt-1">
                      <form method="post" action="{{route('notice.destroy', $notice->id)}}" enctype="multipart/form-data">
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

