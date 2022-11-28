<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function get_new_file_name($file)
    {
        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        $temp_file_name = $current_date_time . $file->getClientOriginalName();
        $new_temp_file_name = str_replace(":","_",$temp_file_name);
        $new_file_name = str_replace(" ","_",$new_temp_file_name);

        return $new_file_name;
    }

}
