@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-body">

                @foreach ($announcements as $announcement)
                <div class="card">
                    <div >
                        {{$announcement->name}}
                    </div>
                    <div >
                        <a href="{{route('announcement_delete', ['id'=>$announcement->id])}}">Delete</a>
                    </div>
                    <div >
                        <a href="" onclick="edit_item('{{$announcement->id}}')">Edit</a>
                    </div>
                    <div>
                        {{$announcement->desc}}
                    </div>
                </div>
                @endforeach

                    <!-- Trigger/Open The Modal -->

                    <!-- <button id="add_btn">Open Modal</button> -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_modal1">Open Modal</button>

                </div>
        </div>
    </div>
</div>


                    <!-- Add Modal -->
                    <div id="add_modal1" class="modal" tabindex="-1">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>

                            <form method="POST" action="{{ route('announcement_store') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                        <input id="desc" type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" required autocomplete="current-desc">

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

                        </div>

                    </div>


                    <!-- Edit Modal -->
                    <div id="edit_modal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="edit_close">&times;</span>

                            <form method="POST" action="{{ route('announcement_store') }}">
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

                        </div>

                    </div>

                    <script>
                        function edit_item(id)
                        {
                            var edit_data = @json($announcements);
                            // var edit_fields = {!! json_encode($announcements) !!};
                            // var edit_fields = @($announcements);

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


                        //
                    </script>
@endsection
