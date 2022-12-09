<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class StudentAnnouncementController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $announcements = Announcement::where('status', '=', '1')->orderBy('id')->get();

        return view('student.announcements', compact('announcements'));
    }

}
