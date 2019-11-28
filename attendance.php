
      <?php require_once 'process2.php';?>
      <?php require_once 'header.php';?>

      <?php
        $mysqli = new mysqli('localhost','asumithd','Admin123@@','hrdcfa') or die (mysqli_error($mysqli));
        $result=$mysqli->query("select * from t_attendance") or die($mysqli->error());
      ?>
      <div class="container">

      <div class="container">

        <h1 class="h3 mb-3 font-weight-normal" > Employee Attedance</h1>
            <?php require_once 'session.php';?>
        <form class="form-inline" method="POST" action="process2.php" >
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

          </form>

          <div class="container" style="margin-top:.5em">
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
        </div>

      </div>
<?php require_once 'footer.php';?>
