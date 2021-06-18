@extends('layouts.teacher')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Post (Teacher)</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content col-lg-10 m-auto pb-1">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit  Post</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="title" id="title" aria-describedby="" value="{{$post->title}}">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="description" id="description" aria-describedby="" value="{{$post->description}}">
            </div>
            <div class="form-group">
              <label>Body</label>
              <div class="pad">
                <div class="mb-3">
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="body" id="body" >
                    {{$post->body}}
                  </textarea>
                </div>
                <p class="text-sm mb-0">
                  Editor <a href="https://github.com/summernote/summernote">Documentation and license
                  information.</a>
                </p>
              </div>
            </div>
            
            <div class="form-group">
              {{-- <div><img height="100px" src="{{$post->post_image}}" alt=""></div> --}}              
              @if ($post->post_image!=null)
              <div><img class="card-img-top" height=100px; width=auto; src="{{$post->post_image}}" alt="Image" style="height: 100px;width: auto;"></div>
                  
              @else
              <div><img class="card-img-top" height=100px; width=auto; src="http://placehold.it/350x150.jpg&text=No+Image+Uploaded" alt="Image" style="height: 100px;width: auto;"></div>
                  
              @endif
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
            </div>

            
            <div class="form-group">
              <label>Publish</label>
              <select class="form-control" name="publish" id="publish">
                {{-- <option value="{{$post->publish}}" selected='selected'>{{$post->publish}}</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option> --}}
                
              @if ($post->publish =="Yes")
                  <option value={{$post->publish}} selected>{{ $post->publish }}</option>
                  <option value="No" @if (old('publish') == "No") {{ 'selected' }} @endif>No</option> 
              @else
                  <option value={{$post->publish}} selected>{{ $post->publish }}</option>
                  <option value="Yes" @if (old('publish') == "Yes") {{ 'selected' }} @endif>Yes</option>
              @endif
              </select>
            </div>

            {{-- <select name="isActive" class="col-sm-2 form-control" required> --}}
            {{-- <option value="{{ $user->isActive }}" {{ $user->isActive == old('isActive') ? 'selected' : '' }}>{{ $user->isActive }}</option>
            <option value="Yes" @if (old('isActive') == "Yes") {{ 'selected' }} @endif>Yes</option>
            <option value="No" @if (old('isActive') == "No") {{ 'selected' }} @endif>No</option> --}}

              {{-- @if ($user->publish =="Yes")
                  <option value={{$user->publish}} selected>{{ $user->publish }}</option>
                  <option value="No" @if (old('publish') == "No") {{ 'selected' }} @endif>No</option> 
              @else
                  <option value={{$user->publish}} selected>{{ $user->publish }}</option>
                  <option value="Yes" @if (old('publish') == "Yes") {{ 'selected' }} @endif>Yes</option>
              @endif
           </select> --}}

            {{-- <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> --}}
          </div>
          <!-- /.card-body -->

          <input type="hidden" name="teacher_id" value="{{$post->teacher_id}}">


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

