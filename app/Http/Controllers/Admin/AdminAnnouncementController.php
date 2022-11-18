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

        $file = $request->file('image_upload');

        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        $temp_file_name = $current_date_time . $file->getClientOriginalName();
        $new_file_name = str_replace(":","_",$temp_file_name);



      $destinationPath = 'uploads';
      $file->move($destinationPath, $new_file_name);
      $file_path = $destinationPath . '/' . $new_file_name;

        Announcement::create(array(
            'name' => $request->post('name'),
            'desc'  => $request->post('desc'),
            'img_path' => $file_path,
            'status' => 1,
            'created_by' => Auth::user()->email,
        ));




    //   //Display File Name
    //   echo 'File Name: '.$file->getClientOriginalName();
    //   echo '<br>';

    //   //Display File Extension
    //   echo 'File Extension: '.$file->getClientOriginalExtension();
    //   echo '<br>';

    //   //Display File Real Path
    //   echo 'File Real Path: '.$file->getRealPath();
    //   echo '<br>';

    //   //Display File Size
    //   echo 'File Size: '.$file->getSize();
    //   echo '<br>';

    //   Display File Mime Type
    //   echo 'File Mime Type: '.$file->getMimeType();

      //Move Uploaded File

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
