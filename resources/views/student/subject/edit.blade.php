@extends('layouts.teacher')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Subject (Admin)</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Subject</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content col-lg-10 m-auto pb-1">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Subject</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{route('subject.update',$subject->id)}}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="subject_title">Subject Title</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="subject_title" id="subject_title" aria-describedby="" value="{{$subject->subject_title}}">
            </div>
            <div class="form-group">
              <label for="subject_title">Subject Slug</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="subject_slug" id="subject_slug" aria-describedby="" value="{{$subject->subject_slug}}">
            </div>
            {{-- <div class="form-group">
              <label>Body</label>
              <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
            </div> --}}
            {{-- <div class="form-group">
              <label>Body</label>
              <div class="pad">
                <div class="mb-3">
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="body" id="body">
                  </textarea>
                </div>
                <p class="text-sm mb-0">
                  Editor <a href="https://github.com/summernote/summernote">Documentation and license
                  information.</a>
                </p>
              </div>
            </div> --}}
            
            {{-- <div class="form-group">
              <label for="File">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="post_image" name="post_image">
                  <label class="custom-file-label" for="File">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text" id="post_image" name="post_image">Upload</span>
                </div>
              </div>
            </div> --}}

            
            <div class="form-group">
              <label>Publish</label>
              <select class="form-control" name="publish" id="publish">
                @if ($subject->publish =="Yes")
                <option value={{$subject->publish}} selected>{{ $subject->publish }}</option>
                <option value="No" @if (old('publish') == "No") {{ 'selected' }} @endif>No</option> 
                @else
                <option value={{$subject->publish}} selected>{{ $subject->publish }}</option>
                <option value="Yes" @if (old('publish') == "Yes") {{ 'selected' }} @endif>Yes</option>
                @endif
              </select>
            </div>
            <div class="form-group">
              <label>IsActive</label>
              <select class="form-control" name="isActive" id="isActive">
                @if ($subject->isActive =="Yes")
                <option value={{$subject->isActive}} selected>{{ $subject->isActive }}</option>
                <option value="No" @if (old('isActive') == "No") {{ 'selected' }} @endif>No</option> 
                @else
                <option value={{$subject->isActive}} selected>{{ $subject->isActive }}</option>
                <option value="Yes" @if (old('isActive') == "Yes") {{ 'selected' }} @endif>Yes</option>
                @endif
              </select>
            </div>
            <div class="form-group">
              <label>IsDelete</label>
              <select class="form-control" name="isDelete" id="isDelete">
                @if ($subject->isDelete =="Yes")
                <option value={{$subject->isDelete}} selected>{{ $subject->isDelete }}</option>
                <option value="No" @if (old('isDelete') == "No") {{ 'selected' }} @endif>No</option> 
                @else
                <option value={{$subject->isDelete}} selected>{{ $subject->isDelete }}</option>
                <option value="Yes" @if (old('isDelete') == "Yes") {{ 'selected' }} @endif>Yes</option>
                @endif
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


