<?php

namespace App\Http\Controllers;

use App\Notice;
use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        // return view('admin.notice');
    //     $notice = Notice::all();

    //     return view('admin.notice',['notices'=>$notice]);

    $notice = Notice::orderBy('id', 'DESC','Publish','Yes')->get();
    $user_id = auth()->user()->id;
    $user_roles = User::with('roles')->where('id', $user_id)->get();
    $profile = Profile::where('user_id', $user_id)->first();

    foreach($user_roles as $user){
        foreach($user->roles as $role){
            $role_id = $role->id;
        }
    }

    // dd($role_id);
    

    return view('notice.index',['notices'=>$notice,'user'=>$user,'user_roles'=>$user_roles,'profile'=>$profile,'role_id'=>$role_id]);
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
        return view('admin.notice.create',['profile'=>$profile]);
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

       $inputs = Notice::create([
        'title' => $inputs['title'],
        'body' => $inputs['body'],
        'publish' => $inputs['publish'],
        'user_id'=>auth()->user()->id
    ]);

        session()->flash('notice-created-message', 'New post was created : '. $inputs['title']);

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
        
        // dd($notice);
        
        $user_id = auth()->user()->id;
        $user_roles = User::with('roles')->where('id', $user_id)->get();
        $profile = Profile::where('user_id', $user_id)->first();

        foreach($user_roles as $user){
            foreach($user->roles as $role){
                $role_id = $role->id;
            }
        }

        // dd($role_id);
    

    return view('notice.notice-detail',['notice'=> $notice,'user'=>$user,'user_roles'=>$user_roles,'profile'=>$profile,'role_id'=>$role_id]);

        
    }

    public function show1()
    {
        //
        // Notice::findOrFail($id);
        // return view('admin.notice',['notice'=>$notice]);

        $notice = Notice::orderBy('id', 'DESC')->get();
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        // $notice = Notice::all();
        // $notice = Notice::paginate(2);

        return view('admin.notice.index', ['notice'=> $notice,'profile'=>$profile]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice){

        // $this->authorize('view', $notice);

//        if(auth()->user()->can('view', $post)){
//
//
//        }
        // $notice = Notice::all();
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();

        return view('admin.notice.edit', ['notice'=> $notice,'profile'=>$profile]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Notice $notice){

        $inputs = request()->validate([
            'title'=>'required|max:255',
            'body'=>'required',
            'post_image'=>'file',
            // 'post_image'=>'mimems:jpeg,bmp,png',
            'publish'=>'required'
        ]);


        $dom = new \domdocument();
        $dom->loadHtml($inputs['body'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');
      
        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){
            $data = $img->getattribute('src');
      
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
      
            $data = base64_decode($data);
            $image_name= time().$k.'.png';
            $path = public_path() .'/'. $image_name;
      
            file_put_contents($path, $data);
      
            $img->removeattribute('src');
            $img->setattribute('src', $image_name);
        }
      
        $detail = $dom->savehtml();


        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $notice->post_image = $inputs['post_image'];
        }

        $notice->title = $inputs['title'];
        $notice->body =$detail;
        $notice->publish = $inputs['publish'];


        // $this->authorize('update', $notice);


        $notice->save();

        session()->flash('notice-updated-message', 'Post was updated : '. $inputs['title']);

        return redirect()->route('notice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Notice $notice ,Request $request){

        // $this->authorize('delete', $notice);


        $notice->delete();

        $request->session()->flash('message', 'Post was deleted');

        return back();
    }
}
