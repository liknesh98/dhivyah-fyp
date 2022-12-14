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
    <th>Announcement Name</th>
    <th>Announcement Description</th>
    <th>Image</th>
    <th>Action</th>
  </tr>

  @php
    $count = 0
    @endphp
    @foreach ($announcements as $announcement)
    @php
        $count++
    @endphp
  <tr>
    <td>{{$count}}</td>
    <td> {{$announcement->name}}</td>
    <td> {{$announcement->desc}}</td>
    @if (isset($announcement->img_path))
    <td> <img style="width:250px; height:250px;" src="{{url($announcement->img_path)}}" alt="Image"/></td>
    @else 
    <td>NOT AVAILABLE</td>
    @endif
    <td><a type="button" class="btn btn-light" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_item('{{$announcement->id}}')">Edit</a>
    <a type="button" class="btn btn-danger" href="{{route('announcement_delete', ['id'=>$announcement->id])}}">Delete</a>
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
                                        Add Announcement
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
                                    <form method="POST" action="{{ route('announcement_store') }}" enctype="multipart/form-data">
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
                                            <label class="col-md-4 col-form-label text-md-end">{{ __('Image Upload') }}</label>
                                            <input type="file" id="image_upload" name="image_upload">
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
                                    <form method="POST" action="{{ route('announcement_update') }}">
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
