<?php

namespace App\Http\Controllers\DM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Conseil,Specialite};
use DB;
use File;
use Illuminate\Support\Facades\Auth;



class ConseilController extends Controller
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
    // public function store(Request $request)
    // {

    //     $c = new Conseil();

    //     $c->conseil = $request->conseil;
    //     $c->dossier_medical = $request->id;

    //     $c->save();

    //     $specialite = DB::table('specialites')
    //     ->where('nom', 'not like', 'Radiologie')
    //     ->where('nom', 'not like', 'Laboratoir d\'Analyse')
    //     ->SELECT('*')
    //     ->GET();

    //     return view('dossierMedicale.patient.dm' ,
    //     ['objet' => $request->objet ,
    //     'id' => $request->id ,
    //     'Specialite' => $specialite
    //     ]);
    // }

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

    public function blobmp3(Request $request)
    {
        $c = new Conseil();

        
        if (File::exists($request->blob))
        {
            $tmp = $request->file('blob');
            $input['blobname'] = time() . '.' . 'mp3';
            $despath = public_path('/blobmp3file');
            $tmp->move($despath , $input['blobname']);
            $c->dossier_medical = $request->id;
            $c->conseil = "blobmp3file/".$input['blobname'];
            $c->isDeleted = 0;
            $res = $c->save();
        }

        $conseils = DB::table('conseils')
        ->select('*')
        ->where('conseil' , '=' , $c->conseil)
        ->GET();

        return response()->json([
            'conseils' => $conseils,
        // ], 200); 
        ]); 
    } 

    
    public function supprimer(Request $request)
    {
        DB::table('conseils')
        ->where('id' , '=' , $request->id)
        ->update(['isDeleted' => '1' ]);
    }

    public function read(Request $request)
    {
        $id = Auth::user()->id;

        $exist = DB::table('patients')
        ->select('patients.id')
        ->where('patients.user_id' , '=' , $id)
        ->first();


        if (isset($exist)) {
        DB::table('conseils')
        ->join('dossier_medicals', 'conseils.dossier_medical', '=', 'dossier_medicals.id')
        ->where('dossier_medicals.id' , '=' , $request->id)
        ->update(['isRead' => '1' ]);
        }
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

