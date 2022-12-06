@extends('layouts.layout')

@section('content')

    @if( !($questions->isEmpty()))
    <form method="POST" action="{{ route('calculate_result') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" class="form-control" aria-label="Text input with radio button" name="exercise_id" value="{{$exercise_id}}">
        @foreach($questions as $question)
            <div class="overflow-auto" style="margin-top: 20px;">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                    <img src="{{url($question->file_name)}}" class="card-img-top" alt="No image">
                                    <div class="card-body">
                                    <h5 class="card-title">Question: </h5>
                                    <br>
                                        <h5 class="card-title">{{$question->quest_name}}</h5>

                                        @foreach($question->answers as $answer)
                                                <p class="card-text"><b>Option:  </b></p>
                                            @if (isset($answer->file_name))
                                                <img src="{{url($answer->file_name)}}" class="card-img-top" alt="No image">
                                            @endif

                                                <p class="card-text">{{$answer->ans_name}}</p>
                                        @endforeach

                                    </div>
                            </div>


                        </div>
                        <div class="col">
                            <div class="input-group">
                                @foreach($question->answers as $answer)
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="radio" value="{{$answer->id}}" name="{{$question->id}}" aria-label="Radio button for following text input">
                                </div>
                                <input type="text" class="form-control" aria-label="Text input with radio button" value="{{$answer->ans_name}}"  disabled>
                                @endforeach
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        @endforeach
            <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
        </form>
        @else
            <strong>EXERCISES NOT AVAILABLE</strong> </br>
    @endif

@endsection


