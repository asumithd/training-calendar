<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HRD MANAGEMENT</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/starter-template.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
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
      .form-group input{
        margin-left:.4em;
        margin-top:.4em;

      }
      .form-group select{
        margin-left:.4em;
        margin-top:.4em;

      }

      .form-group .form-control{
        width:194px;
      }
      .form-group button[type="submit"]{
        margin-left:.4em;
        height: 34px;
        padding: 0rem .5rem;
        margin-top:5px;
      }
      .form-group button[type="upadte"]{
        margin-left:.4em;
        height: 34px;
        padding: 0rem .5rem;
        margin-top:5px;
      }
      /* .navbar{
        margin-left: auto;
        margin-right: auto;

      } */
    </style>
    <!-- Custom styles for this template -->
    </head>
      <body>
      <?php
      function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
        }
      ?>
      <?php
        $mysqli = new mysqli('localhost','asumithd','Admin123@@','hrdcfa') or die (mysqli_error($mysqli));
        $result=$mysqli->query("select * from t_attendance") or die($mysqli->error());
      ?>
      <div class="container-fluid">
        <!-- <h1 class="h3 mb-3 font-weight-normal" > Employee Attedance</h1> -->
            <?php require_once 'session.php';?>
        <!-- <form class="form-inline" method="POST" action="process2.php" >
          <div class="row justify_content_center"  >
          <div class="form-group">
            <label for="inputid" class="sr-only" >Serial No</label>
            <input type="hidden" id="inputid" class="form-control"
             name="id" value="<?php echo $id;?>" placeholder="Id" required >
              </div>
          <div class="form-group">
            <label for="inputCourseid" class="sr-only">Course Id</label>
            <input type="text" id="inputCourseid" class="form-control"
             name="courseid" value="<?php echo $courseid;?>" placeholder="Course Id" required >
              </div>
          <div class="form-group">
            <label for="inputEmployeeId" class="sr-only">Employee Id</label>
            <input type="text" id="inputEmployeeId" class="form-control"
             name="empid" value="<?php echo $empid;?>" placeholder="Employee Id" required>
              </div>
          <div class="form-group">
            <label for="inputDate" class="sr-only">Date</label>
            <input type="date" id="inputDate" class="form-control"
             name="date" value="<?php echo $date;?>" placeholder="Date" required>
              </div>
          <div class="form-group">
                <label for="inputAttendance" class="sr-only">Attedance</label>
                 <select class="form-control" id="inputAttendance" name="attendance" value="<?php echo $attendance;?>" >
                   <option>Attedance</option>
                   <option>P</option>
                   <option>A</option>
                 </select>
                   </div>
          <div class="form-group">
               <?php if($update==true):?>
                 <button class="btn btn-lg btn-primary btn-block" name="update" type="submit">Update</button>
               <?php else: ?>
                 <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Save</button>
               <?php endif; ?>
             </div>
          </form> -->
      </div>

  </body>
</html>
