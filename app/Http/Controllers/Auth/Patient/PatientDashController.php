<?php

namespace App\Http\Controllers\Auth\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;



class PatientDashController extends Controller
{
    /**
     * Where to redirect users after registration.
     *

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function ShowDashboard()
    {
        // return view('auth.medcine.register' , [
        //     'Specialite' => Specialite::all()
        // ]);
        $id = Auth::user()->id;

        $data = DB::table('specialite_medcines')
        ->join('dossier_medicals', 'specialite_medcines.user_id', '=', 'dossier_medicals.medcine')
        ->join('specialites', 'specialite_medcines.specialite_id', '=', 'specialites.id')
        ->select('specialites.nom','dossier_medicals.patient')
        ->where('dossier_medicals.patient' , '=' , $id)
        ->distinct()
        ->get();

        $nom = DB::table('users')
        ->join('images', 'users.id', '=', 'images.user_id')
        ->select('users.nom','users.prenom','images.src')
        ->where('users.id' , '=' , $id)
        ->get();

        $conseil = DB::table('conseils')
        ->join('dossier_medicals', 'conseils.dossier_medical', '=', 'dossier_medicals.id')
        ->select(DB::raw('count(conseil) as tot , conseils.dossier_medical'))
        ->where('dossier_medicals.patient' , '=' , $id)
        ->where('conseils.isDeleted' , '=' , '0')
        ->where('conseils.isRead' , '=' , '0')
        ->get();

        $conseiln = DB::table('conseils')
        ->join('dossier_medicals', 'conseils.dossier_medical', '=', 'dossier_medicals.id')
        ->select('conseils.dossier_medical', 'conseils.created_at')
        ->where('dossier_medicals.patient' , '=' , $id)
        ->where('conseils.isDeleted' , '=' , '0')
        ->where('conseils.isRead' , '=' , '0')
        ->get();


        return view('auth.patient.home' , 
        [
        'data' => $data,
        'nom' => $nom,
        'conseil' => $conseil,
        'conseiln' => $conseiln,
        ]);
    }



    public function dmsp(Request $request)
    {
        $dmss = DB::table('specialite_medcines')
        ->join('dossier_medicals', 'specialite_medcines.user_id', '=', 'dossier_medicals.medcine')
        ->join('specialites', 'specialite_medcines.specialite_id', '=', 'specialites.id')
        ->select('dossier_medicals.id', 'dossier_medicals.objet', 'dossier_medicals.analyseRequis', 'dossier_medicals.medcine', 'dossier_medicals.dateFin')
        ->where('dossier_medicals.patient' , '=' , $request->id)
        ->where('specialites.nom' , '=' , $request->nom)
        ->get();
        
                        
        return response()->json([
            'dmss' => $dmss,
        ]); 
    }

}