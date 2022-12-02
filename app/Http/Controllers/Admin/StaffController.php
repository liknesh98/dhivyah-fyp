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

}


?>