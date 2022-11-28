<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Subject extends Model
{
    use HasFactory;
    public $subjectName;

    function __construct($subjectName = NULL)
    {
        $this->subjectName = $subjectName;
    }
    function get_name(){
        return $this->subjectName;
    }

    function get_subject_list()
    {
        $drop_subjects = DB::table('subjects')->select('subjects.id', 'subjects.SubjectName')
        ->orderBy('subjects.id')->get();

        return $drop_subjects;
    }
}
