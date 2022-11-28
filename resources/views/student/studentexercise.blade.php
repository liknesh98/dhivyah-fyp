@extends('layouts.layout')

@section('content')
<div class="overflow-auto" style="margin-top: 20px;">
<div class="container text-center">
  <div class="row">
    <div class="col">
    <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="No image">
            <div class="card-body">
              <h5 class="card-title">Question is a question when curiosity is being asked. </h5>
              <img src="..." class="card-img-top" alt="No image">
              <p class="card-text">Option A</p>
              <img src="..." class="card-img-top" alt="No image">
              <p class="card-text">Option B</p>
              <img src="..." class="card-img-top" alt="No image">
              <p class="card-text">Option C</p>
              <img src="..." class="card-img-top" alt="No image">
              <p class="card-text">Option D</p>
              
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


