@extends('layouts.master')
{{-- @if (($role_id == 1))
@extends('layouts.admin')
@endif


@if ($role_id  == 2)
@extends('layouts.teacher')
@endif

@if($role_id == 3)
@extends('layouts.student')
@endif --}}

{{-- @if ($role_id == 1)
  @extends('layouts.admin')
@else
  @extends('layouts.teacher')
@endif --}}

{{-- @switch($role_id)
    @case($role_id == 1)
      @extends('layouts.admin')
        
        @break
    @case($role_id == 2)
@extends('layouts.teacher')
        
        @break
    @default
@extends('layouts.student')

        
@endswitch --}}

{{-- {{dd($role_id)}} --}}

{{-- {{$role_id}} --}}

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile {{ucfirst($user->username)}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>

          {{-- @foreach ($user_roles as $user) --}}
          {{-- {{dd($one)}} --}}
          {{-- {{$user->roles}}<br> --}}
          {{-- @foreach ($user->roles as $role) --}}
          {{-- {{dd($two)}} --}}
              {{-- {{$role->id}}<br><br> --}}
          {{-- @endforeach --}}
          {{-- @endforeach --}}
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
                    <div><img class="profile-user-img img-fluid img-circle" h src="http://placehold.it/128x128.jpg&text=No+Uploaded" alt="{{ucfirst($user->username)}}" ></div>
                    @endif

                 @else

                 <div><img class="profile-user-img img-fluid img-circle" h src="http://placehold.it/128x128.jpg&text=No+Uploaded" alt="{{ucfirst($user->username)}}" ></div>

                @endif
                </div>
                

                <h3 class="profile-username text-center">{{ucfirst($user->username)}}</h3>
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
                </li>

                <p class="text-muted text-center"></p>

                {{-- <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul> --}}

                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
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

                  
                  @if ($profile == null)
                  <li class="nav-item"><a class="nav-link" href="#insert" data-toggle="tab">Insert Profile</a></li>
                  @else
                  <li class="nav-item"><a class="nav-link" href="#edit" data-toggle="tab">Edit Profile</a></li>
                  @endif
                  <li class="nav-item"><a class="nav-link" href="#account" data-toggle="tab">Change password</a></li>
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
                      {{-- <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$user->password}}</p>
                        </div>
                      </div> --}}
                      
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  @if ($profile == null)

                  <div class="tab-pane" id="insert">
                    @if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                    @endif
                    <form class="form-horizontal"method="post" action="{{route('user.store',$user->id)}}" enctype="multipart/form-data">
                      @csrf
                      @method('POST')
                      
                      <div class="form-group row">
                        <label for="full_name" class="col-sm-3 col-form-label">Full Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" name="address" id="address" placeholder="Address"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="phone_no" class="col-sm-3 col-form-label">Phone No</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Phone No">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="guardian_name1" class="col-sm-3 col-form-label">Guardian Name 1</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="guardian_name1" id="guardian_name1" placeholder="Guardian Name 1">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="gphone_no1" class="col-sm-3 col-form-label">Guardian Phone No</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="gphone_no1" id="gphone_no1" placeholder="Phone No">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="guardian_name2" class="col-sm-3 col-form-label">Guardian Name 2</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="guardian_name2" id="guardian_name2" placeholder="Guardian Name 2">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="gphone_no2" class="col-sm-3 col-form-label">Guardian Phone No</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="gphone_no2" id="gphone_no2" placeholder="Phone No">
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="File">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="profile_image" name="profile_image">
                            <label class="custom-file-label" for="File">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="profile_image" name="profile_image">Upload</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  @endif
                  <!-- /.tab-pane -->
                  @if ($profile != null)
                  <div class="tab-pane" id="edit">
                    <form class="form-horizontal"method="post" action="{{route('user.edit',$user->id)}}" enctype="multipart/form-data">
                      @csrf
                      @method('POST')
                      <div class="form-group row">
                        <label for="full_name" class="col-sm-3 col-form-label">Full Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="full_name" id="full_name" value="{{$profile->full_name}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" name="address" id="address" placeholder="Address">{{$profile->address}}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="phone_no" class="col-sm-3 col-form-label">Phone No</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="phone_no" id="phone_no" value="{{$profile->phone_no}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="guardian_name1" class="col-sm-3 col-form-label">Guardian Name 1</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="guardian_name1" id="guardian_name1" value="{{$profile->guardian_name1}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="gphone_no1" class="col-sm-3 col-form-label">Guardian Phone No</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="gphone_no1" id="gphone_no1" value="{{$profile->gphone_no1}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="guardian_name2" class="col-sm-3 col-form-label">Guardian Name 2</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="guardian_name2" id="guardian_name2" value="{{$profile->guardian_name2}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="gphone_no2" class="col-sm-3 col-form-label">Guardian Phone No</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="gphone_no2" id="gphone_no2" value="{{$profile->gphone_no2}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="profile_image" class="col-sm-3 col-form-label">Profile Image</label>

                        @if ($profile->profile_image != null)
                        <div><a href="{{$profile->profile_image}}" data-toggle="lightbox" data-title="{{$profile->full_name}}">
                          <img class="img-fluid mb-2" src="{{$profile->profile_image}}" alt="Image" style="height: 300px; width: auto;" >
                        </a> </div>
                            
                        @else
                        <div><img class="col-sm-9" height=100px; width=auto; src="http://placehold.it/350x150.jpg&text=No+Image+Uploaded" alt="Image" style="height: 100px;width: auto;"></div>
                            
                        @endif
                      </div>
                      <div class="form-group row">
                        <label for="profile_image" class="col-sm-3 col-form-label">File input</label>
                        <div class="input-group  col-sm-9">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="profile_image" name="profile_image">
                            <label class="custom-file-label" for="File">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="profile_image" name="profile_image">Upload</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                   @endif
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="account">
                    <form class="form-horizontal" method="post" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$user->username}}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$user->email}}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password" name="password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
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


