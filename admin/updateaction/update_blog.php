<?php
$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if (isset($_POST['blog_title'])) {
	$blog_title = $_POST['blog_title'];
	if ($blog_title == '') {
		unset($blog_title);
	}
}
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	if ($id == '') {
		unset($id);
	}
}
if (isset($_POST['blog_date'])) {
	$blog_date = $_POST['blog_date'];
	if ($blog_date == '') {
		unset($blog_date);
	}
}


if (isset($_POST['blog_category'])) {
	$blog_category = $_POST['blog_category'];
	if ($blog_category == '') {
		unset($blog_category);
	}
}

if (isset($_POST['blog_summary'])) {
	$blog_summary = $_POST['blog_summary'];
	if ($blog_summary == '') {
		unset($blog_summary);
	}
}

if (isset($_POST['blog_body'])) {
	$blog_body = $_POST['blog_body'];
	if ($blog_body == '') {
		unset($blog_body);
	}
}

if (isset($_POST['blog_url'])) {
	$blog_url = $_POST['blog_url'];
	if ($blog_url == '') {
		unset($blog_url);
	}
}
if (isset($_POST['blog_status'])) {
	$blog_status = $_POST['blog_status'];
	if ($blog_status == '') {
		unset($blog_status);
	}
}
if (isset($_POST['blog_event'])) {
	$blog_event = $_POST['blog_event'];
	if ($blog_event == '') {
		unset($blog_event);
	}
}
if (isset($_POST['event_start'])) {
	$event_start = $_POST['event_start'];
	// if ($event_start == '') {
	// 	unset($event_start);
	// }
}
if (isset($_POST['event_end'])) {
	$event_end = $_POST['event_end'];
	// if ($event_end == '') {
	// 	unset($event_end);
	// }
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
if (isset($_POST['pdf_status'])) {
	$pdf_status = $_POST['pdf_status'];
	if ($pdf_status == '') {
		unset($pdf_status);
	}
}


// Page Cover

if(!empty($_FILES["blog_cover"]["name"])) 
{
	$temp = explode(".", $_FILES["blog_cover"]["name"]);
	$path= '../../images/Blogs/Covers/';
	$LogoData = mysqli_query($servercnx,"SELECT blog_cover FROM blog_post WHERE id = '$id'");
	 $LogoImage = mysqli_fetch_array($LogoData);
	 $blog_cover = $LogoImage['blog_cover'];
	 if ($blog_cover != 'default.jpg') { unlink($path.$blog_cover); }
	$newname=$path.'Cover-'.$blog_date.'-'.time().'.'.end($temp);
	move_uploaded_file($_FILES['blog_cover']['tmp_name'],$newname);
	$blog_cover='Cover-'.$blog_date.'-'.time().'.'.end($temp);
	$image_info = getimagesize($newname);
	$image_width = $image_info[0];
	$image_height = $image_info[1];
} 
else{ $LogoData = mysqli_query($servercnx,"SELECT * FROM blog_post WHERE id = '$id'"); $LogoImage = mysqli_fetch_array($LogoData); $blog_cover = $LogoImage['blog_cover']; 
	$image_height = $LogoImage['cover_height'];
	$image_width = $LogoImage['cover_width'];
}
$updated_by = $session->username;
$blog_title = str_replace("'", "&#39;", $blog_title);
$blog_body = str_replace("'", "&#39;", $blog_body);
$cover_path = 'images/Blogs/Covers/' . $blog_cover;
$blog_update_time = date("h:i a");
$blog_date_converter = $blog_date;
$blog_date = date("j F Y", strtotime($blog_date_converter));
$blog_uniid = "B" . date("is") . rand(0, 9) . rand(0, 9) . 'BL';

    // $result_explode = explode('|', $blog_category);
	// $cate_uniid_array = $result_explode[0];
	// $cate_table_array = $result_explode[1];


if (
	isset($blog_title)
	&& isset($blog_summary)
	&& isset($blog_category)
	&& isset($blog_date)
	&& isset($blog_body)
	&& isset($blog_status)
	&& isset($blog_event)
	&& isset($event_start)
	&& isset($event_end)
	&& isset($blog_url)
	&& isset($seo_title)
	&& isset($seo_keywords)
	&& isset($seo_description)
	&& isset($robots)
	&& isset($updated_by)
	&& isset($blog_cover)
	&& isset($cover_path)
	&& isset($blog_update_time)
	&& isset($id)
) {
	
	if($event_start=='' && $event_end=='')
{
	$result = mysqli_query($servercnx, "UPDATE blog_post SET
			blog_summary = '$blog_summary',
			blog_title = '$blog_title',
			blog_date = '$blog_date',
			blog_update_time = '$blog_update_time',
			blog_category = '$blog_category',
			blog_body = '$blog_body',
			blog_status = '$blog_status',
			blog_event = '$blog_event',
			blog_url = '$blog_url',
			seo_title = '$seo_title',
			seo_keywords = '$seo_keywords',
			seo_description = '$seo_description',
			robots = '$robots',
			updated_by = '$updated_by',
			blog_cover = '$blog_cover',
			cover_height= '$image_height',
			cover_width='$image_width' WHERE id = '$id'");
			//  $result3 = mysqli_query($servercnx,"DELETE FROM `blogs_categories` WHERE blog_uniid = '$blog_uniid'");
	} else {
		$result = mysqli_query($servercnx, "UPDATE blog_post SET
			blog_summary = '$blog_summary',
			blog_title = '$blog_title',
			blog_date = '$blog_date',
			blog_update_time = '$blog_update_time',
			blog_category = '$blog_category',
			blog_body = '$blog_body',
			blog_status = '$blog_status',
			blog_event = '$blog_event',
			event_start = '$event_start',
			pdf_status = '$pdf_status',
			event_end = '$event_end',
			blog_url = '$blog_url',
			seo_title = '$seo_title',
			seo_keywords = '$seo_keywords',
			seo_description = '$seo_description',
			robots = '$robots',
			updated_by = '$updated_by',
			blog_cover = '$blog_cover',
			cover_height= '$image_height',
			cover_width='$image_width' WHERE id = '$id'");
			//  $result3 = mysqli_query($servercnx,"DELETE FROM `blogs_categories` WHERE blog_uniid = '$blog_uniid'");
	}
	
	if ($result == true){ 
		$back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-blogs.php">';
	}
		else {echo "Error";}
		
	}else {
		echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>"; 
	}
	?>