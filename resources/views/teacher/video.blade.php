@extends('layouts.layout')

@section('content')
@if (session('message'))
    <div class="alert alert-primary" role="alert">
        {{ session('message') }}
    </div>
@endif
<table class="table table-dark table-striped" style="margin-top:20px">
<tr>
    <th><a type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modal-new">New</a></th>
    <th></th>
    <th></th>
    <th></th>




  </tr>
<tr>
    <th>No</th>
    <th>Video Name</th>
    <th>Year</th>
    <th>Action</th>
  </tr>
  @if(!empty($videos))
    @foreach($videos as $video)
  <tr>


    <td>{{$video->videoId}}</td>
    <td>{{$video->videoName}}</td>
    <td>{{$video->year}}</td>
    <td><a type="button" href="/student/videos/{{$video->videoId}}" class="btn btn-light">View</a>
    <a type="button" href="/student/videos/delete/{{$video->videoId}}" class="btn btn-danger">Delete</a>
    @endforeach
    @else
    <td>NOT AVAILABLE</td>
    <td>NOT AVAILABLE</td>
    <td>NOT AVAILABLE</td>
    <td>NOT AVAILABLE</td>
    <td>NOT AVAILABLE</td>
    @endif
    </td>
  </tr>

</table>

 <!-- Modal -->
 <div class="modal fade" id="modal-new" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New Video</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('videosStore') }}" enctype="multipart/form-data">
      @csrf

        <label>Video Name:</label><input id="name" name="name" type="text" class="form-control" placeholder="name"  aria-label="name" aria-describedby="basic-addon2"></br>
        <label>Subject Name:</label><select id="subjname"  name ="subjname"class="form-select" aria-label="Default select example">
                                        <option selected>Select subject</option>
                                        @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->SubjectName}}</option>
                                        @endforeach
                                      </select>
        <label>Year Name:</label><select id="years"  name ="years"class="form-select" aria-label="Default select example">
                                        <option selected>Select year</option>
                                        @foreach($years as $year)
                                        <option value="{{$year->id}}">{{$year->year}}</option>
                                        @endforeach
                                      </select>

        <label>Upload:</label><input id="file" name="file" type="file" class="form-control" placeholder="file" aria-label="file" aria-describedby="basic-addon5"></br>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
  </form>
    </div>
  </div>
</div>


@endsection
