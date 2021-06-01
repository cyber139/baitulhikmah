@extends('layouts.admin')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile {{$user->username}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/uac">Home</a></li>
              <li class="breadcrumb-item active">Edit User Profile</li>
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
                       @if ($userProfile != null)

                          @if ($userProfile->profile_image != null)
                          {{-- {{dd($profile->profile_image)}} --}}
                            <div><a href="{{$userProfile->profile_image}}" data-toggle="lightbox" data-title="{{$userProfile->full_name}}">
                            <img class="profile-user-img img-fluid img-circle" src="{{$userProfile->profile_image}}" alt="{{$userProfile->full_name}}" style="height: 128px; width: 128px;" >
                            </a> </div>
                            @else
                            <div><img class="profile-user-img img-fluid img-circle" h src="" alt="{{ucfirst($user->username)}}" ></div>
                            @endif

                        @else

                        <div><img class="profile-user-img img-fluid img-circle" h src="http://placehold.it/128x128.jpg&text=No+Uploaded" alt="{{ucfirst($user->username)}}" ></div>

                        @endif
                </div>

                <h3 class="profile-username text-center">{{$user->username}}</h3>
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
                  <li class="nav-item"><a class="nav-link " href="#assign" data-toggle="tab">Assign Teacher</a></li>
                  {{-- <li class="nav-item"><a class="nav-link" href="#edit" data-toggle="tab">Edit</a></li> --}}
                  <li class="nav-item"><a class="nav-link" href="#account" data-toggle="tab">Change password</a></li>
                  <li class="nav-item"><a class="nav-link" href="#roles" data-toggle="tab">Change user roles</a></li>
                  <li class="nav-item"><a class="nav-link" href="#status" data-toggle="tab">Change user status</a></li>
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
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$user->password}}</p>
                        </div>
                      </div>
                      @if ($userProfile != null)
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Profile Image</label>
                        
                          @if ($userProfile->profile_image!=null)
                          <div><a href="{{$userProfile->profile_image}}" data-toggle="lightbox" data-title="{{$userProfile->full_name}}">
                            <img class="img-fluid mb-2" src="{{$userProfile->profile_image}}" alt="Image" style="height: 180px; width: auto;" >
                          </a> </div>
                          @else
                          <div><img class="col-sm-10"  src="http://placehold.it/350x150.jpg&text=No+Image+Uploaded" alt="Image" style="height: 100px;width: auto;"></div>
                              
                          @endif
                      </div>

                      <div class="form-group row">
                        <label for="full_name" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$userProfile->full_name}}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$userProfile->address}}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="phone_no" class="col-sm-2 col-form-label">Phone No</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$userProfile->phone_no}}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="guardian_name1" class="col-sm-2 col-form-label">Guardian Name 1</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$userProfile->guardian_name1}}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="gphone_no1" class="col-sm-2 col-form-label"> Phone No</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$userProfile->gphone_no1}}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="guardian_name2" class="col-sm-2 col-form-label">Guardian Name 2</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$userProfile->guardian_name2}}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="gphone_no2" class="col-sm-2 col-form-label"> Phone No</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$userProfile->gphone_no2}}</p>
                        </div>
                      </div>                          
                      @endif
                      
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  {{-- <div class="tab-pane" id="edit">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div> --}}
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="assign">
                    {{-- <form class="form-horizontal" method="post" action="{{route('admin.user.update',$user->id)}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Assigned Role</label>
                        <div class="col-sm-10">
                          @forelse ($user->roles as $role)
                          <p class=" col-form-label">{{$role->name}}</p>
                          @empty
                          <p class=" col-form-label">Not Defined</p>
                          @endforelse
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="role" class="col-sm-2 col-form-label">Assign New Role</label>
                        <div class="col-sm-10">
                          <select name="role_id" id="input-role" class="col-sm-2 form-control" required>
                            <option value="">Select</option>
                            @foreach ($selectRoles as $role)
                                <option value="{{ $role->id }}" {{ $role->id == old('role_id') ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form> --}}

{{--                     
@foreach($selectClassSubjects as $grade_subject => $grade)
    Key selectClassSubjects: {{ $grade_subject }}  <br>  
    Value GRADE: {{ $grade }} <br><br>
     
    
    @foreach ($grade->subjects as $subject) 
    Value SUBJECT: {{ $subject }} <br><br>
    @endforeach

    END OF KEY
    <br><br>

@endforeach--}}

{{-- @foreach($selectClassSubjects as $grade_subject => $grade)
    
     
    
    @foreach ($grade->subjects as $subject) 
   grade_subject : {{ $grade->grade_title }}  {{ $subject->subject_title }} <br><br>
   grade_subject : {{ $grade->id }}  {{ $subject->id }} <br><br>


              @foreach($selectAssign as $assigned)

              Values : {{$assigned->grade_id}} {{$assigned->subject_id}}<br>
              grade_subject : {{ $grade->grade_title }}  {{ $subject->subject_title }} <br>
              grade_subject : {{ $grade->id }}  {{ $subject->id }} <br><br>
              
              
              @if ($assigned->user_id == $user->id)
                @if ($assigned->subject_id == $subject->id)
                    @if( $assigned->grade_id == $grade->id)
                      @if( $assigned->isActive == 'Yes')
                        @if( $assigned->isDelete == 'No')
                          checked
                          @endif
                      @endif
                  @endif
                @endif
              @endif


          END<br><br><br>
        @endforeach
    @endforeach
    
@endforeach --}}

{{-- @foreach($selectAssign as $assigned )
KEYS : {{$selectAssign}}<br>
Values : {{$assigned}}<br>
END<br><br><br>
@endforeach --}}





                    <table class="table table-bordered table-hover" id="role">
                      <thead>
                        <tr>
                          <th>Class/Subject Assigned</th>
                          <th>Class</th>
                          <th>Subject</th>
                          <th>Assign</th>
                          <th>Detach</th>
                          {{-- <th>Status</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($selectClassSubjects as $grade_subject => $grade)
                          @foreach ($grade->subjects as $subject) 
                            <tr>
                              <td>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox"
 
                                  @foreach($selectAssign as $assigned)
                                    @if ($assigned->user_id == $user->id)
                                      @if ($assigned->subject_id == $subject->id)
                                          @if( $assigned->grade_id == $grade->id)
                                            @if( $assigned->isActive == 'Yes')
                                              @if( $assigned->isDelete == 'No')
                                                checked
                                              @endif
                                            @endif
                                        @endif
                                      @endif
                                    @endif
                                  @endforeach
                                >
                              </div>
                            </td>
                              <td>{{$grade->grade_title}}</td>
                              <td>{{$subject->subject_title}}</td>
                          <td>
                            {{-- <form method="post" action="{{route('uac.attach',$user)}}" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                                  <input type="hidden" name="role" value="{{$role->id}}">
                                  <button class="btn btn-info btn-sm mb-2" type="submit" 
                                  @if ($user->roles->contains($role))
                                  disabled
                                  @endif><i class="fas fa-user-edit"></i> Attach</button></td>
                            </form> --}}
                            <form method="post" action="{{route('teacher.assign',$user)}}" enctype="multipart/form-data">
                              @csrf
                                  <input type="hidden" name="user_id" value="{{$user->id}}">
                                  <input type="hidden" name="grade_id" value="{{$grade->id}}">
                                  <input type="hidden" name="subject_id" value="{{$subject->id}}">
                                  <input type="hidden" name="isActive" value="Yes">
                                  <input type="hidden" name="isDelete" value="No">
                                  <button class="btn btn-info btn-sm mb-2" type="submit" 



                                  ><i class="fas fa-user-edit"></i> Assign</button></td>
                            </form>
                            <td>
                              {{-- <form method="post" action="{{route('uac.detach',$user)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                  <input type="hidden" name="role" value="{{$role->id}}">
                                  <button class="btn btn-danger btn-sm" type="submit"
                                  @if (!$user->roles->contains($role))
                                  disabled
                                  @endif> <i class="fas fa-trash-alt"></i>  Detach  </button>
                            </form> --}}

                            
                            {{-- @forelse($selectAssign as $assigned) --}}
                              <form method="post" action="{{route('teacher.dismiss',$assigned->id)}}" enctype="multipart/form-data">
                                @csrf
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <input type="hidden" name="grade_id" value="{{$grade->id}}">
                                    <input type="hidden" name="subject_id" value="{{$subject->id}}">
                                    <input type="hidden" name="isActive" value="No">
                                    <input type="hidden" name="isDelete" value="Yes">
                                    <button class="btn btn-danger btn-sm" type="submit" 
                              ><i class="fas fa-trash-alt"></i> Dismiss</button>
                            {{-- @empty
                              <form method="post" action="" enctype="multipart/form-data">
                                @csrf
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <input type="hidden" name="grade_id" value="{{$grade->id}}">
                                    <input type="hidden" name="subject_id" value="{{$subject->id}}">
                                    <input type="hidden" name="isActive" value="No">
                                    <input type="hidden" name="isDelete" value="Yes">
                                    <button class="btn btn-danger btn-sm" type="submit" disabled
                              ><i class="fas fa-trash-alt"></i> Dismiss</button>
                            
                            </form>
                            @endforelse --}}
                            
                            </td>
                             </form>
                             
                          </td>
                            </tr>    
                            @endforeach
                            @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Class/Subject Assigned</th>
                          <th>Class</th>
                          <th>Subject</th>
                          <th>Assign</th>
                          <th>Detach</th>
                        </tr>
                        </tfoot>
                    </table>
                  </div>
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
                  <div class="tab-pane" id="roles">
                    {{-- <form class="form-horizontal" method="post" action="{{route('admin.user.update',$user->id)}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Assigned Role</label>
                        <div class="col-sm-10">
                          @forelse ($user->roles as $role)
                          <p class=" col-form-label">{{$role->name}}</p>
                          @empty
                          <p class=" col-form-label">Not Defined</p>
                          @endforelse
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="role" class="col-sm-2 col-form-label">Assign New Role</label>
                        <div class="col-sm-10">
                          <select name="role_id" id="input-role" class="col-sm-2 form-control" required>
                            <option value="">Select</option>
                            @foreach ($selectRoles as $role)
                                <option value="{{ $role->id }}" {{ $role->id == old('role_id') ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form> --}}
                    <table class="table table-bordered table-hover" id="role">
                      <thead>
                        <tr>
                          <th>Roles Assigned</th>
                          <th>Id</th>
                          <th>name</th>
                          <th>Attach</th>
                          <th>Detach</th>
                          {{-- <th>Status</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($selectRoles as $role)
                            <tr>
                              <td>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                @foreach ($user->roles as $user_role)
                                @if ($user_role->slug == $role->slug)
                                    checked
                                @endif
                                    
                                @endforeach>
                              </div>
                            </td>
                              <td>{{$role->id}}</td>
                              <td>{{$role->name}}</td>
                          <td>
                            <form method="post" action="{{route('uac.attach',$user)}}" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                                  <input type="hidden" name="role" value="{{$role->id}}">
                                  <button class="btn btn-info btn-sm mb-2" type="submit" 
                                  @if ($user->roles->contains($role))
                                  disabled
                                  @endif><i class="fas fa-user-edit"></i> Attach</button></td>
                            </form>
                            <td>
                              <form method="post" action="{{route('uac.detach',$user)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                  <input type="hidden" name="role" value="{{$role->id}}">
                                  <button class="btn btn-danger btn-sm" type="submit"
                                  @if (!$user->roles->contains($role))
                                  disabled
                                  @endif> <i class="fas fa-trash-alt"></i>  Detach  </button>
                            </form>
                          </td>
                            </tr>    
                            @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Roles Assigned</th>
                          <th>Id</th>
                          <th>name</th>
                          <th>Attach</th>
                          <th>Detach</th>
                        </tr>
                        </tfoot>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="status">
                    <form class="form-horizontal" method="post" action="{{route('uac.status',$user->id)}}" enctype="multipart/form-data">
                      @csrf
                      @method('post')
                      <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">User Status</label>
                        <div class="col-sm-10">
                          <p class=" col-form-label">{{$user->isActive}}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="isActive" class="col-sm-2 col-form-label"> Change User status</label>
                        <div class="col-sm-10">
                          <select name="isActive" class="col-sm-2 form-control" required>
                                {{-- <option value="{{ $user->isActive }}" {{ $user->isActive == old('isActive') ? 'selected' : '' }}>{{ $user->isActive }}</option>
                                <option value="Yes" @if (old('isActive') == "Yes") {{ 'selected' }} @endif>Yes</option>
                                <option value="No" @if (old('isActive') == "No") {{ 'selected' }} @endif>No</option> --}}

                                  @if ($user->isActive =="Yes")
                                      <option value={{$user->isActive}} selected>{{ $user->isActive }}</option>
                                      <option value="No" @if (old('isActive') == "No") {{ 'selected' }} @endif>No</option> 
                                  @else
                                      <option value={{$user->isActive}} selected>{{ $user->isActive }}</option>
                                      <option value="Yes" @if (old('isActive') == "Yes") {{ 'selected' }} @endif>Yes</option>
                                  @endif
                        </select>
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


