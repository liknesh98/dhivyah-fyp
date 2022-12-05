@extends('layouts.layout')

@section('content')
@if (session('message'))
    <div class="alert alert-primary" role="alert">
        {{ session('message') }}
    </div>
@endif
<style>
body{
    color: #6F8BA4;
    margin-top:20px;
}
.section {
    padding: 100px 0;
    position: relative;
}
.gray-bg {
    background-color: #f5f5f5;
}
img {
    max-width: 100%;
}
img {
    vertical-align: middle;
    border-style: none;
}
/* About Me 
---------------------*/
.about-text h3 {
  font-size: 45px;
  font-weight: 700;
  margin: 0 0 6px;
}
@media (max-width: 767px) {
  .about-text h3 {
    font-size: 35px;
  }
}
.about-text h6 {
  font-weight: 600;
  margin-bottom: 15px;
}
@media (max-width: 767px) {
  .about-text h6 {
    font-size: 18px;
  }
}
.about-text p {
  font-size: 18px;
  max-width: 450px;
}
.about-text p mark {
  font-weight: 600;
  color: #20247b;
}

.about-list {
  padding-top: 10px;
}
.about-list .media {
  padding: 5px 0;
}
.about-list label {
  color: #20247b;
  font-weight: 600;
  width: 88px;
  margin: 0;
  position: relative;
}
.about-list label:after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  right: 11px;
  width: 1px;
  height: 12px;
  background: #20247b;
  -moz-transform: rotate(15deg);
  -o-transform: rotate(15deg);
  -ms-transform: rotate(15deg);
  -webkit-transform: rotate(15deg);
  transform: rotate(15deg);
  margin: auto;
  opacity: 0.5;
}
.about-list p {
  margin: 0;
  font-size: 15px;
}

@media (max-width: 991px) {
  .about-avatar {
    margin-top: 30px;
  }
}

.about-section .counter {
  padding: 22px 20px;
  background: #ffffff;
  border-radius: 10px;
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
}
.about-section .counter .count-data {
  margin-top: 10px;
  margin-bottom: 10px;
}
.about-section .counter .count {
  font-weight: 700;
  color: #20247b;
  margin: 0 0 5px;
}
.about-section .counter p {
  font-weight: 600;
  margin: 0;
}
mark {
    background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
    background-size: 100% 3px;
    background-repeat: no-repeat;
    background-position: 0 bottom;
    background-color: transparent;
    padding: 0;
    color: currentColor;
}
.theme-color {
    color: #fc5356;
}
.dark-color {
    color: #20247b;
}
</style>

<div class="container">
  
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                        
                            <div class="row about-list">
                                <div class="col-md-6">
                               
                                    <div class="media">
                                        <label>Name</label>
                                        <p>{{$userdetails->name}}</p>
                                    </div>
                                    @if($userdetails->role == 1 )
                                    <div class="media">
                                        <label>Year</label>
                                        <p>{{$userdetails->year_id}}</p>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>E-mail</label>
                                        <p>{{$userdetails->email}}</p>
                                    </div>
                                    
                                    <div class="media">
                                    <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-edit-{{$userdetails->id}}">Update</a>
                                    <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-changepwd-{{$userdetails->id}}">Change Password</a>
                                    </div>
                                
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title="" alt="">
                        </div>
                    </div>
                </div>
                  
            </div>
            <!-- modal -->
            <div class="modal fade" id="modal-edit-{{$userdetails->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Update Details</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('updateprofile') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                      <input type="hidden" id="id" name="id" value="{{$userdetails->id}}">
                      <input type="hidden" id="hiddenyear" name="hiddenyear" value="{{$userdetails->year_id}}">
                      <label>Name:</label><input id="name" name="name" type="text" class="form-control" placeholder="name" value="{{$userdetails->name}}" aria-label="name" aria-describedby="basic-addon2"></br>
                      <label>Email:</label><input id="email" name="email" type="text" class="form-control" placeholder="email" value="{{$userdetails->email}}" aria-label="email" aria-describedby="basic-addon3"></br>
    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="modal-changepwd-{{$userdetails->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form name="myForm" onsubmit="return validateForm()" method="POST" action="{{ route('changepassword')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                      <input type="hidden" id="id" name="id" value="{{$userdetails->id}}">
                      <label>New Password:</label><input id="newpwd" name="newpwd" type="password" class="form-control" placeholder="password"  aria-label="password" aria-describedby="basic-addon4"></br>
                      <label>Confirm Password:</label><input id="conpwd" name="conpwd" type="password" class="form-control" placeholder="confirm password"  aria-label="confirm password" aria-describedby="basic-addon5"></br>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                  </div>
                </div>
              </div>
              
              <script>
          function validateForm() {
          let x = document.forms["myForm"]["newpwd"].value;
          let y = document.forms["myForm"]["conpwd"].value;
            if (x == "") {
            alert("New password must be filled out");
                return false;
              }
              if (y == "") {
            alert("Confirm password must be filled out");
                return false;
              }
              if(x != y ){
                alert("Password do not match");
                return false;
              }
              }
          </script>
@endsection


