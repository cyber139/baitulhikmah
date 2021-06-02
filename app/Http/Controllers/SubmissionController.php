<?php

namespace App\Http\Controllers;

use App\Submission;
use App\Profile;
use App\Student;
use App\Subject;
use App\Grade;
use App\User;
use App\Teacher;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $student = Student::where('user_id',$user_id)->first();

        $submissions = Submission::with('posts')->where('student_id',$student->id)->get();
        

        // $file = 
        // dd($submissions as $submission->file);
        // $posts = Post::where('id',$submissions->post_id)->get();

        // dd($submissions);

        return view('student.submission.index',['profile'=>$profile,'submissions'=>$submissions]);
    }

    public function teacherIndex(Post $post)
    {
        //
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();

        $UserRoles = User::with('roles')->find(Auth::user()->id);
        foreach($UserRoles->roles as $role){
            $role_id = $role->id;
        }

        
        $submissions = Submission::with('posts')->with('students')->where('post_id',$post->id)->get();
        
        $StudentUser = null;

        foreach($submissions as $submission){
            // foreach($submission->students as $student){
                $StudentUser = User::where('id',$submission->students->user_id)->get();
                // dd($user);
            // }
        }
                // dd($StudentUser);


        // $file = 
        // dd($submissions as $submission->file);
        // $posts = Post::where('id',$submissions->post_id)->get();


        return view('teacher.submission.index',['profile'=>$profile,'submissions'=>$submissions,'post'=>$post,'StudentUser'=>$StudentUser,'role_id'=>$role_id]);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        // return $request;
        $input = request()->validate([
            'title'=>'required|max:255',
            'body'=>'required',
            'file'=>'file',
            'teacher_id'=>'int',
            'student_id'=>'int',
            'post_id'=>'int',
        ]);


        $body = $input['body'];
        $dom = new \domdocument();
        $dom->loadHtml($body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');
      
        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){
            $data = $img->getattribute('src');
            // dd(strpos($data, 'data:image'));
            if (strpos($data, 'data:image')!==false){
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
      
            $data = base64_decode($data);
            $image_name= 'submission/'.time().$k.'.png';
            $path = public_path() .'/storage/'. $image_name;
            // $path =asset('storage/' . $image_name) ;

            // dd($path);
            file_put_contents($path, $data);
      
            $img->removeattribute('src');
            $img->setattribute('src',asset('storage/' . $image_name));

            } // <!--endif
        }


        // dd($images);
        
        $body = $dom->savehtml();


        $data = new Submission;
        if($request->file('file')){
            $file = $request->file('file');
            $filename ='submission/'. time().'.'.$file->getClientOriginalExtension();
            $request->file->move('storage/submission',$filename);
            // $data->file = $filename;
        }
        // dd($filename);

        $input = Submission::create([
            'title' => $input['title'],
            'body' => $body,
            'teacher_id'=>$input['teacher_id'],
            'student_id'=>$input['student_id'],
            'post_id'=>$input['post_id'],
            'file'=>$filename,
            'isDelete' => 'No',
        ]);
        
        // dd($input);

        // $data->title = $request->title;
        // $data->body = $request->description;
        // $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail(Submission $submission)
    {
        // dd($post);
        //
        $UserRoles = User::with('roles')->find(Auth::user()->id);
        foreach($UserRoles->roles as $role){
            $role_id = $role->id;
        }

        // dd($role_id);

        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();

        $student = Student::where('user_id',$user_id)->first();
        // dd($student); 
        // $teacher = Teacher::where('id', $post->teacher_id)->first();
        // dd($post); 

        // $author = Profile::where('user_id',$teacher->user_id)->first();

        $submission = Submission::where('id',$submission->id)->first();

        // dd($submission);
        return view('student.submission.detail', ['profile'=>$profile,'submission'=>$submission,'role_id'=>$role_id]);
    }

    public function download($file){

        // dd($file);
        return response()->download('storage/submission/'.$file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Submission $submission)
    {
        $UserRoles = User::with('roles')->find(Auth::user()->id);
        foreach($UserRoles->roles as $role){
            $role_id = $role->id;
        }

        // dd($role_id);

        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();

        $student = Student::where('user_id',$user_id)->first();
        // dd($student); 
        // $teacher = Teacher::where('id', $post->teacher_id)->first();
        // dd($post); 

        // $author = Profile::where('user_id',$teacher->user_id)->first();

        $submission = Submission::where('id',$submission->id)->first();

        // dd($submission);
        return view('student.submission.edit', ['profile'=>$profile,'submission'=>$submission,'role_id'=>$role_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Submission $submission)
    {
        // dd($submission);
        $input = request()->validate([
            'title'=>'required|max:255',
            'body'=>'required',
            'file'=>'file',

        ]);
        $title = $input['title'];


        $body = $input['body'];
        $dom = new \domdocument();
        $dom->loadHtml($body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');
      
        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){
            $data = $img->getattribute('src');
            // dd(strpos($data, 'data:image'));
            if (strpos($data, 'data:image')!==false){
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
      
            $data = base64_decode($data);
            $image_name= 'submission/'.time().$k.'.png';
            $path = public_path() .'/storage/'. $image_name;
            // $path =asset('storage/' . $image_name) ;

            // dd($path);
            file_put_contents($path, $data);
      
            $img->removeattribute('src');
            $img->setattribute('src',asset('storage/' . $image_name));

            } // <!--endif
        }


        // dd($images);
        
        $body = $dom->savehtml();


        // $submission = new Submission;
        if(request()->file('file')){
            $file = request()->file('file');
            $filename ='submission/'. time().'.'.$file->getClientOriginalExtension();
            request()->file->move('storage/submission',$filename);
            $submission->file = $filename;
        }
        // dd($filename);

        // $input = Submission::create([
        //     'title' => $input['title'],
        //     'body' => $body,
        //     'teacher_id'=>$input['teacher_id'],
        //     'student_id'=>$input['student_id'],
        //     'post_id'=>$input['post_id'],
        //     'file'=>$filename,
        //     'isDelete' => 'No',
        // ]);
        
        // dd($input);

        $submission->title = $input['title'];
        $submission->body = $body;
        // $submission->teacher_id = $submission->teacher_id;
        // $submission->student_id = $submission->student_id;
        // $submission->post_id = $submission->post_id;
        $submission->save();
        return redirect()->back();
        
    }

    // SUBJECT LIST FOR SUBMISSION
    public function IndexAll()
    {
        //
        $user = Auth::User();
        // dd($user_id);
        $subjects= Subject::all();
        $posts= Post::all();
        $selectClassSubjects = Grade::with('subjects')->get();
        // dd($selectClassSubjects);
        // $assigned=Teacher::all();
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();



        foreach (Teacher::all() as $assigned) {
           if($assigned->user_id != $user->id){
                return view('teacher.subject.noSubject',['subjects'=>$subjects,'profile'=>$profile]);
            }else{
                $assigns = Teacher::where('user_id',$user->id)->get();
                // dd($assigns);
                return view('teacher.submission.indexAll',['subjects'=>$subjects,'assigns'=>$assigns,'user'=>$user,'selectClassSubjects'=>$selectClassSubjects,'posts'=>$posts,'profile'=>$profile]);
           }
        }
        
        // return view('teacher.subject.index',['subjects'=>$subjects]);
    }

    public function IndexByPost($id)
    {
        //
        
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $teacher = Teacher::find($id);
        
        $grade = Grade::find($teacher->grade_id);
        $subject = Subject::find($teacher->subject_id);
        
        // dd($subject);
        $UserRoles = User::with('roles')->find(Auth::user()->id);
        foreach($UserRoles->roles as $role){
            $role_id = $role->id;
        }

        $submissions = Submission::with('posts')->where('teacher_id',$teacher->id)->get();

        // $selectClassSubjects = Grade::where('id',$teacher->grade_id)->with('subjects')->get();
        // foreach($selectClassSubjects as $ClassSubject){
        //     foreach($ClassSubject->subjects as $subject){
        //         if($subject->id == $teacher->subject_id){
        //             $SubjectGrades = []; 

        //             $SubjectGrades[] =$ClassSubject->grade_title;  
        //             $SubjectGrades[] =$subject->subject_title;
        //             // dd($SubjectGrade);
        //         }

        //     }
        //     // dd($ClassSubject);
        // }
        

                // dd($submissions);
        
        // $submissions = Submission::with('posts')->with('students')->where('post_id',$post->id)->get();


        
        $StudentUser = null;

        foreach($submissions as $submission){
            // foreach($submission->students as $student){
                $StudentUser = User::where('id',$submission->students->user_id)->get();
                // dd($user);
            // }
        }
                // dd($StudentUser); 


        // $file = 
        // dd($submissions as $submission->file);
        // $posts = Post::where('id',$submissions->post_id)->get();


        return view('teacher.submission.bypost',['profile'=>$profile,'submissions'=>$submissions,'StudentUser'=>$StudentUser,'role_id'=>$role_id,'grade'=>$grade,'subject'=>$subject]);
    }

    

    public function postList()
    {
        //
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();

        $UserRoles = User::with('roles')->find(Auth::user()->id);
        foreach($UserRoles->roles as $role){
            $role_id = $role->id;
        }

        
        // $submissions = Submission::with('posts')->with('students')->where('post_id',$post->id)->get();
        
        $StudentUser = null;

        // foreach($submissions as $submission){
        //     // foreach($submission->students as $student){
        //         $StudentUser = User::where('id',$submission->students->user_id)->get();
        //         // dd($user);
        //     // }
        // }
                // dd($StudentUser);


        // $file = 
        // dd($submissions as $submission->file);
        // $posts = Post::where('id',$submissions->post_id)->get();


        return view('teacher.submission.all',['profile'=>$profile,'StudentUser'=>$StudentUser,'role_id'=>$role_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
