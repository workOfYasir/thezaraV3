<?php include("../assets/includes/inc/config.php");
if(isset($_GET['id'])) {$id=$_GET['id'];} 
if(isset($id)){  
$path= '../../images/Lawlogos/';
$LogoData = mysqli_query($servercnx,"SELECT law_logo FROM law_logos WHERE id = '$id'");
$LogoImage = mysqli_fetch_array($LogoData);
$law_logo = $LogoImage['law_logo'];
if ($law_logo != 'default.jpg') { unlink($path.$law_logo); }
$result = mysqli_query($servercnx,"DELETE FROM `law_logos` WHERE id = '$id'");	
if ($result == true){ $back = $_SERVER['HTTP_REFERER']; echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$back.'">';}
}else{ echo "Error Deleting <br/><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";}
?>