/**
  *
  * @author  A Sumith
  *  
  */

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HRD MANAGEMENT</title>

    <!--  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">-->

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
    <link href="css/signin.css" rel="stylesheet">
  </head>
    <body>
      <?php require_once 'process2.php';?>

      <?php	if(isset($_SESSION['message'])): ?>
        <div class="container">
          <div class="row justify_content_center">
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
    					 <?php
    							echo $_SESSION['message'];
    							unset($_SESSION['message']);
    					 ?>
    				</div>
    						<?php endif ?>
          </div>

        </div>


      <?php

        $mysqli = new mysqli('localhost','asumithd','Admin123@@','hrdcfa') or die (mysqli_error($mysqli));
        $result=$mysqli->query("select * from t_attendance") or die($mysqli->error());
      ?>


      <?php
      function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
        }
      ?>
      <div class="container">
        <div class="row justify_content_center">
          <form class="form-signin" method="POST" action="process2.php">
            <h1 class="h3 mb-3 font-weight-normal"> Employee Attedance</h1>
            <label for="inputid" class="sr-only">Serial No</label>
            <input type="hidden" id="inputid" class="form-control"
             name="id" value="<?php echo $id;?>" placeholder="Id" required>
            <label for="inputCourseid" class="sr-only">Course Id</label>
            <input type="text" id="inputCourseid" class="form-control"
             name="courseid" value="<?php echo $courseid;?>" placeholder="Course Id" required>
            <label for="inputEmployeeId" class="sr-only">Employee Id</label>
            <input type="text" id="inputEmployeeId" class="form-control"
             name="empid" value="<?php echo $empid;?>" placeholder="Employee Id" required>
            <label for="inputDate" class="sr-only">Date</label>
            <input type="text" id="inputDate" class="form-control"
             name="date" value="<?php echo $date;?>" placeholder="Date" required>
             <label for="inputAttendance" class="sr-only">Attedance</label>
             <input type="text" id="inputAttendance" class="form-control"
              name="attendance" value="<?php echo $attendance;?>" placeholder="Attendance" required>
             <div class="form-group">
               <?php if($update==true):?>
                 <button class="btn btn-lg btn-primary btn-block" name="update" type="submit">Update</button>
               <?php else: ?>
                 <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Save</button>
               <?php endif; ?>
             </div>

          </form>
        </div>

      </div>
      <div class="container">
        <div class="row justify_content_center">
        <h2>Employee Attendance Details</h2>
          <table class="table">
          <thead>
            <tr>
              <th>Serial No</th>
              <th>Course Id</th>
              <th>Employee Id</th>
              <th>Date</th>
              <th>Attendance</th>
              <th>Action</th>
            </tr>
          </thead>

          <?php
          while($row=$result->fetch_assoc()):
            ?>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['course_id'];?></td>
              <td><?php echo $row['emp_id'];?></td>
              <td><?php echo $row['p_date'];?></td>
              <td><?php echo $row['attendance'];?></td>
              <td>
                <a href="attendance.php?edit=<?php echo $row['id'];?>" class="btn btn-warning">Edit</a>
                <a href="process2.php?delete=<?php echo $row['emp_id'];?>" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
          </table>
        </div>
      </div>

    </body>
  </html>
