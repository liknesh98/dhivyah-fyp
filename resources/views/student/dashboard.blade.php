@extends('layouts.layout')

@section('content')

<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">{{$announcement->name}}</h4></br>
  @if($announcement->img_path != null)
  <img style="width:400px; height:300px;"src="{{url($announcement->img_path)}}" alt="Image"/></br>
  @endif
  <br>
  <h5>{{$announcement->desc}}</h5>
  <hr>

</div>
@if(!empty($exercises))
@foreach ($exercises as $key => $exercise)
@if(!isset($exercise['year']))
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
    <td>{{$exer->results}}</td>
  </tr>
   @endforeach

</table>

@else
<strong><div class="row justify-content-center" style="margin-top:20px">
YEAR {{$exercise['year']}}
            EXERCISES NOT AVAILABLE
</div></strong>
@endif
<hr style="position: relative;top: 20px;border: none;height: 8px;background: black;margin-bottom: 50px;"/>

@endforeach

@endif

@endsection
