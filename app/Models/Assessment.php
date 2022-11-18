<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;
    public $assessmentTitle; 
    public $assessmentFile; 

    function __construct($assessmentTitle,$assessmentFile)
    {
        $this->assessmentTitle = $assessmentTitle ; 
        $this->assessmentFile = $assessmentFile ; 
    }

    function getAssessmentTitle(){
        return $this->assessmentTitle ; 
    }

    function getAssessmentFile(){
        return $this->assessmentFile ; 
    }

}
