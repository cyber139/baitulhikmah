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
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('../../dist/img/user4-128x128.jpg')}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nina Mcintire</h3>

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
                  <li class="nav-item"><a class="nav-link" href="#edit" data-toggle="tab">Edit</a></li>
                  <li class="nav-item"><a class="nav-link" href="#account" data-toggle="tab">Change password</a></li>
                  <li class="nav-item"><a class="nav-link" href="#roles" data-toggle="tab">Change user roles</a></li>
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
                      
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="edit">
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
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="account">
                    <form class="form-horizontal" method="post" action="{{route('admin.user.update',$user->id)}}" enctype="multipart/form-data">
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

