@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Notice Detail (Admin)</h1>
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
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
              </div>
            </div>
        <div class="card-body text-center">
          
          {!! $notice->body !!}
          @if (is_null($notice->post_image))
          
          <img class="card-img-top" src="{{$notice->post_image}}" alt="Card image cap" style="display: none">
          @else

          <img class="card-img-top" src="{{$notice->post_image}}" alt="Card image cap" style="width: 50%">

          @endif
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


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

