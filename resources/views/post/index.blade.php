@extends('layouts.master')

{{-- @if ($role_id == 1)
@elseif($role_id == 2)
@else
@endif --}}

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          {{-- {{ print_r($SubjectGrade) }} --}}
          {{-- @foreach ($SubjectGrade as $key => $value) --}}
              {{-- <br>Key: {{ $key }}    
              <br>Value: {{ $value }} <br> --}}
              {{-- <h1> {{$name.= $value }} </h1> --}}
          {{-- @endforeach --}}

          @php
          $name = '';
              foreach($SubjectGrades as $key => $value){
                $name.= $value.' ';
              }
          @endphp

        <h2> {{$name}} Content </h2>
        {{-- <h3> Post</h3> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">{{$name}}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>



  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Timelime example  -->
      <div class="row">
        <div class="offset-md-10 col-md-2">
          @if ($role_id == 1)
          @elseif($role_id == 2)
          <a href="{{route('post.create',$teacher->id)}}" class="nav-link btn btn-sm btn-primary float-right"> <i class="fas fa-plus-circle"></i> Add New Post</a>
          @else
          @endif
        </div>
        <div class="col-md-12">
          <!-- The time line -->
          <div class="timeline">
            <!-- timeline item -->
            @foreach ($posts as $post)
            <!-- timeline time label -->
            <div class="time-label">
              <span class="bg-red">{{$post->created_at->format('l, d/m/Y')}}</span>
            </div>
            <!-- /.timeline-label -->
            <div>
              <i class="fas fa-angle-right  bg-blue"></i>
              <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> {{$post->created_at->diffForHumans()}}</p>
                </span>
                <h3 class="timeline-header">{{$post->title}}</h3>

                <div class="timeline-body">
                  {!!$post->body!!}
                </div>
                <div class="timeline-body">
                  {{-- {{dd($post->post_image)}} --}}
                  @if ($post->post_image == null)
                  <div><img class="card-img-top" height=100px; width=auto; src="http://placehold.it/350x150.jpg&text=No+Image+Uploaded" alt="Image" style="height: 100px;width: auto;"></div>
                  
                  @else
                  <a href="{{$post->post_image}}" data-toggle="lightbox" data-title="{{$post->title}}">
                    <img class="img-fluid mb-2" src="{{$post->post_image}}" alt="Image" style="height: 300px; width: auto;" >
                  </a>    
                  @endif
                </div>
                <hr>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-sm float-right mx-1 " href="{{route('post.detail',$post->id)}}"> <i class="fas fa-eye"></i>  View  </a>

                  @if ($role_id == 1)
                  @elseif($role_id == 2)
                  <a class="btn btn-primary btn-sm float-right mx-1 " href="{{route('post.edit',$post->id)}}"> <i class="fas fa-pencil-alt"></i>  Edit  </a>
                  @else
                  @endif

                  @if ($role_id == 1)
                  @elseif($role_id == 2)
                  <form method="post" action="{{route('post.destroy', $post->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                    <button class="btn btn-danger btn-sm float-right mx-1" type="submit"> <i class="fas fa-trash-alt"></i>  Delete  </button>
                  </form>
                  @else
                  @endif
                  
                 
                  <div class="text-muted">
                    <p>Post by : {{$author->full_name}}<br>
                    Posted on {{$post->created_at->format('Y-m-d H:i:s')}}</p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <!-- END timeline item -->
            <!-- timeline item -->
            {{-- <div>
              <i class="fas fa-envelope bg-blue"></i>
              <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                <div class="timeline-body">
                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                  weebly ning heekya handango imeem plugg dopplr jibjab, movity
                  jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                  quora plaxo ideeli hulu weebly balihoo...
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-sm" href="{{route('post.edit',$post->id)}}"> <i class="fas fa-pencil-alt"></i>  Edit  </a>

                  <a class="btn btn-danger btn-sm">Delete</a>
                </div>
              </div>
            </div> --}}
            <!-- END timeline item -->
            <div>
                <i class="fas fa-clock bg-gray"></i>
            </div>
        </div>
        <!-- /.col -->
      </div>
    </div>
    <!-- /.timeline -->
    <div id="disqus_thread" class="col-lg-10 m-auto"></div>
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

