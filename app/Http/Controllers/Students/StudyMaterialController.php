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
        $notes = db::table('notes')->select('id','Notetitle','Filename','year_id','subject_id')->where('year_id','=',$years)->get() ; 
      
        return view('student.study_material')->with(compact('notes'));
    }

    public function getNotes($id){
        
        $file  = db::table('notes')->where('id','=',$id)->pluck('Filename'); 
        
        return response()->file($file[0]);

    }
    public function getExercise(){
        
        //$file  = db::table('notes')->where('id','=',$id)->pluck('Filename'); 
        
        //return response()->file($file[0]);

        return view('student.studentexercise'); 

    }

}
