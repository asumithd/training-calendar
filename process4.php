<?php
session_start();
$mysqli = new mysqli('localhost','asumithd','Admin123@@','hrdcfa') or die (mysqli_error($mysqli));
$id=0;
$update=false;
$courseid='';
$empid='';
$description1='';
$description2='';
$description3='';
if(isset($_POST['submit']))
 {
  $courseid=$_POST['courseid'];
  $empid=$_POST['empid'];
  $description1=$_POST['description1'];
  $description2=$_POST['description2'];
  $description3=$_POST['description3'];

  $mysqli->query("INSERT INTO t_feedback (course_id, emp_id, description1, description2,description3)
  values('$courseid','$empid','$description1','$description2','$description3')") or die($mysqli->error);

  $_SESSION['message']="Record has been Saved";
  $_SESSION['msg_type']="success";
  header("location:feedback.php");
}
// if(isset($_GET['delete']))
// {
//   $empid=$_GET['delete'];
//
//   $mysqli->query("delete from t_feedback where emp_id='$empid'") or die($mysqli->error);
//
//   $_SESSION['message']="Record has been Deleted";
//   $_SESSION['msg_type']="danger";
//
//   header("location:feedback.php");
//
// }
  if(isset($_GET['edit']))
  {
    $id=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("select * from t_feedback where id=$id") or die($mysqli->error());


    if(count($result)==1)
    {
      $row=$result->fetch_array();
      $courseid=$row['course_id'];
      $empid=$row['emp_id'];
      $description1=$row['description1'];
      $description2=$row['description2'];
      $description3=$row['description3'];
    }
  }
  if(isset($_POST['update']))
{
  $id=$_POST['id'];
  $courseid=$_POST['courseid'];
  $empid=$_POST['empid'];
  $description1=$_POST['description1'];
  $description2=$_POST['description2'];
  $description3=$_POST['description3'];

  $mysqli->query("update t_feedback set course_id='$courseid', emp_id='$empid', description1='$description1', description2='$description2', description3='$description3' where id='$id'") or die($mysqli->error);

  $_SESSION['message']="Record has been Updated";
  $_SESSION['msg_type']="warning";

  header("location:feedback.php");

}
 ?>
