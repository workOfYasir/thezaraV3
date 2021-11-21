<?php
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');
if (isset($_POST['team_name'])) {
	$team_name = $_POST['team_name'];
	if ($team_name == '') {
		unset($team_name);
	}
}
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	if ($id == '') {
		unset($id);
	}
}
if (isset($_POST['team_designation'])) {
	$team_designation = $_POST['team_designation'];
	if ($team_designation == '') {
		unset($team_designation);
	}
}
if (isset($_POST['team_status'])) {
	$team_status = $_POST['team_status'];
	if ($team_status == '') {
		unset($team_status);
	}
}
if (isset($_POST['team_skype'])) {
	$team_skype = $_POST['team_skype'];
	if ($team_skype == '') {
		unset($team_skype);
	}
}
if (isset($_POST['team_linkedin'])) {
	$team_linkedin = $_POST['team_linkedin'];
	if ($team_linkedin == '') {
		unset($team_linkedin);
	}
}
if (isset($_POST['team_twitter'])) {
	$team_twitter = $_POST['team_twitter'];
	if ($team_twitter == '') {
		unset($team_twitter);
	}
}
if (isset($_POST['team_facebook'])) {
	$team_facebook = $_POST['team_facebook'];
	if ($team_facebook == '') {
		unset($team_facebook);
	}
}
if (isset($_POST['team_position'])) {
	$team_position = $_POST['team_position'];
	if ($team_position == '') {
		unset($team_position);
	}
}
if (isset($_POST['team_email'])) {
	$team_email = $_POST['team_email'];
	if ($team_email == '') {
		unset($team_email);
	}
}
if (isset($_POST['team_body'])) {
	$team_body = $_POST['team_body'];
	if ($team_body == '') {
		unset($team_body);
	}
}
if (isset($_POST['head_script'])) {
	$head_script = $_POST['head_script'];
	if ($head_script == '') {
		unset($head_script);
	}
}
if (isset($_POST['after_head'])) {
	$after_head = $_POST['after_head'];
	if ($after_head == '') {
		unset($after_head);
	}
}
if (isset($_POST['footer_script'])) {
	$footer_script = $_POST['footer_script'];
	if ($footer_script == '') {
		unset($footer_script);
	}
}

if (!empty($_FILES["team_profile"]["name"])) {
	//$temp = explode(".", $_FILES["team_profile"]["name"]);
	$path = '../../images/Teams/Profiles/';
	$path1 = $root . '\images\Teams\Profiles\\';
	$LogoData = mysqli_query($servercnx, "SELECT team_profile FROM team WHERE id = '$id'");
	$LogoImage = mysqli_fetch_array($LogoData);
	//$team_profile = $LogoImage['team_profile'];
	if ($LogoImage['team_profile'] != 'default.jpg') {
		$team_profile = $LogoImage['team_profile'];
		unlink($path . $team_profile);
		unlink($path . 'thumb/' . $team_profile);
		$newname = $path . $team_profile;
		$newname1 = $path1 . $team_profile;
		move_uploaded_file($_FILES['team_profile']['tmp_name'], $newname);

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
		$im1->writeImage($path1 . 'thumb\\' . $team_profile);

		$image = new Imagick($newname1);
		$d = $image->getImageGeometry();
		$profile_width = $d['width'];
		$profile_height = $d['height'];

		$image1 = new Imagick($path1 . 'thumb\\' . $team_profile);
		$d1 = $image1->getImageGeometry();
		$pro_thumb_width = $d1['width'];
		$pro_thumb_height = $d1['height'];
	}
	if ($LogoImage['team_profile'] == 'default.jpg') {
		$team_profile = 'Team-Profile-' . time() . '.jpg';

		$newname = $path . $team_profile;
		$newname1 = $path1 . $team_profile;
		move_uploaded_file($_FILES['team_profile']['tmp_name'], $newname);

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
		$im1->writeImage($path1 . 'thumb\\' . $team_profile);

		$image = new Imagick($newname1);
		$d = $image->getImageGeometry();
		$profile_width = $d['width'];
		$profile_height = $d['height'];

		$image1 = new Imagick($path1 . 'thumb\\' . $team_profile);
		$d1 = $image1->getImageGeometry();
		$pro_thumb_width = $d1['width'];
		$pro_thumb_height = $d1['height'];
	}
	//$team_profile = 'Team-Profile-' . time() . '.jpg';



} else {
	$LogoData = mysqli_query($servercnx, "SELECT * FROM team WHERE id = '$id'");
	$LogoImage = mysqli_fetch_array($LogoData);
	$team_profile = $LogoImage['team_profile'];
	$profile_width = $LogoImage['profile_width'];
	$profile_height =  $LogoImage['profile_height'];
	$pro_thumb_width =  $LogoImage['pro_thumb_width'];
	$pro_thumb_height =  $LogoImage['pro_thumb_height'];
	$cover_width = $LogoImage['cover_width'];
	$cover_height =  $LogoImage['cover_height'];
	$thumb_width =  $LogoImage['thumb_width'];
	$thumb_height =  $LogoImage['thumb_height'];
}

