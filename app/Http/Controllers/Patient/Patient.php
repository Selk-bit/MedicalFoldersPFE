<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;


class Patient extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMS()
    {
        $data = DB::table('users')
        ->join('role_users', 'role_users.user_id', '=', 'users.id')
        // ->select('*')
        ->select('users.id as Uid' , 'users.name' , 'users.nom' , 'users.prenom')
        ->where('role_users.role_id' , '=' , '1')
        ->get();//katrj3 bzf o sa7a f blade.php
        // ->first();//katrj3 w7da o sa7a f controller , midlleware etc etc etc s 

        $role = 0;
        return view('dossierMedicale.patient.index' , ['data' => $data , 'role' => $role]);
    }

    public function indexRA()
    {
        $data = DB::table('users')
        ->join('role_users', 'role_users.user_id', '=', 'users.id')
        ->join('dossier_medicals', 'dossier_medicals.patient', '=', 'users.id')
        ->join('radio_analyses' , 'radio_analyses.dossier_medical' , '=','dossier_medicals.id')
        ->select('users.id as Uid' , 'users.name' , 'users.nom' , 'users.prenom' , 'radio_analyses.id as RAid' , 'dossier_medicals.Objet')
        ->where('role_users.role_id' , '=' , '1')
        ->where('analyseRequis' , '=' , '1')
        ->get();

        $role = 1;
        return view('dossierMedicale.patient.index' , ['data' => $data , 'role' => $role]);
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
        //
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
    public function update(Request $request, $id)
    {
        //
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
