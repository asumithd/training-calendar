      <?php require_once 'process2.php';?>
      <?php require_once 'header.php';?>
      <?php
        $mysqli = new mysqli('localhost','asumithd','Admin123@@','hrdcfa') or die (mysqli_error($mysqli));
        $result=$mysqli->query("SELECT * from t_attendance ")or die($mysqli->error());

        $result1=$mysqli->query("SELECT * FROM t_training_schedule WHERE t_training_schedule.status1='Ongoing Program' or t_training_schedule.status1='New Program'") or die($mysqli->error());

        $options="";
        while ($row=mysqli_fetch_array($result1))
        {
          $options=$options."<option>$row[0]</option>";
        }

        $result2=$mysqli->query("SELECT * FROM t_nomination JOIN t_training_schedule ON t_nomination.course_id = t_training_schedule.id And t_training_schedule.status1='New Program' ") or die($mysqli->error());

        $options1="";
        while ($row1=mysqli_fetch_array($result2))
        {
          $options1=$options1."<option>$row1[1]</option>";
        }

//         $result31=$mysqli->query("SELECT from_date FROM t_training_schedule
//           WHERE t_training_schedule.status1='Ongoing Program' or t_training_schedule.status1='New Program' ")
//           or die($mysqli->error());
//           $options2="";
//           while ($row2=mysqli_fetch_array($result31))
//           {
//             $options2=$options2."<option>$row2[7]</option>";
//           }
// var_dump($result31);





      ?>

      <main role="main" class="container">
      <div class="container">
        <?php require_once 'session.php';?>
        <h1 class="h3 mb-3 font-weight-normal" > Employee Attedance</h1>
        <form class="form-inline" method="POST" action="process2.php" >
          <div class="row justify_content_center">
          <div class="form-group">
            <label for="inputid" class="sr-only" >Serial No</label>
            <input type="hidden" id="inputid" class="form-control"
             name="id" value="<?php echo $id;?>" placeholder="Id" required >
              </div>
          <div class="form-group">
            <label for="inputCourseid" class="sr-only">Course Id</label>
            <select id="inputCourseid" class="form-control" name="courseid" value="<?php echo $courseid;?>" >
              <option>Course Id</option>
              <option><?php echo $options;?></option>
            </select>
              </div>
          <div class="form-group">
            <label for="inputEmployeeId" class="sr-only">Employee Id</label>
            <select id="inputEmployeeId" class="form-control"name="empid" value="<?php echo $empid;?>" >
              <option>Employee Id</option>
              <option><?php echo $options1;?></option>
            </select>
              </div>
          <div class="form-group">
            <label for="inputDate" class="sr-only">Date</label>
            <!-- <select id="inputDate" class="form-control" name="date" value="<?php echo $date;?>" >
              <option>Attedance Date</option>
              <option></option>

            </select> -->
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
        </div>
        </div>
          <div class="container" style="margin-top:.5em">
            <div class="row justify_content_center">
            <h2>Employee Attendance Details</h2>
              <table class="table">
              <thead>
                <tr>

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

                  <td><?php echo $row['course_id'];?></td>
                  <td><?php echo $row['emp_id'];?></td>
                  <td><?php echo $row['p_date'];?></td>
                  <td><?php echo $row['attendance'];?></td>
                  <td>
                    <a href="attendance.php?edit=<?php echo $row['id'];?>" class="btn btn-warning">Edit</a>
                    <a href="process2.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
              <?php endwhile; ?>
              </table>
            </div>
          </div>
        </main>
        </body>
        </html>
