<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ExerciseQuestions extends Model
{
    use HasFactory;

    protected $fillable = [

        'quest_name', 'file_name' , 'exercise_id'

    ];

    protected $table = 'exercise_questions';

    function get_file_path($id)
    {
        $file_path = DB::table($this->table)->select('file_name')->where('id', '=', $id)->first();
        return $file_path;
    }

    function get_questions_list($exercise_id)
    {
        $questions = DB::table($this->table)->select($this->table.'.id', $this->table.'.quest_name', $this->table.'.file_name', $this->table.'.exercise_id')
        ->where($this->table.'.exercise_id', '=', $exercise_id)->orderBy($this->table.'.id')->get();

        return $questions;
    }

    function get_questions_id($exercise_id)
    {
        $answers = DB::table($this->table)->select($this->table.'.id')
        ->where('exercise_id','=',$exercise_id)->get();

        return $answers;
    }

    function get_questions_details($question_id)
    {
        $questions = DB::table($this->table)->select($this->table.'.id', $this->table.'.quest_name', $this->table.'.file_name')
        ->where($this->table.'.id', '=', $question_id)->first();

        return $questions;
    }

    function get_subject_list()
    {
        $this->subjectModel = new Subject();
        $drop_subjects = $this->subjectModel->get_subject_list();

        return $drop_subjects;
    }

    function get_year_list()
    {
        $this->yearModel = new Year();
        $drop_years = $this->yearModel->get_year_list();

        return $drop_years;
    }
}
