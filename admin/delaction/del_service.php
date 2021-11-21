<?php include("../assets/includes/inc/config.php");
if(isset($_GET['id'])) {$id=$_GET['id'];} 
if(isset($id)){  
$path= '../../images/Services/Covers/';
$LogoData = mysqli_query($servercnx,"SELECT * FROM `service` WHERE id = '$id'");
$LogoImage = mysqli_fetch_array($LogoData);
$service_cover = $LogoImage['thumb'];
if ($service_cover != 'default.jpg') { unlink($path.$service_cover); }
$result = mysqli_query($servercnx,"DELETE FROM `service` WHERE id = '$id'");

$result2 = mysqli_query($servercnx,"DELETE FROM `service_line` WHERE `service_id` = '$id'");

if ($result2 == true){ $back = $_SERVER['HTTP_REFERER']; echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$back.'">';}
}else{ echo "Error Deleting <br/><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";}
?>