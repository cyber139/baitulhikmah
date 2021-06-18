@extends('layouts.master')


@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All FORUM </h1>
            <h6>You can start a forum or report any issues here so that admin can get back to you.  </h6>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Forum</li>
            </ol>
          </div>
          {{-- <div class="col-sm-12">
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
          </div> --}}
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content col-lg-10 m-auto">

      @foreach ($forums as $forum)
      @if ($forum->publish === 'Yes')
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title : {{$forum->title}}</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body ">            
             
          {{-- <p class="card-text">{!!Str::limit($forum->body, '50', '.....')!!}</p> --}}
          <p class="card-text">{!!$forum->body!!}</p>

          <a href="{{route('forum-detail', $forum->id)}}" class="btn btn-primary float-right">Read More &rarr;</a>
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-muted">
          <p>Posted on {{$forum->created_at->diffForHumans()}} <br>
          Created by {{$forum->user->username}}<br>
          @if ($forum->publish == 'Yes')
              Published</p>
          @else
              Unpublished</p>
          @endif 
          {{-- <a href="#">Baitul Hikmah</a> --}}
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
      @endif
      @endforeach

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

