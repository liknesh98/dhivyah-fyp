<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class QuestionAnswer extends Model
{
    use HasFactory;

    protected $fillable = [

        'ans_name', 'file_name' , 'quest_id', 'answer_status'

    ];

    protected $table = 'exercise_answers';

    function get_file_path($id)
    {
        $file_path = DB::table($this->table)->select('file_name')->where('id', '=', $id)->first();
        return $file_path;
    }

    function get_answers_list($question_id)
    {
        $answers = DB::table($this->table)->select($this->table.'.id', $this->table.'.ans_name', $this->table.'.file_name')
        ->where('quest_id','=',$question_id)->orderBy($this->table.'.id')->get();

        return $answers;
    }
}
