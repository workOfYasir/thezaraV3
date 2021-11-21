<?php include("../assets/includes/inc/config.php");
if(isset($_GET['id'])) {$id=$_GET['id'];} 
if(isset($id)){  
$path= '../../images/Categories/Covers/';
$LogoData = mysqli_query($servercnx,"SELECT sscat_uniid,sscat_cover FROM blog_sscat WHERE id = '$id'");
$LogoImage = mysqli_fetch_array($LogoData);
$sscat_uniid = $LogoImage['sscat_uniid'];
$sscat_cover = $LogoImage['sscat_cover'];
if ($sscat_cover != 'default.jpg') { unlink($path.$sscat_cover); }
$result = mysqli_query($servercnx,"DELETE FROM `blog_sscat` WHERE id = '$id'");
$result3 = mysqli_query($servercnx,"DELETE FROM `blog_sscat_rcategories` WHERE sscat_uniid = '$sscat_uniid'");	
if ($result == true){ $back = $_SERVER['HTTP_REFERER']; echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$back.'">';}
}else{ echo "Error Deleting <br/><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";}
?>