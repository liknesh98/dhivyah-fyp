@extends('layouts.layout')

@section('content')

@if(!empty($exercises))
@foreach ($exercises as $exercise)
@if(!empty($exercise[0]))
<br>
<strong>
  <div class="row justify-content-center">
  Year {{$exercise[0]->year}}
  </div>
</strong>
<table class="table table-dark table-striped" style="margin-top:20px">
<tr>
    <th>No</th>
    <th>Exercise Name</th>
    <th>Subject</th>
    <th>Result</th>
  </tr>

  @php
    $count = 0
    @endphp
  @foreach ($exercise as $exer)
    @php
        $count++
    @endphp
  <tr>
    <td>{{$count}}</td>
    <td>{{$exer->name}}</td>
    <td>{{$exer->subject}}</td>
    <td>{{$exer->results}}%</td>
  </tr>
   @endforeach

</table>
<hr style="position: relative;top: 20px;border: none;height: 12px;background: black;margin-bottom: 50px;"/>

@endif

@endforeach

@endif


@endsection
