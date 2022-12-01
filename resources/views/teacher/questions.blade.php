@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-body">

                @foreach ($questions as $question)
                <div class="card">
                    <div >
                        {{$question->quest_name}}
                    </div>
                    <div>
                        {{$question->file_name}}
                    </div>
                    <div >
                        <a href="{{route('quest_delete', ['id'=>$question->id])}}">Delete</a>
                    </div>
                    <div >
                        <a href="" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_item('{{$question->id}}')">Edit</a>
                    </div>
                </div>
                @endforeach

                    <!-- Trigger/Open The Modal -->

                    <!-- <button id="add_btn">Open Modal</button> -->
                    <button class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#add_modal1">Open Modal</button>

                </div>
        </div>
    </div>
</div>


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
                                            <label class="col-md-4 col-form-label text-md-end">{{ __('File Upload') }}</label>
                                            <div class="col-md-6">
                                                <input type="file" id="file_upload" name="question_file_upload">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="question" class="col-md-4 col-form-label text-md-end">{{ __('No. Answer') }}</label>

                                            <div class="col-md-6">
                                                <select name="subject" onchange="display_answer_fields(this)" class="form-select" aria-label="Default select example">
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
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


                    <!-- Edit Modal -->
                    <div id="edit_modal" class="modal fade" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!-- Modal content -->
                            <div class="modal-content rounded">
                                <!--begin::Modal header-->
                                <div class="modal-header pb-0 border-0 justify-content">
                                    <h1 class="modal-title">
                                        Edit Announcement
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
                                    <form method="POST" action="{{ route('note_update') }}">
                                        @csrf
                                        <input id="id_edit_id" type="hidden" class="form-control" name="id">

                                        <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="id_edit_name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="desc" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                            <div class="col-md-6">
                                                <input id="id_edit_desc" type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" required autocomplete="current-desc">

                                                @error('desc')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label for="desc" class="col-md-4 col-form-label text-md-end">{{ __('Image Upload - Later') }}</label>
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
                        function edit_item(id)
                        {
                            var edit_data = @json($questions);
                            // var edit_fields = {!! json_encode($questions) !!};
                            // var edit_fields = @($notes);

                            console.log(edit_data);

                            for (var i = 0; i < edit_data.length; i++)
                            {
                                // console.log(edit_data[i]['name']);
                                if( edit_data[i]['id'] == id)
                                {
                                    // var keys = Object.keys(edit_fields);
                                    var id_field = document.getElementById("id_edit_id");
                                    var name_field = document.getElementById("id_edit_name");
                                    var desc_field = document.getElementById("id_edit_desc");
                                    id_field.value = edit_data[i]['id'];
                                    name_field.value = edit_data[i]['name'];
                                    desc_field.value = edit_data[i]['desc'];

                                    break;
                                }


                            }
                            // $('#edit_modal').modal('show');
                            var edit_modal = document.getElementById("edit_modal");
                            edit_modal.style.display = "block";
                            // edit_modal.style.display = "none";
                        }
                        function display_answer_fields(element)
                        {

                            var select_value = element.value;

                            input_to_append = "";
                            for (var i=0; i<select_value; i++)
                            {
                                input_to_append += "<div class=\"row mb-3\"><label for=\"answer_name\" class=\"col-md-4 col-form-label text-md-end\">{{ __('Answer') }}</label><div class=\"col-md-6\"><input type=\"text\" class=\"form-control @error('desc') is-invalid @enderror\" name=\"answer_name["+i+"]\" required autocomplete=\"current-desc\">@error('desc')<span class=\"invalid-feedback\" role=\"alert\"><strong>{{ $message }}</strong></span>@enderror</div></div><div class=\"row mb-3\"><label class=\"col-md-4 col-form-label text-md-end\">{{ __('Image Upload') }}</label><input type=\"file\" name=\"ans_image_upload["+i+"]\"></div>";
                            }

                            document.getElementById("answer_div_id").innerHTML = input_to_append;

                        }


                        //
                    </script>
@endsection
