@extends('layouts.layout')

@section('content')
<table class="table table-dark table-striped" style="margin-top:20px">
<tr>
    <th><a type="button" class="btn btn-light">New</a></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    
    

  </tr>
<tr>
    <th>No</th>
    <th>Exercise Name</th>
    <th>Year</th>
    <th>Add question</th>
    <th>View Result</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Science Exercise</td>
    <td>Year 1</td>
    <td><a type="button" class="btn btn-light">Add</a></td>
    <td><a type="button" class="btn btn-light">View</a></td>
  </tr>
  
</table>
@endsection
