<?php

namespace App\Http\Controllers\DM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;


class Historique extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = Auth::user()->id;

        $data = DB::table('specialite_medcines')
        ->join('dossier_medicals', 'specialite_medcines.user_id', '=', 'dossier_medicals.medcine')
        ->join('specialites', 'specialite_medcines.specialite_id', '=', 'specialites.id')
        ->select('specialites.nom','dossier_medicals.patient')
        ->where('dossier_medicals.patient' , '=' , $request->click)
        ->distinct()
        ->get();


        $meds = \DB::select(' SELECT C.Nom ,CONCAT( U.nom , \' \' , U.prenom ) as pharmacien , APR.created_at from patient_pharmacien_responsables APR , codemedsnames C , users U
                            where APR.codeMedicament_id = C.id
                            and U.id = APR.pharmacien_id
                            and APR.patient_id = ?' , [$request->click]);


        // $meds = DB::table('patient_pharmacien_responsables')
        // ->join('codemedsnames', 'patient_pharmacien_responsables.codeMedicament_id', '=', 'codemedsnames.id')
        // ->select('codemedsnames.nom','patient_pharmacien_responsables.created_at')
        // ->where('patient_pharmacien_responsables.patient_id' , '=' , $request->click)
        // ->distinct()
        // ->get();
        // dd($meds);

        $nom = DB::table('users')
        ->join('images', 'users.id', '=', 'images.user_id')
        ->select('users.nom','users.prenom','images.src')
        ->where('users.id' , '=' , $id)
        ->get();
                        
        return view('dossierMedicale.patient.historique' , 
        [
        'data' => $data,
        'nom' => $nom,
        'meds' => $meds,
        'id' => $id
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
    public function dms(Request $request)
    {


        $dmss = DB::table('specialite_medcines')
        ->join('dossier_medicals', 'specialite_medcines.user_id', '=', 'dossier_medicals.medcine')
        ->join('specialites', 'specialite_medcines.specialite_id', '=', 'specialites.id')
        ->join('users', 'dossier_medicals.patient', '=', 'users.id')
        ->select('dossier_medicals.id', 'dossier_medicals.objet', 'dossier_medicals.analyseRequis', 'dossier_medicals.medcine', 'dossier_medicals.dateFin' , 'users.nom' , 'users.prenom')
        // ->select('*')
        ->where('dossier_medicals.patient' , '=' , $request->id)
        ->where('specialites.nom' , '=' , $request->nom)
        ->get();
        
        // dd($dmss);
                        
        return response()->json([
            'dmss' => $dmss,
        ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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
    // public function update(Request $request, $id)
    // {
    //     //
    // }

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
}
