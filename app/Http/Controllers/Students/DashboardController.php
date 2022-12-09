<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\Year;
use App\Models\Subject;
use App\Models\Result;

use Illuminate\Http\Request;
use DB;
use Auth;

class DashboardController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $yearsModel = new Year();
        $years = $yearsModel->get_year_list();

        $subjectsModel = new Subject();
        $subjects = $subjectsModel->get_subject_list();

        $exerciseModel = new Exercise();
        $exercises = [];
        foreach($years as $year)
        {
            array_push($exercises, $exerciseModel->get_exercises_using_year($year->id));
            // $exercises[$year->year] = $exerciseModel->get_exercises_using_year($year->id);
        }

        if(!(empty($exercises)))
        {
            $resultModel = new Result();
            $count1=0;
            foreach($exercises as $exercise)
            {
                if(!(empty($exercise)))
            {
                $count2=0;
                foreach($exercise as $exer)
                {
                    if(isset($resultModel->get_result_student_exercise($exer->id, Auth::id())->result))
                    {
                        $exercises[$count1][$count2]->results = $resultModel->get_result_student_exercise($exer->id, Auth::id())->result."%";
                    }
                    else
                    {
                        $exercises[$count1][$count2]->results = "NA";
                    }
                    $count2++;
                }
            }
                $count1++;
            }
        }
        // dd($exercises);
        return view('student.dashboard')->with(compact($exercises));
    }

}
