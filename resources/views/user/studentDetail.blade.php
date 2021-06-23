@extends('layouts.master')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$user->username}} Profile </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Student List</a></li>
              <li class="breadcrumb-item active">{{$user->username}} Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  {{-- <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('../../dist/img/user4-128x128.jpg')}}"
                       alt="User profile picture"> --}}
                       @if ($profile != null)

                          @if ($profile->profile_image != null)
                          {{-- {{dd($profile->profile_image)}} --}}
                            <div><a href="{{$profile->profile_image}}" data-toggle="lightbox" data-title="{{$profile->full_name}}">
                            <img class="profile-user-img img-fluid img-circle" src="{{$profile->profile_image}}" alt="{{$profile->full_name}}" style="height: 128px; width: 128px;" >
                            </a> </div>
                            @else
                            <div><img class="profile-user-img img-fluid img-circle" src="http://placehold.it/128x128.jpg&text=No+Uploaded" alt="{{ucfirst($user->username)}}" ></div>
                            @endif

                        @else

                        <div><img class="profile-user-img img-fluid img-circle" h src="http://placehold.it/128x128.jpg&text=No+Uploaded" alt="{{ucfirst($user->username)}}" ></div>

                        @endif
                </div>

                <h3 class="profile-username text-center"> {{ucfirst($user->username)}}</h3>
                @if($user->isActive == 'Yes')
                <p class="text-muted text-center">Active</p> 
                @else
                <p class="text-muted text-center">Not Active</p> 
                @endif

                <ul>
                @forelse ($user->roles as $role)
                <li class="text-muted">{{$role->name}}</li>
                @empty
                <li class="text-muted">Not Defined</li>
                @endforelse

                @if ($class != null and $studentClass->isActive =="Yes" )
                <li class="text-muted">{{$class->grade_title}}</li>
                @else
                <li class="text-muted">Not Defined</li>
                @endif
                </ul>
    
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="profile">
                    <div class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$user->username}}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$user->email}}</p>
                        </div>
                      </div>
                      {{-- <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$user->password}}</p>
                        </div>
                      </div> --}}
                      @if ($profile != null)
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Profile Image</label>
                        
                          @if ($profile->profile_image!=null)
                          <div><a href="{{$profile->profile_image}}" data-toggle="lightbox" data-title="{{$profile->full_name}}">
                            <img class="img-fluid mb-2" src="{{$profile->profile_image}}" alt="Image" style="height: 180px; width: auto;" >
                          </a> </div>
                          @else
                          <div><img class="col-sm-10"  src="http://placehold.it/350x150.jpg&text=No+Image+Uploaded" alt="Image" style="height: 100px;width: auto;"></div>
                              
                          @endif
                      </div>

                      <div class="form-group row">
                        <label for="full_name" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$profile->full_name}}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$profile->address}}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="phone_no" class="col-sm-2 col-form-label">Phone No</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$profile->phone_no}}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="guardian_name1" class="col-sm-2 col-form-label">Guardian Name 1</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$profile->guardian_name1}}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="gphone_no1" class="col-sm-2 col-form-label"> Phone No</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$profile->gphone_no1}}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="guardian_name2" class="col-sm-2 col-form-label">Guardian Name 2</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$profile->guardian_name2}}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="gphone_no2" class="col-sm-2 col-form-label"> Phone No</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$profile->gphone_no2}}</p>
                        </div>
                      </div>                          
                      @endif
                      
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


