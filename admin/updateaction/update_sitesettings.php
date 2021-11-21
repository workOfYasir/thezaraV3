<?php
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if (isset($_POST['id'])) {
	$id = $_POST['id'];
}
if (isset($_POST['site_name'])) {
	$site_name = $_POST['site_name'];
	if ($site_name == '') {
		unset($site_name);
	}
}
if (isset($_POST['site_domain'])) {
	$site_domain = $_POST['site_domain'];
	if ($site_domain == '') {
		unset($site_domain);
	}
}
if (isset($_POST['site_phone'])) {
	$site_phone = $_POST['site_phone'];
	if ($site_phone == '') {
		unset($site_phone);
	}
}
if (isset($_POST['site_charity_id'])) {
	$site_charity_id = $_POST['site_charity_id'];
	if ($site_charity_id == '') {
		unset($site_charity_id);
	}
}
if (isset($_POST['site_email'])) {
	$site_email = $_POST['site_email'];
	if ($site_email == '') {
		unset($site_email);
	}
}
if (isset($_POST['jummah_time'])) {
	$jummah_time = $_POST['jummah_time'];
	if ($jummah_time == '') {
		unset($jummah_time);
	}
}
if (isset($_POST['site_phone_call'])) {
	$site_phone_call = $_POST['site_phone_call'];
	if ($site_phone_call == '') {
		unset($site_phone_call);
	}
}
if (isset($_POST['insta_user'])) {
	$insta_user = $_POST['insta_user'];
	if ($insta_user == '') {
		unset($insta_user);
	}
}
if (isset($_POST['site_address'])) {
	$site_address = $_POST['site_address'];
	if ($site_address == '') {
		unset($site_address);
	}
}
if (isset($_POST['site_linkedin'])) {
	$site_linkedin = $_POST['site_linkedin'];
	if ($site_linkedin == '') {
		unset($site_linkedin);
	}
}
if (isset($_POST['site_facebook'])) {
	$site_facebook = $_POST['site_facebook'];
	if ($site_facebook == '') {
		unset($site_facebook);
	}
}
if (isset($_POST['site_twitter'])) {
	$site_twitter = $_POST['site_twitter'];
	if ($site_twitter == '') {
		unset($site_twitter);
	}
}
if (isset($_POST['site_insta'])) {
	$site_insta = $_POST['site_insta'];
	if ($site_insta == '') {
		unset($site_insta);
	}
}
if (isset($_POST['site_youtube'])) {
	$site_youtube = $_POST['site_youtube'];
	if ($site_youtube == '') {
		unset($site_youtube);
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
if (isset($_POST['site_summary'])) {
	$site_summary = $_POST['site_summary'];
	if ($site_summary == '') {
		unset($site_summary);
	}
}

if (
	isset($site_name)
	&& isset($site_domain)
	&& isset($site_phone)
	&& isset($site_address)
	&& isset($site_email)
	&& isset($jummah_time)
	&& isset($site_phone_call)
	&& isset($site_charity_id)
	&& isset($insta_user)
	&& isset($site_facebook)
	&& isset($site_linkedin)
	&& isset($site_twitter)
	&& isset($site_insta)
	&& isset($site_youtube)
	&& isset($site_summary)
	&& isset($head_script)
	&& isset($after_head)
	&& isset($footer_script)
	&& isset($id)
) {
	$result = mysqli_query($servercnx, "UPDATE site_settings SET
		site_name='$site_name',
		site_domain='$site_domain',
		site_phone='$site_phone',
		site_address='$site_address',
		site_email='$site_email',
		jummah_time='$jummah_time',
		site_phone_call='$site_phone_call',
		site_charity_id='$site_charity_id',
		insta_user='$insta_user',
		site_facebook='$site_facebook',
		site_linkedin='$site_linkedin',
		site_twitter='$site_twitter',
		site_insta='$site_insta',
		site_youtube='$site_youtube',
		site_summary='$site_summary',
		head_script = '$head_script',
		after_head = '$after_head',
		footer_script = '$footer_script' WHERE id = '$id'");
	if ($result == true) {
		$back = $_SERVER['HTTP_REFERER'];
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=' . $back . '">';
		mysqli_close($servercnx);
	}
} else {
	echo "Error Updating <br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";
	mysqli_close($servercnx);
}
