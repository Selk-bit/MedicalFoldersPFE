<?php

namespace App\Http\Controllers\DM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\{DossierMedical,Specialite,User,Patient,Image,Mutuelle,MutuellePatient,RoleUser ,SpecialiteMedcine ,Medcine};


class DossierMedicale extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function RA($id)
    {
        // return $id;
        $RadioAnalyse = DB::table('radio_analyses')
                        ->select('*')
                        ->where('dossier_medical' , '=' , $id)
                        ->GET();
                        
        return response()->json([
            'RadioAnalyse' => $RadioAnalyse,
        // ], 200); 
        ]); 
    }

    public function R($id)
    {
        // return $id;
        $rapports = DB::table('rapports')
                        ->select('*')
                        ->where('dossier_medical' , '=' , $id)
                        ->GET();
                        
        return response()->json([
            'rapports' => $rapports,
        // ], 200); 
        ]); 
    }

    public function RE($id)
    {
        // return $id;
        $redirections = DB::table('redirections')
                        ->select('*')
                        ->where('dossier_medical' , '=' , $id)
                        ->GET();

        return response()->json([
            'redirections' => $redirections,
        // ], 200); 
        ]); 
    }

    public function OM($id)
    {
        $ordennance_medicals = DB::table('ordennance_medicals')
                        ->select('*')
                        ->where('dossier_medical' , '=' , $id)
                        ->GET();
                        
        return response()->json([
            'ordennance_medicals' => $ordennance_medicals,
        // ], 200); 
        ]); 
    }

    public function CCC($id)
    {
        $controle_consultations = DB::table('controle_consultations')
                        ->select('*')
                        ->where('dossier_medical' , '=' , $id)
                        ->GET();
                        
        return response()->json([
            'controle_consultations' => $controle_consultations,
        // ], 200); 
        ]); 
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create($p_id)
    // {
    //     return view('dossierMedicale.CRUD.create' , ['id_p' => $p_id]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dm = new DossierMedical;
        $id = Auth::user()->id;
    
        $dm->objet = $request->objet;
        $dm->analyseRequis = 0;
        $dm->medcine = $id;
        $dm->patient = $request->id_p;

        $dm->save();    

        $Specialite = DB::table('specialites')
            ->where('nom', 'not like', 'Radiologie')
            ->where('nom', 'not like', 'Laboratoir d\'Analyse')
            ->SELECT('*')
            ->GET();

        $RadioAnalyse = DB::table('radio_analyses')
                        ->select('*')
                        ->GET();

            return view('dossierMedicale.patient.dm' ,
                    ['objet' => $request->objet ,
                    'id' => $dm->id ,
                    'Specialite' => $Specialite,
                    ]);
        // $specialite = DB::table('specialites')
        //     ->where('nom', 'not like', 'Radiologie')
        //     ->where('nom', 'not like', 'Laboratoir d\'Analyse')
        //     ->SELECT('*')
        //     ->GET()->toJson();

        // return view('dossierMedicale.patient.dm' ,
        // ['objet' => $request->objet ,
        // 'id' => $dm->id ,
        // 'Specialite' => $Specialite
        // ]);

// the guy from stack
        // $specialite =  $Specialite->toJson();

        // return response()->json([
        //     'objet' => $request->objet ,
        //     'id' => $dm->id ,
        //     'specialite' => $specialite
        // ], 200);


        //tooo old
        // return redirect()->route('GETDM', [
        // 'objet' => $request->objet ,
        // 'id' => $dm->id ,
        // 'Specialite' => $specialite
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_p)
    {
 
        $data = DB::table('specialite_medcines')
        ->join('dossier_medicals', 'specialite_medcines.user_id', '=', 'dossier_medicals.medcine')
        ->join('specialites', 'specialite_medcines.specialite_id', '=', 'specialites.id')
        ->select('*')
        ->where('dossier_medicals.patient' , '=' , $id_p)
        ->get();

        return view('dossierMedicale.patient.historique' , ['data' => $data]);
    }

    public function Consulter(Request $request)
    {
 
        $data = DB::table('dossier_medicals')
        ->select('*')
        ->where('dossier_medicals.id' , '=' , $request->id)
        ->get();

        $rapport = DB::table('rapports')
        ->select('*')
        ->where('rapports.dossier_medical' , '=' , $request->id)
        ->get();

        $RadioAnalyse = DB::table('radio_analyses')
        ->select('*')
        ->where('radio_analyses.dossier_medical' , '=' , $request->id)
        ->get();

        $files = \DB::select('SELECT src, radioAnalyse_id, F.isDeleted FROM files F , radio_analyses RA , dossier_medicals D
        where F.radioAnalyse_id = RA.id 
        and  RA.dossier_medical = D.id');

        $Conseil = DB::table('conseils')
        ->select('*')
        ->where('conseils.dossier_medical' , '=' , $request->id)
        ->get();

        $Ordennance = DB::table('ordennance_medicals')
        ->select('*')
        ->where('ordennance_medicals.dossier_medical' , '=' , $request->id)
        ->get();

        $Controle = DB::table('controle_consultations')
        ->select('*')
        ->where('controle_consultations.dossier_medical' , '=' , $request->id)
        ->get();

        $Redirection = DB::table('redirections')
        ->select('*')
        ->where('redirections.dossier_medical' , '=' , $request->id)
        ->get();



        return view('dossierMedicale.patient.consulter' , [
            'data' => $data,
            'rapport' => $rapport,
            'RadioAnalyse' => $RadioAnalyse,
            'Conseil' => $Conseil,
            'Ordennance' => $Ordennance,
            'Controle' => $Controle,
            'files' => $files,
            'Redirection' => $Redirection           
            ]);
    }

    
    public function Modifier(Request $request)
    {
 
        $objet = DB::table('dossier_medicals')
        ->select('dossier_medicals.Objet')
        ->where('dossier_medicals.id' , '=' , $request->id)
        ->get();


        $rapport = DB::table('rapports')
        ->select('*')
        ->where('rapports.dossier_medical' , '=' , $request->id)
        ->get();

        $RadioAnalyse = DB::table('radio_analyses')
        ->select('*')
        ->where('radio_analyses.dossier_medical' , '=' , $request->id)
        ->get();

        $files = \DB::select('SELECT src, radioAnalyse_id, F.isDeleted FROM files F , radio_analyses RA , dossier_medicals D
        where F.radioAnalyse_id = RA.id 
        and  RA.dossier_medical = D.id');

        $Conseil = DB::table('conseils')
        ->select('*')
        ->where('conseils.dossier_medical' , '=' , $request->id)
        ->get();

        $Ordennance = DB::table('ordennance_medicals')
        ->select('*')
        ->where('ordennance_medicals.dossier_medical' , '=' , $request->id)
        ->get();

        $Controle = DB::table('controle_consultations')
        ->select('*')
        ->where('controle_consultations.dossier_medical' , '=' , $request->id)
        ->get();

        $Redirection = DB::table('redirections')
        ->select('*')
        ->where('redirections.dossier_medical' , '=' , $request->id)
        ->get();

        $Specialite = DB::table('specialites')
        ->where('nom', 'not like', 'Radiologie')
        ->where('nom', 'not like', 'Laboratoir d\'Analyse')
        ->SELECT('*')
        ->GET();




        return view('dossierMedicale.patient.Modifier' , [
            'objet' => $objet,
            'Specialite' => $Specialite,
            'RadioAnalyse' => $RadioAnalyse, 
            'rapport' => $rapport, 
            'Redirection' => $Redirection, 
            'Ordennance' => $Ordennance, 
            'Controle' => $Controle, 
            'Conseil' => $Conseil, 
            'files' => $files,
            'id' => $request->id        
            ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('dossier_medicals')
        ->where('id', $request->id)
        ->update(['dateFin' => $request->dateFin ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
    
    public function newPatient()
    {
            // return view('auth.patient.register');
            $data =  DB::table('mutuelles')->get();
            return view('auth.patient.register2')->withData(json_encode($data));
        }
        
        
        public function register(Request $request)
        {
            $flg = Auth::user()->id;
            
            $roleFlg = \DB::select('SELECT role_users.role_id from role_users , users where role_users.user_id = users.id and users.id = ?' , [$flg]);
            
            
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
        
        return $roleFlg[0]->role_id;
        
    }
}