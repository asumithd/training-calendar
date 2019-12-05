<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HRD MANAGEMENT</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <!-- <link href="css/starter-template.css" rel="stylesheet">

    <link href="css/signin.css" rel="stylesheet"> -->
      <link href="css/new1.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      </style>
      <!-- Custom styles for this template -->
    </head>


<?php
  $mysqli = new mysqli('localhost','asumithd','Admin123@@','hrdcfa') or die (mysqli_error($mysqli));
  $result=$mysqli->query("select * from t_training_schedule") or die($mysqli->error());
  $result2=$mysqli->query("SELECT * from t_attendance ")or die($mysqli->error());
  $result3=$mysqli->query("select * from t_employee") or die($mysqli->error());
  $result4=$mysqli->query("SELECT * FROM t_nomination JOIN t_training_schedule on t_nomination.course_id = t_training_schedule.id And t_training_schedule.status1='New Program'")
  or die($mysqli->error());

?>
  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Training Calender</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="employee.php">Employee</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Circular</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="nomination.php">Nomination</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="attendance.php">Attendance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="feedback.php">Feedback</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=" "> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">LogOut ?</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
<div class="container1">
    <div class="box" >
        <div class="row justify_content_center">
        <h2>Employee List</h2>
          <table class="table">
          <thead>
            <tr>

              <th>Emp Id</th>
              <th>Employee Name</th>
              <th>Designation</th>
              <th>Category</th>
              <th>Section</th>

            </tr>
          </thead>

          <?php
          while($row=$result3->fetch_assoc()):
            ?>
            <tr>

              <td><?php echo $row['emp_id'];?></td>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['desid'];?></td>
              <td><?php echo $row['category'];?></td>
              <td><?php echo $row['section'];?></td>

            </tr>
          <?php endwhile; ?>
          </table>
        </div>
      </div>
    <div class="box" >
          <div class="row justify_content_center">
          <h2>Circular Details</h2>
            <table class="table">
            <thead>
              <tr>

                <th>Description</th>
                <th>Location</th>
                <th style="width:8em">Status</th>
                <th>Guest</th>
                <th>Name</th>
                <th>Categrie</th>
                <th style="width:7em">Start Dt</th>
                <th style="width:7em">End Dt</th>

              </tr>
            </thead>

            <?php
            while($row=$result->fetch_assoc()):
              ?>
              <tr>

                <td><?php echo $row['description'];?></td>
                <td><?php echo $row['location'];?></td>
                <td><?php echo $row['status1'];?></td>
                <td><?php echo $row['faculty'];?></td>
                <td><?php echo $row['category_for_course'];?></td>
                <td><?php echo $row['course_type'];?></td>
                <td><?php echo $row['from_date'];?></td>
                <td><?php echo $row['to_date'];?></td>

              </tr>
            <?php endwhile; ?>
            </table>
          </div>
        </div>
    <div class="box">
        <div class="row justify_content_center">
        <h2>Employee Nomination Details</h2>
          <table class="table">
          <thead>
            <tr>
              <th>Course Id</th>
              <th>Employee Id</th>
              <th>Status</th>

            </tr>
          </thead>

          <?php
          while($row=$result4->fetch_assoc()):
            ?>
            <tr>
              <td><?php echo $row['course_id'];?></td>
              <td><?php echo $row['emp_id'];?></td>
              <td><?php echo $row['status'];?></td>

            </tr>
          <?php endwhile; ?>
          </table>
        </div>
      </div>
    <div class="box">
        <div class="row justify_content_center">
        <h2>Employee Attendance Details</h2>
          <table class="table">
          <thead>
            <tr>

              <th>Course Id</th>
              <th>Employee Id</th>
              <th>Date</th>
              <th>Attendance</th>

            </tr>
          </thead>

          <?php
          while($row=$result2->fetch_assoc()):
            ?>
            <tr>

              <td><?php echo $row['course_id'];?></td>
              <td><?php echo $row['emp_id'];?></td>
              <td><?php echo $row['p_date'];?></td>
              <td><?php echo $row['attendance'];?></td>

            </tr>
          <?php endwhile; ?>
          </table>
        </div>
      </div>
</div>






</body>
</html>
