<?php 
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");

if (isset($_POST['page'])) {
	$page = $_POST['page'];
	if ($page == '') {
		unset($page);
	}
}
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	if ($id == '') {
		unset($id);
	}
}
if (isset($_POST['position'])) {
	$position = $_POST['position'];
	if ($position == '') {
		unset($position);
	}
}

if(isset($position))
{

    $result = mysqli_query($servercnx, "UPDATE page_images SET
        gallery_img_pos='$position'
     WHERE id = '$id'");
  
     if($result)
     {
        $back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../Edit-Page.php?id='.$_POST['page'].'">';
     }
}

?>