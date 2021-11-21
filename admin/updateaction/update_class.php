<?php 
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");

if (isset($_POST['id'])) {
	$id = $_POST['id'];
	if ($id == '') {
		unset($id);
	}
}
if (isset($_POST['class_name'])) {
	$class_name = $_POST['class_name'];
	if ($class_name == '') {
		unset($class_name);
	}
}
if (isset($_POST['short_details'])) {
	$short_details = $_POST['short_details'];
	if ($short_details == '') {
		unset($short_details);
	}
}
if (isset($_POST['class_summary'])) {
	$class_summary = $_POST['class_summary'];
	if ($class_summary == '') {
		unset($class_summary);
	}
}
if (isset($_POST['class_position'])) {
	$class_position = $_POST['class_position'];
	if ($class_position == '') {
		unset($class_position);
	}
}
if (isset($_POST['class_body'])) {
	$class_body = $_POST['class_body'];
	if ($class_body == '') {
		unset($class_body);
	}
}
if (isset($_POST['class_url'])) {
	$class_url = $_POST['class_url'];
	if ($class_url == '') {
		unset($class_url);
	}
}
if (isset($_POST['duration'])) {
	$duration = $_POST['duration'];
	if ($duration == '') {
		unset($duration);
	}
}
if (isset($_POST['seo_title'])) {
	$seo_title = $_POST['seo_title'];
	if ($seo_title == '') {
		unset($seo_title);
	}
}
if (isset($_POST['seo_keywords'])) {
	$seo_keywords = $_POST['seo_keywords'];
	if ($seo_keywords == '') {
		unset($seo_keywords);
	}
}
if (isset($_POST['seo_description'])) {
	$seo_description = $_POST['seo_description'];
	if ($seo_description == '') {
		unset($seo_description);
	}
}
if (isset($_POST['robots'])) {
	$robots = $_POST['robots'];
	if ($robots == '') {
		unset($robots);
	}
}
if (isset($_POST['class_status'])) {
	$class_status = $_POST['class_status'];
	if ($class_status == '') {
		unset($class_status);
	}
}
if (isset($_POST['time'])) {
	$time = $_POST['time'];
	if ($time == '') {
		unset($time);
	}
}

if (isset($_POST['class_category'])) {
	$class_category = $_POST['class_category'];
	if ($class_category == '') {
		unset($class_category);
	}
}
if (isset($_POST['cost'])) {
	$cost = $_POST['cost'];
	if ($cost == '') {
		unset($cost);
	}
}

	if (
	isset($class_name)
	&& isset($short_details)
	&& isset($class_summary)
	&& isset($class_position)
	&& isset($class_body)
    && isset($duration)
	&& isset($class_url)
	&& isset($seo_title)
	&& isset($seo_keywords)
	&& isset($seo_description)
	&& isset($robots)
	&& isset($time)
    && isset($class_category)
    && isset($cost)
    && isset($id))
{
$query="UPDATE classes SET
            class_name = '$class_name',
            short_details = '$short_details',
            status = '$class_status',
            summary = '$class_summary',
            position = '$class_position',
            text_body = '$class_body',
            duration = '$duration',
            url = '$class_url',
            timing = '$time',
            cost = '$cost',
            page_id = '$class_category',
            seo_title = '$seo_title',
            seo_keywords = '$seo_keywords',
            seo_description = '$seo_description',
            robots = '$robots' WHERE id = '$id'";
    $result = mysqli_query($servercnx, $query);
  
     if($result)
     {
        $back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Classes.php">';
     }else{
         echo "Error:1";
     }
}else{
    echo "Error:2";
}
