<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $UserRoles = User::with('roles')->find(Auth::user()->id);
        

        // return view('profile.index',['UserRoles'=>$UserRoles]);

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
        // dd(auth()->user()->id);
        // dd($request);
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();

        // $profileExist = Profile::where('user_id', $user_id)->first();
        // dd($profileExist);


        // if($profileExist == null){
            // dd($request);
        
        $input = request()->validate([
            // 'user_id'=> ['required'],
            'profile_image'=>['file'],
            'full_name' => ['required', 'string', 'max:255'],
            'address' => ['required'],
            'phone_no' => ['required', 'string'],
            'guardian_name1' => ['required', 'string'],
            'gphone_no1' => ['required', 'string'],
            'guardian_name2' => ['string'],
            'gphone_no2' => ['string']
        ]);

        // dd($input);

        // dd($request);
        // auth()->user()->profiles()->create($input);
        if(request('profile_image')){
            $input['profile_image'] = request('profile_image')->store('profiles');
            // $profile->profile_image = $input['profile_image'];
        }

        // if(request()->file('profile_image')){
        //     $file = request()->file('profile_image');
        //     $filename ='profiles/'. time().'.'.$file->getClientOriginalExtension();
        //     $file->move('storage/profiles',$filename);
        //     // $profile->file = $filename;
        // }

        $input = Profile::create([
            'user_id'=>$user_id,
            'full_name' => $input['full_name'],
            'address' => $input['address'],
            'phone_no' => $input['phone_no'],
            'guardian_name1' => $input['guardian_name1'],
            'gphone_no1' => $input['gphone_no1'],
            'guardian_name2' => $input['guardian_name2'],
            'gphone_no2' => $input['gphone_no2'],
            'profile_image' => $input['profile_image'],
        ]);
        // dd($input);
        

        // $insertedId = $input->id;
        // $inputs2 = User::with('roles')->get($inputs->id);

        // dd($inputs2);
        // session()->flash('user-created-message', 'User '.$inputs['username'].' was created');
        
        // return redirect()->route('profile.index');
        // }
        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // //
        // $users = User::all();
        // return view('admin.uac',['users'=>$users]);
        $role_id = null;
        $user_id = auth()->user()->id;
        // dd($user_id);

        // $rolesss = Role::with('users')->where('id', $user_id)->get();
        $user_roles = User::with('roles')->where('id', $user_id)->get();
        // $use = $role->roles()->get();
        
        // $use =  $role->fresh('roles');
        $profile = Profile::where('user_id', $user_id)->first();
        // dd($profile);

        // dd($profile);
        // dd($role->toJson());
        // dd($role->toArray());
        // dd($role);
        // dd($role->toArray());
        // $roles = array();
        // array_map(function($item) use (&$roles) {
        //     $roles[$item['id']] = $item;
        // }, User::with('roles')->where('id', $user_id)->get()->toArray());
        // dd($roles);

        // $user_roles = $role['roles'];   
        // dd($user_roles);

        foreach($user_roles as $user){
            foreach($user->roles as $role){
                $role_id = $role->id;
            }
        }
        


        return view('profile.index',[
            'user'=>$user,
            'user_roles'=>$user_roles,
            'profile'=>$profile,
            'role_id'=>$role_id
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //

        $profile = Profile::where('user_id', $user->id)->first();
        // dd($profile);

        $input = request()->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'profile_image'=>['file'],
            'address' => ['required'],
            'phone_no' => ['required', 'string'],
            'guardian_name1' => ['required', 'string'],
            'gphone_no1' => ['required', 'string'],
            'guardian_name2' => ['string'],
            'gphone_no2' => ['string']
        ]);

        // if(request('profile_image')){
        //     $inputs['profile_image'] = request('profile_image')->store('profiles');
        //     $profile->profile_image = $inputs['profile_image'];
        // }

        if(request()->file('profile_image')){
            $file = request()->file('profile_image');
            $filename ='profiles/'. time().'.'.$file->getClientOriginalExtension();
            $file->move('storage/profiles',$filename);
            $profile->file = $filename;
        }
        $profile->update([
            'full_name' => $input['full_name'],
            'address' => $input['address'],
            'phone_no' => $input['phone_no'],
            'guardian_name1' => $input['guardian_name1'],
            'gphone_no1' => $input['gphone_no1'],
            'guardian_name2' => $input['guardian_name2'],
            'gphone_no2' => $input['gphone_no2'],
        ]);

        // dd($profile);
        // $user->update();
        // $this->authorize('update', $notice);


        // return  redirect()->route('admin.user.index');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        //
        $inputs = request()->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update([
            'password' => Hash::make($inputs['password']),
        ]);
        // $user->update();
        // $this->authorize('update', $notice);


        // return  redirect()->route('admin.user.index');
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
