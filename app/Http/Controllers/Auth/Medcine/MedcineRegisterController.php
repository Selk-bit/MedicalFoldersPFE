<?php

namespace App\Http\Controllers\Auth\Medcine;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\{User,Specialite,SpecialiteMedcine,Medcine,Image,RoleUser};
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use File;
use Illuminate\Http\Request;
use DB;

class MedcineRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function ShowRegisterForm()
    {
        // return view('auth.medcine.register' , [
        //     'Specialite' => Specialite::all()
        // ]);

        $data =  DB::table('specialites')->get();
        return view('auth.medcine.register')->withData(json_encode($data));

    }

    public function register(Request $request)
    {
        $this->validate($request, [
            //ALL the validators beloow are redifined in React
            // 'inp' => 'bail|required|between:6,20',
            // 'password' => 'bail|required|between:8,255',
            // 'nom' => 'bail|required|max:255',
            // 'prenom' => 'bail|required|max:255',
            // 'dateNaissance' => 'bail|required|date',
            // 'tel' => 'bail|required|digits_between:10,20',
            'inp' => 'bail|required|unique:medcines',
            'tel' => 'bail|required|unique:users',
            'email' => 'bail|required|string|email|max:255|unique:users',
            // 'Specialite' =>'bail|required',
            // 'image' => 'image| mimes:jpeg,png,jpg,gif,svg |max:4096'
            ]);
            
        $medcine = new Medcine();
        $specialiteMedcine = new SpecialiteMedcine();
        $user = new User();
        $image = new Image();
        $roleUser = new RoleUser();
            
        $user->name = $request->input('inp');
        $value = $request->input('password');
        bcrypt($value);
        $user->password = bcrypt($value);
        $user->email = $request->input('email');
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->dateNaissance = $request->input('dateNaissance');
        $user->tel = $request->input('tel');
        $user->adress = $request->input('adress');
        $user->save();
        
        $specialiteMedcine->specialite_id = $request->input('Specialite');    
        $specialiteMedcine->user_id = $user->id;
        $specialiteMedcine->save();
        
        $medcine->inp = $request->input('inp');
        $medcine->user_id = $user->id;
        $medcine->save();

        // if (File::exists($request->image))
        // {
            $image->src = "img/avatar.png";
            $image->user_id = $user->id;
            $image->save();
        // }

        $roleUser->user_id = $user->id;
        if($request->input('Specialite') === '1' || $request->input('Specialite') === '2' )
        {
            $roleUser->role_id = '3';
        }elseif($request->input('Specialite') === '46')
        {
            $roleUser->role_id = '4';
        }else
        {
            $roleUser->role_id = '2';
        }

        $roleUser->save();

        // return 'somthing';
        // return [view('auth.medcine.login')];        
        // return view('auth.medcine.login')->withData(json_encode($data));
        // return  response()->json([$request->all()]);

        // return [redirect()->route('medcine.login')];
        return ['redirect' => route('medcine.login')];
        // return Request::all();
    }
}
