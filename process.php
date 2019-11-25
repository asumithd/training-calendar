<?php

session_start();

$mysqli = new mysqli('localhost','asumithd','Admin123@@','hrdcfa') or die (mysqli_error($mysqli));

      $id=0;
      $update=false;
      $description='';
      $location='';
      $status='';
      $chiefguest='';
      $subjectname='';
      $subjectcategrie='';
      $startdate='';
      $enddate='';

if(isset($_POST['submit']))

  {
   $description=$_POST['description'];
   $location=$_POST['location'];
   $status=$_POST['status'];
   $chiefguest=$_POST['chiefguest'];
   $subjectname=$_POST['subjectname'];
   $subjectcategrie=$_POST['subjectcategrie'];
   $startdate=$_POST['startdate'];
   $enddate=$_POST['enddate'];

     $_SESSION['message']="Record has been Saved";
     $_SESSION['msg_type']="success";

     header("location:index.php");

   $mysqli->query("INSERT INTO t_training_schedule (description, location, status, faculty, category_for_course, course_type, from_date, to_date)
   VALUES ('$description','$location','$status','$chiefguest','$subjectname','$subjectcategrie','$startdate','$enddate')") or die($mysqli->error);

  }

  if(isset($_GET['delete'])){
    $id=$_GET['delete'];

    $_SESSION['message']="Record has been Deleted";
    $_SESSION['msg_type']="danger";

    header("location:index.php");

    $mysqli->query("delete from t_training_schedule where id=$id") or die($mysqli->error());

  }

   if(isset($_GET['edit']))
   {
    $id=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("select * from t_training_schedule where id=$id") or die($mysqli->error());

    if(count($result)==1)
    {
      $row =$result->fetch_array();
      $description=$row['description'];
      $location=$row['location'];
      $status=$row['status'];
      $chiefguest=$row['faculty'];
      $subjectname=$row['category_for_course'];
      $subjectcategrie=$row['course_type'];
      $startdate=$row['from_date'];
      $enddate=$row['to_date'];
    }
  }

  if(isset($_POST['update']))
  {
    $id=$_POST['id'];
    $description=$_POST['description'];
    $location=$_POST['location'];
    $status=$_POST['status'];
    $chiefguest=$_POST['chiefguest'];
    $subjectname=$_POST['subjectname'];
    $subjectcategrie=$_POST['subjectcategrie'];
    $startdate=$_POST['startdate'];
    $enddate=$_POST['enddate'];

    $mysqli->query("update t_training_schedule set description='$description', location='$location', status='$status',
    faculty='$chiefguest', category_for_course='$subjectname', course_type='$subjectcategrie', from_date='$startdate',
    to_date='$enddate' where id='$id'") or die($mysqli->error);

    $_SESSION['message']="Record has been Updated";
    $_SESSION['msg_type']="warning";

    header("location:index.php");

  }



    ?>
