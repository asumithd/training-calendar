          <?php require_once 'process1.php';?>
          <?php require_once 'header.php';?>
          <?php
            $mysqli = new mysqli('localhost','asumithd','Admin123@@','hrdcfa') or die (mysqli_error($mysqli));
            $result=$mysqli->query("select * from t_employee") or die($mysqli->error());
            $result1=$mysqli->query("select * from t_designation") or die($mysqli->error());
            $options="";
            while($rows1=mysqli_fetch_array($result1))
            {
              $options=$options." <option>$rows1[1]</option>";
            }

            $result2=$mysqli->query("select * from t_section") or die($mysqli->error());
            $options1="";
            while($rows2=mysqli_fetch_array($result2))
            {
              $options1=$options1." <option>$rows2[1]</option>";

            }
            $result3=$mysqli->query("select * from t_category") or die($mysqli->error());
            $options2="";
            while($rows3=mysqli_fetch_array($result3))
            {
              $options2=$options2." <option>$rows3[1]</option>";

            }


          ?>
          <main role="main" class="container">
          <div class="container">
            <?php require_once 'session.php';?>
                <h1 class="h3 mb-3 font-weight-normal"> Employee Details</h1>
               <form class="form-inline" method="POST" action="process1.php">
                 <div class="row justify_content_center">
                <div class="form-group">
                <label for="inputSerialNo" class="sr-only">Serial No</label>
                <input type="hidden" id="inputSerialNo" class="form-control"
                 name="id" value="<?php echo $id;?>" placeholder="Serial No" required>
               </div>

               <div class="form-group">
                <label for="inputEmployeeId" class="sr-only">Employee Id</label>
                <input type="text" id="inputEmployeeId" class="form-control"
                 name="empid" value="<?php echo $empid;?>" placeholder="Employee Id" required>
               </div>
               <div class="form-group">
                <label for="inputEmployeeName" class="sr-only">Employee Name</label>
                <input type="text" id="inputEmployeeName" class="form-control"
                 name="empname" value="<?php echo $empname;?>" placeholder="Employee Name" required>
               </div>
               <div class="form-group">
                 <label for="inputDesignationId" class="sr-only">Designation</label>
                 <select class="form-control" id="inputDesignationId" name="desid" value="<?php echo $desid;?>" style="width:219px">
                   <option>Designation</option>
                   <option><?php echo $options;?></option>
                 </select>
                </div>
                <div class="form-group">
                <label for="inputCategory" class="sr-only">Category</label>
                <select class="form-control" id="inputCategory" name="category" value="<?php echo $category;?>">
                  <option>Category</option>
                  <option><?php echo $options2;?></option>
                </select>
               </div>
               <div class="form-group">
                <label for="inputSection" class="sr-only">Section</label>
                <select class="form-control" id="inputDesignationId" name="section" value="<?php echo $section;?>" >
                  <option>Section</option>
                  <option><?php echo $options1;?></option>
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
            <h2>Employee List</h2>
              <table class="table">
              <thead>
                <tr>
                
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

                  <td><?php echo $row['emp_id'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['desid'];?></td>
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
        </main>
      </body>
    </html>
