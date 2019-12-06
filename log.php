<?php
session_start();

if(isset($_POST['username'])){

  $uname=$_POST['username'];
  $password=$_POST['password'];
  $mysqli = new mysqli('localhost','asumithd','Admin123@@','hrdcfa') or die (mysqli_error($mysqli));
  $result=$mysqli->query("select * from t_users where user='$uname' and pass='$password'");

  if(mysqli_num_rows($result)==1)
  {
  
    header("location:index.php");
  }
  else {
    echo "Please try again";
    exit();
  }

}

 ?>
