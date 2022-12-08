@extends('layouts.layout')

@section('content')
<h1>{{$video->name}}</h1>
<video width="1000" height="500" controls>
  <source src="{{(url($video->file_name))}}" type="video/mp4">
  
  Your browser does not support the video tag.
</video>



@endsection