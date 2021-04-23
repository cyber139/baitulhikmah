<?php

namespace App\Http\Controllers;


use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


    public function uac()
    {
        //
        // $users = User::all();
        // $roles = Role::all();
        // $users = User::with(['roles'])->get();
        $users = User::with('roles')->get();
        // $users = DB::table('users')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();

        // return view('admin.uac.index',['users'=>$users,'roles'=>$roles]);

        // dd($users);
        return view('admin.uac.index',['users'=>$users]);
    }

    public function uac_edit(User $user)
    {
        //
        $users = User::with('roles')->get();
        $selectRoles = Role::all();
        return view('admin.uac.edit',['user'=>$user,'selectRoles'=>$selectRoles]);
    }

    public function uac_update()
    {
        //
        $user = User::all();

        session()->flash('user-updated-message', 'Post '.$user['username'].' was updated');
        return view('admin.uac.edit',['user'=>$user]);
    }

    public function uac_create()
    {
        //
        $user = User::all();

        // session()->flash('notice-updated-message', 'Post '.$user['username'].' was created');
        
        return view('admin.uac.create',['user'=>$user]);
    }

    public function uac_store(Request $request)
    {
        //
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'isActive' =>['required'],
            'role' => ['required']
        ]);

        $inputs = User::create([
            'username' => $inputs['username'],
            'email' => $inputs['email'],
            'password' => Hash::make($inputs['password']),
            'isActive'=>$inputs['isActive']
        ]);

        session()->flash('user-created-message', 'User '.$inputs['username'].' was created');
        
        return redirect()->route('admin.uac.index');
    }

    public function uac_delete(User $user ,Request $request)
    {
        //
        $user->delete();

        $request->session()->flash('message', 'User '.$user['username'].' was deleted');

        return back();
    }

    public function attach(User $user){

        $user->roles()->attach(request('role'));
        return back();

    }

    public function detach(User $user){

        $user->roles()->detach(request('role'));
        return back();

    }

    public function status(User $user)
    {
        // dd($user);
        $inputs = request()->validate([
            'isActive' => ['required'],
        ]);

        // $user->isActive = $inputs['isActive'];
        // $user->update();
        // return redirect()->route('admin.uac.edit');

        // $user->update([
        //     'isActive' => $user['isActive'],
        // ]);
        // $user->update();
        // $this->authorize('update', $notice);

        $user->isActive = $inputs['isActive'];
        $user->save();

        // return  redirect()->route('admin.user.index');
        return back();
    }
}
