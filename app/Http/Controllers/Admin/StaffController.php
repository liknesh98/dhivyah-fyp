<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Auth;
use DB;

class StaffController extends Controller
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

        $staffs = DB::table('users')->select('id','name','email')->where('role','=',2)->get();
        return view('admin.staff')->with(compact('staffs'));
    }
    public function edit (Request $request){
   
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
          
        ]);

       $id = $request->id ; 
       $name = $request->name ; 
       $email = $request->email ; 
      

       $update = DB::table('users')
              ->where('id',$id)
              ->update(['name' => $name , 'email' => $email ]);

        
        return redirect()->back()->with('message', 'Staff details has been edited'); 
    }
    public function delete (Request $request){
       
        $request->validate([
            'id' => 'required',
        ]);

       $id = $request->id ; 
     
       $delete = DB::table('users')->delete($id);

        
        return redirect()->back()->with('message', 'Staff has been deleted'); 
    }

}


?>