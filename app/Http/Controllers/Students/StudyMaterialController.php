<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\ExerciseQuestions;
use App\Models\QuestionAnswer;
use App\Models\Result;

use Illuminate\Http\Request;
use DB;
use Auth;

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

        if(!($data['exercises']->isEmpty() ))
        {
            $resultModel = new Result();
            $count=0;
            foreach($data['exercises'] as $exercise)
            {
                if(isset($resultModel->get_result_student_exercise($exercise->id, Auth::id())->result))
                {
                    $data['exercises'][$count]->results = $resultModel->get_result_student_exercise($exercise->id, Auth::id())->result."%";
                }
                else
                {
                    $data['exercises'][$count]->results = "No Attempt";
                }
                $count++;
            }
        }
        return view('student.study_material')->with($data);
    }

    public function getNotes($id){

        $file  = db::table('notes')->where('id','=',$id)->pluck('Filename');

        return response()->file($file[0]);

    }
    public function get_exercise($exercise_id){

        $questionModel = new ExerciseQuestions();
        $data['questions'] = $questionModel->get_questions_list($exercise_id);

        $answerModel = new QuestionAnswer();
        $answers = [];
        $i=0;
        // dd($data['questions'][0]->file_name);
        foreach ($data['questions'] as $question)
        {
            $data['questions'][$i]->answers = $answerModel->get_answers_list($question->id);
            $i++;
        }
        $data['exercise_id'] = $exercise_id;

        return view('student.studentexercise')->with($data);

    }

    public function calculate_result(Request $request)
    {
        $questionModel = new ExerciseQuestions();
        $questions = $questionModel->get_questions_id($request->exercise_id);

        $answerModel = new QuestionAnswer();
        $correct_answers = 0;
        foreach ($questions as $question)
        {
            if ($request->{$question->id} == $answerModel->get_correct_answer($question->id)->id)
            {
                $correct_answers++;
            }
        }
        $questions_number = $questionModel->get_questions_count($request->exercise_id);
        $result = ($correct_answers/$questions_number) * 100;

        $resultModel = new Result();
        $resultModel->delete_existing_result($request->exercise_id, Auth::id());

        $response = Result::create(array(
            'result' => $result,
            'student_id' => Auth::id(),
            'exercise_id'  => $request->exercise_id,
        ));

        $exerciseModel = new Exercise();
        $year_subject = $exerciseModel->get_exercise_yearsubject($request->exercise_id);
        return redirect()->to("/student/study/{$year_subject->year_id}/{$year_subject->subject_id}")->with('success','Exercise completed')->with('success','Exercise completed');
    }

}
