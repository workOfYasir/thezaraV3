<?php 
$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if(isset($_POST['testimonial_name'])) {$testimonial_name=$_POST['testimonial_name'];  if($testimonial_name==''){unset($testimonial_name);}}
if(isset($_POST['testimonial_uniid'])) {$testimonial_uniid=$_POST['testimonial_uniid'];  if($testimonial_uniid==''){unset($testimonial_uniid);}}
if(isset($_POST['cate_table'])) {$cate_table=$_POST['cate_table'];  if($cate_table==''){unset($cate_table);}}

if(isset($_POST['testimonial_status'])) {$testimonial_status=$_POST['testimonial_status'];  if($testimonial_status==''){unset($testimonial_status);}}
if(isset($_POST['testimonial_body'])) {$testimonial_body=$_POST['testimonial_body'];  if($testimonial_body==''){unset($testimonial_body);}}

// Page Cover testimonial_profile
if(!empty($_FILES["testimonial_profile"]["name"])) 
{
	$temp = explode(".", $_FILES["testimonial_profile"]["name"]);
	$path= '../../images/Testimonial/Clients/';
	$newname=$path.'Testimonial-'.time().'.'.end($temp);
	move_uploaded_file($_FILES['testimonial_profile']['tmp_name'],$newname);
	$testimonial_profile='Testimonial-'.time().'.'.end($temp);
	$cover_path = 'images/Testimonial/Clients/'.$testimonial_profile;
	$image_info = getimagesize($newname);
	$image_width = $image_info[0];
	$image_height = $image_info[1];
} 
else{ $testimonial_profile='default.jpg';	
	$cover_path = 'images/Testimonial/Clients/'.$testimonial_profile;
	$path= '../../images/Testimonial/Clients/';
	$newname=$path.$testimonial_name;
	$image_info = getimagesize($newname);
	$image_width = $image_info[0];
	$image_height = $image_info[1]; }

$added_by = $session->id;
$testimonial_name = str_replace("'","&#39;",$testimonial_name);
$testimonial_body = str_replace("'","&#39;",$testimonial_body);

$cover_path = 'images/Testimonial/Clients/'.$testimonial_profile;
$testimonial_date = date("j F Y");


if(isset($testimonial_name)
&& isset($testimonial_uniid)
&& isset($testimonial_status)
&& isset($testimonial_body)
&& isset($added_by)
&& isset($testimonial_profile)
&& isset($cover_path)
&& isset($testimonial_date)
&& isset($cate_table)){
 $result = mysqli_query($servercnx,"INSERT INTO testimonials SET
 	        testimonial_uniid = '$testimonial_uniid',
			testimonial_name = '$testimonial_name',
			testimonial_date = '$testimonial_date',
			cate_table = '$cate_table',
			testimonial_status = '$testimonial_status',
			testimonial_body = '$testimonial_body',
			added_by = '$added_by',
			testimonial_profile = '$testimonial_profile',
			cover_path = '$cover_path',
			cover_width = '$cover_width',
			cover_height = '$cover_height' ");
if ($result == true){ $back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Testimonials.php">';}
}else { echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>"; }
