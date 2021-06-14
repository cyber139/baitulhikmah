@extends('layouts.teacher')


@section('content')
    <div class="content-wrapper" >
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">List of Assigned Subject</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"> Assigned Subject</li>
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
              @foreach ($assigns as $assign)
                @if ($assign->user_id == $user->id)
                  @foreach($selectClassSubjects as $grade_subject => $grade)
                    @foreach ($grade->subjects as $subject) 
                      @if ($assign->grade_id == $grade->id )
                      @if($assign->subject_id == $subject->id)
                      <div class="col-lg-4 col-6">
                        <!-- small card -->
                        <div class="small-box bg-info">
                          <div class="inner">
                            {{-- {{dd($assigns)}} --}}
                            <h3>{{$subject->subject_title}}</h3>
            
                            <p>{{$grade->grade_title}}</p>
                            @php

                            $SubjectGrade = []; 
                            $SubjectGrade[] =$grade->grade_slug;  
                            $SubjectGrade[] =$subject->subject_slug;
                            $SubjectGrade[] =$assign->id;
                            
                            foreach ($posts as $post) {
                              // echo $post->teacher_id;
                              // echo $assign->id;
                              if ($post->teacher_id == $assign->id) {
                                $teacher = $post->teacher_id;
                                $assigned = $assign->id;
                                // dd($post);
                              // echo $teacher;

                                break;
                              }else{
                                $teacher=null;
                                // break;
                              }
                            }
                            
                            @endphp
                            {{-- <br>
                            Assign id :{{$assigned}}<br>
                            Teacher id:{{$teacher}} --}}

                          </div>
                          {{-- <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                          </div> --}}
                          @if ($teacher != null)
                          <a href="{{route('subject.post',$assign->id)}}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                          </a>
                          @else
                          <a href="{{route('subject.post.none',$assign->id)}}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                          </a>
                          @endif
                          
                        </div>
                      </div>
                    @endif
                    @endif
                    @endforeach
                  @endforeach
                @endif
              @endforeach
          </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
    </div>


    {{-- @foreach ($assigns as $assign)
                  @if ($assign->user_id == $user->id)
                  {{$assign ->subject_id}}-{{$assign ->grade_id}}<br>
                    @foreach($selectClassSubjects as $grade_subject => $grade)
                      @foreach ($grade->subjects as $subject) 
                        @if ($assign->grade_id == $grade->id )
                        @if($assign->subject_id == $subject->id)
                        {{dd($user)}}
                        {{$grade->grade_title}} : {{$subject->subject_title}} <br>
                      @endif
                      @endif
                      @endforeach
                    @endforeach
                  @endif
                @endforeach --}}

    
@endsection

@section('table')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Subject Table</h3>
            <a href="{{route('subject.create')}}" class="nav-link btn btn-sm btn-primary float-right"> <i class="fas fa-plus-circle"></i> Add New Subject</a>
            {{-- <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div> --}}
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-hover" id="userTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>IsActive</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                
                {{-- Auth::user()->username  --}}
                @foreach ($subjects as $subject)     
                <tr>
                  <td>{{$subject->id}}</td>
                  <td>{{$subject->subject_title}}</td>                      
                  <td>{{$subject->isActive}}</td>                      
                  <td>
                    <a class="btn btn-info btn-sm mb-2" href="{{route('subject.edit',$subject->id)}}"><i class="fas fa-user-edit"></i> Edit</a>
                  </td>
                  <td>
                    {{-- <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash-alt"></i> Delete</a> --}}
                    <form method="post" action="{{route('subject.destroy', $subject->id)}}" enctype="multipart/form-data">
                      @csrf
                      @method('DELETE')
                      {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                      <button class="btn btn-danger btn-sm" type="submit"> <i class="fas fa-trash-alt"></i>  Delete  </button>
                    </form>
                  </td>
                  
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>isActive</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
    
@endsection

