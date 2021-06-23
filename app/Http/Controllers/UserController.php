<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Student;
use App\Grade;
use App\Teacher;
use App\Profile;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function teacherList()
    {
        $users = Role::where('slug', 'teacher')->first()->users()->get();
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $user_roles = User::with('roles')->where('id', $user_id)->get();
    

        foreach($user_roles as $user){
            foreach($user->roles as $role){
                $role_id = $role->id;
            }
        }
        return view('user.teacher',['users'=>$users,'profile'=>$profile,'role_id'=>$role_id]);

    }

    public function teacherDetail(User $user)
    {

        $profile = Profile::where('user_id', $user->id)->first();
        $selectClassSubjects = Grade::with('subjects')->get();
        $selectAssign = Teacher::where('user_id',$user->id)->get();

        // dd($selectAssign);


       
        
        $user_id = auth()->user()->id;
        $user_roles = User::with('roles')->where('id', $user_id)->get();


        foreach($user_roles as $users){
            foreach($users->roles as $role){
                $role_id = $role->id;
            }
        }

        
        return view('user.teacherDetail',['user'=>$user,'profile'=>$profile,'role_id'=>$role_id,'selectClassSubjects'=>$selectClassSubjects,'selectAssign'=>$selectAssign]);


    }

    public function studentList()
    {
        $users = Role::where('slug', 'student')->first()->users()->get();
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $user_roles = User::with('roles')->where('id', $user_id)->get();
        $studentList = Student::all();
        $gradeList = Grade::all();
    

        foreach($user_roles as $user){
            foreach($user->roles as $role){
                $role_id = $role->id;
            }
        }
        return view('user.student',['users'=>$users,'profile'=>$profile,'role_id'=>$role_id,'studentList'=>$studentList,'gradeList'=>$gradeList]);

    }

    public function studentDetail(User $user)
    {


        $profile = Profile::where('user_id', $user->id)->first();




        
        // dd($user);
        
        // $gradeList =Grade::all();
        // $selectRoles = Role::all();
        // $userProfile = Profile::where('user_id', $user->id)->first();
        $studentClass = Student::where('user_id', $user->id)->first();
        // dd($studentClass);
        
        $user_id = auth()->user()->id;
        $user_roles = User::with('roles')->where('id', $user_id)->get();


        foreach($user_roles as $users){
            foreach($users->roles as $role){
                $role_id = $role->id;
            }
        }

        if($studentClass != null){
        $class = Grade::where('id', $studentClass->grade_id)->first();
        }
        else{
            $class = null;
        }
        // dd($user);
        
        // return view('user.studentDetail',['user'=>$user,'selectRoles'=>$selectRoles,'profile'=>$profile,'userProfile'=>$userProfile,'gradeList'=>$gradeList,'studentClass'=>$studentClass,'class'=>$class,'role_id'=>$role_id]);
        return view('user.studentDetail',['user'=>$user,'profile'=>$profile,'role_id'=>$role_id,'class'=>$class,'studentClass'=>$studentClass]);
   

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
    public function show(User $user)
    {
        // //
        // $users = User::all();
        // return view('admin.uac',['users'=>$users]);
        $role = Role::find($user->id);
        return view('user.index',['user'=>$user,'role'=>$role]);
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
        return view('user.edit', ['user'=> $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        //
        $inputs = request()->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update([
            'password' => Hash::make($user['password']),
        ]);
        // $user->update();
        // $this->authorize('update', $notice);


        // return  redirect()->route('admin.user.index');
        return back();
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
