<?php

namespace App\Http\Controllers;

use App\Notice;
use App\User;
use App\Profile;
use App\Role;
use App\Grade;
use App\Subject;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // public function index()
    // {
    //     // $users = User::all();
    //     // return view(view:'admin',[
    //     //     'users'=>$users
    //     // ])

    //     $notice = Notice::all();
    //     $user = User::all();

    //     return view('home',['notices'=>$notice,'users'=>$user]);
    // }

    public function index()
    {

        $UserRoles = User::with('roles')->find(Auth::user()->id);
        
        // dd($UserRoles);

        if($UserRoles->roles->isNotEmpty()){
            foreach($UserRoles->roles as $role){
                    // dd($role->id);
                    if($role->id == 1)
                    {
                        // dd($role);
                        $notice = Notice::orderBy('id', 'DESC')->where('Publish','Yes')->first();
                        // dd($notice);
                        $studentlist = Role::where('slug', 'student')->first()->users()->get()->count();
                        $teacherlist = Role::where('slug', 'teacher')->first()->users()->get()->count();
                        $subjectlist = Subject::get()->count();
                        $classlist = Grade::get()->count();
                        $user_id = auth()->user()->id;
                        $profile = Profile::where('user_id', $user_id)->first();
                
                        // return view('admin.notice',['notices'=>$notice]);
                        // return view('admin.home');
                        return view('admin.home',['studentlist'=>$studentlist,'teacherlist'=>$teacherlist,'subjectlist'=>$subjectlist,'classlist'=>$classlist,'notice'=>$notice,'profile'=>$profile]);
                    }
                    elseif($role->id == 2)
                    {
                        // dd($role);
                        $notice = Notice::orderBy('id', 'DESC')->where('Publish','Yes')->first();
                        $user_id = auth()->user()->id;
                        $profile = Profile::where('user_id', $user_id)->first();

                        return view('teacher.home',['notice'=>$notice,'profile'=>$profile]);
                    }
                    elseif($role->id==3)
                    {
                        // $notice = Notice::all();
                        $notice = Notice::orderBy('id', 'DESC')->where('Publish','Yes')->first();
                        $user_id = auth()->user()->id;
                        $profile = Profile::where('user_id', $user_id)->first();

                        $user = User::find($user_id);

                        return view('student.home',['notice'=>$notice,'user'=>$user,'profile'=>$profile]);
                    }
                    else{
                        $notice = Notice::orderBy('id', 'DESC')->where('Publish','Yes')->first();
                        $user_id = auth()->user()->id;
                        $profile = Profile::where('user_id', $user_id)->first();

                        dd($profile);

                        $user = User::find($user_id);

                        return view('home',['notice'=>$notice,'user'=>$user,'profile'=>$profile]);

                    }
                }
        }else{
            $role_id = null;
            $notice = Notice::orderBy('id', 'DESC')->where('Publish','Yes')->first();
            $user_id = auth()->user()->id;
            $profile = Profile::where('user_id', $user_id)->first();

            // dd($profile);

            $user = User::find($user_id);

            return view('home',['notice'=>$notice,'user'=>$user,'profile'=>$profile,'role_id'=>$role_id]);
        }


        // switch ($UserRoles->role) {
        //     case 'Admin':
        //         return View('AdminDashboard');
        //         break;

        //     case 'Moderator':
        //         return View('ModeratorDashboard');
        //         break;

        //     case 'Subscriber':
        //         return View('SubscriberDashboard');
        //         break;
            
        //     default:
        //         # code...
        //         break;
        // }
        $notice = Notice::all();
        $user = User::all();

        return view('home',['notices'=>$notice,'users'=>$user]);
    }

}
