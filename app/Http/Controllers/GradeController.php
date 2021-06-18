<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Grade;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $grades= Grade::all();
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        return view('admin.grade.index',['grades'=>$grades,'profile'=>$profile]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        return view('admin.grade.create',['profile'=>$profile]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $inputs = request()->validate([
            'grade_title'=>'required|max:255',
            // 'grade_slug'=>'required|max:255',
            'publish'=>'required',

        ]);

        $grade = Grade::create([
            'grade_title' => $inputs['grade_title'],
            'grade_slug' =>strtolower(preg_replace('/\s*/', '', $inputs['grade_title'])),
            'publish' => $inputs['publish'],
            'isActive'=>"Yes",
            'isDelete'=>"No"
        ]);
        

        session()->flash('grade-created-message', 'New class was created : '. $inputs['grade_title']);

        // return back();
        return redirect()->route('grade.index');


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
    public function edit(Grade $grade)
    {

        // DB::enableQueryLog();
        // $grades = Grade::with('subjects')->find($grade);
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        // $grades = Grade::find($grade);

        $selectSubjects = Subject::where([
            ['isActive','=', 'Yes'],
            ['publish','=','Yes'],
            ['isDelete','=','No']
            ])->get();

        // dd(DB::getQueryLog());

        return view('admin.grade.edit', ['grade'=> $grade,'selectSubjects'=>$selectSubjects,'profile'=>$profile]);
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
        $inputs = request()->validate([
            'grade_title'=>'required|max:255',
            // 'grade_slug'=>'required|max:255',
            'publish'=>'required',
            'isActive'=>'required',
            'isDelete'=>'required'
        ]);

        $grade = Grade::find($id);
        $grade->grade_title = $inputs['grade_title'];
        $grade->grade_slug = strtolower(preg_replace('/\s*/', '', $inputs['grade_title']));
        $grade->publish = $inputs['publish'];
        $grade->isActive = $inputs['isActive'];
        $grade->isDelete = $inputs['isDelete'];
        $grade->save();

        // return back();
        session()->flash('grade-updated-message', 'Class was updated : '. $inputs['grade_title']);

        return redirect()->route('grade.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade ,Request $request){

        // $this->authorize('delete', $notice);


        $grade->delete();

        $request->session()->flash('grade-deleted-message', 'Class '.$grade['grade_title'].' was deleted');


        return back();
    }

    public function attach(Grade $grade){

        $grade->subjects()->attach(request('subject'));
        return back();

    }
    public function detach(Grade $grade){

        $grade->subjects()->detach(request('subject'));
        return back();

    }
}
