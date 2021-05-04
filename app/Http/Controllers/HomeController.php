<?php

namespace App\Http\Controllers;

use App\Notice;
use App\User;
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
                        $notice = Notice::orderBy('id', 'DESC','Publish','Yes')->first();
                        $studentlist = Role::where('slug', 'student')->first()->users()->get()->count();
                        $teacherlist = Role::where('slug', 'teacher')->first()->users()->get()->count();
                        $subjectlist = Subject::get()->count();
                        $classlist = Grade::get()->count();
                
                        // return view('admin.notice',['notices'=>$notice]);
                        // return view('admin.home');
                        return view('admin.home',['studentlist'=>$studentlist,'teacherlist'=>$teacherlist,'subjectlist'=>$subjectlist,'classlist'=>$classlist,'notice'=>$notice]);
                    }
                    elseif($role->id == 2)
                    {
                        // dd($role);
                        return view('teacher.home');
                    }
                    else{
                        $notice = Notice::all();
                        $user = User::all();

                        return view('home',['notices'=>$notice,'users'=>$user]);
                    }
                }
        }else{
            $notice = Notice::all();
            $user = User::all();

            return view('home',['notices'=>$notice,'users'=>$user]);
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
