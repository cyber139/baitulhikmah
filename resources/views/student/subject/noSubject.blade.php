@extends('layouts.student')


@section('content')
     <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                {{-- <h1 class="m-0 text-dark">NO CLASS YET. PLEASE REFER TO YOUR ADMIN</h1> --}}
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"> No class</li>
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                </ol>
              </div><!-- /.col -->

            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <section class="content">
          <div class="container-fluid">
            <div class="row">

                   <h1 class="col-lg-12 text-center">NO CLASS AND  SUBJECT YET.<br> PLEASE REFER TO YOUR ADMIN</h1>  


              <!-- ./col -->
            </div>
          </div>
        </section>

    </div>



    
@endsection


