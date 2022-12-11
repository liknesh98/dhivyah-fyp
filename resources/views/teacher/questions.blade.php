@extends('layouts.layout')

@section('content')

<table class="table table-dark table-striped" style="margin-top:20px">
<tr>
    <th></th>
    <th></th>
    <th style="text-align: right;"><a type="button" class="btn btn-light" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#add_modal1">New Question</a>
    </th>



  </tr>
<tr>
    <th>No</th>
    <th>Question</th>
    <th style="text-align: right;">Action</th>
  </tr>

  @php
    $count = 0
    @endphp
  @foreach ($questions as $question)
    @php
        $count++
    @endphp
  <tr>
    <td>{{$count}}</td>
    <td>{{$question->quest_name}}</td>
    <td style="text-align: right;">
        <a href="{{route('teacher/question_details', ['question_id'=>$question->id])}}" type="button" class="btn btn-light">View</a>
        <a href="{{route('quest_delete', ['id'=>$question->id])}}" type="button" class="btn btn-danger">Delete</a>
    </td>
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
                                        Add Question
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
                                    <form method="POST" action="{{ route('/quest_store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" class="form-control" name="exercise_id" value="{{ $exercise->id }}">

                                        <div class="row mb-3">
                                            <label for="exercise" class="col-md-4 col-form-label text-md-end">{{ __('Exercise') }}</label>
                                            <label for="exercise" class="col-md-4 col-form-label text-md-end">{{ $exercise->name }}</label>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="year" class="col-md-4 col-form-label text-md-end">{{ __('Year') }}</label>
                                            <label for="year" class="col-md-4 col-form-label text-md-end">{{ $exercise->year }}</label>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="question_name" class="col-md-4 col-form-label text-md-end">{{ __('Question') }}</label>

                                            <div class="col-md-6">
                                                <input id="question_name" type="text" class="form-control @error('question_name') is-invalid @enderror" name="question_name" value="{{ old('question_name') }}" required autocomplete="question_name" autofocus>

                                                @error('question_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-md-4 col-form-label">{{ __('File Upload') }}</label>
                                            <input type="file" id="file_upload" class="form-control" name="question_file_upload">
                                        </div>

                                        <div class="row mb-3">
                                            <label for="question" class="col-md-4 col-form-label">{{ __('No. Answer') }}</label>

                                                <select name="subject" onchange="display_answer_fields(this)" class="col-md-4 col-form-select" aria-label="Default select example">
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                                <br>
                                            <div id="answer_div_id">

                                            </div>
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


                    <script>
                        function display_answer_fields(element)
                        {

                            var select_value = element.value;

                            input_to_append = "";
                            for (var i=0; i<select_value; i++)
                            {
                                input_to_append += "<div class=\"row mb-3\"><label for=\"answer_name\" class=\"col-md-4 col-form-label\">{{ __('Answer') }}</label><div class=\"col-md-6\"><input type=\"text\" class=\"form-control @error('desc') is-invalid @enderror\" name=\"answer_name["+i+"]\" required autocomplete=\"current-desc\">@error('desc')<span class=\"invalid-feedback\" role=\"alert\"><strong>{{ $message }}</strong></span>@enderror</div></div><div class=\"row mb-3\"><label class=\"col-md-4 col-form-label\">{{ __('Image Upload') }}</label><input type=\"file\" class=\"form-control\" name=\"ans_image_upload["+i+"]\"></div><div class=\"row mb-3\"><label for=\"answer_status["+i+"]\">Correct Answer</label><br><br><input type=\"radio\" name=\"answer_status\" value=\""+i+"\"></div>";
                            }

                            document.getElementById("answer_div_id").innerHTML = input_to_append;

                        }


                        //
                    </script>
@endsection
