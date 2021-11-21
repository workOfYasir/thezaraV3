<?php
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");
if (isset($_GET['udi'])) {
	$udi = $_GET['udi'];
}

$data = mysqli_query($servercnx, "SELECT * FROM pdf_files WHERE  udi = '$udi'");
$Data = mysqli_fetch_array($data);
$fileName = $Data['file'];
if (isset($udi) && isset($fileName)) {
	$result = mysqli_query($servercnx, "DELETE FROM `pdf_files` WHERE udi = '$udi'");
	if ($result == true) {
		$back = $_SERVER['HTTP_REFERER'];
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=' . $back . '">';
	}
} else {

	echo "Error Deleting <br/><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";
}
