      <?php require_once 'process.php';?>
      <?php require_once 'header.php';?>
      <?php
        $mysqli = new mysqli('localhost','asumithd','Admin123@@','hrdcfa') or die (mysqli_error($mysqli));
        $result=$mysqli->query("select * from t_training_schedule") or die($mysqli->error());

        $result1=$mysqli->query("select * from t_location") or die($mysqli->error());
        while ($row=mysqli_fetch_array($result1))
        {
          $options=$options."<option>$row[1]</option>";
        }

      ?>
      <main role="main" class="container">


      <div class="container" >
        <?php require_once 'session.php';?>
          <h1 class="h3 mb-3 font-weight-normal"> Circulr Update</h1>
          <form class="form-inline" method="POST" action="process.php">
            <div class="row justify_content_center">
            <div class="form-group">
            <label for="inputSerialNo" class="sr-only">Serial No</label>
            <input type="hidden" id="inputSerialNo" class="form-control"
             name="id" value="<?php echo $id;?>" placeholder="Serial No" required>
           </div>
           <div class="form-group">
            <label for="inputDescription" class="sr-only">Description</label>
            <input type="text" style="width:595px" id="inputDescription" class="form-control"
             name="description" value="<?php echo $description;?>" placeholder="Description" required>
           </div>
           <div class="form-group">
            <label for="inputLocation" class="sr-only">Location</label>
            <select class="form-control" name="location" id="inputLocation" value="<?php echo $location;?>">
              <option>Location</option>
              <option><?php echo $options;?></option>
            </select>
           </div>
           <div class="form-group">
            <label for="inputStatus" class="sr-only">Status</label>
            <select class="form-control" name="status" id="inputStatus" value="<?php echo $status;?>">
              <option>Status</option>
              <option>New Program</option>
              <option>Ongoing Program</option>
              <option>Cancel Program</option>
            </select>
           </div>
           <div class="form-group">
            <label for="inputChief Guest" class="sr-only">Chief Guest</label>
            <input type="text" id="inputChiefGuest" class="form-control"
             name="chiefguest" value="<?php echo $chiefguest;?>" placeholder="Chief Guest" required>
           </div>
           <div class="form-group">
            <label for="inputSubject Name" class="sr-only">Subject Name</label>
            <input type="text" id="inputSubjectName" class="form-control"
             name="subjectname" value="<?php echo $subjectname;?>" placeholder="Subject Name" required>
           </div>
           <div class="form-group">
            <label for="inputSubject Categrie" class="sr-only">Subject Categrie</label>
            <input type="text" id="inputSubjectCategrie" class="form-control"
             name="subjectcategrie" value="<?php echo $subjectcategrie;?>" placeholder="Subject Categrie" required>
           </div>
           <div class="form-group">
            <label for="inputStart Date" class="sr-only">Start Date</label>
            <input type="date" id="inputStartDate" class="form-control"
             name="startdate" value="<?php echo $startdate;?>" placeholder="Start Date" required>
           </div>
           <div class="form-group">
            <label for="inputEnd Date" class="sr-only">End Date</label>
            <input type="date" id="inputEndDate" class="form-control"
             name="enddate" value="<?php echo $enddate;?>" placeholder="End Date" required>
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
          <h2>Circular Details</h2>
            <table class="table">
            <thead>
              <tr>

                <th>Description</th>
                <th>Location</th>
                <th style="width:8em">Status</th>
                <th>Chief Guest</th>
                <th>Subject Name</th>
                <th>Subject Categrie</th>
                <th style="width:7em">Start Date</th>
                <th style="width:7em">End Date</th>
                <th>Action</th>
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
