<?php

$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');

include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if (isset($_POST['title'])) {
	$title = $_POST['title'];
	if ($title == '') {
		unset($title);
	}
}

if (isset($_POST['price'])) {
	$price = $_POST['price'];
	if ($price == '') {
		unset($price);
	}
}
//if(isset($_POST['line'])) {$line=$_POST['line'].'\n';  if($line==''){unset($line);}}


$line = $_POST['line'];

$lineData =  implode(",", $line);
echo $lineData;

// Page thumb
if(!empty($_FILES["thumb"]["name"])) 
{
	$temp = explode(".", $_FILES["thumb"]["name"]);
	$path= '../../images/Services/';
	$newname=$path.'Service-'.time().'.'.end($temp);
	move_uploaded_file($_FILES['thumb']['tmp_name'],$newname);
	$service_cover='Service-'.time().'.'.end($temp);
	$image_info = getimagesize($newname);
	$image_width = $image_info[0];
	$image_height = $image_info[1];
} 
else{ $service_cover='default.jpg';
	$path= '../../images/Services/';
	$newname = $path.$service_cover;
	$image_info = getimagesize($newname);
	$image_width = $image_info[0];
	$image_height = $image_info[1]; }
$added_by = $session->username;
$title = str_replace("'", "&#39;", $title);


if (
	isset($title)
	&& isset($price)
) {
	$result = mysqli_query($servercnx, "INSERT INTO `service` SET
	title = '$title',
   price = '$price',
   thumb ='$service_cover',
   thumb_height = '$image_height',
   thumb_width = '$image_width'
");
	$sql = mysqli_query($servercnx, "SELECT `id` FROM `service` ORDER BY `id` DESC");
	$row = mysqli_fetch_array($sql);
	$Lid = $row['id'];
	echo $Lid;
	foreach ($_POST['line'] as $x => $val) {
		$result2 = mysqli_query($servercnx, "INSERT INTO `service_line`(`service_id`, `line`) VALUES ('$Lid' ,'$val')  
");
	}


	if ($result2 == true) {

		$back = $_SERVER['HTTP_REFERER'];
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Service.php">';
	}
} else {

	echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";
}
