<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Post;
use App\Subject;
use App\Grade;
use App\Profile;
use App\Teacher;
use App\Student;
use App\Submission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // dd($id);
        //
       
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();

        $posts = Post::where('teacher_id',$id)->orderBy('id','DESC')->get();

        foreach($posts as $post){
            $teacher = Teacher::where('id', $post->teacher_id)->first();
            // dd($teacher);
        }
        $author = Profile::where('user_id',$teacher->user_id)->first();

        // $subjects= Subject::all();
        // $posts= Post::all();

        // ROLE ID FOR MASTER LAYOUT
        $selectClassSubjects = Grade::where('id',$teacher->grade_id)->with('subjects')->get();
        $UserRoles = User::with('roles')->find(Auth::user()->id);
        foreach($UserRoles->roles as $role){
            $role_id = $role->id;
        }
        // dd($role_id);

        // $selectClassSubjects = 

        foreach($selectClassSubjects as $ClassSubject){
            foreach($ClassSubject->subjects as $subject){
                if($subject->id == $teacher->subject_id){
                    $SubjectGrades = []; 

                    $SubjectGrades[] =$ClassSubject->grade_title;  
                    $SubjectGrades[] =$subject->subject_title;
                    // dd($SubjectGrade);
                }

            }
            // dd($ClassSubject);
        }
        // dd($selectClassSubjects);
        // $author = Post::with('teachers')->find(Auth::user()->id);
        // dd($author->full_name);
        // dd($posts);
        return view('post.index',['posts'=>$posts,'author'=>$author,'teacher'=>$teacher,'SubjectGrades'=>$SubjectGrades,'profile'=>$profile,'role_id'=>$role_id]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $teacher = Teacher::where('id', $id)->first();
        // dd($teacher);
        return view('teacher.post.create',['teacher'=>$teacher,'profile'=>$profile]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->toArray());

        // $user_id = auth()->user()->id;
        // $teacher = Teacher::where('user_id',$user_id)->first();
        // dd($teacher);
        $input = request()->validate([
            'title'=>'required|max:255',
            'body'=>'required',
            'post_image'=>'file',
            'publish'=>'required',
            'teacher_id'=>'int',
        ]);

        $body = $input['body'];
        $dom = new \domdocument();
        $dom->loadHtml($body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');
      
        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){
            $data = $img->getattribute('src');
      
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
      
            $data = base64_decode($data);
            $image_name= 'upload/'.time().$k.'.png';
            $path = public_path() .'/storage/'. $image_name;
            // $path =asset('storage/' . $image_name) ;

            // dd($path);
            file_put_contents($path, $data);
      
            $img->removeattribute('src');
            $img->setattribute('src',asset('storage/' . $image_name));
        }
        // dd($images);
        
        $body = $dom->savehtml();


        // If post image request exist
        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }
        // dd($teacher->id);

        $input = Post::create([
            'teacher_id'=>$input['teacher_id'],
            'title' => $input['title'],
            'body' => $body,
            // 'body' => $input['body'],
            // 'post_image' => $input['post_image'],
            'publish' => $input['publish'],
        ]);

        // dd($request->post_image->originalName);
        // dd($request->input('post_image');

    //    auth()->user()->notices()->create($inputs);

        // session()->flash('notice-created-message', 'New post was created : '. $inputs['title']);

        // return back();

        $teacher_id = $input['teacher_id'];

        // dd($teacher_id);
        return redirect()->route('subject.post',$teacher_id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // dd($id);
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();

        $teacher = Teacher::where('id', $id)->first();
        $author = Profile::where('user_id',$teacher->user_id)->first();

        // dd($teacher);

        $selectClassSubjects = Grade::where('id',$teacher->grade_id)->with('subjects')->get();
        // dd($selectClassSubjects);

        foreach($selectClassSubjects as $ClassSubject){
            foreach($ClassSubject->subjects as $subject){
                if($subject->id == $teacher->subject_id){
                    $SubjectGrades = []; 

                    $SubjectGrades[] =$ClassSubject->grade_title;  
                    $SubjectGrades[] =$subject->subject_title;
                    // dd($SubjectGrades);
                }

            }
        }
        // dd($SubjectGrades);

        return view('post.NoIndex',['author'=>$author,'teacher'=>$teacher,'SubjectGrades'=>$SubjectGrades,'profile'=>$profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        return view('teacher.post.edit', ['post'=> $post,'profile'=>$profile]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail(Post $post)
    {
        // dd($post);
        //

        $UserRoles = User::with('roles')->find(Auth::user()->id);
        foreach($UserRoles->roles as $role){
            $role_id = $role->id;
        }

        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();

        $student = Student::where('user_id',$user_id)->first();
        // dd($student); 
        $teacher = Teacher::where('id', $post->teacher_id)->first();
        // dd($post); 

        $author = Profile::where('user_id',$teacher->user_id)->first();

        $submission = Submission::where('post_id',$post->id)->first();

        // dd($submission);
        return view('post.detail', ['post'=> $post,'author'=>$author,'profile'=>$profile,'student'=>$student,'teacher'=>$teacher,'submission'=>$submission,'role_id'=>$role_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Post $post){

        // dd(request());
        $inputs = request()->validate([
            'title'=>'required|max:255',
            'body'=>'required',
            'post_image'=>'file',
            'publish'=>'required',
            'teacher_id'=>'int',
        ]);


        $body = $inputs['body'];
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
            $image_name= 'upload/'.time().$k.'.png';
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


        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body =$body;
        $post->publish = $inputs['publish'];
        


        // $this->authorize('update', $notice);


        $post->save();

        $teacher_id = $post->teacher_id;

        session()->flash('notice-updated-message', 'Post was updated : '. $inputs['title']);

        return redirect()->route('subject.post',$teacher_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post ,Request $request){

        // $this->authorize('delete', $notice);


        $post->delete();

        $request->session()->flash('message', 'Post was deleted');

        return back();
    }
}
