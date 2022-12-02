@extends('layouts.layout')

@section('content')
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
    <th>Year</th>
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
    <td><a href="{{route('/teacher/question', ['exercise_id'=>$exercise->id])}}" type="button" class="btn btn-light">Add</a></td>
    <td><a type="button" class="btn btn-light">View</a>
    <a type="button" class="btn btn-danger">Delete</a></td>
  </tr>
   @endforeach

</table>

<!-- Add Modal -->
<div id="add_modal1" class="modal fade" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!-- Modal content -->
                            <div class="modal-content rounded">
                                <!--begin::Modal header-->
                                <div class="modal-header pb-0 border-0 justify-content">
                                    <h1 class="modal-title">
                                        Add Exercises
                                    </h1>
                                    <!--begin::Close-->
                                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Close-->
                                </div><hr>

                                <!--begin::Modal body-->
                                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                    <form method="POST" action="{{ route('exercise_store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="exercise" class="col-md-4 col-form-label text-md-end">{{ __('Exercise Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="exercise" type="text" class="form-control @error('exercise') is-invalid @enderror" name="exercise" value="{{ old('exercise') }}" required autocomplete="exercise" autofocus>

                                                @error('exercise')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                        <label for="year" class="col-md-4 col-form-label text-md-end">{{ __('Year') }}</label>
                                            <select name="year" class="form-select" aria-label="Default select example">
                                            @php
                                                $count = 0
                                            @endphp
                                            @foreach ($drop_years as $year)
                                                <option @if($count == 0) selected @endif value="{{$year->id}}">{{$year->year}}</option>
                                                @php
                                                    $count++
                                                @endphp
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Submit') }}
                                                </button>
                                            </div>
                                        </div>

                                    </form>
                                    <!--end:Form-->
                                </div>
                                <!--end::Modal body-->
                                </div>

                        </div>
                    </div>


@endsection
