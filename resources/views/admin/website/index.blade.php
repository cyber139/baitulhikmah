@extends('layouts.admin')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Website Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Website Management</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6 ">
          <div class="card card-indigo">
            <div class="card-header">
              <h3 class="card-title">Banner 1</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <form role="form" method="post" action="{{route('website.banner1')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                  <label for="banner_image" class="col-form-label">Banner Image 1</label>
                  <div><a href="{{$banner->banner_image}}" data-toggle="lightbox" data-title="{{$banner->banner_title}}" data-gallery="gallery">
                    <img class="img-fluid mb-2" src="{{$banner->banner_image}}" alt="Image" >
                  </a> </div>
                  {{-- <div class="col-sm-2">
                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                      <img src="https://via.placeholder.com/300/FFFFFF?text=1" class="img-fluid mb-2" alt="white sample">
                    </a>
                  </div> --}}
                </div>
                <div class="form-group row">
                  {{-- <label for="banner1_image" class="col-sm-3 col-form-label">Banner Image 1 input</label> --}}
                  <div class="input-group  col-sm-9x">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="banner_image" name="banner_image"> 
                      <label class="custom-file-label" for="File">{{Str::limit($banner->banner_image,'50')}}</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text" id="banner_image" name="banner_image">Upload</span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" id="title" name="title" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label for="teacher_notice">Teacher's Notice</label>
                  <div class="pad">
                    <div class="mb-3">
                      <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="teacher_notice" id="teacher_notice">
                      </textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="m-auto">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card card-maroon">
            <div class="card-header">
              <h3 class="card-title">About</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <form role="form" method="post" action="{{route('website.about')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="desc">Description</label>
                  <textarea id="desc" name="desc" class="form-control" rows="4">{{$about->desc}}</textarea>
                </div>
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" id="title" name="title" class="form-control" value=">{{$about->title}}">
                </div>
                <div class="form-group">
                  <label for="body">Content</label>
                  <textarea id="body" name="body" class="form-control" rows="4">R{{$about->body}}</textarea>
                </div>
                <div class="form-group row">
                  <div class="m-auto">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card card-navy">
            <div class="card-header">
              <h3 class="card-title">Counter</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <form role="form" method="post" action="{{route('website.counter')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group ">
                  <label for="student_no">Number of Student</label>
                  <input type="number" id="student_no" name="student_no" class="form-control" value="{{$counter->student_no}}" step="1">
                </div>
                <div class="form-group ">
                  <label for="teacher_no">Number of Teacher</label>
                  <input type="number" id="teacher_no" name="teacher_no" class="form-control" value="{{$counter->teacher_no}}" step="1">
                </div>
                <div class="form-group">
                  <label for="year_no">Number of years</label>
                  <input type="number" id="year_no" name="year_no" class="form-control" value="{{$counter->year_no}}" step="1">
                </div>
                <div class="form-group m-auto">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-purple">
            <div class="card-header">
              <h3 class="card-title">Banner 2</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <form role="form" method="post" action="{{route('website.banner2')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                  <label for="inputName" class="col-form-label">Banner Image 2</label>
                  <div><a href="{{$banner2->banner_image}}" data-toggle="lightbox" data-title="{{$banner2->title}}" data-gallery="gallery">
                    <img class="img-fluid mb-2" src="{{$banner2->banner_image}}" alt="Image" >
                  </a> </div>
                  {{-- <div class="col-sm-2">
                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                      <img src="https://via.placeholder.com/300/FFFFFF?text=1" class="img-fluid mb-2" alt="white sample">
                    </a>
                  </div> --}}
                </div>
                <div class="form-group row">
                  {{-- <label for="banner1_image" class="col-sm-3 col-form-label">Banner Image 1 input</label> --}}
                  <div class="input-group  col-sm-9x">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="banner_image" name="banner_image" >
                      <label class="custom-file-label" for="File"> {{Str::limit($banner2->banner_image,'50')}}</label>
                    </div>
                    {{-- {{Str::limit($notice->body, '50', '.....')}} --}}
                    <div class="input-group-append">
                      <span class="input-group-text" id="banner_image" name="banner_image">Upload</span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" id="title" name="title" class="form-control" value="{{$banner2->title}}">
                </div>
                <div class="form-group">
                  <label for="teacher_notice">Teacher's Notice</label>
                  <div class="pad">
                    <div class="mb-3">
                      <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="teacher_notice" id="teacher_notice">
                        {{$banner2->teacher_notice}}
                      </textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="m-auto">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card card-olive">
            <div class="card-header">
              <h3 class="card-title">Contact</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <form role="form" method="post" action="{{route('website.contact')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="email">Email</label>
                  {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"> --}}
                  <input id="email" type="email" class="form-control" name="email" value="{{$contact->email}}">
                </div>
                <div class="form-group">
                  <label for="contact_no">Phone No</label>
                  <input type="text" id="contact_no" name="contact_no" class="form-control" value="{{$contact->contact_no}}">
                </div>
                <div class="form-group">
                  <label for="web">Website Link</label>
                  <input type="text" id="web" name="web" class="form-control" value="{{$contact->web}}">
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <textarea id="address" name="address" class="form-control" rows="4">{{$contact->address}}</textarea>
                </div>
                <div class="form-group row">
                  <div class="m-auto">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection

    

