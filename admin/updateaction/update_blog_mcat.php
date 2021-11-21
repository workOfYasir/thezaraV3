<?php
$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if (isset($_POST['mcat_title'])) {
	$mcat_title = $_POST['mcat_title'];
	if ($mcat_title == '') {
		unset($mcat_title);
	}
}
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	if ($id == '') {
		unset($id);
	}
}
if (isset($_POST['mcat_summary'])) {
	$mcat_summary = $_POST['mcat_summary'];
	if ($mcat_summary == '') {
		unset($mcat_summary);
	}
}
if (isset($_POST['mcat_body'])) {
	$mcat_body = $_POST['mcat_body'];
	if ($mcat_body == '') {
		unset($mcat_body);
	}
}
if (isset($_POST['mcat_url'])) {
	$mcat_url = $_POST['mcat_url'];
	if ($mcat_url == '') {
		unset($mcat_url);
	}
}
if (isset($_POST['mcat_status'])) {
	$mcat_status = $_POST['mcat_status'];
	if ($mcat_status == '') {
		unset($mcat_status);
	}
}
if (isset($_POST['seo_title'])) {
	$seo_title = $_POST['seo_title'];
	if ($seo_title == '') {
		unset($seo_title);
	}
}
if (isset($_POST['seo_keywords'])) {
	$seo_keywords = $_POST['seo_keywords'];
	if ($seo_keywords == '') {
		unset($seo_keywords);
	}
}
if (isset($_POST['seo_description'])) {
	$seo_description = $_POST['seo_description'];
	if ($seo_description == '') {
		unset($seo_description);
	}
}
if (isset($_POST['robots'])) {
	$robots = $_POST['robots'];
	if ($robots == '') {
		unset($robots);
	}
}

if (isset($_POST['mcat_position'])) {
	$mcat_position = $_POST['mcat_position'];
	if ($mcat_position == '') {
		unset($mcat_position);
	}
}

if (isset($_POST['head_script'])) {
	$head_script = $_POST['head_script'];
	// if ($head_script == '') {
	// 	unset($head_script);
	// }
}
if (isset($_POST['after_head'])) {
	$after_head = $_POST['after_head'];
	// if ($after_head == '') {
	// 	unset($after_head);
	// }
}
if (isset($_POST['footer_script'])) {
	$footer_script = $_POST['footer_script'];
	// if ($footer_script == '') {
	// 	unset($footer_script);
	// }
}

// Page Cover
if(!empty($_FILES["mcat_cover"]["name"])) 
	{
		$temp = explode(".", $_FILES["mcat_cover"]["name"]);
		$path= '../../images/Blogs/Covers/';
		$LogoData = mysqli_query($servercnx,"SELECT mcat_cover FROM blog_mcat WHERE id = '$id'");
		 $LogoImage = mysqli_fetch_array($LogoData);
		 $blog_cover = $LogoImage['mcat_cover'];
		 if ($blog_cover != 'default.jpg') { unlink($path.$blog_cover); }
		$newname=$path.'Cover-'.$blog_date.'-'.time().'.'.end($temp);
		move_uploaded_file($_FILES['mcat_cover']['tmp_name'],$newname);
		$blog_cover='Cover-'.$blog_date.'-'.time().'.'.end($temp);
	} 
	else{ $LogoData = mysqli_query($servercnx,"SELECT mcat_cover FROM blog_mcat WHERE id = '$id'"); $LogoImage = mysqli_fetch_array($LogoData); $blog_cover = $LogoImage['blog_cover']; }

$updated_by = $session->username;
$mcat_title = str_replace("'", "&#39;", $mcat_title);
$mcat_body = str_replace("'", "&#39;", $mcat_body);

$cover_path = 'images/Category/Covers/' . $mcat_cover;

if (
	isset($mcat_title)
	&& isset($mcat_summary)
	&& isset($mcat_body)
	&& isset($mcat_status)
	&& isset($mcat_url)
	&& isset($seo_title)
	&& isset($seo_keywords)
	&& isset($seo_description)
	&& isset($robots)
	&& isset($updated_by)
	&& isset($mcat_cover)
	&& isset($cover_path)
	&& isset($mcat_position)

) { 

	$result = mysqli_query($servercnx, "UPDATE blog_mcat SET
			mcat_title = '$mcat_title',
			mcat_summary = '$mcat_summary',
			mcat_body = '$mcat_body',
			mcat_status = '$mcat_status',
			mcat_url = '$mcat_url',
			seo_title = '$seo_title',
			seo_keywords = '$seo_keywords',
			seo_description = '$seo_description',
			robots = '$robots',
			updated_by = '$updated_by',
			mcat_cover = '$mcat_cover',
			cover_width = '$cover_width',
			cover_height = '$cover_height',
			mcat_position = '$mcat_position',
			head_script = '$head_script',
			after_head = '$after_head',
			footer_script = '$footer_script',
			cover_path = '$cover_path'  WHERE id = '$id'");
	if ($result == true) {
		$back = $_SERVER['HTTP_REFERER'];
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Blog-Mcats.php">';
	}
} else {
	echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";
}
