@extends('layouts.teacher')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="card-title">{{$post->title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url()->previous()}}">Content List</a></li>
              <li class="breadcrumb-item active">{{$post->title}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content col-lg-10 m-auto">

      {{-- @foreach ($posts as $post) --}}
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{$post->title}}</h3>
          {{-- <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
          </div> --}}
        </div>
        <div class="card-body">
          {{-- <p class="card-text">{!!Str::limit($post->body, '50', '.....')!!}</p> --}}
          <p class="card-text">{!!$post->body!!}</p>
            {{-- <img class="card-img-top" src="{{$post->post_image}}" alt="Card image cap"> --}}
                {{-- <p class="card-text">{{($post->body)}}</p> --}}
                {{-- @if ($post->post_image != null)
                <a href="{{$post->post_image}}" data-toggle="lightbox" data-title="{{$post->title}}">
                  <img class="img-fluid mb-2" src="{{$post->post_image}}" alt="Image" style="height: 500px; width: auto;" >
                </a>
                @else
                    
                @endif --}}

                @if ($post->post_image == null)
                  <div><img class="card-img-top" height=100px; width=auto; src="http://placehold.it/350x150.jpg&text=No+Image+Uploaded" alt="Image" style="height: 100px;width: auto;"></div>
                  
                  @else

                    @php
                      $file_download = $post->getAttributes()['post_image'];
                      $file_download = substr($file_download,11);
                    @endphp
                  
                    @php
                      $type = substr($post->post_image,-3);
                      $file_download = $post->getAttributes()['post_image'];
                      $file_download = substr($file_download,11);
                    @endphp
                      
                    @if ($post->post_image != null)
                    
                      @if($type=="pdf" || $type=="mp4") 
                      <iframe src="{{$post->post_image}}" height="600px" width="200px" class="col-lg-12" style="width: 50%"></iframe>
                      <br><br>
                      <a class="btn btn-info btn-sm float-right mx-1" href="{{$post->post_image}}" target="_blank"><i class="fas fa-eye"></i>  View File</a>
                      @else
                      <a href="{{$post->post_image}}" data-toggle="lightbox" data-title="{{$post->title}}">
                        <img class="img-fluid mb-2 " src="{{$post->post_image}}" alt="{{$post->title}}" style="height: 300px; width: auto;">
                      </a>
                      <br><br>
                      @endif
                    @endif

                  @endif

                  {{-- <iframe src="{{$post->post_image}}" height="600px" width="200px" class="col-lg-12" style="width: 50%"></iframe> --}}

             
           <br><br>
           @if ($role_id == 1)
           @elseif($role_id == 2)
           <a class="btn btn-primary btn-sm float-right mx-1 " href="{{route('post.edit',$post->id)}}"> <i class="fas fa-pencil-alt"></i>  Edit  </a>
           @else
           @endif     
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-muted">
          Posted on {{$post->created_at->format('Y-m-d H:i:s')}}<br>
          <p>Post by {{$author->full_name}}<br>

          {{-- Created by {{$post->user->username}} --}}
          {{-- <a href="#">Start Bootstrap</a> --}}
        </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    {{-- @endforeach --}}

    @if ($role_id == 3)
      @if ($submission!=null)
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Assignment Submission</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <p class="card-text text-center">You have submitted your assignment</p>
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-muted">
        </div>
      <!-- /.card-footer-->
      </div>
      <!-- /.card -->
      @else
          <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Assignment Submission</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          {{-- <p class="card-text">{!!Str::limit($post->body, '50', '.....')!!}</p> --}}
          <p class="card-text">Submit your assignment here</p>
          <form role="form" method="post" action="{{route('submission.store')}}" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" placeholder="Enter ..." name="title" id="title" aria-describedby="" required>
              </div>
              <div class="form-group">
                <label>Body</label>
                <div class="pad">
                  <div class="mb-3">
                    <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="body" id="body" required >
                    </textarea>
                  </div>
                  <p class="text-sm mb-0">
                    Editor <a href="https://github.com/summernote/summernote">Documentation and license
                    information.</a>
                  </p>
                </div>
              </div>
              <div class="form-group">
                <label for="File">File Submission</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file" name="file" required >
                    <label class="custom-file-label" for="File">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text" id="file" name="file">Upload</span>
                  </div>
                </div>
              </div>

            <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
            <input type="hidden" name="student_id" value="{{$student->id}}">
            <input type="hidden" name="post_id" value="{{$post->id}}">

            <div class="text-center">
              <button type="submit" class="btn-lg btn-primary ">Submit</button>
            </div>
          </form>
            {{-- <img class="card-img-top" src="{{$post->post_image}}" alt="Card image cap"> --}}
                {{-- <p class="card-text">{{($post->body)}}</p> --}}
                {{-- <a href="{{$post->post_image}}" data-toggle="lightbox" data-title="{{$post->title}}">
                  <img class="img-fluid mb-2" src="{{$post->post_image}}" alt="Image" style="height: 500px; width: auto;" >
                </a> --}}
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-muted">
          {{-- Posted on {{$post->created_at->format('Y-m-d H:i:s')}}<br>
          <p>Post by {{$author->full_name}}<br> --}}

          {{-- Created by {{$post->user->username}} --}}
          {{-- <a href="#">Start Bootstrap</a> --}}
        </div>
      <!-- /.card-footer-->
      </div>
      <!-- /.card -->
      @endif
  @else
  <div class="card">
    <div class="card-header">
      <h3 class="card-title text-center">Assignment Submission</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <p class="card-text text-center">View all assignment submnission</p>

      <a type="button" href="{{route('submission.teacherIndex',$post->id)}}" class="btn btn-block bg-gradient-primary btn-lg col-lg-6 mx-auto"><i class="fas fa-folder-open"></i> View All</a>
    </div>
    <!-- /.card-body -->
    <div class="card-footer text-muted">
    </div>
  <!-- /.card-footer-->
  </div>
  <!-- /.card -->
  @endif
    



    <div id="disqus_thread"></div>
    <script>
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://baitul-hikmah.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <script id="dsq-count-scr" src="//baitul-hikmah.disqus.com/count.js" async></script>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

