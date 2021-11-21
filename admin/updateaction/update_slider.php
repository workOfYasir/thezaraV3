<?php

$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');

include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if(isset($_POST['id'])) {$id=$_POST['id'];  if($id==''){unset($id);}}
if(isset($_POST['slider_headline'])) {$slider_headline=$_POST['slider_headline'];  if($slider_headline==''){unset($slider_headline);}}
if(isset($_POST['slider_tagline'])) {$slider_tagline=$_POST['slider_tagline'];  if($slider_tagline==''){unset($slider_tagline);}}

// Page Cover slider_cover "SELECT slider_cover FROM slider WHERE id = '$id'");
if(!empty($_FILES["slider_cover"]["name"])) 
	{
		$temp = explode(".", $_FILES["slider_cover"]["name"]);
		$path= '../../images/Slider/';
		$LogoData = mysqli_query($servercnx,"SELECT slider_cover FROM slider WHERE id = '$id'");
		 $LogoImage = mysqli_fetch_array($LogoData);
		 $slider_cover = $LogoImage['slider_cover'];
		 if ($slider_cover != 'default.jpg') { unlink($path.$slider_cover); }
		$newname=$path.'Slider-'.time().'.'.end($temp);
		move_uploaded_file($_FILES['slider_cover']['tmp_name'],$newname);
		$slider_cover='Slider-'.time().'.'.end($temp);
		$image_info = getimagesize($newname);
		$image_width = $image_info[0];
		$image_height = $image_info[1];
	} 
	else{ $LogoData = mysqli_query($servercnx,"SELECT * FROM slider WHERE id = '$id'"); $LogoImage = mysqli_fetch_array($LogoData); $slider_cover = $LogoImage['slider_cover']; 
		$image_height = $LogoImage['image_height'];
	$image_width = $LogoImage['image_width'];
	}


$slider_headline = str_replace("'","&#39;",$slider_headline);
$slider_tagline = str_replace("'","&#39;",$slider_tagline);


if(isset($id)
&& isset($slider_headline)
&& isset($slider_tagline)
&& isset($slider_cover)
){
 $result = mysqli_query($servercnx,"UPDATE slider SET
			slider_headline = '$slider_headline',
			slider_tagline = '$slider_tagline',
			slider_cover = '$slider_cover',
			image_height = '$image_height',
			image_width = '$image_width'
			WHERE id = '$id'");
if ($result == true){ $back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Slider.php">';}
}else { echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>"; }
?>