<?php 
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	if ($id == '') {
		unset($id);
	}
}
if (isset($_POST['blog'])) {
	$blog = $_POST['blog'];
	if ($blog == '') {
		unset($blog);
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

    $result = mysqli_query($servercnx, "UPDATE blog_images SET
        gallery_img_pos='$position'
     WHERE id = '$id'");
  
     if($result)
     {
        $back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Blogs.php">';
		$back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../Edit-blog.php?id='.$_POST['blog'].'">';
     }
}

?>