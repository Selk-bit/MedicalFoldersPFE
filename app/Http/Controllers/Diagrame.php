<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use DB;


class Diagrame extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    // public function testasd(Request $request)
    // {
    //     dd($request);
    // }

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
    public function update(Request $request)
    {
        
        $id = Auth::user()->id;

        // $d1 = \DB::select("SELECT COUNT(*) as tot1 FROM dossier_medicals where created_at BETWEEN '?' and '?' and medcine = ?" ,[$request->today] ,[$request->tomorrow] ,[$id]);

        $d0 = DB::table('dossier_medicals')
           ->whereBetween('created_at', [$request->today, $request->tomorrow])
           ->where('medcine' , '=' , $id)
           ->count();

        $d1 = DB::table('dossier_medicals')
           ->whereBetween('created_at', [$request->yesterday, $request->today])
           ->where('medcine' , '=' , $id)
           ->count();
        
        $d2 = DB::table('dossier_medicals')
           ->whereBetween('created_at', [$request->yesterdayx2, $request->yesterday])
           ->where('medcine' , '=' , $id)
           ->count();

        $d3 = DB::table('dossier_medicals')
           ->whereBetween('created_at', [$request->yesterdayx3, $request->yesterdayx2])
           ->where('medcine' , '=' , $id)
           ->count();
     
        $d4 = DB::table('dossier_medicals')
           ->whereBetween('created_at', [$request->yesterdayx4, $request->yesterdayx3])
           ->where('medcine' , '=' , $id)
           ->count();

        $d5 = DB::table('dossier_medicals')
           ->whereBetween('created_at', [$request->yesterdayx5, $request->yesterdayx4])
           ->where('medcine' , '=' , $id)
           ->count();
        
        // $d6 = DB::table('dossier_medicals')
        //    ->whereBetween('created_at', [$request->yesterdayx6, $request->yesterdayx5])
        //    ->where('medcine' , '=' , $id)
        //    ->count();

        $data = array($d5, $d4 , $d3 , $d2 , $d1 , $d0 );

        return json_encode($data);

    }


    public function update2(Request $request)
    {
        
        // $id = Auth::user()->id;

        $d1 = \DB::select("select nom , ( count(*)/(SELECT COUNT(*) from dossier_medicals) * 100) as pourcentage from ( SELECT D.patient, D.medcine , S.nom FROM 
        dossier_medicals D, specialites S, specialite_medcines SM 
        where D.medcine = SM.user_id and S.id = SM.specialite_id ) as sub 
        group by nom ORDER BY pourcentage DESC");

        
        // $data = array($d5, $d4 , $d3 , $d2 , $d1 , $d0 );

        return json_encode($d1);

    }

    public function update3(Request $request)
    {
        
        $d2 = \DB::select("
        select nom , count(*) as tot from ( SELECT DISTINCT D.patient, D.medcine , S.nom FROM 
                            dossier_medicals D, specialites S, specialite_medcines SM 
                            where D.medcine = SM.user_id and S.id = SM.specialite_id ) as sub 
        group by nom ORDER BY tot DESC limit 5");

        return json_encode($d2);

    }

    public function update4(Request $request)
    {
        
        $d3 = \DB::select("
        SELECT CONCAT(U.nom ,' ', U.prenom) as medName , sub.tot from ( SELECT medcine , COUNT(*) as tot from dossier_medicals GROUP by medcine ) as sub , users U
        where U.id = sub.medcine
        ORDER BY tot DESC
        limit 10;");

        return json_encode($d3);

    }

    public function update5(Request $request)
    {
        $id = Auth::user()->id;

        $var = DB::table('specialite_medcines')
            ->join('specialites' , 'specialites.id' , '=' , 'specialite_medcines.specialite_id')
            ->select('specialite_medcines.specialite_id' , 'specialites.nom')
            ->where('user_id' , '=' , $id)
            ->get();
        
        $spe = $var[0]->specialite_id;
        
        $m0 = \DB::select("SELECT count(*) as totY FROM dossier_medicals WHERE month(created_at) like month(CURRENT_DATE()) and medcine = ?" , [$id]);

        $m00 = \DB::select("select totDoss from ( SELECT DISTINCT D.patient , count(*) as totDoss , D.created_at from dossier_medicals D, specialite_medcines SM 
        where D.medcine = SM.user_id 
        and month(D.created_at) like month(CURRENT_DATE())
        and SM.specialite_id = ?) as sub" , [$spe]);

        $m1 = \DB::select("SELECT count(*) as totY FROM dossier_medicals WHERE month(created_at) like month(CURRENT_DATE()) - 1 and medcine = ?" , [$id]);

        $m11 = \DB::select("select totDoss from ( SELECT DISTINCT D.patient , count(*) as totDoss , D.created_at from dossier_medicals D, specialite_medcines SM 
        where D.medcine = SM.user_id 
        and month(D.created_at) like month(CURRENT_DATE()) - 1
        and SM.specialite_id = ?) as sub" , [$spe]);

        $m2 = \DB::select("SELECT count(*) as totY FROM dossier_medicals WHERE month(created_at) like month(CURRENT_DATE()) - 2 and medcine = ?" , [$id]);

        $m22 = \DB::select("select totDoss from ( SELECT DISTINCT D.patient , count(*) as totDoss , D.created_at from dossier_medicals D, specialite_medcines SM 
        where D.medcine = SM.user_id 
        and month(D.created_at) like month(CURRENT_DATE()) - 2
        and SM.specialite_id = ?) as sub" , [$spe]);

        $m3 = \DB::select("SELECT count(*) as totY FROM dossier_medicals WHERE month(created_at) like month(CURRENT_DATE()) - 3 and medcine = ?" , [$id]);

        $m33 = \DB::select("select totDoss from ( SELECT DISTINCT D.patient , count(*) as totDoss , D.created_at from dossier_medicals D, specialite_medcines SM 
        where D.medcine = SM.user_id 
        and month(D.created_at) like month(CURRENT_DATE()) - 3
        and SM.specialite_id = ?) as sub" , [$spe]);

        $m4 = \DB::select("SELECT count(*) as totY FROM dossier_medicals WHERE month(created_at) like month(CURRENT_DATE()) - 4 and medcine = ?" , [$id]);

        $m44 = \DB::select("select totDoss from ( SELECT DISTINCT D.patient , count(*) as totDoss , D.created_at from dossier_medicals D, specialite_medcines SM 
        where D.medcine = SM.user_id 
        and month(D.created_at) like month(CURRENT_DATE()) - 4
        and SM.specialite_id = ?) as sub" , [$spe]);

        $m5 = \DB::select("SELECT count(*) as totY FROM dossier_medicals WHERE month(created_at) like month(CURRENT_DATE()) - 5 and medcine = ?" , [$id]);

        $m55 = \DB::select("select totDoss from ( SELECT DISTINCT D.patient , count(*) as totDoss , D.created_at from dossier_medicals D, specialite_medcines SM 
        where D.medcine = SM.user_id 
        and month(D.created_at) like month(CURRENT_DATE()) - 5
        and SM.specialite_id = ?) as sub" , [$spe]);

        $m6 = \DB::select("SELECT count(*) as totY FROM dossier_medicals WHERE month(created_at) like month(CURRENT_DATE()) - 6 and medcine = ?" , [$id]);

        $m66 = \DB::select("select totDoss from ( SELECT DISTINCT D.patient , count(*) as totDoss , D.created_at from dossier_medicals D, specialite_medcines SM 
        where D.medcine = SM.user_id 
        and month(D.created_at) like month(CURRENT_DATE()) - 6
        and SM.specialite_id = ?) as sub" , [$spe]);

        $m7 = \DB::select("SELECT count(*) as totY FROM dossier_medicals WHERE month(created_at) like month(CURRENT_DATE()) - 7 and medcine = ?" , [$id]);

        $m77 = \DB::select("select totDoss from ( SELECT DISTINCT D.patient , count(*) as totDoss , D.created_at from dossier_medicals D, specialite_medcines SM 
        where D.medcine = SM.user_id 
        and month(D.created_at) like month(CURRENT_DATE()) - 7
        and SM.specialite_id = ?) as sub" , [$spe]);

        $m8 = \DB::select("SELECT count(*) as totY FROM dossier_medicals WHERE month(created_at) like month(CURRENT_DATE()) - 8 and medcine = ?" , [$id]);

        $m88 = \DB::select("select totDoss from ( SELECT DISTINCT D.patient , count(*) as totDoss , D.created_at from dossier_medicals D, specialite_medcines SM 
        where D.medcine = SM.user_id 
        and month(D.created_at) like month(CURRENT_DATE()) - 8
        and SM.specialite_id = ?) as sub" , [$spe]);

        
        $m9 = \DB::select("SELECT count(*) as totY FROM dossier_medicals WHERE month(created_at) like month(CURRENT_DATE()) - 9 and medcine = ?" , [$id]);

        $m99 = \DB::select("select totDoss from ( SELECT DISTINCT D.patient , count(*) as totDoss , D.created_at from dossier_medicals D, specialite_medcines SM 
        where D.medcine = SM.user_id 
        and month(D.created_at) like month(CURRENT_DATE()) - 9
        and SM.specialite_id = ?) as sub" , [$spe]);

        $m10 = \DB::select("SELECT count(*) as totY FROM dossier_medicals WHERE month(created_at) like month(CURRENT_DATE()) - 10 and medcine = ?" , [$id]);

        $m1010 = \DB::select("select totDoss from ( SELECT DISTINCT D.patient , count(*) as totDoss , D.created_at from dossier_medicals D, specialite_medcines SM 
        where D.medcine = SM.user_id 
        and month(D.created_at) like month(CURRENT_DATE()) - 10
        and SM.specialite_id = ?) as sub" , [$spe]);

        $m11x = \DB::select("SELECT count(*) as totY FROM dossier_medicals WHERE month(created_at) like month(CURRENT_DATE()) - 11 and medcine = ?" , [$id]);

        $m1111 = \DB::select("select totDoss from ( SELECT DISTINCT D.patient , count(*) as totDoss , D.created_at from dossier_medicals D, specialite_medcines SM 
        where D.medcine = SM.user_id 
        and month(D.created_at) like month(CURRENT_DATE()) - 11
        and SM.specialite_id = ?) as sub" , [$spe]);

        // dd($m11[0]->totY);
        // $x = $m11;
        // return "$m11";
        // dd($m11);
        $data = array($m0[0]->totY, $m00[0]->totDoss , $m1[0]->totY , $m11[0]->totDoss , $m2[0]->totY , $m22[0]->totDoss, $m3[0]->totY , $m33[0]->totDoss, $m4[0]->totY , $m44[0]->totDoss , $m5[0]->totY , $m55[0]->totDoss , $m6[0]->totY , $m66[0]->totDoss  , $m7[0]->totY , $m77[0]->totDoss  , $m8[0]->totY , $m88[0]->totDoss , $m9[0]->totY , $m99[0]->totDoss ,  $m10[0]->totY , $m1010[0]->totDoss, $m11x[0]->totY , $m1111[0]->totDoss , $var[0]->nom);
        
        return json_encode($data);

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




    
    public function updateRadio01(Request $request)
    {
        
        $id = Auth::user()->id;

        // $d1 = \DB::select("SELECT COUNT(*) as tot1 FROM dossier_medicals where created_at BETWEEN '?' and '?' and medcine = ?" ,[$request->today] ,[$request->tomorrow] ,[$id]);

        $d0 = DB::table('file_med_res')
           ->whereBetween('created_at', [$request->today, $request->tomorrow])
           ->where('user_id' , '=' , $id)
           ->count();

        $d1 = DB::table('file_med_res')
           ->whereBetween('created_at', [$request->yesterday, $request->today])
           ->where('user_id' , '=' , $id)
           ->count();
        
        $d2 = DB::table('file_med_res')
           ->whereBetween('created_at', [$request->yesterdayx2, $request->yesterday])
           ->where('user_id' , '=' , $id)
           ->count();

        $d3 = DB::table('file_med_res')
           ->whereBetween('created_at', [$request->yesterdayx3, $request->yesterdayx2])
           ->where('user_id' , '=' , $id)
           ->count();
     
        $d4 = DB::table('file_med_res')
           ->whereBetween('created_at', [$request->yesterdayx4, $request->yesterdayx3])
           ->where('user_id' , '=' , $id)
           ->count();

        $d5 = DB::table('file_med_res')
           ->whereBetween('created_at', [$request->yesterdayx5, $request->yesterdayx4])
           ->where('user_id' , '=' , $id)
           ->count();
        
        // $d6 = DB::table('dossier_medicals')
        //    ->whereBetween('created_at', [$request->yesterdayx6, $request->yesterdayx5])
        //    ->where('medcine' , '=' , $id)
        //    ->count();

        $data = array($d5, $d4 , $d3 , $d2 , $d1 , $d0 );

        return json_encode($data);

    }


    
    // public function updateRadio02(Request $request)
    public function updateRadio02()
    {
        $id = Auth::user()->id;

        $var = DB::table('specialite_medcines')
            ->join('specialites' , 'specialites.id' , '=' , 'specialite_medcines.specialite_id')
            ->select('specialite_medcines.specialite_id' , 'specialites.nom')
            ->where('user_id' , '=' , $id)
            ->get();
        
        $spe = $var[0]->specialite_id;
        
        $m0 = \DB::select("SELECT count(*) as totY FROM file_med_res  WHERE month(created_at) like month(CURRENT_DATE()) and user_id = ?" , [$id]);

        $m00 = \DB::select("SELECT count(*) as totDoss FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE())");

        $m1 = \DB::select("SELECT count(*) as totY FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 1 and user_id = ?" , [$id]);

        $m11 = \DB::select("SELECT count(*) as totDoss FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 1");

        $m2 = \DB::select("SELECT count(*) as totY FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 2 and user_id = ?" , [$id]);

        $m22 = \DB::select("SELECT count(*) as totDoss FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 2");

        $m3 = \DB::select("SELECT count(*) as totY FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 3 and user_id = ?" , [$id]);

        $m33 = \DB::select("SELECT count(*) as totDoss FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 3");

        $m4 = \DB::select("SELECT count(*) as totY FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 4 and user_id = ?" , [$id]);

        $m44 = \DB::select("SELECT count(*) as totDoss FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 4");

        $m5 = \DB::select("SELECT count(*) as totY FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 5 and user_id = ?" , [$id]);

        $m55 = \DB::select("SELECT count(*) as totDoss FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 5");

        $m6 = \DB::select("SELECT count(*) as totY FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 6 and user_id = ?" , [$id]);

        $m66 = \DB::select("SELECT count(*) as totDoss FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 6" );

        $m7 = \DB::select("SELECT count(*) as totY FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 7 and user_id = ?" , [$id]);

        $m77 = \DB::select("SELECT count(*) as totDoss FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 7");

        $m8 = \DB::select("SELECT count(*) as totY FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 8 and user_id = ?" , [$id]);

        $m88 = \DB::select("SELECT count(*) as totDoss FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 8");
        
        $m9 = \DB::select("SELECT count(*) as totY FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 9 and user_id = ?" , [$id]);

        $m99 = \DB::select("SELECT count(*) as totDoss FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 9");

        $m10 = \DB::select("SELECT count(*) as totY FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 10 and user_id = ?" , [$id]);

        $m1010 = \DB::select("SELECT count(*) as totDoss FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 10");

        $m11x = \DB::select("SELECT count(*) as totY FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 11 and user_id = ?" , [$id]);

        $m1111 = \DB::select("SELECT count(*) as totDoss FROM file_med_res WHERE month(created_at) like month(CURRENT_DATE()) - 11");

        // dd($m11[0]->totY);
        // $x = $m11;
        // return "$m11";
        // dd($m11);
        $data = array($m0[0]->totY, $m00[0]->totDoss , $m1[0]->totY , $m11[0]->totDoss , $m2[0]->totY , $m22[0]->totDoss, $m3[0]->totY , $m33[0]->totDoss, $m4[0]->totY , $m44[0]->totDoss , $m5[0]->totY , $m55[0]->totDoss , $m6[0]->totY , $m66[0]->totDoss  , $m7[0]->totY , $m77[0]->totDoss  , $m8[0]->totY , $m88[0]->totDoss , $m9[0]->totY , $m99[0]->totDoss ,  $m10[0]->totY , $m1010[0]->totDoss, $m11x[0]->totY , $m1111[0]->totDoss , $var[0]->nom);
        
        return json_encode($data);

    }
}
