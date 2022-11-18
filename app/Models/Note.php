<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{ 
    use HasFactory;
    public $noteTitle;
    public $noteFileName ;
    
    function __construct($noteTitle,$noteFileName)
    {
        $this->noteTitle = $noteTitle;
        $this->noteFileName = $noteFileName;  
    }

    function getNoteTitle() {
        return $this->noteTitle ; 
    }

    function getNoteFileName() {
        return $this->noteFileName ; 
    }
}
