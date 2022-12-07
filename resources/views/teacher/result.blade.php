@extends('layouts.layout')

@section('content')
<table class="table table-dark table-striped" style="margin-top:20px">
    <tr>
    <th>No</th>
    <th>Exercise Name</th>
    <th>Year</th>
    <th>Student Name</th>
    <th>Result</th>
  </tr>

  @php
    $count = 0
    @endphp
  @foreach ($results as $result)
    @php
        $count++
    @endphp
  <tr>
    <td>{{$count}}</td>
    <td>{{$result->exercise}}</td>
    <td>{{$result->year}}</td>
    <td>{{$result->student}}</td>
    <td>{{$result->result}}%</td>
  </tr>
   @endforeach

</table>


@endsection
