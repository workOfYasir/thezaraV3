<?php
$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');
// Include the database configuration file 
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if (isset($_POST['service_name'])) {
    $service_name = $_POST['service_name'];
    if ($service_name == '') {
        unset($service_name);
    }
}


// $result1 = mysqli_query($servercnx, "SELECT max(id) FROM portfolio_post");
// $row1 = mysqli_fetch_array($result1);
// $portfolio_id = $row1['id'];


// $mainpage = mysqli_query($servercnx, "SELECT max(id) FROM portfolio_images");
// $mainrow = mysqli_fetch_array($mainpage);
// $gallery_id = $mainrow['id'];

if (isset($_POST['portfolio_date'])) {
    $portfolio_date = $_POST['portfolio_date'];
    if ($portfolio_date == '') {
        unset($portfolio_date);
    }
}
if (isset($_POST['video_check'])) {
    $video_check = $_POST['video_check'];
    if ($video_check == '') {
        unset($video_check);
    }
}
if (isset($_POST['v_embd'])) {
    $videoURL = $_POST['v_embd'];
}
if (isset($_POST['gallery_check'])) {
    $gallery_check = $_POST['gallery_check'];
    if ($gallery_check == '') {
        unset($gallery_check);
    }
}
if (isset($_POST['portfilio_summary'])) {
    $portfilio_summary = $_POST['portfilio_summary'];
    if ($portfilio_summary == '') {
        unset($portfilio_summary);
    }
}
if (isset($_POST['portfilio_body'])) {
    $portfilio_body = $_POST['portfilio_body'];
    if ($portfilio_body == '') {
        unset($portfilio_body);
    }
}

function getExtension($str) {
   
	$i = strrpos($str,".");
	if (!$i) { return ""; } 
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
}

if (!empty($_FILES["portfolio_cover"]["name"])) {

    define("MAX_SIZE", "400");

    $errors = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") 	{
		$temp = basename($_FILES["portfolio_cover"]["name"]);
		$path = '../../images/Portfolios/Covers/';
        $path1 = $root.'\images\Portfolios\Covers\\';
		$portfolio_cover ='Cover-' . time().'.jpg';
		$newname = $path . $portfolio_cover;
        $newname1 = $path1 . $portfolio_cover;
		move_uploaded_file($_FILES['portfolio_cover']['tmp_name'], $newname);
		
		$max_width  = 1200;
		$max_height = 800;
		$max_width1  = 768;
		$max_height1 = 1024;
		
		
		$im = new Imagick($newname1);
		
		$im->resizeImage(
			min($im->getImageWidth(),  $max_width),
			min($im->getImageHeight(), $max_height),
			imagick::FILTER_CATROM,
			1,
			true
		);
		$im1 = new Imagick($newname1);
		
		$im1->resizeImage(
			min($im->getImageWidth(),  $max_width1),
			min($im->getImageHeight(), $max_height1),
			imagick::FILTER_CATROM,
			1,
			true
		);
		
		$im->writeImage($newname1);
		$im1->writeImage($path1 . 'thumb\\'.$portfolio_cover);
		
   }
    //If no errors registred, print the success message

    if (isset($_POST['Submit']) && !$errors) {
        // mysql_query("update SQL statement ");
        echo "Image Uploaded Successfully!";
    }
} else {
    $page_cover = 'default.jpg';
}

// if (!empty($_FILES["portfolio_cover"]["name"])) {
//     $temp = explode(".", $_FILES["portfolio_cover"]["name"]);
//     $path = '../../images/Portfolios/Covers/';
//     $portfolio_cover = 'Cover-' . $portfolio_date . '-' . time() . '.' . end($temp);
//     move_uploaded_file($_FILES['portfolio_cover']['tmp_name'], '../../images/Portfolios/Covers/' . $portfolio_cover);
//     //$portfolio_cover = 'Cover-' . $portfolio_date . '-' . time() . '.' . end($temp);
// } else {
//     $portfolio_cover = 'default.jpg';
// }
//File upload configuration 
$added_by = $session->username;
$portfolio_uniid = "TSIT" . date("is") . rand(0, 9) . rand(0, 9) . 'BL';
$service_name = str_replace("'", "&#39;", $service_name);
$portfilio_body = str_replace("'", "&#39;", $portfilio_body);
$folder_name = str_replace(' ', '_', $service_name);
$cover_path = 'images/Blogs/Covers/' . $portfolio_cover;
$gallery_path = 'images/Portfolios/Gallery/' . $folder_name . '-' . time();
$gallery_dir = '../../' . $gallery_path;
if (file_exists($gallery_dir)) {
    $gallery_path = $gallery_path . '/';
} else {
    unset($gallery_path);
}


// if (
//     isset($service_name)
//     && isset($portfolio_date)
//     && isset($video_check)
//     && isset($videoURL)
//     && isset($gallery_check)
//     && isset($portfilio_summary)
//     && isset($portfilio_body)
//     && isset($portfolio_cover)
// ) {
// if ($videoURL == 'No' && $gallery_check == 'No') {

