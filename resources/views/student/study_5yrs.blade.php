@extends('layouts.layout')

@section('content')

  <div class="border border-primary" style="margin-top: 20px; background-color: #a7040457;" >
    
    <div class="row" style="margin-left:20px;margin-top: 20px;;margin-bottom: 20px;">
      <ul class="nav nav-pills" >
        <li class="nav-item " style="margin-right: 15px; margin-left: 15px;">
          <a style="padding-top:20px; padding-bottom:20px" class="nav-link active" aria-current="page" href="{{url('4material')}}">Year 1 </a>
        </li>
        <li class="nav-item" style="margin-right: 15px; margin-left: 15px;">
            <a style="padding-top:20px; padding-bottom:20px" class="nav-link active" aria-current="page" href="{{url('5material')}}">Year 2</a>
          </li>
          <li class="nav-item" style="margin-right: 15px; margin-left: 15px;">
            <a style="padding-top:20px; padding-bottom:20px" class="nav-link active" aria-current="page" href="{{url('6material')}}">Year 3</a>
          </li>
          <li class="nav-item" style="margin-right: 15px; margin-left: 15px;">
            <a style="padding-top:20px; padding-bottom:20px" class="nav-link active" aria-current="page" href="{{url('6material')}}">Year 4</a>
          </li>
          <li class="nav-item" style="margin-right: 15px; margin-left: 15px;">
            <a style="padding-top:20px; padding-bottom:20px" class="nav-link active" aria-current="page" href="{{url('6material')}}">Year 5</a>
          </li>
          <li class="nav-item" style="margin-right: 15px; margin-left: 15px;">
            <a style="padding-top:20px; padding-bottom:20px" class="nav-link active" aria-current="page" href="{{url('6material')}}">Year 6</a>
          </li>
        </ul>
</div>



   
  
</div>
<div class="border border-warning" style="margin-top: 20px;"></div>
<div class="border border-primary" style="margin-top: 20px; background-color: #a7040457;">
    <div class="container">
        <div class="row" style="margin-top: 20px; margin-bottom: 20px;" >
          <div class="col col-lg-4" >
            <div class="card" style="width: 18rem; border-style: solid;">
                <div class="card-header">
                    <h5 class="card-title">Subject1</h5>
                    
                  </div>
                <img class="card-img-top" src="{{asset('img/cat-2.jpg')}}" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
          </div>
          <div class="col col-lg-4">
            
            <div class="card" style="width: 18rem; border-style: solid;">
                <div class="card-header">
                    <h5 class="card-title">Subject2</h5>
                  </div>
                <img class="card-img-top" src="{{asset('img/cat-2.jpg')}}" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
          </div>
          <div class="col col-lg-4">
            
            <div class="card" style="width: 18rem; border-style: solid;">
                <div class="card-header">
                    <h5 class="card-title">Subject3</h5>
                  </div>
                <img class="card-img-top" src="{{asset('img/cat-2.jpg')}}" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
          </div>
        </div>
        <div class="row justify-content-md-center" style="margin-bottom: 20px; margin-tops: 20px">
            <div class="col col-lg-4">
                
                <div class="card" style="width: 18rem; border-style: solid;">
                    <div class="card-header">
                        <h5 class="card-title">Subject4</h5>
                      </div>
                    <img class="card-img-top" src="{{asset('img/cat-2.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            
            <div class="col col-lg-4">
               
                <div class="card" style="width: 18rem; border-style: solid;">
                    <div class="card-header">
                        <h5 class="card-title">Subject5</h5>
                      </div>
                    <img class="card-img-top" src="{{asset('img/cat-2.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
          </div>
      </div>
      
</div>


</div>


@endsection
