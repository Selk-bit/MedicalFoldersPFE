<?php

namespace App\Http\Controllers\DM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\{Conseil,Specialite};
use DB;

class bannedMeds extends Controller
{
    public function fetch()
    {
        $BM = DB::table('meds_interdits')
             ->select('*')
             ->get();

        // return "$BM";
        return response()->json([
            'bms' => $BM,
        // ], 200); 
        ]); 
        
    }
}
