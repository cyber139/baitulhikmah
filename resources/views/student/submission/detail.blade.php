@extends('layouts.master')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="card-title">{{$submission->title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Submission List</a></li>
              <li class="breadcrumb-item active">{{$submission->title}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content col-lg-10 m-auto">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{$submission->title}}</h3>
        </div>
        <div class="card-body">
          {{-- <p class="card-text">{!!Str::limit($post->body, '50', '.....')!!}</p> --}}
          <p class="card-text">{!!$submission->body!!}</p>
            {{-- <img class="card-img-top" src="{{$post->post_image}}" alt="Card image cap"> --}}
                {{-- <p class="card-text">{{($post->body)}}</p> --}}
                @if ($submission->file == null)
                  <div><img class="card-img-top" height=100px; width=auto; src="http://placehold.it/350x150.jpg&text=No+Image+Uploaded" alt="Image" style="height: 100px;width: auto;"></div>
                  
                  @else

                    @php
                      $file_download = $submission->getAttributes()['file'];
                      $file_download = substr($file_download,11);
                    @endphp
                  
                    @php
                      $type = substr($submission->file,-3);
                      $file_download = $submission->getAttributes()['file'];
                      $file_download = substr($file_download,11);
                    @endphp
                      
                    @if ($submission->file != null)
                    
                      @if($type=="pdf" || $type=="mp4") 
                      <iframe src="{{$submission->file}}" height="600px" width="200px" class="col-lg-12" style="width: 100%%"></iframe>
                      <br><br>
                      <a class="btn btn-info btn-sm float-right mx-1" href="{{$submission->file}}" target="_blank"><i class="fas fa-eye"></i>  View File</a>
                      @else
                      <a href="{{$submission->file}}" data-toggle="lightbox" data-title="{{$submission->title}}">
                        <img class="img-fluid mb-2 " src="{{$submission->file}}" alt="{{$submission->title}}" style="height: 300px; width: auto;">
                      </a>
                      <br><br>
                      @endif
                    @endif

                  @endif


        </div>
        <div class="card-footer text-muted">
          
        </div>
      </div>
      @if ($role_id == 1)
      @elseif($role_id == 2)
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Mark</h3>
        </div>
        <div class="card-body col-lg-8 m-auto">
          <form role="form" method="post" action="{{route('submission.teacherMark',$submission->id)}}" enctype="multipart/form-data">
            @csrf
              <div class="form-group row">
                <input type="text" class="form-control col-lg-8 mx-2"  name="mark" id="mark" aria-describedby="" value="{{$submission->mark}}" required>
              
                <button type="submit" class="col-lg-2 btn btn-primary btn-sm  float right ">Submit</button>
              </div>
            </form>
        </div>
        <div class="card-footer text-muted">
          
        </div>
      </div>
      @else
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Mark : {{$submission->mark}}</h3>
        </div>
        <div class="card-footer text-muted">
          
        </div>
      </div>
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

  </div>
  <!-- /.content-wrapper -->
@endsection

