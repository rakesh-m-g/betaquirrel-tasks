<?php

$conn = new mysqli('localhost', 'root', '', 'school');
if ($conn->connect_error) {
  die('connection_error' . $conn->connect_error);
}
$sql = "select * from student";
$data = $conn->query($sql);
$conn->close();
?>
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
  <link rel="stylesheet" href="css/table.css" />
</head>

<body>
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
    <div class="font-weight-bold student">
      STUDENTS
      <a class="btn btn-success" href="index.php" role="button"><i class="bi bi-person-plus-fill"></i> Add
        Student</a>

      <table class="table mt-5">
        <thead>
          <tr>
            <th scope="col ">ROLL NO</th>
            <th scope="col ">FIRST NMAE</th>
            <th scope="col ">LAST NAME</th>
            <th scope="col ">MOBILE</th>
            <th scope="col ">EMAIL</th>
            <th scope="col ">BRANCH</th>
            <th scope="col ">HOSTEL</th>
            <th scope="col ">SUBJECT</th>
            <th scope="col ">ADRESS</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($data)) {
            ?>
            <tr>
              <td>
                <?php echo $row['id']; ?>
              </td>
              <td>
                <?php echo $row['first_name']; ?>
              </td>
              <td>
                <?php echo $row['last_name']; ?>
              </td>
              <td>
                <?php echo $row['mobile']; ?>
              </td>
              <td>
                <?php echo $row['email']; ?>
              </td>
              <td>
                <?php echo $row['branch']; ?>
              </td>
              <td>
                <?php echo $row['hostel']; ?>
              </td>
              <td>
                <?php echo $row['subject']; ?>
              </td>
              <td>
                <?php echo $row['adress']; ?>
              </td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>