// Page Cover
if (!empty($_FILES["team_cover"]["name"])) {
	//$temp = explode(".", $_FILES["team_cover"]["name"]);
	$path = '../../images/Teams/Covers/';
	$path1 = $root . '\images\Teams\Covers\\';
	$LogoData = mysqli_query($servercnx, "SELECT * FROM team WHERE id = '$id'");
	$LogoImage = mysqli_fetch_array($LogoData);
	if ($LogoImage['team_cover'] != 'default.jpg') {
		$team_cover = $LogoImage['team_cover'];
		unlink($path . $team_cover);
		unlink($path . 'thumb/' . $team_cover);
		$newname = $path . $team_cover;
		$newname1 = $path1 . $team_cover;
		move_uploaded_file($_FILES['team_cover']['tmp_name'], $newname);

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
		$im1->writeImage($path1 . 'thumb\\' . $team_cover);

		$image = new Imagick($newname1);
		$d = $image->getImageGeometry();
		$profile_width = $d['width'];
		$profile_height = $d['height'];

		$image1 = new Imagick($path1 . 'thumb\\' . $team_cover);
		$d1 = $image1->getImageGeometry();
		$pro_thumb_width = $d1['width'];
		$pro_thumb_height = $d1['height'];
	}
	if ($LogoImage['team_cover'] == 'default.jpg') {
		echo 'hn ji ino chlao';
		$team_cover = 'Team-Cover-' . time() . '.jpg';

		$newname = $path . $team_cover;
		$newname1 = $path1 . $team_cover;
		move_uploaded_file($_FILES['team_cover']['tmp_name'], $newname);

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
		$im1->writeImage($path1 . 'thumb\\' . $team_cover);

		$image = new Imagick($newname1);
		$d = $image->getImageGeometry();
		$cover_width = $d['width'];
		$cover_height = $d['height'];

		$image1 = new Imagick($path1 . 'thumb\\' . $team_cover);
		$d1 = $image1->getImageGeometry();
		$thumb_width = $d1['width'];
		$thumb_height = $d1['height'];
	}
	// $team_cover = 'Team-Cover-' . time() . '.jpg';
	// $newname = $path . $team_cover;
	// move_uploaded_file($_FILES['team_cover']['tmp_name'], $newname);

} else {
	$LogoData = mysqli_query($servercnx, "SELECT * FROM team WHERE id = '$id'");
	$LogoImage = mysqli_fetch_array($LogoData);
	$team_cover = $LogoImage['team_cover'] . '.jpg';
	$cover_width = $LogoImage['cover_width'];
	$cover_height =  $LogoImage['cover_height'];
	$thumb_width =  $LogoImage['thumb_width'];
	$thumb_height =  $LogoImage['thumb_height'];
	$profile_width = $LogoImage['profile_width'];
	$profile_height =  $LogoImage['profile_height'];
	$pro_thumb_width =  $LogoImage['pro_thumb_width'];
	$pro_thumb_height =  $LogoImage['pro_thumb_height'];
}
$updated_by = $session->id;
$team_name = str_replace("'", "&#39;", $team_name);
$team_designation = str_replace("'", "&#39;", $team_designation);
$team_skype = str_replace("'", "&#39;", $team_skype);
$team_linkedin = str_replace("'", "&#39;", $team_linkedin);
$team_twitter = str_replace("'", "&#39;", $team_twitter);
$team_facebook = str_replace("'", "&#39;", $team_facebook);
$team_body = str_replace("'", "&#39;", $team_body);

if (
	isset($team_name)
	&& isset($id)
	&& isset($team_designation)
	&& isset($team_status)
	&& isset($team_skype)
	&& isset($team_linkedin)
	&& isset($team_twitter)
	&& isset($team_facebook)
	&& isset($updated_by)
	&& isset($team_profile)
	&& isset($team_position)
	&& isset($team_cover)
	&& isset($team_email)
	&& isset($team_body)
) {
	echo "UPDATE team SET
	team_name = '$team_name',
	team_designation = '$team_designation',
	team_status = '$team_status',
	team_position = '$team_position',
	team_skype = '$team_skype',
	team_linkedin = '$team_linkedin',
	team_twitter = '$team_twitter',
	team_facebook = '$team_facebook',
	updated_by = '$updated_by',
	team_profile = '$team_profile',
	team_email = '$team_email',
	team_body = '$team_body',
	head_script = '$head_script',
	after_head = '$after_head',
	footer_script = '$footer_script',
	team_cover = '$team_cover',
	pro_thumb_height = '$pro_thumb_height',
	pro_thumb_widht = '$pro_thumb_width',
	profile_height = '$profile_height',
	profile_width = '$profile_width',
	cover_height = '$cover_height',
	cover_width = '$cover_width',
	thumb_height = '$thumb_height',
	thumb_width = '$thumb_width' WHERE id = '$id'";
	$result = mysqli_query($servercnx, "UPDATE team SET
			team_name = '$team_name',
			team_designation = '$team_designation',
			team_status = '$team_status',
			team_position = '$team_position',
			team_skype = '$team_skype',
			team_linkedin = '$team_linkedin',
			team_twitter = '$team_twitter',
			team_facebook = '$team_facebook',
			updated_by = '$updated_by',
			team_profile = '$team_profile',
			team_email = '$team_email',
			team_body = '$team_body',
			head_script = '$head_script',
			after_head = '$after_head',
			footer_script = '$footer_script',
			team_cover = '$team_cover',
			pro_thumb_height = '$pro_thumb_height',
			pro_thumb_widht = '$pro_thumb_width',
			profile_height = '$profile_height',
			profile_width = '$profile_width',
			cover_height = '$cover_height',
			cover_width = '$cover_width',
			thumb_height = '$thumb_height',
			thumb_width = '$thumb_width' WHERE id = '$id'");
	if ($result == true) {
		echo 'qury chl gyi';
		//$back = $_SERVER['HTTP_REFERER'];
		//echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Team.php">';
	}
	echo 'if statement chl gyi pr qury nhe';
} else {
	echo 'if statement hi nhe chli';
	//echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";
}
