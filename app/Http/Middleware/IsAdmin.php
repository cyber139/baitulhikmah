<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;
use App\User;
use App\Role;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     return $next($request);
    // }

    // public function handle($request, Closure $next)
    // {
    //     if (Auth::user() &&  Auth::user()->admin == 1) {
    //             return $next($request);
    //     }

    //     return redirect('/');
    // }

    public function handle($request, Closure $next)
    {
        // $UserRoles = DB::table('roles')->join('role_user','role_id', '=', 'roles.id')->where('user_id', '=', Auth::user()->id);
        $UserRoles = User::with('roles')->find(Auth::user()->id);
        
        // dd($UserRoles->roles);
        $isAdmin = false;
        // dd(!$isAdmin);
        
        if($UserRoles->roles->isNotEmpty()){
            // dd($UserRoles);

            foreach($UserRoles as $role)
            {
                // dd($role);
                if($role == 'admin')
                {
                    // dd($role);
                    $isAdmin = true;
                }
            }
        }
        // dd($isAdmin);
    
        // if( ! $isAdmin )
        // {
        //     if ($request->ajax()) {
        //         return response('Unauthorized.', 401);
        //     } else {
        //         return redirect()->back(); 
        //     }
        // }
    
        // return $next($request);

        if($isAdmin!=true){
            // dd($isAdmin);
            

                // return response("Unauthorized Page",401);
                abort(401, 'Unauthorized');
                // return response()->view('error.error401');

            
        }

        return $next($request);
        
    }

    
}
