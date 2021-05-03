<?php

namespace App\Http\Controllers\Auth\Patient;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\{User,Patient,Image,Mutuelle,MutuellePatient,RoleUser};
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use File;
use DB;

use Illuminate\Http\Request;

class PatientRegisterController extends Controller
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
        // return view('auth.patient.register' , [
        //     'Mutuelle' => Mutuelle::all()
        // ]);
        $data =  DB::table('mutuelles')->get();
        return view('auth.patient.register')->withData(json_encode($data));
    }

    

    public function register(Request $request)
    {

        $this->validate($request, [
            // 'cin' => 'bail|required|between:6,20',
            // 'password' => 'bail|required|between:8,255',
            // 'nom' => 'bail|required|max:255',
            // 'prenom' => 'bail|required|max:255',
            // 'dateNaissance' => 'bail|required|date',
            // 'tel' => 'bail|required|digits_between:10,20',
            // 'tel' => 'bail|required|digits_between:10,20',
            'cin' => 'bail|required|unique:patients',
            'tel' => 'bail|required|unique:users',
            'email' => 'bail|required|string|email|max:255|unique:users',
            // 'image' => 'image| mimes:jpeg,png,jpg,gif,svg |max:4096'
        ]);
    
        $patient = new Patient();
        $user = new User();
        $image = new Image();
        $mutuellePatient = new MutuellePatient();
        $roleUser = new RoleUser();


        $user->name = $request->input('cin');
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
        
        $patient->sexe = $request->input('sexe');
        $patient->profession = $request->input('profession');
        $patient->etatCivil = $request->input('etatCivil');
        $patient->cin = $request->input('cin');
        $patient->user_id = $user->id;
        $patient->save();


        $mutuellePatient->mutuelle_id = $request->input('mutuelle');        
        $mutuellePatient->user_id = $user->id;
        $mutuellePatient->save();
           
        $image->src = "img/avatar.png";
        $image->user_id = $user->id;
        $image->save();

        $roleUser->user_id = $user->id;
        $roleUser->role_id = '1';
        $roleUser->save();
        
        // return view('auth.patient.login');
        return ['redirect' => route('patient.login')];
    }
}
