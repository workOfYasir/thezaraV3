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


if (isset($_POST['id'])) {
	$id = $_POST['id'];
	if ($id == '') {
		unset($id);
	}
}
$i = 0;

if ($_POST['action'] == 'delete') {

	echo	$Lid = $_POST['lid'];

	echo 'delete';
}
if ($_POST['action'] == 'update') {

	//Page Cover thumb 
	if(!empty($_FILES["thumb"]["name"])) 
	{
		$temp = explode(".", $_FILES["thumb"]["name"]);
		$path= '../../images/Services/';
		$LogoData = mysqli_query($servercnx,"SELECT thumb FROM `service` WHERE id = '$id'");
		 $LogoImage = mysqli_fetch_array($LogoData);
		 $thumb = $LogoImage['thumb'];
		 if ($thumb != 'default.jpg') { unlink($path.$thumb); }
		$newname=$path.'Service-'.time().'.'.end($temp);
		move_uploaded_file($_FILES['thumb']['tmp_name'],$newname);
		$thumb='Service-'.time().'.'.end($temp);
		$cover_path = 'images/Services/' . $thumb;
		$image_info = getimagesize($newname);
		$image_width = $image_info[0];
		$image_height = $image_info[1];
	} 
	else{ $LogoData = mysqli_query($servercnx,"SELECT * FROM `service` WHERE id = '$id'"); $LogoImage = mysqli_fetch_array($LogoData); $thumb = $LogoImage['thumb']; 
		$cover_path = 'images/Services/' . $thumb;
		$image_height = $LogoImage['thumb_height'];
		$image_width = $LogoImage['thumb_width'];
	}


	$cover_path = 'images/Services/' . $thumb;
	//UPDATE `service_line` SET `line`= '$val'
	

	if (
		isset($title)
		&& isset($price)
	) {
		$result = mysqli_query($servercnx, "UPDATE `service` SET
			title = '$title',
			price = '$price',
			thumb = '$thumb',
			thumb_height = '$image_height',
			thumb_width = '$image_width'
		
			 WHERE id = '$id'");
		$result2 = mysqli_query($servercnx, "SELECT * FROM `service_line` WHERE `service_id` = '$id'");
		$i = 0;
		while ($_POST['line'] && $roww = mysqli_fetch_array($result2)) {
			$line = $_POST['line'][$i];
			$i++;
			$Id = $roww['id'];
			$result3 = mysqli_query($servercnx, "SELECT count(*) AS `total` FROM `service_line` WHERE `service_id` = '$id'");
			$data = mysqli_fetch_assoc($result3);
			$total = $data['total'];
			count($_POST['line']);
			if (count($_POST['line']) == $total) {
				$result4 = mysqli_query($servercnx, "UPDATE `service_line` SET `line`= '$line' WHERE `id` = '$Id'");
			}
			if (count($_POST['line']) != $total) {
				$delSql = mysqli_query($servercnx, "DELETE FROM `service_line` WHERE `service_id` ='$id'");
				$sql = mysqli_query($servercnx, "SELECT `id` FROM `service` ORDER BY `id` DESC");
				$row = mysqli_fetch_array($sql);
				$Lid = $row['id'];
				echo $Lid;
				foreach ($_POST['line'] as $x => $val) {
					$result2 = mysqli_query($servercnx, "INSERT INTO `service_line`(`service_id`, `line`) VALUES ('$Lid' ,'$val')  
		");
				}
			}
			if ($result2 == true) {

				//echo 'yes';
				$back = $_SERVER['HTTP_REFERER'];
				echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Service.php">';
			} else if ($result4 == true) {

				//echo 'yes';
				$back = $_SERVER['HTTP_REFERER'];
				echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Service.php">';
			}
		}
	} else {
		echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";
	}
}
