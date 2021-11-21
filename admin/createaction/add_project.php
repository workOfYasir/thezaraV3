<?php

$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');

include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if (isset($_POST['project_name'])) {
	$project_name = $_POST['project_name'];
	if ($project_name == '') {
		unset($project_name);
	}
}
if (isset($_POST['project_uniid'])) {
	$project_uniid = $_POST['project_uniid'];
	if ($project_uniid == '') {
		unset($project_uniid);
	}
}
if (isset($_POST['project_body'])) {
	$project_body = $_POST['project_body'];
	if ($project_body == '') {
		unset($project_body);
	}
}
if (isset($_POST['project_starting'])) {
	$project_starting = $_POST['project_starting'];
	if ($project_starting == '') {
		unset($project_starting);
	}
}
if (isset($_POST['project_end'])) {
	$project_end = $_POST['project_end'];
	if ($project_end == '') {
		$project_end = 'Present';
	}
}
if (isset($_POST['project_url'])) {
	$project_url = $_POST['project_url'];
	if ($project_url == '') {
		unset($project_url);
	}
}
if (isset($_POST['project_category'])) {
	$project_category = $_POST['project_category'];
	if ($project_category == '') {
		unset($project_category);
	}
}
if (isset($_POST['project_status'])) {
	$project_status = $_POST['project_status'];
	if ($project_status == '') {
		unset($project_status);
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
// Page Cover
if (!empty($_FILES["project_cover"]["name"])) {
	//$temp = explode(".", $_FILES["project_cover"]["name"]);
	$path = '../../images/Projects/Covers/';
	$path1 = $root . '\images\Projects\Covers\\';
	$project_cover = 'Project-Cover-' . time() . '.jpg';
	$newname = $path . $project_cover;
	$newname1 = $path1 . $mcat_cover;
	move_uploaded_file($_FILES['project_cover']['tmp_name'], $newname);

	$max_width  = 1200;
	$max_height = 800;
	$max_width1  = 768;
	$max_height1 = 1024;


	$im = new Imagick($newname1);

	$im->resizeImage(
		min($im->getImageWidth(),  $max_width),
		min($im->getImageHeight(), $max_height),
		imagick::FILTER_CATROM,
		1,
		true
	);
	$im1 = new Imagick($newname1);

	$im1->resizeImage(
		min($im->getImageWidth(),  $max_width1),
		min($im->getImageHeight(), $max_height1),
		imagick::FILTER_CATROM,
		1,
		true
	);

	$im->writeImage($newname1);
	$im1->writeImage($path1 . 'thumb\\' . $project_cover);
} else {
	$project_cover = 'default.jpg';
}


// Project Logo
if (!empty($_FILES["project_logo"]["name"])) {

	{
		$temp = basename($_FILES["project_logo"]["name"]);
		$path = '../../images/Projects/Logos/';
		$path1 = $root . '\images\Projects\Logos\\';
		$project_logo = 'Logo-' . time() . '.jpg';
		$newname = $path . $project_logo;
		$newname1 = $path1 . $project_logo;
		move_uploaded_file($_FILES['project_logo']['tmp_name'], $newname);

		$max_width  = 1920;
		$max_height = 1024;
		$max_width1  = 500;
		$max_height1 = 700;


		$im = new Imagick($newname1);

		$im->resizeImage(
			min($im->getImageWidth(),  $max_width),
			min($im->getImageHeight(), $max_height),
			imagick::FILTER_CATROM,
			1,
			true
		);
		$im1 = new Imagick($newname1);

		$im1->resizeImage(
			min($im->getImageWidth(),  $max_width1),
			min($im->getImageHeight(), $max_height1),
			imagick::FILTER_CATROM,
			1,
			true
		);

		$im->writeImage($newname1);
		$im1->writeImage($path1 . 'thumb\\' . $project_logo);

		$image = new Imagick($newname1);
		$d = $image->getImageGeometry();
		$cover_width = $d['width'];
		$cover_height = $d['height'];

		$image1 = new Imagick($path1 . 'thumb\\' . $mcat_cover);
		$d1 = $image1->getImageGeometry();
		$thumb_width = $d1['width'];
		$thumb_height = $d1['height'];
	}
} else {
	$project_logo = 'default.jpg';
}


$added_by = $session->username;
$project_name = str_replace("'", "&#39;", $project_name);
$project_body = str_replace("'", "&#39;", $project_body);
$project_url = str_replace("'", "&#39;", $project_url);

if (
	isset($project_name)
	&& isset($project_uniid)
	&& isset($project_body)
	&& isset($project_status)
	&& isset($project_starting)
	&& isset($project_end)
	&& isset($project_category)
	&& isset($project_url)
	&& isset($seo_title)
	&& isset($seo_keywords)
	&& isset($seo_description)
	&& isset($robots)
	&& isset($added_by)
	&& isset($project_cover)
	&& isset($project_logo)
) {
	$result = mysqli_query($servercnx, "INSERT INTO projects SET
 	        project_uniid = '$project_uniid',
			project_name = '$project_name',
			project_body = '$project_body',
			project_status = '$project_status',
			project_starting = '$project_starting',
			project_end = '$project_end',
			project_category = '$project_category',
			project_url = '$project_url',
			seo_title = '$seo_title',
			seo_keywords = '$seo_keywords',
			seo_description = '$seo_description',
			robots = '$robots',
			added_by = '$added_by',
			project_cover = '$project_cover',
			project_logo = '$project_logo'");
	if ($result == true) {
		$back = $_SERVER['HTTP_REFERER'];
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Projects.php">';
	}
} else {
	echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";
}
