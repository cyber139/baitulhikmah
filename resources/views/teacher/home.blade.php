@extends('layouts.teacher')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary card-outline">
        <div class="card-body row">
          <h2 class="card-titlex col-lg-6">Assalammualaikum, {{ ucfirst(Auth::user()->username) }}</h2>
          <h2 class="card-titlex col-lg-6 text-right text-muted"> {{ date('d/m/Y') }}</h2>

          {{-- <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card's
            content.
          </p>
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a> --}}
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection