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
    <th>Edit Details</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Lupin</td>
    <td>lupin@gmail.com</td>
    <td>4</td>
    <td><a type="button" class="btn btn-light">Edit</a>
    <a type="button" class="btn btn-danger">Delete</a>
    </td>
  </tr>
  
</table>
@endsection