//     $result = mysqli_query($servercnx, "INSERT INTO `portfolio_post`( `portfolio_uniid`, `service_name`, `portfolio_date`, `video_check`, `gallery_check`, `portfilio_summary`, `portfilio_body`, `portfolio_cover`,`cover_path`) VALUES ('$portfolio_uniid','$service_name','$portfolio_date','$video_check','$gallery_check','$portfilio_summary','$portfilio_body','$portfolio_cover','$cover_path')");
// } else if ($videoURL == 'No') {

//     $result = mysqli_query($servercnx, "INSERT INTO `portfolio_post`(`portfolio_uniid`, `service_name`, `portfolio_date`, `video_check`, `gallery_check`,`portfilio_summary`, `portfilio_body`, `portfolio_cover`,`cover_path`) VALUES ('$portfolio_uniid','$service_name','$portfolio_date','$video_check','$gallery_check','$portfilio_summary','$portfilio_body','$portfolio_cover','$cover_path')");
// } else if ($gallery_check == 'No') {
//     $result = mysqli_query($servercnx, "INSERT INTO `portfolio_post`(`portfolio_uniid`, `service_name`, `portfolio_date`, `video_check`, `videoURL`, `gallery_check`, `portfilio_summary`, `portfilio_body`, `portfolio_cover`,`cover_path`) VALUES ('$portfolio_uniid','$service_name','$portfolio_date','$video_check','$videoURL','$gallery_check','$portfilio_summary','$portfilio_body','$portfolio_cover','$cover_path')");
// } else {
//     $result = mysqli_query($servercnx, "INSERT INTO `portfolio_post`(`portfolio_uniid`, `service_name`, `portfolio_date`, `video_check`, `videoURL`, `gallery_check`, `portfilio_summary`, `portfilio_body`, `portfolio_cover`,`cover_path`) VALUES ('$portfolio_uniid','$service_name','$portfolio_date','$video_check','$videoURL','$gallery_check','$portfilio_summary','$portfilio_body','$portfolio_cover','$cover_path')");
// }
// if ($result) {

//     $_SESSION["success"] = 'Data inserted successfully';
//     header('Location: ../Add-Portfolio.php?Success');
//     exit();
// } else {
//     $_SESSION["error"] = 'Error encountered while adding user data';
//     print_r($error);
//     header('Location: ../Add-Portfolio.php?DataEncounterd');
//     exit();
// }

$duplicate = mysqli_query($servercnx, "SELECT `service_name` FROM `portfolio_post` WHERE `service_name` = '$service_name'");

if (mysqli_num_rows($duplicate) > 0) {

    header("Location:../Add-Portfolio.php?DuplicatedDate");
    exit();
} else {

    if (!empty(array_filter($_FILES['portfolio_gallery']['name']))) {

        $result = mysqli_query($servercnx, "INSERT INTO `portfolio_post`(`portfolio_uniid`, `service_name`, `portfolio_date`, `video_check`, `videoURL`, `gallery_check`, `portfilio_summary`, `portfilio_body`, `portfolio_cover`,`cover_path`) VALUES ('$portfolio_uniid','$service_name','$portfolio_date','$video_check','$videoURL','$gallery_check','$portfilio_summary','$portfilio_body','$portfolio_cover','$cover_path')");

        $fileCount = count($_FILES["portfolio_gallery"]['name']);
        for ($i = 0; $i < $fileCount; $i++) {
            $temp = explode(".", $_FILES['portfolio_gallery']['name'][$i]);
            $portfolio_gallery = basename('Gallery-' . $i . time() . '.' . end($temp));

            $tempName = $_FILES['portfolio_gallery']['tmp_name'][$i];

            move_uploaded_file($tempName, '../../images/Portfolios/Gallery/' . $portfolio_gallery);


            // Insert image file name into database
            $gallery_path = 'images/Portfolios/Gallery/' . $portfolio_gallery;


            $result1 = mysqli_query($servercnx, "INSERT INTO `portfolio_images`( `portfolio_id`, `image_file`, `gallery_path`) VALUES ((SELECT `id` FROM `portfolio_post` WHERE `service_name` = '$service_name'),'$portfolio_gallery','$gallery_path')");
            if ($result) {
                header('location: ../Add-Portfolio.php?Success');
            } else {
                header('location: ../Add-Portfolio.php?Error');
            }
        }

        echo "Image Uploaded Successfully";
    } else if ($videoURL == 'No') {

        $result = mysqli_query($servercnx, "INSERT INTO `portfolio_post`( `portfolio_uniid`, `service_name`, `portfolio_date`, `video_check`, `gallery_check`, `portfilio_summary`, `portfilio_body`, `portfolio_cover`,`cover_path`) VALUES ('$portfolio_uniid','$service_name','$portfolio_date','$video_check','$gallery_check','$portfilio_summary','$portfilio_body','$portfolio_cover','$cover_path')");
    }
}
