<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

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

        return view('admin.profile');
    }

}


?>