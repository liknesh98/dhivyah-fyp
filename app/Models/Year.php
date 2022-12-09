<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Year extends Model
{
    use HasFactory;
    public $year;
    function __construct($year = NULL)
    {
        $this->year = $year;
    }

    function getYear() {
        $this->year ;
    }

    function get_year_list()
    {
        $drop_years = DB::table('years')->select('years.id', 'years.year')
        ->orderBy('years.id')->get();

        return $drop_years;
    }
}
