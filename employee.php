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
      <?php require_once 'process1.php';?>

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
        $result=$mysqli->query("select * from t_employee") or die($mysqli->error());
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
          <form class="form-signin" method="POST" action="process1.php">
            <h1 class="h3 mb-3 font-weight-normal"> Employee Details</h1>
            <label for="inputSerialNo" class="sr-only">Serial No</label>
            <input type="hidden" id="inputSerialNo" class="form-control"
             name="id" value="<?php echo $id;?>" placeholder="Serial No" required>
            <label for="inputEmployeeId" class="sr-only">Employee Id</label>
            <input type="text" id="inputEmployeeId" class="form-control"
             name="empid" value="<?php echo $empid;?>" placeholder="Employee Id" required>
            <label for="inputEmployeeName" class="sr-only">Employee Name</label>
            <input type="text" id="inputEmployeeName" class="form-control"
             name="empname" value="<?php echo $empname;?>" placeholder="Employee Name" required>
             <label for="inputDesignationId" class="sr-only">Designation</label>
             <input type="text" id="inputDesignationId" class="form-control"
              name="desid" value="<?php echo $desid;?>" placeholder="Designation" required>
            <label for="inputCategory" class="sr-only">Category</label>
            <input type="text" id="inputCategory" class="form-control"
             name="category" value="<?php echo $category;?>" placeholder="Category" required>
            <label for="inputSection" class="sr-only">Section</label>
            <input type="text" id="inputSection" class="form-control"
             name="section" value="<?php echo $section;?>" placeholder="Section" required>
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
        <h2>Employee List</h2>
          <table class="table">
          <thead>
            <tr>
              <th>Serial No</th>
              <th>Employee Id</th>
              <th>Employee Name</th>
              <th>Designation</th>
              <th>Category</th>
              <th>Section</th>
              <th>Action</th>
            </tr>
          </thead>

          <?php
          while($row=$result->fetch_assoc()):
            ?>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['emp_id'];?></td>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['designation_id'];?></td>
              <td><?php echo $row['category'];?></td>
              <td><?php echo $row['section'];?></td>
              <td>
                <a href="employee.php?edit=<?php echo $row['id'];?>" class="btn btn-warning">Edit</a>
                <a href="process1.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
          </table>
        </div>
      </div>

    </body>
  </html>
