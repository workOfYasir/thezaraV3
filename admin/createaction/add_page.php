<?php
$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");

if (isset($_POST['page_title'])) {
	$page_title = $_POST['page_title'];
	if ($page_title == '') {
		unset($page_title);
	}
}
if (isset($_POST['is_parent'])) {
	$is_parent = $_POST['is_parent'];
	if ($is_parent == '') {
		unset($is_parent);
	}
}
if (isset($_POST['is_scat'])) {
	$is_scat = $_POST['is_scat'];
	if ($is_scat == '') {
		unset($is_scat);
	}
}
if (isset($_POST['page_category'])) {
	$page_category = $_POST['page_category'];
	if ($page_category == '') {
		$page_category='No';
	}
}
if (isset($_POST['page_summary'])) {
	$page_summary = $_POST['page_summary'];
	if ($page_summary == '') {
		unset($page_summary);
	}
}
if (isset($_POST['page_position'])) {
	$page_position = $_POST['page_position'];
	if ($page_position == '') {
		unset($page_position);
	}
}
if (isset($_POST['page_body'])) {
	$page_body = $_POST['page_body'];
	if ($page_body == '') {
		unset($page_body);
	}
}
if (isset($_POST['page_url'])) {
	$page_url = $_POST['page_url'];
	if ($page_url == '') {
		unset($page_url);
	}
}
if (isset($_POST['page_status'])) {
	$page_status = $_POST['page_status'];
	if ($page_status == '') {
		unset($page_status);
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
if (isset($_POST['show_header'])) {
	$show_header = $_POST['show_header'];
	if ($show_header == '') {
		unset($show_header);
	}
}
if (isset($_POST['show_footer'])) {
	$show_footer = $_POST['show_footer'];
	if ($show_footer == '') {
		unset($show_footer);
	}
}
if (isset($_POST['v_embd'])) {
	$v_embd = $_POST['v_embd'];
	if ($v_embd == '') {
		unset($v_embd);
	}
}
if (isset($_POST['page_category'])) {
	$page_category = $_POST['page_category'];
	if ($page_category == '') {
		unset($page_category);
	}
}

if(!empty($_FILES["page_cover"]["name"])) 
{
	$temp = explode(".", $_FILES["page_cover"]["name"]);
	$path= '../../images/Pages/Covers/';
	$newname=$path.'Cover-'.$page_position.'-'.time().'.'.end($temp);
	move_uploaded_file($_FILES['page_cover']['tmp_name'],$newname);
	$page_cover='Cover-'.$page_position.'-'.time().'.'.end($temp);$cover_path = 'images/Pages/Covers/' . $page_cover;
} 
else{ $page_cover='default.jpg';
	$cover_path = 'images/Pages/Covers/' . $page_cover;
	$path= '../../images/Pages/Covers/';
	$newname = $path.$service_cover;
	$image_info = getimagesize($newname);
	$image_width = $image_info[0];
	$image_height = $image_info[1];}

	$added_by = $session->username;
	$seo_title = str_replace("'", "&#39;", $seo_title);
	$page_body = str_replace("'", "&#39;", $page_body);
	$page_title = str_replace("'", "&#39;", $page_title);
	$page_summary = str_replace("'", "&#39;", $page_summary);
	$cover_path = 'images/Pages/Covers/' . $page_cover;
	$page_uniid = date("is") . rand(0, 9) . rand(0, 9);
	$folder_name = str_replace(' ', '_', $page_title);
	$gallery_path = 'images/Pages/Gallery/' . $folder_name . '-' . time();
	$gallery_dir = '../../' . $gallery_path;
	mkdir($gallery_dir, 0777, true);

	if (file_exists($gallery_dir)) {
		$gallery_path = $gallery_path . '/';
	
	} else {
		unset($gallery_path);
	}
	if (
	isset($page_title)
	&& isset($page_uniid)
	&& isset($page_summary)
	&& isset($page_position)
	&& isset($page_body)
	&& isset($page_status)
	&& isset($page_url)
	&& isset($seo_title)
	&& isset($seo_keywords)
	&& isset($seo_description)
	&& isset($robots)
	&& isset($added_by)
	&& isset($v_embd)
	&& isset($page_cover)
	&& isset($cover_path)
	&& isset($show_header)
	&& isset($show_footer)
	&& isset($gallery_path)
	) {

	$result = mysqli_query($servercnx, "INSERT INTO pages SET
	        page_uniid = '$page_uniid',
			is_parent = '$is_parent',
			is_scat = '$is_scat',
			page_category = '$page_category',
 	        page_summary = '$page_summary',
			page_title = '$page_title',
			page_position = '$page_position',
			page_body = '$page_body',
			page_status = '$page_status',
			v_embd = '$v_embd',
			page_url = '$page_url',
			seo_title = '$seo_title',
			seo_keywords = '$seo_keywords',
			seo_description = '$seo_description',
			robots = '$robots',
			added_by = '$added_by',
			page_cover = '$page_cover',
			cover_path = '$cover_path',
			show_header = '$show_header',
			show_footer = '$show_footer',
			gallery_path = '$gallery_path',
			cover_height = '$image_height',
			cover_width = '$image_width'
			");
	if ($result == true) {
		$back = $_SERVER['HTTP_REFERER'];
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Pages.php">';
	}else{
		echo 'Error: ';
	}
	} else {
		echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";
	}
