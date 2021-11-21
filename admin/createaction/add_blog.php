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

if (isset($_POST['blog_date'])) {
	$blog_date = $_POST['blog_date'];
	if ($blog_date == '') {
		unset($blog_date);
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
	// if ($event_end=='') {
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



// Page Cover


if(!empty($_FILES["blog_cover"]["name"])) 
{
	$temp = explode(".", $_FILES["blog_cover"]["name"]);
	$path= '../../images/Blogs/Covers/';
	$newname=$path.'Cover-'.$blog_date.'-'.time().'.'.end($temp);
	move_uploaded_file($_FILES['blog_cover']['tmp_name'],$newname);
	$blog_cover='Cover-'.$blog_date.'-'.time().'.'.end($temp);
	$image_info = getimagesize($newname);
	$image_width = $image_info[0];
	$image_height = $image_info[1];
} else {
	$blog_cover = 'default.jpg';
	$path= '../../images/Blogs/Covers/';
	$newname = $path.$service_cover;
	$image_info = getimagesize($newname);
	$image_width = $image_info[0];
	$image_height = $image_info[1];
}
$added_by = $session->username;
$blog_title = str_replace("'", "&#39;", $blog_title);
$cover_path = 'images/Blogs/Covers/' . $blog_cover;

$blog_create_time = date("h:i a");
$blog_date_converter = $blog_date;
$blog_date = date("j F Y", strtotime($blog_date_converter));
$blog_uniid = "TSIT" . date("is") . rand(0, 9) . rand(0, 9) . 'BL';
$folder_name = str_replace(' ', '_', $blog_url);

$gallery_path = 'images/Blogs/Gallery/' . $folder_name . '-' . time();

$gallery_dir = '../../' . $gallery_path;

mkdir($gallery_dir, 0777, true);


if (file_exists($gallery_dir)) {
	$gallery_path = $gallery_path . '/';

} else {
	unset($gallery_path);
}


if (
	 isset($blog_title)
	&& isset($blog_uniid)
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
	&& isset($added_by)
	&& isset($blog_cover)
	&& isset($cover_path)
	&& isset($blog_create_time)
	&& isset($gallery_path)
) {
	if ($event_start == '' && $event_end == '') {
		$result = mysqli_query($servercnx, "INSERT INTO `blog_post`(`blog_uniid`, `blog_title`, `blog_url`, `blog_category`, `blog_date`, `blog_create_time`, `blog_body`, `blog_cover`, `blog_summary`, `cover_path`, `blog_status`, `blog_event`, `seo_title`, `seo_keywords`, `seo_description`, `robots`, `added_by`, `gallery_path`,`cover_width`,`cover_height`) VALUES ('$blog_uniid','$blog_title','$blog_url','$blog_category','$blog_date','$blog_create_time','$blog_body','$blog_cover','$blog_summary','$cover_path','$blog_status','$blog_event','$seo_title','$seo_keywords','$seo_description','$robots','$added_by','$gallery_path','$image_width','$image_height')");
	} else {
		$result = mysqli_query($servercnx, "INSERT INTO `blog_post`(`blog_uniid`, `blog_title`, `blog_url`, `blog_category`, `blog_date`, `blog_create_time`, `blog_body`, `blog_cover`, `blog_summary`, `cover_path`, `blog_status`, `blog_event`, `event_start`, `event_end`, `seo_title`, `seo_keywords`, `seo_description`, `robots`, `added_by`, `gallery_path`,`cover_width`,`cover_height`) VALUES ('$blog_uniid','$blog_title','$blog_url','$blog_category','$blog_date','$blog_create_time','$blog_body','$blog_cover','$blog_summary','$cover_path','$blog_status','$blog_event','$event_start','$event_end','$seo_title','$seo_keywords','$seo_description','$robots','$added_by','$gallery_path','$image_width','$image_height');");
	}
	if ($result == true){ 

		}
		 if ($result) 
		 { $back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Blogs.php">';}
		 else {echo "Error";}
		
	}
	 else {
		 //echo 'no'; 
		 echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>"; 
		}
