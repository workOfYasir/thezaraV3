<?php include("../assets/includes/inc/config.php");
if(isset($_GET['id'])) {$id=$_GET['id'];} 
if(isset($id)){  
$path= '../../images/Testimonial/Clients/';
$LogoData = mysqli_query($servercnx,"SELECT testimonial_profile FROM testimonials WHERE id = '$id'");
$LogoImage = mysqli_fetch_array($LogoData);
$testimonial_profile = $LogoImage['testimonial_profile'];
if ($testimonial_profile != 'default.jpg') { unlink($path.$testimonial_profile); }
$result = mysqli_query($servercnx,"DELETE FROM `testimonials` WHERE id = '$id'");	
if ($result == true){ $back = $_SERVER['HTTP_REFERER']; echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$back.'">';}
}else{ echo "Error Deleting <br/><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";}
?>