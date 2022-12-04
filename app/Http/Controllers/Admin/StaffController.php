<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;
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

    public function new (Request $request){
   
        $request->validate([
           
            'name' => 'required',
            'email' => 'required',
            'password' => 'required', 
          
        ]);

  
       $name = $request->name ; 
       $email = $request->email ; 
       $password = Hash::make($request->password) ; 
      

       $update =DB::insert('insert into users (year_id,name,email,password,role) values (?,?, ?, ?,?)', [0, $name, $email, $password,2]); 

        
        return redirect()->back()->with('message', 'New staff has been added'); 
    }

}


?>