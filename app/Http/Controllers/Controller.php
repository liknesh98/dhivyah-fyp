<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function get_new_file_name($file)
    {
        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        $temp_file_name = $current_date_time . $file->getClientOriginalName();
        $new_temp_file_name = str_replace(":","_",$temp_file_name);
        $new_file_name = str_replace(" ","_",$new_temp_file_name);

        return $new_file_name;
    }

}
