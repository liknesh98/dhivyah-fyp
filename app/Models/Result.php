<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [

        'result', 'student_id' , 'exercise_id'

    ];

    protected $table = 'results';

    public function get_result_student_exercise($exercise_id, $student_id)
    {
        $result = DB::table($this->table)->select($this->table.'.id', $this->table.'.result')
        ->where($this->table.'.student_id', '=', $student_id)->where($this->table.'.exercise_id', '=', $exercise_id)->first();

        return $result;
    }

    public function delete_existing_result($exercise_id, $student_id)
    {
        $result = DB::table($this->table)->select($this->table.'.id')
        ->where($this->table.'.student_id', '=', $student_id)->where($this->table.'.exercise_id', '=', $exercise_id)->get()->count();
        if($result > 0)
        {
            $response = DB::table($this->table)->select($this->table.'.id')
            ->where($this->table.'.student_id', '=', $student_id)->where($this->table.'.exercise_id', '=', $exercise_id)->first();
            Result::destroy($response->id);
        }
    }
}
