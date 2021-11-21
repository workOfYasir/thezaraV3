<?php include("../assets/includes/inc/config.php");
if(isset($_GET['id'])) {$id=$_GET['id'];} 
if(isset($id)){  
$path= '../../images/Pages/Covers/';
$LogoData = mysqli_query($servercnx,"SELECT page_cover FROM pages WHERE id = '$id'");
$LogoImage = mysqli_fetch_array($LogoData);
$page_cover = $LogoImage['page_cover'];
if ($page_cover != 'default.jpg') { unlink($path.$page_cover); }
$result = mysqli_query($servercnx,"DELETE FROM `pages` WHERE id = '$id'");	
if ($result == true){ $back = $_SERVER['HTTP_REFERER']; echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$back.'">';}
}else{ echo "Error Deleting <br/><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";}
?>