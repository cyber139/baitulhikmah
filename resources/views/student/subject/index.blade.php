@extends('layouts.student')


@section('content')
     <div class="content-wrapper" >
      @foreach ($gradeList as $grade)
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{$grade->grade_title}}</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"> {{$grade->grade_title}}</li>
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                </ol>
              </div><!-- /.col -->

            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <section class="content">
          <div class="container-fluid">
            <h5 class="mb-2 mt-4">Subject</h5>
            <div class="row">
              {{-- {{empty($grade->subjects)}} --}}
                @if ($grade->subjects->isEmpty())
                   <h4 class="col-lg-12 text-center">NOT SUBJECT YET. PLEASE REFER TO YOUR ADMIN</h4>  
                @endif 
              @foreach ($grade->subjects as $subject)
                 
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{$subject->subject_title}}</h3>

                    <p>{{$grade->grade_title}}</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              @endforeach

              <!-- ./col -->
            </div>
          </div>
        </section>

      @endforeach
    </div>



    
@endsection


