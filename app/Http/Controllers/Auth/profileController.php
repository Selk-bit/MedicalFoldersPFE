<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use File;
use App\Image;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        
        $data = DB::table('images')
        ->join('users', 'users.id', '=', 'images.user_id')
        ->join('role_users' , 'role_users.user_id' , '=' , 'users.id')
        ->select('src' , 'nom' , 'prenom' , 'name' , 'role_id')
        // ->select('*')
        ->where('images.user_id' , '=' ,$id)
        ->first();
        // dd($data);

        $dn = DB::table('users')
        ->select('dateNaissance')
        ->where('id' , '=' , $id)
        ->first();

        $myDate = $dn->dateNaissance;
        $years = Carbon::parse($myDate)->age;
        // dd($years);

       return view('profile' , ['data' => $data , 'age' => $years]);
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

        // $var = dd($request->file);
        // return "$var";

        // $this->validate($request, [
        //     'image' => 'image| mimes:jpeg,png,jpg |max:4096'
        // ]);
        
        $id = Auth::user()->id;
        $image = new Image();
  
        // if (File::exists($request->image))
        if (File::exists($request->file))
        {
            // $tmp = $request->file('image');
            $tmp = $request->file;
            $input['imagename'] = time() . '.' . $tmp->getClientOriginalExtension();
            $despath = public_path('/img');
            $tmp->move($despath , $input['imagename']);
            $image->user_id = $request->id;
        }
        
        $imageSrc = "img/".$input['imagename'];
        
        DB::update('UPDATE images 
                    SET src = ?
                    WHERE user_id = ?', [$imageSrc , $id]);

        // return back();
        // return back()->with('status', "Successfully submitted !");
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

        DB::table('users')
        ->where('id' , '=' , $id)
        ->update(['name' => $request->name ]);

        DB::table('patients')
        ->where('user_id' , '=' , $id)
        ->update(['cin' => $request->name ]);
    }

    public function updatenp(Request $request)
    {
        $id = Auth::user()->id;
        
        DB::table('users')
        ->where('id' , '=' , $id)
        ->update(['nom' => $request->nom  , 'prenom' => $request->prenom]);

        // DB::table('patients')
        // ->where('user_id' , '=' , $id)
        // ->update(['cin' => $request->name ]);
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
