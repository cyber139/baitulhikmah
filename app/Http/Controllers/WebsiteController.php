<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Subject;
use App\Grade;
use App\Teacher;
use App\Profile;
use App\Post;
use App\Web_About;
use App\Web_Banner;
use App\Web_Contact;
use App\Web_Counter;
// use App\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\File;


class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = Role::where('slug', 'teacher')->first()->users()->get();
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();

        $banner = Web_Banner::find(1)->first();
        $banner2 = Web_Banner::where('id', 2)->first();
        $about = Web_About::all()->first();
        $counter = Web_Counter::all()->first();
        // dd($banner2);
        $contact = Web_Contact::all()->first();

        return view('admin.website.index',['users'=>$users,'profile'=>$profile,'banner'=>$banner,'banner2'=>$banner2,'about'=>$about,'counter'=>$counter,'contact'=>$contact,]);
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
    public function updateBanner1(Request $request)
    {

        $input = request()->validate([
            'title'=>'required|max:255',
            'teacher_notice'=>'required',
            'banner_image'=>'file',
        ]);

        $teacher_notice = $input['teacher_notice'];
        $dom = new \domdocument();
        $dom->loadHtml($teacher_notice, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');
      
        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){
            $data = $img->getattribute('src');
      
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
      
            $data = base64_decode($data);
            $image_name= 'banner/'.time().$k.'.png';
            $path = public_path() .'/storage/'. $image_name;
            // $path =asset('storage/' . $image_name) ;

            // dd($path);
            file_put_contents($path, $data);
      
            $img->removeattribute('src');
            $img->setattribute('src',asset('storage/' . $image_name));
        }
        // dd($images);
        
        $body = $dom->savehtml();


        // If post image request exist
        if(request('banner_image')){
            $input['banner_image'] = request('banner_image')->store('banner');
        }
        // dd($teacher->id);
        $banner1 = Web_Banner::find('1')->first();
        $banner1->title = $input['title'];
        $banner1->banner_image = $input['banner_image'];
        $banner1->teacher_notice = $teacher_notice;
        $banner1->save();



        return back();


    }
    public function updateBanner2(Request $request)
    {

        $input = request()->validate([
            'title'=>'required|max:255',
            'teacher_notice'=>'required',
            'banner_image'=>'file',
        ]);

        $teacher_notice = $input['teacher_notice'];
        $dom = new \domdocument();
        $dom->loadHtml($teacher_notice, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');
      
        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){
            $data = $img->getattribute('src');
      
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
      
            $data = base64_decode($data);
            $image_name= 'banner/'.time().$k.'.png';
            $path = public_path() .'/storage/'. $image_name;
            // $path =asset('storage/' . $image_name) ;

            // dd($path);
            file_put_contents($path, $data);
      
            $img->removeattribute('src');
            $img->setattribute('src',asset('storage/' . $image_name));
        }
        // dd($images);
        
        $body = $dom->savehtml();


        // If post image request exist
        if(request('banner_image')){
            $input['banner_image'] = request('banner_image')->store('banner');
        }
        // dd($teacher->id);
        $banner2 = Web_Banner::where('id', 2)->first();
        // dd($input);
        $banner2->title = $input['title'];
        if(!empty($input['banner_image'])){

        $banner2->banner_image = $input['banner_image'];
        
        }
        $banner2->teacher_notice = $teacher_notice;
        $banner2->save();



        return back();


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
    public function updateCounter(Request $request)
    {
        // dd($request);
        $inputs = request()->validate([
            'student_no'=>'required|max:255',
            'teacher_no'=>'required|max:255',
            'year_no'=>'required|max:255',
        ]);
        // dd($inputs);
        $counter = Web_Counter::all()->first();
        $counter->student_no = $inputs['student_no'];
        $counter->teacher_no = $inputs['teacher_no'];
        $counter->year_no = $inputs['year_no'];
        $counter->save();



        return back();
    }
    public function updateAbout(Request $request)
    {
        // dd($request);
        $inputs = request()->validate([
            'title'=>'required',
            'desc'=>'required',
            'body'=>'required',
        ]);
        // dd($inputs);
        $about = Web_About::all()->first();
        $about->title = $inputs['title'];
        $about->desc = $inputs['desc'];
        $about->body = $inputs['body'];
        $about->save();



        return back();
    }
    public function updateContact(Request $request)
    {
        // dd($request);
        $inputs = request()->validate([
            'email'=>'required',
            'web'=>'required',
            'address'=>'required',
            'contact_no'=>'required',
        ]);
        // dd($inputs);
        $contact = Web_Contact::all()->first();
        $contact->email = $inputs['email'];
        $contact->web = $inputs['web'];
        $contact->address = $inputs['address'];
        $contact->contact_no = $inputs['contact_no'];
        $contact->save();



        return back();
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
