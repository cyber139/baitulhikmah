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
        
    $notice = Notice::orderBy('id', 'DESC')->where('Publish','Yes')->get();
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

        $inputs = request()->validate([
            // 'title'=>'required,min:8'
            'title'=>'required|max:255',
            'body'=>'required',
            'post_image'=>'file',
            // 'post_image'=>'mimems:jpeg,bmp,png',
            'publish'=>'required'
        ]);
        
        $body = $inputs['body'];
        $dom = new \domdocument();
        $dom->loadHtml($body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');
      
        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){
            $data = $img->getattribute('src');
            // dd(strpos($data, 'data:image'));
            if (strpos($data, 'data:image')!==false){
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
      
            $data = base64_decode($data);
            $image_name= 'notices/'.time().$k.'.png';
            $path = public_path() .'/storage/'. $image_name;
            // $path =asset('storage/' . $image_name) ;

            // dd($path);
            file_put_contents($path, $data);
      
            $img->removeattribute('src');
            $img->setattribute('src',asset('storage/' . $image_name));

            } // <!--endif
        }


        // dd($images);
        
        $body = $dom->savehtml();

        if($request->file('post_image')){
            $file = $request->file('post_image');
            $filename ='notices/'. time().'.'.$file->getClientOriginalExtension();
            $file->move('storage/notices',$filename);
            // $data->file = $filename;
        }

       $inputs = Notice::create([
        'title' => $inputs['title'],
        'body' => $body,
        'publish' => $inputs['publish'],
        'post_image'=>$filename,
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
        $role_id = null;
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


        $body = $inputs['body'];
        $dom = new \domdocument();
        $dom->loadHtml($body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');
      

        foreach($images as $k => $img){
            $data = $img->getattribute('src');
            // dd(strpos($data, 'data:image'));
            if (strpos($data, 'data:image')!==false){
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
      
            $data = base64_decode($data);
            $image_name= 'submission/'.time().$k.'.png';
            $path = public_path() .'/storage/'. $image_name;
            // $path =asset('storage/' . $image_name) ;

            // dd($path);
            file_put_contents($path, $data);
      
            $img->removeattribute('src');
            $img->setattribute('src',asset('storage/' . $image_name));

            } 
        }
        
        $body = $dom->savehtml();


        // if(request('post_image')){
        //     $inputs['post_image'] = request('post_image')->store('images');
        //     $notice->post_image = $inputs['post_image'];
        // }

        if(request()->file('post_image')){
            $file = request()->file('post_image');
            $filename ='notices/'. time().'.'.$file->getClientOriginalExtension();
            $file->move('storage/notices',$filename);
            $notice->file = $filename;
        }

        $notice->title = $inputs['title'];
        $notice->body =$body;
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

        $request->session()->flash('message', 'Post '.$notice['title'].' was deleted');

        return back();
    }
}
