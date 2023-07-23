<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>task-8</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <?php
  $first_name = "";
  $last_name = "";
  $first_name_error = "";
  $last_name_error = "";
  $mobile = "";
  $mobile_error = "";
  $email = "";
  $email_error = "";
  $branch = "";
  $branch_error = "";
  $hostel = "";
  $hostel_error = "";
  $subject = "";
  $add_subject = "";
  $adress = "";
  $adress_error = "";
  $error = false;

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first_name = sanitizeField($_POST["first_name"]);
    $last_name = sanitizeField($_POST["last_name"]);
    $mobile = sanitizeField($_POST["mobile"]);
    $email = sanitizeField($_POST["email"]);
    $branch = sanitizeField($_POST["branch"]);
    if (isset($_POST['hostel'])) {

      $hostel = sanitizeField($_POST["hostel"]);
    }
    $adress = sanitizeField($_POST["adress"]);
    if (isset($_POST['add_subject'])) {

      $add_subject = $_POST['add_subject'];
      $subject = implode(",", $add_subject);
      // $subject = '';
      // foreach ($add_subject as $row) {
      //   $subject .= $row . ",";
      // }
    }


    if (empty($first_name)) {
      $first_name_error = 'First name is mandatory';
      $error = true;
    }
    if (empty($last_name)) {
      $last_name_error = 'Last name is mandatory';
      $error = true;
    }
    if (empty($mobile)) {
      $mobile_error = 'Phone Number is mandatory';
      $error = true;
    }
    if (empty($email)) {
      $email_error = 'E-mail is mandatory';
      $error = true;
    }
    if (empty($branch)) {
      $branch_error = 'branch is mandatory';
      $error = true;
    }
    if (empty($hostel)) {
      $hostel_error = 'choose one';
      $error = true;
    }
    if (empty($adress)) {
      $adress_error = 'Adress is mandatory';
      $error = true;
    }


    $conn = new mysqli('localhost', 'root', '', 'school');
    if ($conn->connect_error) {
      die('connection_error' . $conn->connect_error);
    }
    if (!$error) {
      $sql = "INSERT INTO student(first_name,last_name,mobile,email,branch,hostel,subject,adress) VALUES ('$first_name','$last_name','$mobile','$email','$branch','$hostel','$subject','$adress')";
      if ($conn->query($sql) === TRUE) {
        echo "student saved as " . $first_name;
      } else {
        echo $conn->error;
      }
      $conn->close();
    }
  }

  function sanitizeField($field)
  {
    $field = trim($field);
    $field = stripslashes($field);
    $field = htmlspecialchars($field);
    return $field;
  }
  ?>
  <nav>
    <div class="left-nav img">
      <img src="image/logo.png" alt="logoimge" />
      <h2>One School</h2>
    </div>
    <div class="right-nav img">
      <img src="image/person2.jpg" alt="logoimge" />
    </div>
  </nav>
  <div class="main-container">
    <div class="side-container">
      <ul>
        <li>
          <h4>STUDENTS</h4>
        </li>
        <li>
          <h4>STAFF</h4>
        </li>
        <li>
          <h4>EXAMS</h4>
        </li>
      </ul>
    </div>
    <div class="student">STUDENT REGISTRATION</div>
    <div class="right-form">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="row needs-validation g-3" method="POST">
        <div class="col-md-6">
          <label for="first-name" class="form-label">First name<span class="text-danger">*</span> :</label>
          <input type="text" class="form-control" id="first-name" name="first_name" ?>
          <?php
          if ($first_name_error != "") { ?>
            <div class=" invalid-feedback" style="display:block">first name is reuired
            </div>
          <?php }
          ?>
        </div>
        <div class="col-md-6 gap-2">
          <label for="last-name" class="form-label">Last name<span class="text-danger">*</span> :</label>
          <input type="text" class="form-control" id="last-name" name="last_name" />
        </div>
        <!-- mobile -->
        <div class="col-md-6">
          <label for="mobile" class="form-label">Mobile<span class="text-danger">*</span> :</label>
          <input type="tel" class="form-control" id="mobile" name="mobile" />
        </div>
        <!--email-->
        <div class="col-md-6">
          <label for="email" class="form-label">Email<span class="text-danger">*</span> :</label>
          <input type="email" class="form-control" id="email" name="email" />
        </div>
        <!--branch-->
        <div class="col-md-6">
          <label for="branch" class="form-label">Branch<span class="text-danger">*</span> :</label>
          <select class="form-select form-select-md mb-3" id="branch" name="branch"
            aria-label=".form-select-lg example">
            <option selected value="">Select your branch</option>
            <option value="CS">Computer Science</option>
            <option value="ECE">Electronics and communications</option>
            <option value="IT">Information technology</option>
          </select>
        </div>
        <!--hostel radio-->

        <div class="col-md-6">
          <label for="hostel" class="form-label col-md-12">Do You Need Hostel Fecility :</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="hostel" id="yes" value="yes" />
            <label class="form-check-label" for="yes">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="hostel" id="no" value="no" />
            <label class="form-check-label" for="no">No</label>
          </div>
        </div>
        <!--choose subjuct-->

        <label class="form-check-label" for="subject">Choose Aditional Subject<span class="text-danger">*</span> :
        </label>
        <div class="col-md-12">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="cyber" name="add_subject[]" value="cyber" />
            <label class="form-check-label" for="cyber">Cyber Security</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="ai" name="add_subject[]" value="ai" />
            <label class="form-check-label" for="ai">Artificial Intelligence</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="blockchain" name="add_subject[]" value="blockchain" />
            <label class="form-check-label" for="blockchain">Blockchain</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="iot" name="add_subject[]" value="iot" />
            <label class="form-check-label" for="iot">IoT</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="robotics" name="subject" value="robotics" />
            <label class="form-check-label" for="robotics">Robotics</label>
          </div>
        </div>
        <!--adress-->
        <label class="form-check-label" for="adress">Premanent adress<span class="text-danger">*</span> :</label>
        <div class="form-floating">
          <textarea class="form-control" placeholder="Leave a comment here" id="adress" name="adress" value="adress"
            style="height: 100px"></textarea>
          <label for="floatingTextarea2">Enter your adress</label>
        </div>
        <div class="button gap-2 d-md-flex justify-content-md-end">
          <button type="reset" class="btn btn-danger">
            <i class="bi bi-arrow-clockwise"></i>Reset
          </button>
          <button type="submit" class="btn btn-success">
            <i class="bi bi-check2-square"></i>Submit
          </button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>