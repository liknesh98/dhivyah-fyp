<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [

        'name', 'year_id'

    ];

    protected $table = 'exercises';


    function get_exercises_list()
    {
        $exercises = DB::table($this->table)->join('years', 'years.id','=', $this->table.'.year_id')
        ->select($this->table.'.id', $this->table.'.name', 'years.year')
        ->orderBy($this->table.'.id')->get();

        return $exercises;
    }

    function get_exercise_details($id)
    {
        $exercise = DB::table($this->table)->join('years', 'years.id','=', $this->table.'.year_id')
        ->select($this->table.'.id', $this->table.'.name', 'years.year')
        ->orderBy($this->table.'.id')->where($this->table.'.id', '=', $id)->first();;

        return $exercise;
    }

    function get_year_list()
    {
        $this->yearModel = new Year();
        $drop_years = $this->yearModel->get_year_list();

        return $drop_years;
    }
}
