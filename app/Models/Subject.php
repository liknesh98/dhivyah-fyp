<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public $subjectName; 

    function __construct($subjectName)
    {
        $this->subjectName = $subjectName;     
    }
    function get_name(){
        return $this->subjectName; 
    }

    
}
