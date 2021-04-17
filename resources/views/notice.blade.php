{{-- @if (Route::has('login'))
<div class="top-right links">
    @auth
      @extends('layouts.admin')
    @else
      @extends('layouts.student')
    @endauth
</div>
@endif --}}

@extends('layouts.admin')



@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Notice') }}</div>

                <div class="card-body">
                    @include('admin.notice')
                </div>
            </div>
        </div>
    </div>
</div> --}}

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Notice (Notice)</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Notice (Home)</li>
            </ol>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="btn btn-primary btn-sm" href="#">
                <i class="fas fa-plus-circle"></i>
                Add
            </a></li>
              <li class="breadcrumb-item"><a class="btn btn-info btn-sm" href="#">
                <i class="fas fa-pencil-alt"></i> 
                Edit
            </a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content col-lg-10 m-auto">

      @foreach ($notices as $notice)
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title : {{$notice->title}}</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
              </div>
            </div>
        <div class="card-body">
          Start creating your amazing application!
            <img class="card-img-top" src="{{$notice->post_image}}" alt="Card image cap">
            {{-- {{ URL::asset('storage/images'.$notice->post_image) }} --}}

            {{-- IMAGE 
              First of all in the .env file create a variable named FILESYSTEM_DRIVER and set it to public like this
              FILESYSTEM_DRIVER=public
              and then create symbolic link by run
              php artisan storage:link
              after that just use asset()
              <img src="{{ asset('storage/'.$cv->photo) }}" alt="..."> --}}
              {{-- {{asset($notice->post_image)}} --}}
              {{-- {{asset('storage/'.$notice->post_image)}} --}}
              
              {{-- <p class="card-text">{{($notice->body)}}</p> --}}

              
                <p class="card-text">{{Str::limit($notice->body, '50', '.....')}}</p>
                <a href="{{route('notice-detail', $notice->id)}}" class="btn btn-primary">Read More &rarr;</a>
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-muted">
          Posted on {{$notice->created_at->diffForHumans()}}
          <a href="#">Baitul Hikmah</a>
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @endforeach

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

