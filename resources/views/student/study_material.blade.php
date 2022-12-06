@extends('layouts.layout')

@section('content')

<div class="container" style="margin-top: 20px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="note">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#notes" aria-expanded="true" aria-controls="collapseOne">
        #Notes
      </button>
    </h2>
    <div id="notes" class="accordion-collapse collapse show" aria-labelledby="note" data-bs-parent="#accordionExample">

        <div class="accordion-body">
            @if( !($notes->isEmpty()))
            @for($i=0; $i < sizeof($notes); $i++)

            <strong><a href="/student/notes/{{$notes[$i]->id}}" target="_BLANK">{{$notes[$i]->Notetitle}}</a></strong> </br>
            @endfor
            @else
            <strong>NOTES NOT AVAILABLE</strong> </br>
            @endif
        </div>

    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="exercise">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#exercises" aria-expanded="false" aria-controls="collapseTwo">
        #Exercises
      </button>
    </h2>
    <div id="exercises" class="accordion-collapse collapse" aria-labelledby="exercise" data-bs-parent="#accordionExample">


        <div class="accordion-body">
        @if( !($exercises->isEmpty()))
            @for($i=0; $i < sizeof($exercises); $i++)

            <strong><a href="/student/exercise/{{$exercises[$i]->id}}">{{$exercises[$i]->name}}</a></strong>
            Result:
            <strong><a href="/student/exercise/{{$exercises[$i]->id}}">{{$exercises[$i]->results}}</a></strong> </br>
            @endfor
            @else
            <strong>EXERCISES NOT AVAILABLE</strong> </br>
            @endif
        </div>


    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="video">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#videos" aria-expanded="false" aria-controls="collapseThree">
        #Videos
      </button>
    </h2>
    <div id="videos" class="accordion-collapse collapse" aria-labelledby="video" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
@endsection
