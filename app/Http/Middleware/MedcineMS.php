<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use DB;
use Closure;

class MedcineMS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = Auth::user()->id;

        $data = DB::table('role_users')
        ->join('users', 'users.id', '=', 'role_users.id')
        ->select('role_users.role_id')
        ->where('role_users.user_id' , '=' , $id)
        ->first();

        if($data->role_id == 2)
        {  
            return $next($request);
        }else
        {
            abort(403);
        }
    }
}
