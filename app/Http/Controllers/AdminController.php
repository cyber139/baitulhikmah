<?php

namespace App\Http\Controllers;

use App\Notice;
use App\User;
use App\Role;
use App\Grade;
use App\Subject;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        
        $notice = Notice::orderBy('id', 'DESC','Publish','Yes')->first();
        $studentlist = Role::where('slug', 'student')->first()->users()->get()->count();
        $teacherlist = Role::where('slug', 'teacher')->first()->users()->get()->count();
        $subjectlist = Subject::get()->count();
        $classlist = Grade::get()->count();

        // return view('admin.notice',['notices'=>$notice]);
        // return view('admin.home');
        return view('admin.home',['studentlist'=>$studentlist,'teacherlist'=>$teacherlist,'subjectlist'=>$subjectlist,'classlist'=>$classlist,'notice'=>$notice]);

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
        $notice = Notice::all();

        return view('admin.notice.notice',['notices'=>$notice]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
