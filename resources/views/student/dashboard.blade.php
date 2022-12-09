@extends('layouts.layout')

@section('content')

@foreach ($exercises as $exercise)
<table class="table table-dark table-striped" style="margin-top:20px">
<tr>
    <th><a type="button" class="btn btn-light" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#add_modal1">New</a></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>



  </tr>
<tr>
    <th>No</th>
    <th>Exercise Name</th>
    <th>Subject</th>
    <th>Add question</th>
    <th>Action</th>
  </tr>

  @php
    $count = 0
    @endphp
  @foreach ($exercises as $exercise)
    @php
        $count++
    @endphp
  <tr>
    <td>{{$count}}</td>
    <td>{{$exercise->name}}</td>
    <td>{{$exercise->year}}</td>
  </tr>
   @endforeach

</table>

@endforeach

@endsection
