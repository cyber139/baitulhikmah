
  @extends('layouts.master')
  
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$notice->title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('notice')}}">Notice</a></li>
              <li class="breadcrumb-item active">Notice Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content col-lg-10 m-auto">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title : {{$notice->title}}</h3>
            {{-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div> --}}
        </div>

        <div class="card-body text-center">
          
          <p class="card-text">{!! $notice->body !!}</p>
          <a href="{{$notice->post_image}}" data-toggle="lightbox" data-title="{{$notice->title}}">
            <img class="img-fluid mb-2" src="{{$notice->post_image}}" alt="Image" style="height: 500px; width: auto;" >
          </a>
                {{-- <p class="card-text">{{($notice->body)}}</p> --}}
                {{-- <p class="card-text">{{Str::limit($notice->body, '50', '.....')}}</p> --}}
                {{-- <a href="{{route('home', $notice->id)}}" class="btn btn-primary">Read More &rarr;</a> --}}
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-muted">
          Posted on {{$notice->created_at->diffForHumans()}}<br>
          Created by {{$notice->user->username}}
          <a href="#">Baitul Hikmah</a>
        </div>
      <!-- /.card-footer-->
      </div>
    <!-- /.card -->

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

