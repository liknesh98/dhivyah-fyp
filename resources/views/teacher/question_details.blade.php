@extends('layouts.layout')

@section('content')
<div class="overflow-auto" style="margin-top: 20px;">
<div class="container text-center">
  <div class="row">
    <div class="col">
    <div class="card" style="width: 18rem;">
            <img src="{{url($question->file_name)}}" class="card-img-top" alt="No image">
            <div class="card-body">
              <h5 class="card-title">Question: {{$question->quest_name}}</h5>
              @foreach ($answers as $answer)
              @php
                if($answer->file_name != null){ // you can check your condition here.
                $img = url($answer->file_name);
                }else{
                $img = "";
                }

                if($answer->answer_status != 0){ // you can check your condition here.
                $answer_status = "YES";
                }else{
                $answer_status = "NO";
                }

              @endphp
                <img src="{{$img}}" class="card-img-top" alt="No image">
                <p class="card-text">Answer: {{$answer->ans_name}}</p>
                <p class="card-text">Correct Answer: {{$answer_status}}</p>
                <br>
                <br>
              @endforeach

            </div>
    </div>


    </div>
    <div class="col">
    <div class="input-group">
  <div class="input-group-text">
    <input class="form-check-input mt-0" type="radio" value="" name="questionID" aria-label="Radio button for following text input">
  </div>
  <input type="text" class="form-control" aria-label="Text input with radio button" value="OptionA"  disabled>
  <div class="input-group-text">
    <input class="form-check-input mt-0" type="radio" value="" name="questionID" aria-label="Radio button for following text input">
  </div>
  <input type="text" class="form-control" aria-label="Text input with radio button" value="OptionB"  disabled>
  <div class="input-group-text">
    <input class="form-check-input mt-0" type="radio" value="" name="questionID" aria-label="Radio button for following text input">
  </div>
  <input type="text" class="form-control" aria-label="Text input with radio button" value="OptionC" disabled>
  <div class="input-group-text">
    <input class="form-check-input mt-0" type="radio" value="" name="questionID" aria-label="Radio button for following text input">
  </div>
  <input type="text" class="form-control" aria-label="Text input with radio button" value="OptionD"  disabled>
</div>

    </div>
  </div>

</div>
</div>
@endsection


