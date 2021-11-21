<?php 
$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if (isset($_POST['type'])) {
	$type = $_POST['type'];
	if ($type == '') {
		unset($type);
	}
}
// Page Cover slide_image
if(!empty($_FILES["slide_image"]["name"])) 
{
	$temp = explode(".", $_FILES["slide_image"]["name"]);
	$path= '../../images/Brand/';
	$newname=$path.'Brand-'.time().'.'.end($temp);
	move_uploaded_file($_FILES['slide_image']['tmp_name'],$newname);
	$slide_image='Brand-'.time().'.'.end($temp);
	$image_info = getimagesize($newname);
	$image_width = $image_info[0];
	$image_height = $image_info[1];
} 
else{ $slide_image='default.jpg';
	$path= '../../images/Brand/';
	$newname = $path.$service_cover;
	$image_info = getimagesize($newname);
	$image_width = $image_info[0];
	$image_height = $image_info[1];}

if(isset($slide_image)
	&& isset($type)){
 $result = mysqli_query($servercnx,"INSERT INTO slidei SET 
			slide_image = '$slide_image',
			type = '$type',
			image_height = '$image_height',
			image_width = '$image_width'
			");
if ($result == true){ $back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Brand.php">';}
}else { echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>"; }
?>