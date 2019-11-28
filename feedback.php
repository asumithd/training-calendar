      <?php require_once 'process4.php';?>
      <?php require_once 'header.php';?>
      <?php
        $mysqli = new mysqli('localhost','asumithd','Admin123@@','hrdcfa') or die (mysqli_error($mysqli));
        $result=$mysqli->query("select * from t_feedback") or die($mysqli->error());
      ?>
      <main role="main" class="container" >

      <div class="container">
        <?php require_once 'session.php';?>
        <h1 class="h3 mb-3 font-weight-normal"> Employee Feedback</h1>
            <form class="form-inline" method="POST" action="process4.php">
            <div class="row justify_content_center">
              <div class="form-group">
            <label for="inputSerialNo" class="sr-only">Serial No</label>
            <input type="hidden" id="inputSerialNo" class="form-control"
             name="id" value="<?php echo $id;?>" placeholder="Serial No" required>
           </div>
           <div class="form-group">
            <label for="inputCourseid" class="sr-only">Course Id</label>
            <input type="text" id="inputCourseid" class="form-control"
             name="courseid" value="<?php echo $courseid;?>" placeholder="Course Id" required>
           </div>
           <div class="form-group">
            <label for="inputEmployeeId" class="sr-only">Employee Id</label>
            <input type="text" id="inputEmployeeId" class="form-control"
             name="empid" value="<?php echo $empid;?>" placeholder="Employee Id" required>
           </div>
           <div class="form-group">
             <label for="inputMark1" class="sr-only">Mark 1</label>
              <select class="form-control" id="inputMark1" name="description1" value="<?php echo $description1;?>">
                <option>Mark 1</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
                </div>
              <div class="form-group">
                  <label for="inputMark2" class="sr-only">Mark 2</label>
                   <select class="form-control" id="inputMark2" name="description2" value="<?php echo $description2;?>">
                     <option>Mark 2</option>
                     <option>1</option>
                     <option>2</option>
                     <option>3</option>
                     <option>4</option>
                     <option>5</option>
                   </select>
                     </div>
                     <div class="form-group">
                       <label for="inputMark3" class="sr-only">Mark 3</label>
                        <select class="form-control" id="inputMark3" name="description3" value="<?php echo $description3;?>">
                          <option>Mark 3</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
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
      <div class="container">
        <div class="row justify_content_center">
        <h2>Employee Attendance Details</h2>
          <table class="table">
          <thead>
            <tr>
              <th>Serial No</th>
              <th>Course Id</th>
              <th>Employee Id</th>
              <th>Description1</th>
              <th>Description2</th>
              <th>Description3</th>
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
              <td><?php echo $row['description1'];?></td>
              <td><?php echo $row['description2'];?></td>
              <td><?php echo $row['description3'];?></td>
              <td>
                <a href="feedback.php?edit=<?php echo $row['id'];?>" class="btn btn-warning">Edit</a>
                <!-- <a href="process2.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a> -->
              </td>
            </tr>
          <?php endwhile; ?>
          </table>
        </div>
      </div>
    </body>
  </html>
