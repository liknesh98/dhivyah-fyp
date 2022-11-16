<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StudyMaterialController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        

        return view('student/study_4yrs');
    }

}
