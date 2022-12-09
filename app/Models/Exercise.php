<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [

        'name', 'year_id', 'subject_id'

    ];

    protected $table = 'exercises';


    function get_exercises_list()
    {
        $exercises = DB::table($this->table)->join('years', 'years.id','=', $this->table.'.year_id')->leftJoin('subjects', 'subjects.id','=', $this->table.'.subject_id')
        ->select($this->table.'.id', $this->table.'.name', 'years.year', 'subjects.SubjectName')
        ->orderBy($this->table.'.id')->get();

        return $exercises;
    }

    function get_exercises($year, $subject)
    {
        $exercises = DB::table($this->table)->join('years', 'years.id','=', $this->table.'.year_id')->leftJoin('subjects', 'subjects.id','=', $this->table.'.subject_id')
        ->select($this->table.'.id', $this->table.'.name', 'years.year', 'subjects.SubjectName')
        ->where($this->table.'.year_id','=',$year)->where($this->table.'.subject_id','=',$subject)->orderBy($this->table.'.id')->get();

        return $exercises;
    }

    function get_exercises_using_year($year)
    {
        $exercises = DB::table($this->table)->leftJoin('years', 'years.id','=', $this->table.'.year_id')->leftJoin('subjects', 'subjects.id','=', $this->table.'.subject_id')
        ->select($this->table.'.id', $this->table.'.name', 'years.year', 'subjects.SubjectName as subject' )
        ->where($this->table.'.year_id','=',$year)->orderBy($this->table.'.id')->get();

        return $exercises;
    }

    function get_exercise_details($id)
    {
        $exercise = DB::table($this->table)->join('years', 'years.id','=', $this->table.'.year_id')->leftJoin('subjects', 'subjects.id','=', $this->table.'.subject_id')
        ->select($this->table.'.id', $this->table.'.name', 'years.year', 'subjects.SubjectName')
        ->orderBy($this->table.'.id')->where($this->table.'.id', '=', $id)->first();;

        return $exercise;
    }

    function get_exercise_yearsubject($exercise_id)
    {
        $exercise = DB::table($this->table)->select($this->table.'.id', $this->table.'.year_id', $this->table.'.subject_id')
        ->where($this->table.'.id', '=', $exercise_id)->first();;

        return $exercise;
    }

    function get_year_list()
    {
        $this->yearModel = new Year();
        $drop_years = $this->yearModel->get_year_list();

        return $drop_years;
    }

    function get_subject_list()
    {
        $this->subjectModel = new Subject();
        $drop_subjects = $this->subjectModel->get_subject_list();

        return $drop_subjects;
    }
}
