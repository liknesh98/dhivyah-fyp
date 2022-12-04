@extends('layouts.layout')

@section('content')

@if (session('message'))
    <div class="alert alert-primary" role="alert">
        {{ session('message') }}
    </div>
@endif
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
    <td><a type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modal-edit-{{$staff->id}}">Edit</a>
    <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$staff->id}}">Delete</a>
    </td>
  </tr>
  @endforeach
</table>
@foreach($staffs as $staff)
    <!-- Modal -->
    <div class="modal fade" id="modal-edit-{{$staff->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Staff Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('editstaff') }}" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
        <label>Id:</label><input id="id" name="id" type="text" class="form-control" placeholder="id" value="{{$staff->id}}" aria-label="Username" aria-describedby="basic-addon1" readonly></br>
        <label>Name:</label><input id="name" name="name" type="text" class="form-control" placeholder="name" value="{{$staff->name}}" aria-label="name" aria-describedby="basic-addon2"></br>
        <label>Email:</label><input id="email" name="email" type="text" class="form-control" placeholder="email" value="{{$staff->email}}" aria-label="email" aria-describedby="basic-addon3"></br>
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
 <div class="modal fade" id="modal-delete-{{$staff->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Staff Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('deletestaff') }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" id="id" name="id" value="{{$staff->id}}">
      <label>Confirm delete {{$staff->name}} ?</label> 
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
