<?php
$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');echo '<br>';
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if (isset($_POST['mcat_title'])) {
	$mcat_title = $_POST['mcat_title'];
	if ($mcat_title == '') {
		unset($mcat_title);
	}
}
// if (isset($_POST['mcat_summary'])) {
// 	$mcat_summary = $_POST['mcat_summary'];
// 	if ($mcat_summary == '') {
// 		unset($mcat_summary);
// 	}
// }
// if (isset($_POST['mcat_body'])) {
// 	$mcat_body = $_POST['mcat_body'];
// 	if ($mcat_body == '') {
// 		unset($mcat_body);
// 	}
// }
// if (isset($_POST['mcat_url'])) {
// 	$mcat_url = $_POST['mcat_url'];
// 	if ($mcat_url == '') {
// 		unset($mcat_url);
// 	}
// }
if (isset($_POST['mcat_cates'])) {
	$mcat_cates = $_POST['mcat_cates'];
	if ($mcat_cates == '') {
		unset($mcat_cates);
	}
}
if (isset($_POST['mcat_position'])) {
	$mcat_position = $_POST['mcat_position'];
	if ($mcat_position == '') {
		unset($mcat_position);
	}
}


$added_by = $session->username;
$mcat_title = str_replace("'", "&#39;", $mcat_title);
$mcat_uniid = "TSIT" . date("is") . rand(0, 9) . rand(0, 9) . 'C';

if (
	isset($mcat_title)
	&& isset($mcat_uniid)
	&& isset($mcat_cates)
	&& isset($added_by)
	&& isset($mcat_position)
) {

	$result = mysqli_query($servercnx, "INSERT INTO mcat SET
	        mcat_uniid = '$mcat_uniid',
			mcat_title = '$mcat_title',
			mcat_position = '$mcat_position',
			mcat_cates = '$mcat_cates',
			added_by = '$added_by'
			");
	if ($result == true) {
		$back = $_SERVER['HTTP_REFERER'];
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Mcats.php">';
	}
} else {
	echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";
}
