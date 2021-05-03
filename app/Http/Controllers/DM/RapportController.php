<?php

namespace App\Http\Controllers\DM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Rapport,Specialite};
use Illuminate\Support\Facades\Validator;
use DB;

class RapportController extends Controller
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

        // $this->validate($request, [
        //     'titre' => 'required',
        //     'description' => 'required'
        // ]);hada howa li fih drama d POST Support o GET la2

        $rapport = new Rapport();

        $rapport->titre = $request->titreR;
        $rapport->description = $request->description;
        $rapport->dossier_medical = $request->id;
        $rapport->isDeleted = 0;
        
        // dd($request);
        $rapport->save();
        
        
        // $specialite = DB::table('specialites')
        //                 ->where('nom', 'not like', 'Radiologie')
        //                 ->where('nom', 'not like', 'Laboratoir d\'Analyse')
        //                 ->SELECT('*')
        //                 ->GET();

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
        DB::table('rapports')
        ->where('id', $request->id)
        ->update(['titre' => $request->titre , 'description' => $request->description ]);
    }

    public function supprimer(Request $request)
    {
        DB::table('rapports')
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
