<?php

namespace App\Http\Controllers;

use App\Notice;
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
    public function index()
    {
        // $users = User::all();
        // return view(view:'admin',[
        //     'users'=>$users
        // ])

        $notice = Notice::all();

        return view('home',['notices'=>$notice]);
    }
}
