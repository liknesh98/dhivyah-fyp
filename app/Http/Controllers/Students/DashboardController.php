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

        $announcement = DB::table('announcement')->select('announcement.id', 'announcement.name', 'announcement.desc', 'announcement.img_path')
        ->where('announcement.id','=', DB::raw('(SELECT MAX(id) FROM announcement)'))->first();



        $subjectsModel = new Subject();
        $subjects = $subjectsModel->get_subject_list();

        $exerciseModel = new Exercise();
        $exercises = [];
        foreach($years as $year)
        {
            $one_year = $exerciseModel->get_exercises_using_year($year->id);
            if(sizeof($one_year) >0)
            {
                array_push($exercises, $one_year);
            // $exercises[$year->year] = $exerciseModel->get_exercises_using_year($year->id);
            }
            else
            {
                array_push($exercises, array('year' => $year->year));
            }
        }

        if(!(empty($exercises)))
        {
            $resultModel = new Result();
            $count1=0;
            foreach($exercises as $exercise)
            {
                if((!isset($exercise['year'])))
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

        return view('student.dashboard')->with(compact('exercises','announcement'));
    }

}
