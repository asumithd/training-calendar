<?php
include("db.php");
if(isset($_POST['username'])){

  $uname=$_POST['username'];
  $password=$_POST['password'];
  $result=$mysqli->query("select * from t_users where user='$uname' and pass='$password'");

  if(mysqli_num_rows($result)==1)
  {
    echo "Login success";

    exit();
  }
  else {
    echo "Please try again";
    exit();
  }

}

 ?>
