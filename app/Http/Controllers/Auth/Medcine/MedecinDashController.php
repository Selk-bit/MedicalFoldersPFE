<?php

namespace App\Http\Controllers\Auth\Medcine;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\Medcine\MedcineLoginController;
use App\Providers\RouteServiceProvider;
use App\{User,Specialite,SpecialiteMedcine,Medcine,Image,RoleUser};
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Http\Request;
use DB;

class MedecinDashController extends Controller
{
    /**
     * Where to redirect users after registration.
     *

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    use AuthenticatesUsers;

    public function ShowDashboard()
    {
        // return view('auth.medcine.register' , [
        //     'Specialite' => Specialite::all()
        // ]);
        $id = Auth::user()->id;

        $datam =  DB::table('users')->select('users.nom', 'users.prenom')->where('users.id' , '=' , $id)->get();

        $datap = DB::table('patients')
            ->join('users', 'users.id', '=', 'patients.user_id')
            ->join('images', 'images.user_id', '=', 'patients.user_id')
            ->select('cin' , 'nom' , 'prenom' , 'users.id' , 'images.src')
            ->get();

            $foto = DB::table('images')->select('src')->where('user_id' , '=' , $id)->first();
            $stringURL = $foto->src;
            $str = "/".$stringURL;
            // dd($str);
            
            $nmbrD = DB::table('dossier_medicals')
                ->where('medcine' , '=' , $id)
                ->distinct()
                ->count();

                $filesn = DB::table('files')
                ->join('radio_analyses', 'files.radioAnalyse_id', '=', 'radio_analyses.id')
                ->join('dossier_medicals', 'radio_analyses.dossier_medical', '=', 'dossier_medicals.id')
                ->select(DB::raw('count(src) as tot'))
                ->where('dossier_medicals.medcine' , '=' , $id)
                ->where('files.isRead' , '=' , '0')
                ->where('files.isDeleted' , '=' , '0')
                ->get();

                $files = DB::table('files')
                ->join('radio_analyses', 'files.radioAnalyse_id', '=', 'radio_analyses.id')
                ->join('dossier_medicals', 'radio_analyses.dossier_medical', '=', 'dossier_medicals.id')
                ->select('files.radioAnalyse_id', 'files.created_at', 'radio_analyses.dossier_medical')
                ->where('dossier_medicals.medcine' , '=' , $id)
                ->where('files.isRead' , '=' , '0')
                ->where('files.isDeleted' , '=' , '0')
                ->get();
            
            $nmbrP = \DB::select("select count(*) as nmbr from ( SELECT patient , medcine from dossier_medicals GROUP by patient , medcine having medcine = ? ) as sub " , [$id]);

            $dActif = \DB::select("SELECT count(*) as nmbr from (select * from dossier_medicals where dateFin is null and medcine = ?) as sub" , [$id]);

            $dRedirige = \DB::select("SELECT count(*) as nmbr from ( select d.id from redirections r, dossier_medicals d where r.dossier_medical = d.id and d.medcine = ? ) as sub" , [$id]);

            $data = array($datam, $datap , $str , $nmbrD , $nmbrP[0]->nmbr , $dActif[0]->nmbr , $dRedirige[0]->nmbr, $filesn[0]->tot, $files);
        return view('auth.medcine.homeMS')->withData(json_encode($data));
    }


    public function ShowDashboardRA()
    {
        // return view('auth.medcine.register' , [
        //     'Specialite' => Specialite::all()
        // ]);
        $id = Auth::user()->id;

        $datam =  DB::table('users')->select('users.nom', 'users.prenom')->where('users.id' , '=' , $id)->get();

        // $datap = DB::table('patients')
        //     ->join('users', 'users.id', '=', 'patients.user_id')
        //     ->select('cin' , 'nom' , 'prenom' , 'users.id')
        //     ->get();
        
        $datap = DB::table('users')
        ->join('dossier_medicals', 'dossier_medicals.patient', '=', 'users.id')
        ->join('radio_analyses' , 'radio_analyses.dossier_medical' , '=','dossier_medicals.id')
        ->join('images', 'images.user_id', '=', 'users.id')
        ->select('users.id as PatientId', 'users.name as cin' , 'users.nom' , 'users.prenom' , 'radio_analyses.id as RAid' , 'radio_analyses.titre', 'images.src')
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
        

        $foto = DB::table('images')->select('src')->where('user_id' , '=' , $id)->first();
        $stringURL = $foto->src;
        $str = "/".$stringURL;
            // dd($str);

        $data = array($datam, $datap , $str, $datapu);

        return view('auth.medcine.homeRA')->withData(json_encode($data));
    }

    public function ShowDashboardPH()
    {
        $id = Auth::user()->id;

        $datam =  DB::table('users')->select('users.nom', 'users.prenom')->where('users.id' , '=' , $id)->get();

        $datap = DB::table('patients')
            ->join('users', 'users.id', '=', 'patients.user_id')
            ->join('images', 'images.user_id', '=', 'patients.user_id')
            ->select('cin' , 'nom' , 'prenom' , 'users.id' , 'images.src')
            ->get();

            $foto = DB::table('images')->select('src')->where('user_id' , '=' , $id)->first();
            $stringURL = $foto->src;
            $str = "/".$stringURL;
            // dd($str);
            
            $nmbrD = DB::table('dossier_medicals')
                ->where('medcine' , '=' , $id)
                ->distinct()
                ->count();

                $filesn = DB::table('files')
                ->join('radio_analyses', 'files.radioAnalyse_id', '=', 'radio_analyses.id')
                ->join('dossier_medicals', 'radio_analyses.dossier_medical', '=', 'dossier_medicals.id')
                ->select(DB::raw('count(src) as tot'))
                ->where('dossier_medicals.medcine' , '=' , $id)
                ->where('files.isRead' , '=' , '0')
                ->where('files.isDeleted' , '=' , '0')
                ->get();

                $files = DB::table('files')
                ->join('radio_analyses', 'files.radioAnalyse_id', '=', 'radio_analyses.id')
                ->join('dossier_medicals', 'radio_analyses.dossier_medical', '=', 'dossier_medicals.id')
                ->select('files.radioAnalyse_id', 'files.created_at', 'radio_analyses.dossier_medical')
                ->where('dossier_medicals.medcine' , '=' , $id)
                ->where('files.isRead' , '=' , '0')
                ->where('files.isDeleted' , '=' , '0')
                ->get();
            
            $nmbrP = \DB::select("select count(*) as nmbr from ( SELECT patient , medcine from dossier_medicals GROUP by patient having medcine = ? ) as sub " , [$id]);

            $dActif = \DB::select("SELECT count(*) as nmbr from (select * from dossier_medicals where dateFin is null and medcine = ?) as sub" , [$id]);

            $dRedirige = \DB::select("SELECT count(*) as nmbr from ( select d.id from redirections r, dossier_medicals d where r.dossier_medical = d.id and d.medcine = ? ) as sub" , [$id]);

        $data = array($datam, $datap , $str , $nmbrD , $nmbrP[0]->nmbr , $dActif[0]->nmbr , $dRedirige[0]->nmbr, $filesn[0]->tot, $files);
        return view('auth.medcine.pha')->withData(json_encode($data));
    }

}


