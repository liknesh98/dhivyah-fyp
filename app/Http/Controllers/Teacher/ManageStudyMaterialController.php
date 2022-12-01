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
        $this->questionsModel = new ExerciseQuestions();
    }
    public function question($exercise_id)
    {
        $exerciseModel = new Exercise();
        $exercise = $exerciseModel->get_exercise_details($exercise_id);
        $data['exercise'] =$exercise;

        $questions = $this->questionsModel->get_questions_list($exercise_id);
        $data['questions'] =$questions;

        return view('teacher.questions', $data);
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
    public function delete($id)
    {
        // $file_path = DB::table('notes')->select('notes.Filename')->where('id', '=', $id)->first();
        $file_path = $this->notesModel->get_file_path($id);

        unlink(public_path($file_path->Filename));

        Note::destroy($id);
        return redirect()->route('a_note')->with('success','Note has been deleted successfully');
    }

    public function exercise() {

        $exerciseModel = new Exercise();
        $exercises = $exerciseModel->get_exercises_list();
        $data['exercises'] =$exercises;

        $drop_years = $this->questionsModel->get_year_list();
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
