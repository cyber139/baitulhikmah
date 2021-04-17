<?php

namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('admin.notice');
    //     $notice = Notice::all();

    //     return view('admin.notice',['notices'=>$notice]);

    $notice = Notice::all();

    return view('notice',['notices'=>$notice]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.notice.create');
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
            // 'title'=>'required,min:8'
            'title'=>'required|max:255',
            'body'=>'required',
            'post_image'=>'file',
            // 'post_image'=>'mimems:jpeg,bmp,png',
            'publish'=>'required'
        ]);
        
        // If post image request exist
        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }

        

        // dd($request->post_image->originalName);
        // dd($request->input('post_image');

        auth()->user()->notices()->create($inputs);

        session()->flash('post-created-message', 'Post with title was created '. $inputs['title']);

        // return back();
        return redirect()->route('notice.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
        // Notice::findOrFail($id);
        // return view('admin.notice',['notice'=>$notice]);
        return view('notice-detail', ['notice'=> $notice]);
        
    }

    public function show1()
    {
        //
        // Notice::findOrFail($id);
        // return view('admin.notice',['notice'=>$notice]);

        $notice = Notice::all();

        return view('admin.notice.index', ['notice'=> $notice]);
        
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