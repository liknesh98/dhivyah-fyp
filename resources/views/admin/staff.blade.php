@extends('layouts.layout')

@section('content')
<table class="table table-dark table-striped" style="margin-top:20px">
<tr>
    <th><a type="button" class="btn btn-light">New</a></th>
    <th></th>
    <th></th>
    <th></th>
 
    
    

  </tr>
<tr>
    <th>No</th>
    <th>Staff Name</th>
    <th>Email</th>
    <th>Action</th>
  </tr>
  @foreach($staffs as $staff)
  <tr>
    <td>{{$staff->id}}</td>
    <td>{{$staff->name}}</td>
    <td>{{$staff->email}}</td>
    <td><a href="#" type="button" class="btn btn-light">Edit</a>
    <a  href="#" type="button" class="btn btn-danger">Delete</a>
    </td>
  </tr>
  @endforeach
</table>
@endsection
