<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\{User,MedicamentSansOrdenance,patientPharmacienResponsable};


class CodeMedicament extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        
        $mso = new MedicamentSansOrdenance();
        $mso->codeMedicament = $request->code;
        $mso->save();
                
        $idCodeMed = \DB::select('SELECT id from codemedsnames where code = ?' , [$request->code]);
        
        // $idCodeMed[0]->id;
        
        $ppr = new patientPharmacienResponsable();
        $ppr->patient_id = $request->patId;
        $ppr->pharmacien_id = $id;
        $ppr->codeMedicament_id = $idCodeMed[0]->id;
        
        $ppr->save();
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
