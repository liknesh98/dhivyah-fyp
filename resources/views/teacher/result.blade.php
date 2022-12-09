@extends('layouts.layout')

@section('content')

@if(!empty($results))
@foreach ($results as $result)
@if(!empty($result[0]))
<br>
<strong>
  <div class="row justify-content-center">
  Year {{$result[0]->year}}
  </div>
</strong>
<table class="table table-dark table-striped" style="margin-top:20px">
<tr>
    <th>No</th>
    <th>Exercise Name</th>
    <th>Subject</th>
    <th>Student Name</th>
    <th>Result</th>
  </tr>

  @php
    $count = 0
    @endphp
  @foreach ($result as $res)
    @php
        $count++
    @endphp
  <tr>
    <td>{{$count}}</td>
    <td>{{$res->exercise}}</td>
    <td>{{$res->subject}}</td>
    <td>{{$res->student}}</td>
    <td>{{$res->result}}%</td>
  </tr>
   @endforeach

</table>
<hr style="position: relative;top: 20px;border: none;height: 12px;background: black;margin-bottom: 50px;"/>

@endif

@endforeach

@endif


@endsection
