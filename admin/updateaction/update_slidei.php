<?php 

$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');

include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if(isset($_POST['id'])) {$id=$_POST['id'];  if($id==''){unset($id);}}

// Page Cover slide_image "SELECT slide_image FROM slidei WHERE id = '$id'");
if(!empty($_FILES["slide_image"]["name"])) 
	{
		$temp = explode(".", $_FILES["slide_image"]["name"]);
		$path= '../../images/Home/';
		$LogoData = mysqli_query($servercnx,"SELECT slide_image FROM slidei WHERE id = '$id'");
		 $LogoImage = mysqli_fetch_array($LogoData);
		 $slide_image = $LogoImage['slide_image'];
		 if ($slide_image != 'default.jpg') { unlink($path.$slide_image); }
		$newname=$path.'Home-'.$blog_date.'-'.time().'.'.end($temp);
		move_uploaded_file($_FILES['slide_image']['tmp_name'],$newname);
		$slide_image='Home-'.$blog_date.'-'.time().'.'.end($temp);
		$image_info = getimagesize($newname);
		$image_width = $image_info[0];
		$image_height = $image_info[1];
	} 
	else{ $LogoData = mysqli_query($servercnx,"SELECT * FROM slidei WHERE id = '$id'"); $LogoImage = mysqli_fetch_array($LogoData); $slide_image = $LogoImage['slide_image']; 
	$image_height = $LogoImage['image_height'];
	$image_width = $LogoImage['image_width'];
	}
$law_link = str_replace("'","&#39;",$law_link);
$law_alt_text = str_replace("'","&#39;",$law_alt_text);

if(isset($id)
&& isset($law_link)
&& isset($law_alt_text)){
 $result = mysqli_query($servercnx,"UPDATE slidei SET 
			slide_image = '$slide_image',
			image_height = '$image_height',
			image_width = '$image_width' WHERE id = '$id'");
if ($result == true){ $back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Slidei.php">';}
}else { echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>"; }
?>