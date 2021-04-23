<?php

namespace App\Http\Controllers;

use App\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.grade.index',['grades'=>$grades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.grade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Check data request send
        // dd(request()->all());
        // auth()->user();

        $inputs = request()->validate([
            'grade_title'=>'required|max:255',
            'grade_slug'=>'required|max:255',
            'publish'=>'required',
            'isActive'=>'required',
            'isDelete'=>'required'
        ]);

        $grade = Grade::create([
            'grade_title' => $inputs['grade_title'],
            'grade_slug' => $inputs['grade_slug'],
            'publish' => $inputs['publish'],
            'isActive'=>$inputs['isActive'],
            'isDelete'=>$inputs['isDelete']
        ]);
        

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
        return view('admin.grade.edit', ['grade'=> $grade]);
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
            'grade_slug'=>'required|max:255',
            'publish'=>'required',
            'isActive'=>'required',
            'isDelete'=>'required'
        ]);

        $grade = Grade::find($id);
        $grade->grade_title = $inputs['grade_title'];
        $grade->grade_slug = $inputs['grade_slug'];
        $grade->publish = $inputs['publish'];
        $grade->isActive = $inputs['isActive'];
        $grade->isDelete = $inputs['isDelete'];
        $grade->save();

        // return back();
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

        $request->session()->flash('message', 'Post was deleted');

        return back();
    }
}
