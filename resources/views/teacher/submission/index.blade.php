@extends('layouts.master')


@section('content')
    <div class="content-wrapper" >
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">{{$post->title}} Assignment</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Assignment</li>
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
                <h3 class="card-title">List of Submission</h3>
                {{-- <a href="{{route('subject.create')}}" class="nav-link btn btn-sm btn-primary float-right"> <i class="fas fa-plus-circle"></i> Add New Subject</a> --}}
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
                      <th>Username</th>
                      <th>File Name</th>
                      <th>Download</th>
                      <th>View</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    {{-- Auth::user()->username  --}}

                    @foreach ($submissions as $submission)
                    @foreach ($StudentUser as $student)
                    <tr>
                      <td>{{$submission->id}}</td>
                      <td>                        
                        <a href="{{route('submission.detail',$submission->id)}}"> {{$submission->title}}</a>                      
                      </td> 
                      <td>
                        {{$student->username}}                   
                        @php
                            // dd($StudentUser);
                        @endphp
                      </td>
                      <td>
                        {{-- {{dd($submission->file)}} --}}
                        @php
                        //  $file_download = $submission->offsetUnset('file');;
                        $file_download = $submission->getAttributes()['file'];
                        $file_download = substr($file_download,11);
                            // dd($submission->getAttributes()['file']);
                        @endphp
                       {{$file_download}}
                      </td>
                      <td>
                        <a class="btn btn-success btn-sm mb-2" href="{{route('submission.download',$file_download)}}"><i class="fas fa-download"></i>  Download</a>
                      </td>
                      <td>
                        <a class="btn btn-info btn-sm mb-2" href="{{$submission->file}}" target="_blank"><i class="fas fa-eye"></i>  View</a>
                      </td>                   
                    </tr>
                    @endforeach     
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Post</th>
                      <th>File Name</th>
                      <th>Download</th>
                      <th>View</th>
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
