<?php

namespace App\Http\Controllers\DM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{OrdennanceMedical,Specialite};
use DB;

class OrdenanceController extends Controller
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
        $om = new OrdennanceMedical();   

        $om ->medicamentsModeEmploi = $request->medicamentsModeEmploi;
        $om->dossier_medical = $request->id;
        $om->isDeleted = 0;


        $om->save();

        // $specialite = DB::table('specialites')
        // ->where('nom', 'not like', 'Radiologie')
        // ->where('nom', 'not like', 'Laboratoir d\'Analyse')
        // ->SELECT('*')
        // ->GET();


        // return view('dossierMedicale.patient.dm' ,
        // ['objet' => $request->objet ,
        // 'id' =>$request->id,
        // 'Specialite' => $specialite
        // ]);

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
    public function update(Request $request)
    {
        DB::table('ordennance_medicals')
        ->where('id', $request->id)
        ->update(['medicamentsModeEmploi' => $request->medicamentsModeEmploi ]);
        
    }

    public function supprimer(Request $request)
    {
        DB::table('ordennance_medicals')
        ->where('id' , '=' , $request->id)
        ->update(['isDeleted' => '1' ]);
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
}
