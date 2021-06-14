@extends('layouts.master')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="card-title">{{$submission->title}} Edit </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content col-lg-10 m-auto">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">EDIT SUBMISSION</h3>
        </div>

        <div class="card-body">
        <form role="form" method="post" action="{{route('submission.update',$submission->id)}}" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control"  name="title" id="title" aria-describedby="" value="{{$submission->title}}">
            </div>
            <div class="form-group">
              <label>Body</label>
              <div class="pad">
                <div class="mb-3">
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="body" id="body">
                    {!!$submission->body!!}
                  </textarea>
                </div>
                <p class="text-sm mb-0">
                  Editor <a href="https://github.com/summernote/summernote">Documentation and license
                  information.</a>
                </p>
              </div>
            </div>
            <div class="form-group">
              <label for="File">File Submitted</label>
              @if ($submission->file != null)
              <iframe src="{{$submission->file}}" height="400px" width="600px" class="col-lg-12"></iframe>
              @else
                  
              @endif
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="file" name="file">
                  <label class="custom-file-label" for="File">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text" id="file" name="file">Upload</span>
                </div>
              </div>
            </div>

          <div class="text-center">
            <button type="submit" class="btn-lg btn-primary ">Submit</button>
          </div>
        </form>
        </div>
        <div class="card-footer text-muted">
          
        </div>
      </div>

      
    </section>

  </div>
  <!-- /.content-wrapper -->
@endsection

