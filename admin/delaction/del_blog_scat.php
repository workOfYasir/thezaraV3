<?php include("../assets/includes/inc/config.php");
if(isset($_GET['id'])) {$id=$_GET['id'];} 
if(isset($id)){  
$path= '../../images/Categories/Covers/';
$LogoData = mysqli_query($servercnx,"SELECT scat_uniid,scat_cover FROM blog_scat WHERE id = '$id'");
$LogoImage = mysqli_fetch_array($LogoData);
$scat_cover = $LogoImage['scat_cover'];
$scat_uniid = $LogoImage['scat_uniid'];
if ($scat_cover != 'default.jpg') { unlink($path.$scat_cover); }
$result = mysqli_query($servercnx,"DELETE FROM `blog_scat` WHERE id = '$id'");
$result3 = mysqli_query($servercnx,"DELETE FROM `blog_scat_rcategories` WHERE scat_uniid = '$scat_uniid'");		
if ($result == true){ $back = $_SERVER['HTTP_REFERER']; echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$back.'">';}
}else{ echo "Error Deleting <br/><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";}
?>