<?php

namespace App\Http\Controllers\DM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{RadioAnalyse,File,DossierMedical,Specialite,FileMedRes};
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class RadioAnalyseController extends Controller
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
    public function storeMS(Request $request)
    {
        // $var = dd($request);
        // return "$var";

        $ra = new RadioAnalyse;

        $ra->dossier_medical = $request->id;
        $ra->titre = $request->titre;
        $ra->description = $request->description;
        $ra->type = $request->type;
        $ra->etat = 0;
        $ra->isDeleted = 0;


        DB::table('dossier_medicals')
            ->where('id', $request->id)
            ->update(['analyseRequis' => 1]);

        $ra->save();

        $specialite = DB::table('specialites')
        ->where('nom', 'not like', 'Radiologie')
        ->where('nom', 'not like', 'Laboratoir d\'Analyse')
        ->SELECT('*')
        ->GET();

        $RadioAnalyse = DB::table('radio_analyses')
        ->select('*')
        ->GET();
        
        
        return view('dossierMedicale.patient.dm' ,
        ['objet' => $request->objet ,
        'id' =>$request->id,
        'Specialite' => $specialite,
        'RadioAnalyse' => $RadioAnalyse
        ]);

        // return response()->json(['success'=>'Form is successfully submitted!'], 200);

    }


    public function storeRA(Request $request)
    {

        $f = new File();
        $fmr = new FileMedRes();

        $tmp = $request->file('pdf');
        $input['pdfname'] = time() . '.' . 'pdf';
        $despath = public_path('/pdfFiles');
        $tmp->move($despath , $input['pdfname']);

        $f->src = "pdfFiles/".$input['pdfname'];
        $f->radioAnalyse_id = $request->raid;
        $f->isRead = 0;
        $f->isDeleted = 0;



        DB::table('radio_analyses')
            ->where('id', $request->raid)
            ->update(['etat' => '1']);
        


        $f->save();

        $id = Auth::user()->id;
        $fmr->user_id = $id;
        $fmr->file_id = $f->id;
        $fmr->save();



        // return redirect()->action('MedecinDashController@ShowDashboardRA');

        
        $datap = DB::table('users')
        // $data = DB::table('users')
        ->join('dossier_medicals', 'dossier_medicals.patient', '=', 'users.id')
        ->join('radio_analyses' , 'radio_analyses.dossier_medical' , '=','dossier_medicals.id')
        ->join('images', 'images.user_id', '=', 'users.id')
        ->select('users.id as PatientId', 'users.name as cin' , 'users.nom' , 'users.prenom' , 'radio_analyses.id as RAid' , 'radio_analyses.titre','images.src')
        ->where('etat' , '=' , '0')
        ->get();

        $datapu = DB::table('users')
            ->join('dossier_medicals', 'dossier_medicals.patient', '=', 'users.id')
            ->join('radio_analyses' , 'radio_analyses.dossier_medical' , '=','dossier_medicals.id')
            ->join('images', 'images.user_id', '=', 'users.id')
            ->join('files', 'radio_analyses.id', '=', 'files.radioAnalyse_id')
            ->select('users.id as PatientId', 'users.name as cin' , 'users.nom' , 'users.prenom' , 'radio_analyses.id as RAid' , 'radio_analyses.titre', 'images.src', 'files.id as Fid')
            ->where('etat' , '=' , '1')
            ->where('files.isDeleted' , '=' , '0')
            ->get();
        

        return response()->json([
            'datap' => $datap,
            'datapu' => $datapu,
        ]); 
        // return $data;
        // return response()->$data;



        // return view('dossierMedicale.patient.dm' ,
        // ['objet' => $request->objet ,
        // 'id' =>$request->id,
        // ]);
    }

    public function read(Request $request)
    {

        DB::table('files')
        ->where('files.radioAnalyse_id' , '=' , $request->id)
        ->update(['isRead' => '1' ]);
    }

    public function updatefileRA(Request $request)
    {

        $tmp = $request->file('pdf1');
        $input['pdfname'] = time() . '.' . 'pdf';
        $despath = public_path('/pdfFiles');
        $tmp->move($despath , $input['pdfname']);

        DB::table('files')
        ->where('files.radioAnalyse_id' , '=' , $request->raidm)
        ->update(['src' => "pdfFiles/".$input['pdfname'] ]);

    }


    public function deletefileRA(Request $request)
    {

        DB::table('radio_analyses')
            ->where('id', $request->raisp)
            ->update(['etat' => '0']);

        DB::table('files')
            ->where('files.id' , '=' , $request->fid)
            ->update(['isDeleted' => '1' ]);

        $datap = DB::table('users')
            // $data = DB::table('users')
            ->join('dossier_medicals', 'dossier_medicals.patient', '=', 'users.id')
            ->join('radio_analyses' , 'radio_analyses.dossier_medical' , '=','dossier_medicals.id')
            ->join('images', 'images.user_id', '=', 'users.id')
            ->select('users.id as PatientId', 'users.name as cin' , 'users.nom' , 'users.prenom' , 'radio_analyses.id as RAid' , 'radio_analyses.titre','images.src')
            ->where('etat' , '=' , '0')
            ->get();
    
        $datapu = DB::table('users')
            ->join('dossier_medicals', 'dossier_medicals.patient', '=', 'users.id')
            ->join('radio_analyses' , 'radio_analyses.dossier_medical' , '=','dossier_medicals.id')
            ->join('images', 'images.user_id', '=', 'users.id')
            ->join('files', 'radio_analyses.id', '=', 'files.radioAnalyse_id')
            ->select('users.id as PatientId', 'users.name as cin' , 'users.nom' , 'users.prenom' , 'radio_analyses.id as RAid' , 'radio_analyses.titre', 'images.src', 'files.id as Fid')
            ->where('etat' , '=' , '1')
            ->where('files.isDeleted' , '=' , '0')
            ->get();
            
    
            return response()->json([
                'datap' => $datap,
                'datapu' => $datapu,
            ]); 
    

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    // public function update(Request $request, $id)
    public function update(Request $request)
    {
        DB::table('radio_analyses')
        ->where('id', $request->id)
        ->update(['titre' => $request->titre , 'description' => $request->description, 'type' => $request->type ]);
        
        // return view('dossierMedicale.patient.dm' ,
        // ['objet' => $request->objet ,
        // 'id' =>$request->id,
        // 'Specialite' => $specialite,
        // 'RadioAnalyse' => $RadioAnalyse
        // ]);
    }

    public function supprimer(Request $request)
    {
        DB::table('radio_analyses')
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
