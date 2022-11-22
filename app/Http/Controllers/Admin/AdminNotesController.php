<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Auth;
use DB;

class AdminNotesController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    function __construct()
    {
        $this->notesModel = new Note();
    }
    public function index()
    {
        // $notes = Note::orderBy('id')->get();
        $notes = $this->notesModel->get_notes_list();
        $data['notes'] =$notes;

        $drop_subjects = $this->notesModel->get_subject_list();
        $data['drop_subjects'] =$drop_subjects;

        $drop_years = $this->notesModel->get_year_list();
        $data['drop_years'] =$drop_years;

        return view('admin.notes', $data);
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
            'title' => 'required',
            'subject' => 'required',
            'year' => 'required',
        ]);

        $file = $request->file('file_upload');

        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        $temp_file_name = $current_date_time . $file->getClientOriginalName();
        $new_file_name = str_replace(":","_",$temp_file_name);



      $destinationPath = 'uploads/notes';
      $file->move($destinationPath, $new_file_name);
      $file_path = $destinationPath . '/' . $new_file_name;

      Note::create(array(
            'Notetitle' => $request->post('title'),
            'subject_id'  => $request->post('subject'),
            'year_id'  => $request->post('year'),
            'Filename' => $file_path,
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

        return redirect()->route('a_note')->with('success','Note has been created successfully.');
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
        Note::where('id', $request->post('id'))
    //   ->where('active', 1)
      ->update($update_announcement);

        return redirect()->route('a_note')->with('success','Note has been Updated successfully');
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
        // $file_path = DB::table('notes')->select('notes.Filename')->where('id', '=', $id)->first();
        $file_path = $this->notesModel->get_file_path($id);

        unlink(public_path($file_path->Filename));

        Note::destroy($id);
        return redirect()->route('a_note')->with('success','Note has been deleted successfully');
    }
}
