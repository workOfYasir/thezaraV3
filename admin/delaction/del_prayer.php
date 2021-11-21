<?php include("../assets/includes/inc/config.php");
if(isset($_GET['pt_id'])) {$pt_id=$_GET['pt_id'];} 
if(isset($pt_id)){  
$result = mysqli_query($servercnx,"DELETE FROM `prayer_time` WHERE pt_id = '$pt_id'");	
$result2 = mysqli_query($servercnx,"DELETE FROM `date_prayer` WHERE pd_id = '$pt_id'");	
header("location:../View-PrayerTime.php?deleted");

if ($result == true){ $back = $_SERVER['HTTP_REFERER']; echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$back.'">';}
}else{ echo "Error Deleting <br/><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";}
?>