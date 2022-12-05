<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Auth;
use DB;

class StudentListController extends Controller
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

       
        $students = DB::table('users')->select('id','year_id','name','email')->where('role','=',1)->get(); 
        
        return view('admin.studentlist')->with(compact('students'));
    }
    public function edit (Request $request){
       

        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'year' => 'required',
        ]);

       $id = $request->id ; 
       $name = $request->name ; 
       $email = $request->email ; 
       $year = $request->year ; 

       $update = DB::table('users')
              ->where('id',$id)
              ->update(['name' => $name , 'email' => $email , 'year_id'=>$year]);

        
        return redirect()->back()->with('message', 'Student details has been edited'); 
    }
    public function delete (Request $request){
       
        $request->validate([
            'id' => 'required',
        ]);

       $id = $request->id ; 
     
       $delete = DB::table('users')->delete($id);

        
        return redirect()->back()->with('message', 'Student has been deleted'); 
    }
}


?>