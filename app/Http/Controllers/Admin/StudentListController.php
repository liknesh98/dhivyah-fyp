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

}


?>