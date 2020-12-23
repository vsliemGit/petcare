{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.index` --}}
@section('title')
About us | PETCARE
@endsection

@section('custom-css')
<style>

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 5px;
  box-sizing: inherit;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 5px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container-item {
  padding: 0 16px;
}

.container-item::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button-contact {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button-contact:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
@endsection

{{-- Content of index --}}
@section('main-content')
<div id="contact-page" class="container">
    <div class="about-section">
        <h1>About Us Page</h1>
        <p>Some text about who we are and what we do.</p>
        <p>Resize the browser window to see that this page is responsive by the way.</p>
      </div>
      
      <h2 style="text-align:center">Our Team</h2>
      <div class="row">
        <div class="column">
          <div class="card">
            <img src="vendor/frontend/images/aboutus/team1.jpg" alt="Jane" style="width:100%">
            <div class="container-item">
              <h2>Jane Doe</h2>
              <p class="title">CEO & Founder</p>
              <p>Some text that describes me lorem ipsum ipsum lorem.</p>
              <p>jane@example.com</p>
              <a href="{{route('frontend.contact')}}">
                  <p><button class="button-contact" >Contact</button></p>
              </a>
            </div>
          </div>
        </div>
      
        <div class="column">
          <div class="card">
            <img src="vendor/frontend/images/aboutus/team2.jpg" alt="Mike" style="width:100%">
            <div class="container-item">
              <h2>Mike Ross</h2>
              <p class="title">Art Director</p>
              <p>Some text that describes me lorem ipsum ipsum lorem.</p>
              <p>mike@example.com</p>
              <a href="{{route('frontend.contact')}}">
                  <p><button class="button-contact" >Contact</button></p>
              </a>
            </div>
          </div>
        </div>
        
        <div class="column">
          <div class="card">
            <img src="vendor/frontend/images/aboutus/team3.jpg" alt="John" style="width:100%">
            <div class="container-item">
              <h2>John Doe</h2>
              <p class="title">Designer</p>
              <p>Some text that describes me lorem ipsum ipsum lorem.</p>
              <p>john@example.com</p>
              <a href="{{route('frontend.contact')}}">
                  <p><button class="button-contact" >Contact</button></p>
              </a>
            </div>
          </div>
        </div>
    </div> 
   
</div>
@endsection