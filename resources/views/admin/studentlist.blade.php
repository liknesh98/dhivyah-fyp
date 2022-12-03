@extends('layouts.layout')

@section('content')
<!-- <div class="alert alert-primary" role="alert">
  This is a primary alert—check it out!
</div>

<div class="alert alert-danger" role="alert">
  This is a danger alert—check it out!
</div> -->
@if (session('message'))
    <div class="alert alert-primary" role="alert">
        {{ session('message') }}
    </div>
@endif
<table class="table table-dark table-striped" style="margin-top:20px">
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
    <td>{{$student->email}}</td>
    <td>{{$student->year_id}}</td>
    <td>
    <a type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modal-edit-{{$student->id}}">Edit</a>
    <a  data-bs-toggle="modal" data-bs-target="#modal-delete-{{$student->id}}" type="button" class="btn btn-danger">Delete</a>

    </td>
  </tr>
  @endforeach
</table>
@foreach($students as $student)
    <!-- Modal -->
    <div class="modal fade" id="modal-edit-{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Student Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('editStudents') }}" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
        <label>Id:</label><input id="id" name="id" type="text" class="form-control" placeholder="id" value="{{$student->id}}" aria-label="Username" aria-describedby="basic-addon1" readonly></br>
        <label>Name:</label><input id="name" name="name" type="text" class="form-control" placeholder="name" value="{{$student->name}}" aria-label="name" aria-describedby="basic-addon2"></br>
        <label>Email:</label><input id="email" name="email" type="text" class="form-control" placeholder="email" value="{{$student->email}}" aria-label="email" aria-describedby="basic-addon3"></br>
        <label>Year:</label><input  id="year" name="year" type="text" class="form-control" placeholder="year" value="{{$student->year_id}}" aria-label="year" aria-describedby="basic-addon4"></br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
  </form>
    </div>
  </div>
</div>

 <!-- Modal -->
 <div class="modal fade" id="modal-delete-{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Student Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('deleteStudents') }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" id="id" name="id" value="{{$student->id}}">
      <label>Confirm delete {{$student->name}} ?</label> 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
  </form>
    </div>
  </div>
</div>
@endforeach

@endsection
