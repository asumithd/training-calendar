<?php

session_start();

$mysqli = new mysqli('localhost','asumithd','Admin123@@','hrdcfa') or die (mysqli_error($mysqli));

$id=0;
$update=false;
$empid='';
$empname='';
$desid='';
$category='';
$section='';

if(isset($_POST['submit']))
  {
    $empid=$_POST['empid'];
    $empname=$_POST['empname'];
    $desid=$_POST['desid'];
    $category=$_POST['category'];
    $section=$_POST['section'];

     $_SESSION['message']="Record has been Saved";
     $_SESSION['msg_type']="success";

     header("location:employee.php");

   $mysqli->query("INSERT INTO t_employee (emp_id, name, desid, category, section)
   VALUES ('$empid','$empname','$desid','$category','$section')") or die($mysqli->error);

  }
  if(isset($_GET['delete'])){
    $id=$_GET['delete'];

    $_SESSION['message']="Record has been Deleted";
    $_SESSION['msg_type']="danger";

    header("location:employee.php");

    $mysqli->query("delete from t_employee where id=$id") or die($mysqli->error());

  }
  if(isset($_GET['edit']))
  {
   $id=$_GET['edit'];
   $update=true;
   $result=$mysqli->query("select * from t_employee where id=$id") or die($mysqli->error());

   if(count($result)==1)
   {
     $row =$result->fetch_array();
     $empid=$row['emp_id'];
     $empname=$row['name'];
     $desid=$row['desid'];
     $category=$row['category'];
     $section=$row['section'];

   }
 }
 if(isset($_POST['update']))
 {
   $id=$_POST['id'];
   $empid=$_POST['empid'];
   $empname=$_POST['empname'];
   $desid=$_POST['desid'];
   $category=$_POST['category'];
   $section=$_POST['section'];


   $mysqli->query("update t_employee set emp_id='$empid',name='$empname', desid='$desid', category='$category',
   section='$section' where id='$id'") or die($mysqli->error);

   $_SESSION['message']="Record has been Updated";
   $_SESSION['msg_type']="warning";

   header("location:employee.php");

 }
 ?>
