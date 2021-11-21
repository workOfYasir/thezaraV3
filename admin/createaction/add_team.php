<?php
$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if (isset($_POST['team_name'])) {
	$team_name = $_POST['team_name'];
	if ($team_name == '') {
		unset($team_name);
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
// Page Cover team_profile
if(!empty($_FILES["team_profile"]["name"])) 
{
	$temp = explode(".", $_FILES["team_profile"]["name"]);
	$path= '../../images/Pages/Profile/';
	$newname=$path.'Profile-'.time().'.'.end($temp);
	move_uploaded_file($_FILES['team_profile']['tmp_name'],$newname);
	$team_profile='Profile-'.time().'.'.end($temp);
} 
else{ $team_profile='default.jpg'; }

// Page Cover
if(!empty($_FILES["team_cover"]["name"])) 
{
	$temp = explode(".", $_FILES["team_cover"]["name"]);
	$path= '../../images/Pages/Covers/';
	$newname=$path.'Cover-'.time().'.'.end($temp);
	move_uploaded_file($_FILES['team_cover']['tmp_name'],$newname);
	$team_cover='Cover-'.time().'.'.end($temp);
	$image_info = getimagesize($newname);
	$image_width = $image_info[0];
	$image_height = $image_info[1];
} 
else{ $team_cover='default.jpg';
$image_info = getimagesize($newname);
	$image_width = $image_info[0];
	$image_height = $image_info[1]; }


$added_by = $session->id;
$team_name = str_replace("'", "&#39;", $team_name);
$team_designation = str_replace("'", "&#39;", $team_designation);
$team_skype = str_replace("'", "&#39;", $team_skype);
$team_linkedin = str_replace("'", "&#39;", $team_linkedin);
$team_twitter = str_replace("'", "&#39;", $team_twitter);
$team_facebook = str_replace("'", "&#39;", $team_facebook);
$team_body = str_replace("'", "&#39;", $team_body);
$team_uniid = "TSIT" . date("is") . rand(0, 9) . rand(0, 9) . 'TM';

if (
	isset($team_name)
	&& isset($team_uniid)
	&& isset($team_designation)
	&& isset($team_status)
	&& isset($team_skype)
	&& isset($team_linkedin)
	&& isset($team_twitter)
	&& isset($team_facebook)
	&& isset($added_by)
	&& isset($team_profile)
	&& isset($team_position)
	&& isset($team_cover)
	&& isset($team_email)
	&& isset($team_body)
) {
	$result = mysqli_query($servercnx, "INSERT INTO team SET
 	        team_uniid = '$team_uniid',
			team_name = '$team_name',
			team_designation = '$team_designation',
			team_status = '$team_status',
			team_position = '$team_position',
			team_skype = '$team_skype',
			team_linkedin = '$team_linkedin',
			team_twitter = '$team_twitter',
			team_facebook = '$team_facebook',
			added_by = '$added_by',
			team_profile = '$team_profile',
			team_email = '$team_email',
			team_body = '$team_body'
			");
	if ($result == true) { 
		$back = $_SERVER['HTTP_REFERER'];
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Team.php">';
	}else{echo 'na kr yr';}
} else {
	echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";
}
