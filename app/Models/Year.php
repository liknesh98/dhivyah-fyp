<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    public $year; 
    function __construct($year)
    {
        $this->year = $year; 
    }

    function getYear() {
        $this->year ; 
    }
}
