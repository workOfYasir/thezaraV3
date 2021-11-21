<?php
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
if (isset($_GET['gallery_path'])) {
	$gallery_path = $_GET['gallery_path'];
}

$data = mysqli_query($servercnx, "SELECT * FROM page_images WHERE  id = '$id'");
$Data = mysqli_fetch_array($data);
$fileName = $Data['image_file'];
if (isset($id) && isset($gallery_path) && isset($fileName)) {
	$result = mysqli_query($servercnx, "DELETE FROM `page_images` WHERE id = '$id'");
	if ($result == true) {
		$back = $_SERVER['HTTP_REFERER'];
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=' . $back . '">';
	}
} else {

	echo "Error Deleting <br/><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";
}
