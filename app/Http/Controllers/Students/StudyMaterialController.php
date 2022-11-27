<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB; 

class StudyMaterialController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index($years)
    {
        $notes = db::table('notes')->select('id','Notetitle','Filename','subject_id')->where('subject_id','=',$years)->get() ; 
      
        return view('student.study_material')->with(compact('notes'));
    }

    public function getNotes($id){
        
        $file  = db::table('notes')->where('id','=',$id)->pluck('Filename'); 
        
        return response()->file($file[0]);

    }
    

}
