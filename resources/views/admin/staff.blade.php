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
  <tr>
    <td>1</td>
    <td>Teacher</td>
    <td>Teacher@gmail.com</td>
    <td><a type="button" class="btn btn-light">Edit</a>
    <a type="button" class="btn btn-danger">Delete</a>
    </td>
  </tr>
  
</table>
@endsection
