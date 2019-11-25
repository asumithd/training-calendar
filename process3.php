<?php
session_start();
$mysqli= new mysqli('localhost','asumithd','Admin123@@','hrdcfa') or die(mysqli_error($mysqli));
$update=false;
$courseid='';
$empid='';
$status='';
if(isset($_POST['save']))
{
  $courseid=$_POST['courseid'];
  $empid=$_POST['empid'];
  $status=$_POST['status'];
  $mysqli->query("INSERT INTO t_nomination(course_id, emp_id, status) values('$courseid','$empid','$status')") or die($mysqli->error);

  $_SESSION['message']="Record has been Saved";
  $_SESSION['msg_type']="success";

  header("location:nomination.php");
}
// if(isset($_POST['delete']))
// {
//   $courseid=$_POST['delete'];
//
//   $_SESSION['message']="Record has been Saved";
//   $_SESSION['msg_type']="success";
//
//   header("location:nomination.php");
//
//   $mysqli->query("delete from t_nomination where course_id='$courseid'") or die($mysqli->error);
// }
if(isset($_GET['edit']))
{
  $courseid=$_GET['edit'];
  $update=true;
  $result=$mysqli->query("select * from t_nomination where course_id='$courseid'") or die ($mysqli->error);
  if(count($result)==1)
  {
    $row=$result->fetch_array();
    $courseid=$row['course_id'];
    $empid=$row['emp_id'];
    $status=$row['status'];

  }





}
if(isset($_POST['update']))
{
  $courseid=$_POST['courseid'];
  $empid=$_POST['empid'];
  $status=$_POST['status'];

  $mysqli->query("update t_nomination set course_id='$courseid',emp_id='$empid', status='$status' where course_id='$courseid'") or die($mysqli->error);

  $_SESSION['message']="Record has been Updated";
  $_SESSION['msg_type']="warning";

  header("location:nomination.php");
}


 ?>
