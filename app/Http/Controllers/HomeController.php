<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        $role = Auth::user()->role;

        // return view('home');

        if ($role == 1)
            {
                return redirect()->route('s_dashboard');

            }
            else if($role == 2 )
            {
                return redirect()->route('notes');

            }
            else if ($role == 3)
            {
                return redirect()->route('a_announcement');

            }
    }

}
