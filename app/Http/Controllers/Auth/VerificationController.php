<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use DB;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        }else
            if($data->role_id == 1)
            {
                return '/patient/home';
            }else
                if($data->role_id == 2)
                {
                    return '/medcine/homeMS';
                }else
                {
                    return '/medcine/pharmacien';
                }
    }

    public function UpdateEmail(Request $request)
    {
        $id = Auth::user()->id;

        DB::table('users')
        ->where('users.id' , '=' , $id)
        ->update(['email' => $request->cng ]);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
