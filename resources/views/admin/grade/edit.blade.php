@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Class (Admin)</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Class</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content col-lg-10 m-auto pb-1">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Class</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @foreach ($grades as $grade)
            
                
           
        
        <form role="form" method="post" action="{{route('grade.update',$grade->id)}}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="grade_title">Class Title</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="grade_title" id="grade_title" aria-describedby="" value="{{$grade->grade_title}}">
            </div>
            <div class="form-group">
              <label for="grade_title">Class Slug</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="grade_slug" id="grade_slug" aria-describedby="" value="{{$grade->grade_slug}}">
            </div>
            {{-- <div class="form-group">
              <label>Body</label>
              <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
            </div> --}}
            {{-- <div class="form-group">
              <label>Body</label>
              <div class="pad">
                <div class="mb-3">
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="body" id="body">
                  </textarea>
                </div>
                <p class="text-sm mb-0">
                  Editor <a href="https://github.com/summernote/summernote">Documentation and license
                  information.</a>
                </p>
              </div>
            </div> --}}
            
            {{-- <div class="form-group">
              <label for="File">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="post_image" name="post_image">
                  <label class="custom-file-label" for="File">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text" id="post_image" name="post_image">Upload</span>
                </div>
              </div>
            </div> --}}

            
            <div class="form-group">
              <label>Publish</label>
              <select class="form-control" name="publish" id="publish">
                @if ($grade->publish =="Yes")
                <option value={{$grade->publish}} selected>{{ $grade->publish }}</option>
                <option value="No" @if (old('publish') == "No") {{ 'selected' }} @endif>No</option> 
                @else
                <option value={{$grade->publish}} selected>{{ $grade->publish }}</option>
                <option value="Yes" @if (old('publish') == "Yes") {{ 'selected' }} @endif>Yes</option>
                @endif
              </select>
            </div>
            <div class="form-group">
              <label>IsActive</label>
              <select class="form-control" name="isActive" id="isActive">
                @if ($grade->isActive =="Yes")
                <option value={{$grade->isActive}} selected>{{ $grade->isActive }}</option>
                <option value="No" @if (old('isActive') == "No") {{ 'selected' }} @endif>No</option> 
                @else
                <option value={{$grade->isActive}} selected>{{ $grade->isActive }}</option>
                <option value="Yes" @if (old('isActive') == "Yes") {{ 'selected' }} @endif>Yes</option>
                @endif
              </select>
            </div>
            <div class="form-group">
              <label>IsDelete</label>
              <select class="form-control" name="isDelete" id="isDelete">
                @if ($grade->isDelete =="Yes")
                <option value={{$grade->isDelete}} selected>{{ $grade->isDelete }}</option>
                <option value="No" @if (old('isDelete') == "No") {{ 'selected' }} @endif>No</option> 
                @else
                <option value={{$grade->isDelete}} selected>{{ $grade->isDelete }}</option>
                <option value="Yes" @if (old('isDelete') == "Yes") {{ 'selected' }} @endif>Yes</option>
                @endif
              </select>
            </div>
            {{-- <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> --}}
          </div>
          <!-- /.card-body -->

          <div class="card-footer text-center">
            <button type="submit" class="btn-lg btn-primary ">Submit</button>
          </div>
        </form>
        @endforeach
      </div>
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Edit Subject</h3>
        </div>
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
            @foreach ($selectSubjects as $subj)
                <tr>
                  <td>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox"
                    @foreach ($grade->subjects as $subject)
                    @if ($subject->id == $subj->id)
                        checked
                    @endif
                        
                    @endforeach>
                  </div>
                </td>
                  <td>{{$subj->id}}</td>
                  <td>{{$subj->subject_title}}</td>
              <td>
                <form method="post" action="{{route('grade.attach',$grade->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                      <input type="hidden" name="subject" value="{{$subj->id}}">
                      <button class="btn btn-info btn-sm mb-2" type="submit" 
                      @if ($grade->subjects->contains($subj))
                      disabled
                      @endif
                      ><i class="fas fa-user-edit"></i> Attach</button></td>
                </form>
                <td>
                  <form method="post" action="{{route('grade.detach',$grade->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                      <input type="hidden" name="subject" value="{{$subj->id}}">
                      <button class="btn btn-danger btn-sm" type="submit"
                      @if (!$grade->subjects->contains($subj))
                      disabled
                      @endif
                      > <i class="fas fa-trash-alt"></i>  Detach  </button>
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


    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


