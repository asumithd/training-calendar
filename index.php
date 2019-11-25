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
    <body class="text-center">

      <?php require_once 'process.php';?>

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
        $result=$mysqli->query("select * from t_training_schedule") or die($mysqli->error());
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
          <form class="form-signin" method="POST" action="process.php">
            <h1 class="h3 mb-3 font-weight-normal"> Circulr Update</h1>
            <label for="inputSerialNo" class="sr-only">Serial No</label>
            <input type="hidden" id="inputSerialNo" class="form-control"
             name="id" value="<?php echo $id;?>" placeholder="Serial No" required>
            <label for="inputDescription" class="sr-only">Description</label>
            <input type="text" id="inputDescription" class="form-control"
             name="description" value="<?php echo $description;?>" placeholder="Description" required>
            <label for="inputLocation" class="sr-only">Location</label>
            <input type="text" id="inputLocation" class="form-control"
             name="location" value="<?php echo $location;?>" placeholder="Location" required>
            <label for="inputStatus" class="sr-only">Status</label>
            <input type="text" id="inputStatus" class="form-control"
             name="status" value="<?php echo $status;?>" placeholder="Status" required>
            <label for="inputChief Guest" class="sr-only">Chief Guest</label>
            <input type="text" id="inputChiefGuest" class="form-control"
             name="chiefguest" value="<?php echo $chiefguest;?>" placeholder="Chief Guest" required>
            <label for="inputSubject Name" class="sr-only">Subject Name</label>
            <input type="text" id="inputSubjectName" class="form-control"
             name="subjectname" value="<?php echo $subjectname;?>" placeholder="Subject Name" required>
            <label for="inputSubject Categrie" class="sr-only">Subject Categrie</label>
            <input type="text" id="inputSubjectCategrie" class="form-control"
             name="subjectcategrie" value="<?php echo $subjectcategrie;?>" placeholder="Subject Categrie" required>
            <label for="inputStart Date" class="sr-only">Start Date</label>
            <input type="date" id="inputStartDate" class="form-control"
             name="startdate" value="<?php echo $startdate;?>" placeholder="Start Date" required>
            <label for="inputEnd Date" class="sr-only">End Date</label>
            <input type="date" id="inputEndDate" class="form-control"
             name="enddate" value="<?php echo $enddate;?>" placeholder="End Date" required>
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
          <h2>Circular Details</h2>
            <table class="table">
            <thead>
              <tr>
                <th>Serial No</th>
                <th>Description</th>
                <th>Location</th>
                <th>Status</th>
                <th>Chief Guest</th>
                <th>Subject Name</th>
                <th>Subject Categrie</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
              </tr>
            </thead>

            <?php
            while($row=$result->fetch_assoc()):
              ?>
              <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['description'];?></td>
                <td><?php echo $row['location'];?></td>
                <td><?php echo $row['status'];?></td>
                <td><?php echo $row['faculty'];?></td>
                <td><?php echo $row['category_for_course'];?></td>
                <td><?php echo $row['course_type'];?></td>
                <td><?php echo $row['from_date'];?></td>
                <td><?php echo $row['to_date'];?></td>
                <td>
                  <a href="index.php?edit=<?php echo $row['id'];?>" class="btn btn-warning">Edit</a>
                  <a href="process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                </td>
              </tr>
            <?php endwhile; ?>
            </table>
          </div>
        </div>

    </body>
    </html>