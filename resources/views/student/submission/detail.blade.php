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
              <li class="breadcrumb-item active">Dashboard</li>
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
                @if ($submission->file != null)
                <iframe src="{{$submission->file}}" height="600px" width="900px" class="col-lg-12"></iframe>
                @else
                    
                @endif
        </div>
        <div class="card-footer text-muted">
          
        </div>
      </div>

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

