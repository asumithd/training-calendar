<?php
session_start();
$mysqli = new mysqli('localhost','asumithd','Admin123@@','hrdcfa') or die (mysqli_error($mysqli));
$id=0;
$update=false;
$courseid='';
$empid='';
$date='';
$attendance='';
if(isset($_POST['submit']))
 {
  $courseid=$_POST['courseid'];
  $empid=$_POST['empid'];
  $date=$_POST['date'];
  $attendance=$_POST['attendance'];

  $mysqli->query("INSERT INTO t_attendance (course_id,emp_id, p_date, attendance)
  values('$courseid','$empid','$date','$attendance')") or die($mysqli->error);

  $_SESSION['message']="Record has been Saved";
  $_SESSION['msg_type']="success";
  header("location:attendance.php");
}
if(isset($_GET['delete']))
{
  $empid=$_GET['delete'];

  $mysqli->query("delete from t_attendance where emp_id='$empid'") or die($mysqli->error);

  $_SESSION['message']="Record has been Deleted";
  $_SESSION['msg_type']="danger";

  header("location:attendance.php");

}
  if(isset($_GET['edit']))
  {
    $id=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("select * from t_attendance where id=$id") or die($mysqli->error());


    if(count($result)==1)
    {
      $row=$result->fetch_array();
      $courseid=$row['course_id'];
      $empid=$row['emp_id'];
      $date=$row['p_date'];
      $attendance=$row['attendance'];
    }
  }
  if(isset($_POST['update']))
{
  $id=$_POST['id'];
  $courseid=$_POST['courseid'];
  $empid=$_POST['empid'];
  $date=$_POST['date'];
  $attendance=$_POST['attendance'];

  $mysqli->query("update t_attendance set course_id='$courseid', emp_id='$empid', p_date='$date', attendance='$attendance' where id='$id'") or die($mysqli->error);

  $_SESSION['message']="Record has been Updated";
  $_SESSION['msg_type']="warning";

  header("location:attendance.php");

}
 ?>
