@extends('layouts.teacher')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          @php

          // dd($SubjectGrade);
          $name = '';
              foreach($SubjectGrades as $key => $value){
                 $name.= $value.' ';
                 
              }
          @endphp

        <h2> {{$name}} </h2>
        <h3> Post</h3>

        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('teacher.subject.index')}}">Assigned Subject</a></li>
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
          <a href="{{route('post.create',$teacher->id)}}" class="nav-link btn btn-sm btn-primary float-right mb-2"> <i class="fas fa-plus-circle"></i> Add New Post</a>
        </div>
        <div class="col-md-12">
          <!-- The time line -->
          <div class="timeline text-center">
            <!-- timeline item -->
            <div>
              <i class="fas fa-angle-right  bg-blue">                 </i>
              <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> </p>
                </span>
                <h1 class="timeline-header"> NO POST</h1>

                <div class="timeline-body">
                  ADD POST NOW

                </div>
                <div class="timeline-footer">
                  <a href="{{route('post.create',$teacher->id)}}" class="nav-link btn btn-sm btn-primary "> <i class="fas fa-plus-circle"></i> Add New Post</a>

                </div>
                
                
              </div>
            </div>

            <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
        </div>
        <!-- /.col -->
      </div>
    </div>
    <!-- /.timeline -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

