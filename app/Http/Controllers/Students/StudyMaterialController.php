<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\ExerciseQuestions;

use Illuminate\Http\Request;
use DB;

class StudyMaterialController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index($year, $subject)
    {
        $exerciseModel = new Exercise();
        $data= [];
        $data['notes'] = db::table('notes')->select('id','Notetitle','Filename','year_id','subject_id')->where('year_id','=',$year)->where('subject_id','=',$subject)->get() ;
        $data['exercises'] = $exerciseModel->get_exercises($year, $subject);

        return view('student.study_material')->with($data);
    }

    public function getNotes($id){

        $file  = db::table('notes')->where('id','=',$id)->pluck('Filename');

        return response()->file($file[0]);

    }
    public function get_exercise($exercise_id){

        $questionModel = new ExerciseQuestions();
        $data['questions'] = $questionModel->get_questions_list($exercise_id);

        return view('student.studentexercise')->with($data);

    }

}
