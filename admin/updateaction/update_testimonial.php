<?php



include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if (isset($_POST['testimonial_name'])) {
	$testimonial_name = $_POST['testimonial_name'];
	if ($testimonial_name == '') {
		unset($testimonial_name);
	}
}
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	if ($id == '') {
		unset($id);
	}
}
if (isset($_POST['cate_table'])) {
	$cate_table = $_POST['cate_table'];
	if ($cate_table == '') {
		unset($cate_table);
	}
}
if (isset($_POST['testimonial_status'])) {
	$testimonial_status = $_POST['testimonial_status'];
	if ($testimonial_status == '') {
		unset($testimonial_status);
	}
}
if (isset($_POST['testimonial_body'])) {
	$testimonial_body = $_POST['testimonial_body'];
	if ($testimonial_body == '') {
		unset($testimonial_body);
	}
}
if (isset($_POST['head_script'])) {
	$head_script = $_POST['head_script']; // if($head_script==''){unset($head_script);}
}
if (isset($_POST['after_head'])) {
	$after_head = $_POST['after_head']; // if($after_head==''){unset($after_head);}
}
if (isset($_POST['footer_script'])) {
	$footer_script = $_POST['footer_script']; //  if($footer_script==''){unset($footer_script);}
}


// Page Cover testimonial_profile "SELECT testimonial_profile FROM testimonials WHERE id = '$id'");
if(!empty($_FILES["testimonial_profile"]["name"])) 
	{
		$temp = explode(".", $_FILES["testimonial_profile"]["name"]);
		$path= '../../images/Testimonial/Clients/';
		$LogoData = mysqli_query($servercnx,"SELECT testimonial_profile FROM testimonials WHERE id = '$id'");
		 $LogoImage = mysqli_fetch_array($LogoData);
		 $testimonial_profile = $LogoImage['testimonial_profile'];
		 if ($testimonial_profile != 'default.jpg') { unlink($path.$testimonial_profile); }
		$newname=$path.'Testimonial-'.time().'.'.end($temp);
		move_uploaded_file($_FILES['testimonial_profile']['tmp_name'],$newname);
		$testimonial_profile='Testimonial-'.time().'.'.end($temp);
		$cover_path = 'images/Testimonial/Clients/'.$testimonial_profile;
		$image_info = getimagesize($newname);
		$image_width = $image_info[0];
		$image_height = $image_info[1];
	} 
	else{ $LogoData = mysqli_query($servercnx,"SELECT * FROM testimonials WHERE id = '$id'"); $LogoImage = mysqli_fetch_array($LogoData); $testimonial_profile = $LogoImage['testimonial_profile'];
		$cover_path = 'images/Testimonial/Clients/default.jpg'; 
		$image_height = $LogoImage['cover_height'];
	$image_width = $LogoImage['cover_width'];
	}
$updated_by = $session->id;
$testimonial_name = str_replace("'", "&#39;", $testimonial_name);
$testimonial_body = str_replace("'", "&#39;", $testimonial_body);
$cover_path = 'images/Testimonial/Clients/'.$testimonial_profile;
$testimonial_date_update = date("j F Y");


if(isset($testimonial_name)
&& isset($testimonial_status)
&& isset($testimonial_body)
&& isset($updated_by)
&& isset($testimonial_profile)
&& isset($cover_path)
&& isset($cate_table)
) {
	$result = mysqli_query($servercnx, "UPDATE testimonials SET
			testimonial_name = '$testimonial_name',
			cate_table = '$cate_table',
			testimonial_status = '$testimonial_status',
			testimonial_date_update = '$testimonial_date_update',
			testimonial_body = '$testimonial_body',
			updated_by = '$updated_by',
			head_script = '$head_script',
			after_head = '$after_head',
			footer_script = '$footer_script',
			testimonial_profile = '$testimonial_profile',
			cover_path = '$cover_path',
			cover_height = '$image_height',
			cover_width = '$image_width' WHERE id = '$id'");
	if ($result == true) {
		$back = $_SERVER['HTTP_REFERER'];
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Testimonials.php">';
	}
} else {
	echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";
}
