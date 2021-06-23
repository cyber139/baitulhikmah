@extends('layouts.master')


@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Notice </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Notice</li>
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

      @foreach ($notices as $notice)
      @if ($notice->publish === 'Yes')
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
        <div class=" card-body text-center">            
          {{-- @if (is_null($notice->post_image))
          
          <img class="card-img-top" src="{{$notice->post_image}}" alt="Card image cap" style="display: none">
          @else

          <img class="card-img-top" src="{{$notice->post_image}}" alt="Card image cap" style="width: 50%">

          @endif --}}

         
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

              
                <p class="card-text">{!!Str::limit($notice->body, '20', '.....')!!}</p><br><br>

                @php
                // dd(substr($notice->post_image,-3));
                $type = substr($notice->post_image,-3);
                //  $file_download = $submission->offsetUnset('file');;
                $file_download = $notice->getAttributes()['post_image'];
                $file_download = substr($file_download,11);
                
                
                @endphp
                    {{-- {{$file_download}} --}}
                    
              @if ($notice->post_image != null)
              
                @if($type=="pdf") 
                <iframe src="{{$notice->post_image}}" height="600px" width="200px" class="col-lg-12" style="width: 100%"></iframe><br><br>
                @elseif($type =="mp4")
                        <iframe src="{{$notice->post_image}}" height="400px" width="200px" class="col-lg-12" style="width: 50%"></iframe><br><br>
                @else
                <img class="card-img-top " src="{{$notice->post_image}}" alt="{{$notice->title}}" style="width: 100%"><br><br>
                @endif
                <a class="btn btn-info " href="{{$notice->post_image}}" target="_blank"><i class="fas fa-eye"></i>  View File</a>
              @else
                  
              @endif
               
                <a href="{{route('notice-detail', $notice->id)}}" class="btn btn-primary">Read More &rarr;</a>
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-muted">
          <p>Posted on {{$notice->created_at->diffForHumans()}} <br>
          Created by {{$notice->user->username}}<br>
          @if ($notice->publish == 'Yes')
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

