<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ExerciseQuestions;
use App\Models\QuestionAnswer;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Auth;
use DB;

class ManageStudyMaterialController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    function __construct()
    {
        $this->exerciseModel = new Exercise();
        $this->questionModel = new ExerciseQuestions();
        $this->answerModel = new QuestionAnswer();
    }

    public function question($exercise_id)
    {
        $exercise = $this->exerciseModel->get_exercise_details($exercise_id);
        $data['exercise'] =$exercise;

        $questions = $this->questionModel->get_questions_list($exercise_id);
        $data['questions'] =$questions;

        return view('teacher.questions', $data);
    }


    public function question_details($question_id)
    {
        $question = $this->questionModel->get_questions_details($question_id);
        $data['question'] =$question;
        // dd($data['question']);
        $answers = $this->answerModel->get_answers_list($question_id);
        $data['answers'] =$answers;

        return view('teacher.question_details', $data);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function question_store(Request $request)
    {
        // $request->validate([
        //     'subject' => 'required',
        //     'year' => 'required',
        // ]);

        $exercise_id = $request->post('exercise_id');
        $question_file = $request->file('question_file_upload');

        if(isset($question_file))
        {
            $question_new_file_name = $this->get_new_file_name($question_file);
            $destinationPath = 'uploads/questions';
            $question_file->move($destinationPath, $question_new_file_name);
            $file_path = $destinationPath . '/' . $question_new_file_name;
        }
        else
        {
            $file_path = null;
        }
        $result = ExerciseQuestions::create(array(
            'quest_name' => $request->post('question_name'),
            'exercise_id'  => $exercise_id,
            'file_name' => $file_path,
        ));

        $ans_file_array = $request->file('ans_image_upload');



        $answer_names_array = $request->post('answer_name');
        if (isset($answer_names_array))
        {
            $count = 0;
            foreach ($request->post('answer_name') as $answer_name)
            {
                if(isset($ans_file_array[$count]))
                {
                    $answer_file = $ans_file_array[$count];

                    $answer_new_file_name = $this->get_new_file_name($answer_file);
                    $destinationPath = 'uploads/answer';
                    $answer_file->move($destinationPath, $answer_new_file_name);
                    $file_path = $destinationPath . '/' . $answer_new_file_name;
                }
                else
                {
                    $file_path = null;
                }


                QuestionAnswer::create(array(
                    'ans_name' => $answer_name,
                    'quest_id'  => $result['id'],
                    'file_name' => $file_path,
                    'answer_status' => $request->post('answer_status') == $count ? 1 : 0,
                ));

                $count++;
            }
        }

        return redirect()->route('/teacher/question', ['exercise_id'=>$exercise_id])->with('success','Question has been created successfully.');
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'address' => 'required',
        // ]);

        // $company->fill($request->post())->save();
        $update_announcement = array(
            'name' => $request->post('name'),
            'desc'  => $request->post('desc'),
        );
        Note::where('id', $request->post('id'))
        //   ->where('active', 1)
      ->update($update_announcement);

        return redirect()->route('a_note')->with('success','Note has been Updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    // public function destroy(Company $company)
    public function exercise_delete($exercise_id)
    {

        $questions_id = $this->questionModel->get_questions_id($exercise_id);

        foreach($questions_id as $id)
        {
            $this->question_delete($id->id);
        }


        Exercise::destroy($exercise_id);

        // return redirect()->route('a_note')->with('success','Note has been deleted successfully');
        return redirect()->back();
    }

    public function question_delete($question_id)
    {

        $answers_id = $this->answerModel->get_answers_id($question_id);

        foreach($answers_id as $id)
        {
            $this->answer_delete($id->id);
        }

        $file_path = $this->questionModel->get_file_path($question_id);

        if ($file_path->file_name != null)
        {
            unlink(public_path($file_path->file_name));
        }
        ExerciseQuestions::destroy($question_id);

        // return redirect()->route('a_note')->with('success','Note has been deleted successfully');
        return redirect()->back();
    }

    public function answer_delete($id)
    {
        $file_path = $this->answerModel->get_file_path($id);

        if ($file_path->file_name != null)
        {
            unlink(public_path($file_path->file_name));
        }
        $result = QuestionAnswer::destroy($id);
        return $result;
    }

    public function exercise() {

        $exerciseModel = new Exercise();
        $exercises = $exerciseModel->get_exercises_list();
        $data['exercises'] =$exercises;

        $drop_years = $this->questionModel->get_year_list();
        $data['drop_years'] =$drop_years;

        return view('teacher.exercise', $data) ;
    }

    public function exercise_store(Request $request)
    {
        $request->validate([
            'exercise' => 'required',
            'year' => 'required',
        ]);


        Exercise::create(array(
            'name' => $request->post('exercise'),
            'year_id'  => $request->post('year'),
        ));

        return redirect()->route('/teacher/exercise')->with('success','Exercise has been created successfully.');
    }

    public function notes() {
        return view('teacher.note') ;
    }

    public function videos() {
        return view('teacher.video') ;
    }
}
