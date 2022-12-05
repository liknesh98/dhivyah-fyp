<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    // function __construct()
    // {
    //     $this->notesModel = new Note();
    // }

    public function index (){
        $user = Auth::user()->id;
        $userdetails = DB::table('users')->select('id','name','year_id','email','role')->where('id','=',$user)->first() ; 
        return view('admin.profile')->with(compact('userdetails'));
    }

    public function update (Request $request){
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            
        ]);
        $name = $request->name; 
       
        $email = $request->email ; 
        $id = $request->id;
        $update = DB::table('users')
        ->where('id',$id)
        ->update(['name' => $name , 'email' => $email]);
        
        return redirect()->back()->with('message', 'Profile has been edited'); 
    }

    public function changePwd (Request $request){
        $request->validate([
            'id' => 'required',
            'newpwd' => 'required',
            'conpwd' => 'required',
        ]);
        $id = $request->id; 
        // $newpwd = $request->newpwd; 
        $password = Hash::make($request->newpwd) ; 

        $update = DB::table('users')
        ->where('id',$id)
        ->update(['password' => $password ]);
        
        return redirect()->back()->with('message', 'Password has been changed'); 
    }

}


?>