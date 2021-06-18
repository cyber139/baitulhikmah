<?php

namespace App\Http\Controllers;

use App\Role;
use App\Profile;
use App\User;
use App\Student;
use App\Grade;
use App\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = Role::where('slug', 'student')->first()->users()->get();
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $studentList = Student::all();
        $gradeList = Grade::all();
        // $gradeList = Grade::with('subjects')->where('id', $class->grade_id)->get();
        // dd($class);

        
        return view('admin.student.index',['users'=>$users,'profile'=>$profile,'studentList'=>$studentList,'gradeList'=>$gradeList]);
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
    public function show()
    {
        //
        // $gradeList =Grade::all();
        // dd($grade);
        $selectRoles = Role::all();
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $userProfile = Profile::where('user_id', $user_id)->first();
        $class = Student::where('user_id', $user_id)->first();
        // dd($class);
        if($class == null){
            return view('student.subject.noSubject',[
                'user_id'=>$user_id,
                'selectRoles'=>$selectRoles,
                'profile'=>$profile,

                ]);
        }
        $gradeList = Grade::with('subjects')->where('id', $class->grade_id)->get();
        
        foreach($gradeList as $grades){
            // $subjects[] ='';
            // dd($grades);

            foreach($grades->subjects as $subject){
                // dd($grades->id,$subject);
                $teacherList [] = Teacher::where([
                ['grade_id','=',$grades->id],
                ['subject_id','=',$subject->id]
                ])->first();

                // dd($teacherList);
            }
            // dd($subjects);
        }
        // dd($teacherList);

        return view('student.subject.index',[
            'user_id'=>$user_id,
            'selectRoles'=>$selectRoles,
            'profile'=>$profile,
            'userProfile'=>$userProfile,
            'gradeList'=>$gradeList,
            'class'=>$class,
            'teacherList'=>$teacherList,
            ]);

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
        $gradeList =Grade::all();
        // dd($grade);
        $selectRoles = Role::all();
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $userProfile = Profile::where('user_id', $user->id)->first();
        $studentClass = Student::where('user_id', $user->id)->first();
        // dd($studentClass);
        if($studentClass != null){
        $class = Grade::where('id', $studentClass->grade_id)->first();
        }
        else{
            $class = null;
        }
        
        return view('admin.student.edit',['user'=>$user,'selectRoles'=>$selectRoles,'profile'=>$profile,'userProfile'=>$userProfile,'gradeList'=>$gradeList,'studentClass'=>$studentClass,'class'=>$class]);
    }

    public function assign(Request $request)
    {
        //
        // DB::enableQueryLog();
        // $selectAssign = Teacher::all();
        // dd($request);
        
        $inputs = request()->validate([
            'user_id' => ['required', 'int' ],
            'grade_id' => ['required', 'int'],
            'isActive' => ['required' ],
            'isDelete' => ['required' ]
            ]);
            
        // dd($inputs);
        $checkAssign = Student::where([
            ['user_id','=',$inputs['user_id']],
            // ['grade_id','=',$inputs['grade_id']],

            ])->first();
            // dd($checkAssign);


        if(empty($checkAssign) ){
            
            $inputs = Student::create([
                'user_id' => $inputs['user_id'],
                'grade_id' => $inputs['grade_id'],
                'isActive' => $inputs['isActive'],
                'isDelete' => $inputs['isDelete'],
                ]);
                // dd($checkAssign);
                // return "Record is not exist";
        }
        else{
            
            $checkAssign->user_id = $inputs['user_id'];
            $checkAssign->grade_id = $inputs['grade_id'];
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
            'isActive' => ['required' ],
            'isDelete' => ['required' ]
            ]);
            // dd($inputs);
            
            $student = Student::where('user_id', $inputs['user_id'])->first();
            // dd($student);



            // ['user_id',$request->user_id])->first();

        // $teacher = Teacher::find($request->user)->first();
        //    dd($student);
        // dd($teacher->isNotEmpty());

        if(!empty($student)){
            // dd($teacher);
            // $teacher()->update(['isActive' => $inputs['isActive']]); 
            // $teacher()->update(['isDelete' => $inputs['isDelete']]); 
            $student->isActive = "No";
            $student->isDelete = "Yes";
            // dd($teacher);
            $student->save();
            // $teacher->update($inputs);
            // return back();
            // return "Record is  exist";
            // dd($student);

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
}
