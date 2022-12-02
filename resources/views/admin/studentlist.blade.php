@extends('layouts.layout')

@section('content')
<table class="table table-dark table-striped" style="margin-top:20px">
<!-- <tr>
    <th><a type="button" class="btn btn-light">New</a></th>
    <th></th>
    <th></th>
    <th></th>
 
    
    

  </tr> -->
<tr>
    <th>No</th>
    <th>Student Name</th>
    <th>Email</th>
    <th>Year</th>
    <th>Action</th>
  </tr>
  @foreach($students as $student)
  <tr>
    <td>{{$student->id}}</td>
    <td>{{$student->name}}</td>
    <td>{{$student->email}}/td>
    <td>{{$student->year_id}}</td>
    <td><a href="#" type="button" class="btn btn-light">Edit</a>
    <a  href="#" type="button" class="btn btn-danger">Delete</a>
    </td>
  </tr>
  @endforeach
</table>
@endsection
