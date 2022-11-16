<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Auth;

class AdminAnnouncementController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $announcements = Announcement::where('status', '=', '1')->orderBy('id')->get();

        return view('admin.announcements', compact('announcements'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('companies.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
        ]);

        Announcement::create(array(
            'name' => $request->post('name'),
            'desc'  => $request->post('desc'),
            'status' => 1,
            'created_by' => Auth::user()->email,
        ));

        return redirect()->route('a_announcement')->with('success','Announcement has been created successfully.');
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'address' => 'required',
        // ]);

        // $company->fill($request->post())->save();
        $update_announcement = array(
            'name' => $request->post('name'),
            'desc'  => $request->post('desc'),
        );
        Announcement::where('id', $request->post('id'))
    //   ->where('active', 1)
      ->update($update_announcement);

        return redirect()->route('a_announcement')->with('success','Announcement has been Updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    // public function destroy(Company $company)
    public function delete($id)
    {
        // $company->delete();
        Announcement::destroy($id);
        return redirect()->route('a_announcement')->with('success','Announcement has been deleted successfully');
    }
}
