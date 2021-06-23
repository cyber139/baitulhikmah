<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Subject;
use App\Grade;
use App\Teacher;
use App\Profile;
use App\Post;
// use App\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\File;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users = Role::where('slug', 'teacher')->first()->users()->get();
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        return view('admin.teacher.index',['users'=>$users,'profile'=>$profile]);
    }

    public function home()
    {
        //
        return view('teacher.home');
    }

    public function teacherProfile(User $user)
    {
        // //
        // $users = User::all();
        // return view('admin.uac',['users'=>$users]);
        $role = Role::find($user->id);
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        return view('user.index',['user'=>$user,'role'=>$role,'profile'=>$profile]);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        // $users = User::with('roles')->get();
        $selectRoles = Role::all();
        $selectClassSubjects = Grade::with('subjects')->get();
        $selectAssign = Teacher::all();
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        // dd($selectAssign);
        $userProfile = Profile::where('user_id', $user->id)->first();




        return view('admin.teacher.edit',['user'=>$user,'selectRoles'=>$selectRoles,'selectClassSubjects'=>$selectClassSubjects,'selectAssign'=>$selectAssign,'profile'=>$profile,'userProfile'=>$userProfile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSubject(User $user)
    {
        //
        // DB::enableQueryLog();
        $users = User::with('roles')->get();
        $selectSubject = Subject::all();
        $selectGrade = Grade::all();
        $selectAssign = Teacher::all();
        // dd($selectAssign);
        //   dd(DB::getQueryLog());

        
        return view('admin.teacher.edit',['user'=>$user,'selectSubject'=>$selectSubject,'selectGrade'=>$selectGrade,'selectAssign'=>$selectAssign]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function assign(Request $request)
    {
        //
        // DB::enableQueryLog();
        // $selectAssign = Teacher::all();
        // dd($selectAssign);
        
        $inputs = request()->validate([
            'user_id' => ['required', 'int' ],
            'grade_id' => ['required', 'int'],
            'subject_id' => ['required', 'int'],
            'isActive' => ['required' ],
            'isDelete' => ['required' ]
            ]);
            
        $checkAssign = Teacher::where([
            ['user_id','=',$inputs['user_id']],
            ['grade_id','=',$inputs['grade_id']],
            ['subject_id','=',$inputs['subject_id']]
            ])->first();
            // dd($checkAssign);


        if(empty($checkAssign) ){
            
            $inputs = Teacher::create([
                'user_id' => $inputs['user_id'],
                'grade_id' => $inputs['grade_id'],
                'subject_id' => $inputs['subject_id'],
                'isActive' => $inputs['isActive'],
                'isDelete' => $inputs['isDelete'],
                ]);
                // dd($checkAssign);
                // return "Record is not exist";
        }
        else{
            $checkAssign->isActive = $inputs['isActive'];
            $checkAssign->isDelete = $inputs['isDelete'];
            // dd($checkAssign);
            $checkAssign->save();
            // return back();
            //  return 'Record Exist';
            // dd($checkAssign);
            //  abort(405 , 'Record Exist');
            //  return redirect()->route('teacher.edit');
        }

        // $insertedId = $input->id;
        // $inputs2 = User::with('roles')->get($inputs->id);

        // dd($inputs2);
        // session()->flash('user-created-message', 'User '.$inputs['username'].' was created');
        // dd(DB::getQueryLog());

        
        return back();
    }
    public function dismiss(Request $request)
    {
        //
        // DB::enableQueryLog();
        // dd($request);
        
        $inputs = request()->validate([
            'user_id' => ['required', 'int' ],
            'grade_id' => ['required', 'int'],
            'subject_id' => ['required', 'int'],
            'isActive' => ['required' ],
            'isDelete' => ['required' ]
            ]);
            // dd($inputs);
        $teacher = Teacher::where([
            ['user_id','=',$inputs['user_id']],
            ['grade_id','=',$inputs['grade_id']],
            ['subject_id','=',$inputs['subject_id']],
            ['isActive','=','Yes'],
            ['isDelete','=','No']
            ])->first();

        // $teacher = Teacher::find($request->user)->first();
        //    dd($teacher);
        // dd($teacher->isNotEmpty());

        if(!empty($teacher)){
            // dd($teacher);
            // $teacher()->update(['isActive' => $inputs['isActive']]); 
            // $teacher()->update(['isDelete' => $inputs['isDelete']]); 
            $teacher->isActive = $inputs['isActive'];
            $teacher->isDelete = $inputs['isDelete'];
            // dd($teacher);
            $teacher->save();
            // $teacher->update($inputs);
            // return back();
            // return "Record is  exist";


        }
        else{
             return 'Record is not Exist';
            // dd($checkAssign);
             abort(404  , 'Record not Found');
            //  return redirect()->route('teacher.edit');
        }

        // $insertedId = $input->id;
        // $inputs2 = User::with('roles')->get($inputs->id);

        // dd($inputs2);
        // session()->flash('user-created-message', 'User '.$inputs['username'].' was created');
        // dd(DB::getQueryLog());

        
        return back();
    }

    public function SubjectIndex()
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
            if($assigned->user_id == $user->id){
                break;
            }
        }
        // dd($assigned);
        if($assigned->user_id != $user->id){
            return view('teacher.subject.noSubject',['subjects'=>$subjects,'profile'=>$profile]);
        }else{
            $assigns = Teacher::where('user_id',$user->id)->get();
            // dd($assigns);
            return view('teacher.subject.index',['subjects'=>$subjects,'assigns'=>$assigns,'user'=>$user,'selectClassSubjects'=>$selectClassSubjects,'posts'=>$posts,'profile'=>$profile]);
       }
        
        // return view('teacher.subject.index',['subjects'=>$subjects]);
    }


}
