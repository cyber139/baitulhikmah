<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subjects= Subject::all();
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        return view('admin.subject.index',['subjects'=>$subjects,'profile'=>$profile]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        return view('admin.subject.create',['profile'=>$profile]);
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
            'subject_title'=>'required|max:255',
            // 'subject_slug'=>'required|max:255',
            'publish'=>'required',
        ]);

        $inputs = Subject::create([
            'subject_title' => $inputs['subject_title'],
            'subject_slug' => strtolower(preg_replace('/\s*/', '', $inputs['subject_title'])),
            'publish' => $inputs['publish'],
            'isActive'=>"Yes",
            'isDelete'=>"No"
        ]);
        

        // return back();
        session()->flash('subject-created-message', 'New Subject was created : '. $inputs['subject_title']);

        return redirect()->route('subject.index');


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
    public function edit(Subject $subject)
    {
        // //
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        return view('admin.subject.edit', ['subject'=> $subject,'profile'=>$profile]);
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
            'subject_title'=>'required|max:255',
            // 'subject_slug'=>'required|max:255',
            'publish'=>'required',
            'isActive'=>'required',
            'isDelete'=>'required'
        ]);

        // $subject = Subject::update([
        //     'subject_title' => $inputs['subject_title'],
        //     'subject_slug' => $inputs['subject_slug'],
        //     'publish' => $inputs['publish'],
        //     'isActive'=>$inputs['isActive'],
        //     'isDelete'=>$inputs['isDelete']
        // ]);

        $subject = Subject::find($id);
        $subject->subject_title = $inputs['subject_title'];
        $subject->subject_slug =  strtolower(preg_replace('/\s*/', '', $inputs['subject_title']));
        $subject->publish = $inputs['publish'];
        $subject->isActive = $inputs['isActive'];
        $subject->isDelete = $inputs['isDelete'];
        $subject->save();

        // return back();
        session()->flash('subject-updated-message', 'Subject was updated : '. $inputs['subject_title']);

        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject ,Request $request){

        // $this->authorize('delete', $notice);


        $subject->delete();

        $request->session()->flash('subject-deleted-message', 'Subject '.$subject['subject_title'].' was deleted');

        return back();
    }
}
