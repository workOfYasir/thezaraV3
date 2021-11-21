<?php

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


if (isset($_POST['mcat_position'])) {
	$mcat_position = $_POST['mcat_position'];
	if ($mcat_position == '') {
		unset($mcat_position);
	}
}
if (isset($_POST['mcat_cates'])) {
	$mcat_cates = $_POST['mcat_cates'];
	if ($mcat_cates == '') {
		unset($mcat_cates);
	}
}

$updated_by = $session->username;
$mcat_title = str_replace("'", "&#39;", $mcat_title);

if (
	isset($mcat_title)
	&& isset($id)
	&& isset($mcat_cates)
	&& isset($updated_by)
	&& isset($mcat_position)

) {

	$result = mysqli_query($servercnx, "UPDATE mcat SET
			mcat_title = '$mcat_title',
			mcat_cates = '$mcat_cates',
			updated_by = '$updated_by',
			mcat_position = '$mcat_position'
			WHERE id = '$id'");
	if ($result == true) {
		 $back = $_SERVER['HTTP_REFERER'];
		 echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Mcats.php">';
	}else{
		echo 'ja mar v';
	}
} 
else {
	echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";
}
