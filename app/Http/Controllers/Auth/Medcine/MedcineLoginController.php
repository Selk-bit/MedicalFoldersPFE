<?php

namespace App\Http\Controllers\Auth\Medcine;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use DB;
class MedcineLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo()
    {

        $id = Auth::user()->id;
       
        $data = DB::table('role_users')
        ->join('users', 'users.id', '=', 'role_users.id')
        ->select('role_users.role_id')
        ->where('role_users.user_id' , '=' , $id)
        ->first();

        if($data->role_id == 3)
        {  
            return '/medcine/homeRA';
        }elseif($data->role_id == 2)
        {
            return '/medcine/homeMS';
        }else
        {
            return '/medcine/pharmacien';
        }
    }



    public function showLoginForm()
    {
        return view('auth.medcine.login');
    }

    public function username()
    {
        return 'name';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
