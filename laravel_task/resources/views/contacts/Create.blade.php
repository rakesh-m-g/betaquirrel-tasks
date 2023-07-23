@extends('contacts.layout')
@section('content')
<head>
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<nav>
  <div class="left-nav img">
    <img src="/image/logo.png" alt="logoimage"/>
    <h2>One School</h2>
  </div>
  <div class="right-nav img">
  <img src="https://drscdn.500px.org/user_avatar/1016067573/q%3D85_w%3D300_h%3D300/v2?webp=true&v=1&sig=d24f7d8889800c0aef4b76b2d11741318916be54d5ec9d32ac29cf416c854162" alt="logoimge" />
  </div>
</nav>
<div class="main-container">
  <div class="side-container">
    <ul>
    <ul class="flex">
      <li style="padding: 2px;">
        <!-- <img src="image/student.png" alt="student" /> -->
        <div style="display: flex ;padding:.75em;"  ><i class="fa-regular fa-user" style="color: #6d4712;padding-top:8px;padding-right:8px;"></i><h5  >STUDENTS</h5></div>
        <div style="display: flex ;padding:.75em;"  ><i class="fa-solid fa-clipboard-user" style="color: #7d5d26; padding-top:8px;padding-right:8px;"></i><h5 >STAFF</h5></div>
        <div style="display: flex ;padding:.75em;"  ><i class="fa-solid fa-book" style="color: #8e691a; padding-top:8px;padding-right:8px;"></i><h5 >EXAMS</h5></div>
    </ul>
  </ul>
  </div>
  <div class="student">STUDENT REGISTRATION</div>
  <div class="right-form">
      <form action="{{ url('contact') }}" method="post" class="row needs-validation g-3" >
        {!! csrf_field() !!}
      <div class="col-md-6">
        <label for="first-name" class="form-label">First Name<span class="text-danger">*</span> :</label>
        <input type="text" class="form-control" id="first-name" name="first_name" required/>
      </div>
      <div class="col-md-6 gap-2">
        <label for="last-name" class="form-label">Last Name<span class="text-danger">*</span> :</label>
        <input type="text" class="form-control" id="last-name" name="last_name" required />
      </div>
      <!-- mobile -->
      <div class="col-md-6">
        <label for="mobile" class="form-label">Mobile<span class="text-danger">*</span> :</label>
        <input type="tel" class="form-control" id="mobile" name="mobile" required />
      </div>
      <!--email-->
      <div class="col-md-6">
        <label for="Email" class="form-label">Email<span class="text-danger">*</span> :</label>
        <input type="email" class="form-control" id="Email" name="Email" required />
      </div>
      <!--branch-->
      <div class="col-md-6">
        <label for="branch" class="form-label">Branch<span class="text-danger">*</span> :</label>
        <select class="form-select form-select-md mb-3" id="branch" name="branch" aria-label=".form-select-lg example" required>
          <option selected value="">Select your branch</option>
          <option value="CS">Computer Science</option>
          <option value="ECE">Electronics and communications</option>
          <option value="IT">Information technology</option>
        </select>
      </div>
      <!--hostel radio-->
      <div class="col-md-6">
        <label for="Hostel" class="form-label col-md-12">Do You Need Hostel Fecility :</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="Hostel" id="yes" value="yes" />
          <label class="form-check-label" for="yes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="Hostel" id="no" value="no" />
          <label class="form-check-label" for="no">No</label>
        </div>
      </div>
      <!--choose subjuct-->
      <label class="form-check-label" for="subject">Choose Aditional Subject<span class="text-danger">*</span> :
      </label>
    <div class="col-md-12">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="cyber" name="subject" value="cyber" />
          <label class="form-check-label" for="cyber">Cyber Security</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="ai" name="subject" value="ai" />
          <label class="form-check-label" for="ai">Artificial Intelligence</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="blockchain" name="subject" value="blockchain" />
          <label class="form-check-label" for="blockchain">Blockchain</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="iot" name="subject" value="iot" />
          <label class="form-check-label" for="iot">IoT</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="robotics" name="subject[]" value="robotics" />
          <label class="form-check-label" for="robotics">Robotics</label>
        </div>
      </div> 
      <label class="form-check-label" for="address">Premanent address<span class="text-danger">*</span> :</label>
      <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="address" name="address" value="address"  required style="height: 100px"></textarea>
        <label for="floatingTextarea2">Enter your address</label>
      </div>
      <div class="button gap-2 d-md-flex justify-content-md-end" >
        <button type="reset" class="btn btn-danger"style="width:120px; height:50px" >
          <i class="bi bi-arrow-clockwise"style="padding: 0px ;margin:0px; float:none" ></i>Reset
        </button>
        <button type="submit" class="btn btn-success"  style="width:120px; height:50px">
          <i class="bi bi-check2-square" style="padding: 0px ;margin:0px; float:none"></i>Submit
        </button>
      </div>
    </form>
  </div>
</div>
  </body>
@stop











