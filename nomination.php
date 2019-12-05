<?php require_once 'process3.php';?>
<?php require_once 'header.php';?>
<!--  -->
<?php
  $mysqli = new mysqli('localhost','asumithd','Admin123@@','hrdcfa') or die (mysqli_error($mysqli));
  $result=$mysqli->query("SELECT * FROM t_nomination JOIN t_training_schedule on t_nomination.course_id = t_training_schedule.id And t_training_schedule.status1='New Program'")
  or die($mysqli->error());
  $result1=$mysqli->query("SELECT * FROM t_training_schedule WHERE t_training_schedule.status1='New Program' ") or die($mysqli->error());

  $options="";
  while ($row=mysqli_fetch_array($result1))
  {
    $options=$options."<option>$row[0]</option>";
  }

  // $result=$mysqli->query("SELECT * FROM t_nomination,t_training_schedule
  // WHERE t_nomination.course_id=course_id or t_training_schedule.id=id ") or die($mysqli->error());
?>
<main role="main" class="container" >

      <div class="container">
        <?php require_once 'session.php';?>
          <h1 class="h3 mb-3 font-weight-normal"> Employee Nomination</h1>
            <form class="form-inline" method="POST" action="process3.php">
              <div class="row justify_content_center">
                <div class="form-group">
              <label for="inputCourseid" class="sr-only">Course Id</label>
              <select id="inputCourseid" class="form-control" name="courseid" value="<?php echo $courseid;?>">
                <option>Course Id</option>
                <option><?php echo $options;?></option>
                <option><?php echo $options1;?></option>
              </select>
             </div>
             <div class="form-group">
              <label for="inputEmployeeId" class="sr-only">Employee Id</label>
              <input type="text" id="inputEmployeeId" class="form-control"
               name="empid" value="<?php echo $empid;?>" placeholder="Employee Id" required>
             </div>

             <div class="form-group">
              <label for="inputStatus" class="sr-only">Status</label>
              <select id="inputStatus" class="form-control" name="status" style="width:250px" value="<?php echo $status;?>">
                <option>Status</option>
                <option>Nominated By Section</option>
                <option>Nominated By Self Intersted</option>
              </select>
             </div>
               <div class="form-group">
                 <?php if($update==true):?>
                   <button class="btn btn-lg btn-primary btn-block" name="update" type="submit">Update</button>
                 <?php else: ?>
                   <button class="btn btn-lg btn-primary btn-block" name="save" type="submit">Save</button>
                 <?php endif; ?>
               </div>

            </form>
          </div>

        </div>
        <div class="container">
          <div class="row justify_content_center">
          <h2>Employee Nomination Details</h2>
            <table class="table">
            <thead>
              <tr>
                <th>Course Id</th>
                <th>Employee Id</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>

            <?php
            while($row=$result->fetch_assoc()):
              ?>
              <tr>
                <td><?php echo $row['course_id'];?></td>
                <td><?php echo $row['emp_id'];?></td>
                <td><?php echo $row['status'];?></td>
                <td>
                  <a href="nomination.php?edit=<?php echo $row['course_id'];?>" class="btn btn-warning">Edit</a>
                  <!-- <a href="process3.php?delete=<?php echo $row['course_id'];?>" class="btn btn-danger">Delete</a> -->
                </td>
              </tr>
            <?php endwhile; ?>
            </table>
          </div>

        </div>


    </body>
  </html>
