<?php include("../assets/includes/inc/config.php");
if(isset($_GET['id'])) {$id=$_GET['id'];} 
if(isset($id)){  
$path= '../../images/Categories/Covers/';
$LogoData = mysqli_query($servercnx,"SELECT mcat_cover FROM mcat WHERE id = '$id'");
$LogoImage = mysqli_fetch_array($LogoData);
$mcat_cover = $LogoImage['mcat_cover'];
if ($mcat_cover != 'default.jpg') { unlink($path.$mcat_cover); }
$result = mysqli_query($servercnx,"DELETE FROM `mcat` WHERE id = '$id'");	
if ($result == true){ $back = $_SERVER['HTTP_REFERER']; echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$back.'">';}
}else{ echo "Error Deleting <br/><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";}
?>