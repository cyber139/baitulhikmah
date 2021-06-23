<?php

namespace App\Http\Controllers;

use App\Notice;
use App\Forum;
use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $forums = Forum::where('publish', 'Yes')->orderBy('id', 'DESC','Publish','Yes')->get();
        $user_id = auth()->user()->id;
        $user_roles = User::with('roles')->where('id', $user_id)->get();
        $profile = Profile::where('user_id', $user_id)->first();

        foreach($user_roles as $user){
            foreach($user->roles as $role){
                $role_id = $role->id;
            }
        }

    // dd($role_id);
    

    return view('forum.index',['forums'=>$forums,'user'=>$user,'user_roles'=>$user_roles,'profile'=>$profile,'role_id'=>$role_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role_id = null;
        $user_id = auth()->user()->id;
        $user_roles = User::with('roles')->where('id', $user_id)->get();
        $profile = Profile::where('user_id', $user_id)->first();

        foreach($user_roles as $user){
            foreach($user->roles as $role){
                $role_id = $role->id;
            }
        }
        return view('forum.create',['profile'=>$profile,'role_id'=>$role_id]);
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
        $input = request()->validate([
            'title'=>'required|max:255',
            'body'=>'required',
            'publish'=>'required'
        ]);

        $body = $input['body'];
        $dom = new \domdocument();
        $dom->loadHtml($body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');
      
        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){
            $data = $img->getattribute('src');
      
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
      
            $data = base64_decode($data);
            $image_name= 'forum/'.time().$k.'.png';
            $path = public_path() .'/storage/'. $image_name;
            // $path =asset('storage/' . $image_name) ;

            // dd($path);
            file_put_contents($path, $data);
      
            $img->removeattribute('src');
            $img->setattribute('src',asset('storage/' . $image_name));
        }
        // dd($images);
        
        $body = $dom->savehtml();

        $input = Forum::create([
            'title' => $input['title'],
            'body' => $body,
            'publish' => $input['publish'],
            'user_id'=>auth()->user()->id
        ]);

        // dd($input);


        return redirect()->route('forum-user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        //
        $user_id = auth()->user()->id;
        $user_roles = User::with('roles')->where('id', $user_id)->get();
        $profile = Profile::where('user_id', $user_id)->first();

        foreach($user_roles as $user){
            foreach($user->roles as $role){
                $role_id = $role->id;
            }
        }

        // dd($role_id);
    

    return view('forum.forum-detail',['forum'=> $forum,'user'=>$user,'user_roles'=>$user_roles,'profile'=>$profile,'role_id'=>$role_id]);
    }

    public function show1()
    {
        //
        // Notice::findOrFail($id);
        // return view('admin.notice',['notice'=>$notice]);

        $user_id = auth()->user()->id;
        $forums = Forum::where('user_id', $user_id)->orderBy('id', 'DESC')->get();
        $user_roles = User::with('roles')->where('id', $user_id)->get();
        $profile = Profile::where('user_id', $user_id)->first();

        foreach($user_roles as $user){
            foreach($user->roles as $role){
                $role_id = $role->id;
            }
        }

        return view('forum.forum', ['forums'=> $forums,'profile'=>$profile,'role_id'=>$role_id]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        //
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $user_roles = User::with('roles')->where('id', $user_id)->get();

        foreach($user_roles as $user){
            foreach($user->roles as $role){
                $role_id = $role->id;
            }
        }

        return view('forum.edit', ['forum'=> $forum,'profile'=>$profile,'role_id'=>$role_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Forum $forum)
    {
        //
        
        $inputs = request()->validate([
            'title'=>'required|max:255',
            'body'=>'required',
            'publish'=>'required'
        ]);


        $dom = new \domdocument();
        @$dom->loadHtml($inputs['body'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');
        if($images!=null) {   
        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){
            $data = $img->getattribute('src');
            // dd(strpos($data, 'data:image'));
            if (strpos($data, 'data:image')!==false){
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
      
            $data = base64_decode($data);
            $image_name= 'forum/'.time().$k.'.png';
            $path = public_path() .'/storage/'. $image_name;
            // $path =asset('storage/' . $image_name) ;

            // dd($path);
            file_put_contents($path, $data);
      
            $img->removeattribute('src');
            $img->setattribute('src',asset('storage/' . $image_name));

            } // <!--endif
        }
    }
      
        
        $detail = $dom->savehtml();
        $forum->title = $inputs['title'];
        $forum->body =$detail;
        $forum->publish = $inputs['publish'];
        $forum->save();

        return redirect()->route('forum-user');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum ,Request $request){

        $forum->delete();

        return back();
    }
}
