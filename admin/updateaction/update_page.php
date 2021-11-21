<?php
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if (isset($_POST['page_title'])) {
	$page_title = $_POST['page_title'];
	if ($page_title == '') {
		unset($page_title);
	}
}
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	if ($id == '') {
		unset($id);
	}
}
if (isset($_POST['page_position'])) {
	$page_position = $_POST['page_position'];
	if ($page_position == '') {
		unset($page_position);
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

if (isset($_POST['page_summary'])) {
	$page_summary = $_POST['page_summary'];
	if ($page_summary == '') {
		unset($page_summary);
	}
}
if (isset($_POST['page_category'])) {
	$page_category = $_POST['page_category'];
	if ($page_category == '') {
		unset($page_category);
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
if (isset($_POST['v_embd'])) {
	$v_embd = $_POST['v_embd'];
	if ($v_embd == '') {
		unset($v_embd);
	}
}

// Page Cover
if(!empty($_FILES["page_cover"]["name"])) 
{
	$temp = explode(".", $_FILES["page_cover"]["name"]);
	$path= '../../images/Pages/Covers/';
	$LogoData = mysqli_query($servercnx,"SELECT page_cover FROM pages WHERE id = '$id'");
	 $LogoImage = mysqli_fetch_array($LogoData);
	 $page_cover = $LogoImage['page_cover'];
	 if ($page_cover != 'default.jpg') { unlink($path.$page_cover); }
	$newname=$path.'Cover-'.$page_position.'-'.time().'.'.end($temp);
	move_uploaded_file($_FILES['page_cover']['tmp_name'],$newname);
	$page_cover='Cover-'.$page_position.'-'.time().'.'.end($temp);
	$cover_path = 'images/Pages/Covers/' . $page_cover;
	$image_info = getimagesize($newname);
	$image_width = $image_info[0];
	$image_height = $image_info[1];
} 
else{ $LogoData = mysqli_query($servercnx,"SELECT * FROM pages WHERE id = '$id'"); $LogoImage = mysqli_fetch_array($LogoData); $page_cover = $LogoImage['page_cover']; 
	$image_height = $LogoImage['cover_height'];
	$image_width = $LogoImage['cover_width'];
	$cover_path = 'images/Pages/Covers/' . $page_cover;}

$updated_by = $session->username;
$seo_title = str_replace("'", "&#39;", $seo_title);
$page_body = str_replace("'", "&#39;", $page_body);
$page_title = str_replace("'", "&#39;", $page_title);
$head_script = str_replace("'", "&#39;", $head_script);
$after_head = str_replace("'", "&#39;", $after_head);
$footer_script = str_replace("'", "&#39;", $footer_script);
$page_summary = str_replace("'", "&#39;", $page_summary);
$cover_path = 'images/Pages/Covers/' . $page_cover;
if (
	isset($page_title)
	&& isset($id)
	&& isset($page_position)
	&& isset($page_summary)
	&& isset($page_body)
	&& isset($page_status)
	&& isset($page_url)
	&& isset($seo_title)
	&& isset($seo_keywords)
	&& isset($seo_description)
	&& isset($page_category)
	&& isset($robots)
	&& isset($updated_by)
	&& isset($page_cover)
	&& isset($cover_path)
	&& isset($v_embd)
	&& isset($show_header)
	&& isset($show_footer)

) {

	$result = mysqli_query($servercnx, "UPDATE pages SET
			page_title = '$page_title',
			is_parent = '$is_parent',
			is_scat = '$is_scat',
			page_position = '$page_position',
			page_category = '$page_category',
			page_summary = '$page_summary',
			page_body = '$page_body',
			page_status = '$page_status',
			page_url = '$page_url',
			seo_title = '$seo_title',
			seo_keywords = '$seo_keywords',
			seo_description = '$seo_description',
			robots = '$robots',
			updated_by = '$updated_by',
			page_cover = '$page_cover',
			cover_path = '$cover_path',
			v_embd = '$v_embd',
			show_header = '$show_header',
			head_script = '$head_script',
			after_head = '$after_head',
			footer_script = '$footer_script',
            show_footer = '$show_footer',
			cover_height = '$image_height',
			cover_width = '$image_width' WHERE id = '$id'");
	if ($result == true) {

		$back = $_SERVER['HTTP_REFERER'];
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Pages.php">';
	}
	//echo 'andr hi sa';
} else {
	//echo 'no';
	echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";
}
