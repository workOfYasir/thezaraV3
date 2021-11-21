<?php 
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");

if (isset($_POST['date'])) { $date =  $_POST['date'];}

if(isset($_POST['sehar_time'])) {$sehar_time=$_POST['sehar_time'];  if($sehar_time==''){unset($sehar_time);}} 
if(isset($_POST['iftar_time'])) {$iftar_time=$_POST['iftar_time'];  if($iftar_time==''){unset($iftar_time);}} 

if(isset($date)
&& isset($sehar_time)
&& isset($iftar_time)
){
  $duplicate=mysqli_query($servercnx,"SELECT * FROM `roza_time` WHERE `date` = '$date'");
  
  
  if (mysqli_num_rows($duplicate)>0)
	{ 
    header("Location:../Add-Prayer.php?DuplicatedDate");
    exit();
	} else {
      $insrt_pd = "INSERT INTO `roza_time` (`date`, `sehar`, `iftar`) VALUES ( '$date', '$sehar_time', '$iftar_time')";
      $result = mysqli_query($servercnx,$insrt_pd);
 
    
   
  
  if($result){
    $_SESSION["success"] = 'Data inserted successfully';
    
    //print_r($success);
    header('Location: ../Add-Roza.php?Success');
    exit();
  }else{
    $_SESSION["error"] = 'Error encountered while adding user data';

  print_r($error);
  header('Location: ../Add-Roza.php?DataEncounterd');
  exit();
}
 }  
  }else{
    $error = 'Error encountered while adding user data';
      print_r($error);
      header('Location: ../Add-Roza.php?fillFields');
      exit();
    }  
