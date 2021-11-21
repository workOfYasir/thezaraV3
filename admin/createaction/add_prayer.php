<?php 
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");

if (isset($_POST['prayer_date'])) { $prayer_date =  $_POST['prayer_date'];}
if(isset($_POST['fajar_time'])) {$fajar_time=$_POST['fajar_time'];  if($fajar_time==''){unset($fajar_time);}}
if(isset($_POST['zohar_time'])) {$zohar_time=$_POST['zohar_time'];  if($zohar_time==''){unset($zohar_time);}}
if(isset($_POST['asr_time'])) {$asr_time=$_POST['asr_time'];  if($asr_time==''){unset($asr_time);}}
if(isset($_POST['magrib_time'])) {$magrib_time=$_POST['magrib_time'];  if($magrib_time==''){unset($magrib_time);}}
if(isset($_POST['isha_time'])) {$isha_time=$_POST['isha_time'];  if($isha_time==''){unset($isha_time);}} 


if(isset($prayer_date)
&& isset($fajar_time)
&& isset($zohar_time)
&& isset($asr_time)
&& isset($magrib_time)
&& isset($isha_time)

){
  $duplicate=mysqli_query($servercnx,"SELECT * FROM date_prayer WHERE prayer_date = '$prayer_date'");
  
  
  if (mysqli_num_rows($duplicate)>0)
	{ 
    header("Location:../Add-Prayer.php?DuplicatedDate");
    exit();
	} else {
      $insrt_pd = "INSERT INTO date_prayer SET prayer_date = '$prayer_date'";
      $result = mysqli_query($servercnx,$insrt_pd);
 
    
    $result2= mysqli_query($servercnx,"select pd_id from date_prayer where prayer_date = '$prayer_date'");
    $row=mysqli_fetch_array($result2);
    //print_r($row['id']);die;
    $prayer_date_id=$row['pd_id'];

    $result3 = mysqli_query($servercnx,"INSERT INTO `prayer_time`(`prayer_date_id`, `fajar`, `zohar`, `asr`, `magrib`, `isha`)  VALUES ('$prayer_date_id','$fajar_time','$zohar_time','$asr_time','$magrib_time','$isha_time')
  ");
  if($result3){
    $_SESSION["success"] = 'Data inserted successfully';
    
    //print_r($success);
    header('Location: ../Add-Prayer.php?Success');
    exit();
  }else{
    $_SESSION["error"] = 'Error encountered while adding user data';

  print_r($error);
  header('Location: ../Add-Prayer.php?DataEncounterd');
  exit();
}
 }  
  }else{
    $error = 'Error encountered while adding user data';
      print_r($error);
      header('Location: ../Add-Prayer.php?fillFields');
      exit();
    }  
