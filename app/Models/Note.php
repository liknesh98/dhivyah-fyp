<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Note extends Model
{
    use HasFactory;

    // public $noteTitle;
    // public $noteFileName ;

    // function __construct($noteTitle,$noteFileName)
    // {
    //     $this->noteTitle = $noteTitle;
    //     $this->noteFileName = $noteFileName;
    // }

    // function getNoteTitle() {
    //     return $this->noteTitle ;
    // }

    // function getNoteFileName() {
    //     return $this->noteFileName ;
    // }

    protected $fillable = [

        'Notetitle', 'Filename' , 'year_id', 'subject_id'

    ];

    protected $table = 'notes';

    function get_file_path($id)
    {
        $file_path = DB::table('notes')->select('notes.Filename')->where('id', '=', $id)->first();
        return $file_path;
    }

    function get_notes_list()
    {
        $notes = DB::table('notes')->join('subjects', 'subjects.id','=', 'notes.subject_id')->join('years', 'years.id','=', 'notes.year_id')
        ->select('notes.id', 'notes.Notetitle', 'notes.Filename' , 'years.year', 'subjects.SubjectName')
        ->orderBy('notes.id')->get();

        return $notes;
    }

    public function get_notes_list_by_year()
    {
        $yearModel = new Year();
        $years = $yearModel->get_year_list();

        $results = [];
        foreach($years as $year)
        {
            $results[$year->year] = DB::table($this->table)->select($this->table.'.id', $this->table.'.Notetitle', $this->table.'.Filename' , 'years.year AS year', 'subjects.SubjectName AS subject')
            ->join('years', 'years.id','=', $this->table.'.year_id')->join('subjects', 'subjects.id','=', $this->table.'.subject_id')->where($this->table.'.year_id', '=', $year->year)->get();
        }

        return $results;
    }
}
