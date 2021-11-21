<?php
// Include the database configuration file 
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
$service_name = $_POST['service_name'];
$pid = $_POST['id'];
$portfolio_date = $_POST['portfolio_date'];
$video_check = $_POST['video_check'];
$videoURL = $_POST['v_embd'];
$gallery_check = $_POST['gallery_check'];
$portfilio_summary = $_POST['portfilio_summary'];
$portfilio_body = $_POST['portfilio_body'];

//

if (!empty($_FILES["portfolio_cover"]["name"])) {
    //$temp = explode(".", $_FILES["portfolio_cover"]["name"]);

    $path = '../../images/Portfolios/Covers/';
    $path1 = $root.'\images\Portfolios\Covers\\';
    $newname = $path . $portfolio_cover;
    $portfolio_cover = 'Cover-' . $portfolio_date . '-' . time() . '.jpg';
    move_uploaded_file($_FILES['portfolio_cover']['tmp_name'],  $newname);

    $newname1 = $path1 . $portfolio_cover;

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
	
	$im->writeImage( $newname1);
	$im1->writeImage( $path1 . 'thumbnails\\'.$portfolio_cover);
} else {
    $portfolio_cover = 'default.jpg';
}
//File upload configuration 
$added_by = $session->username;
$portfolio_uniid = "TSIT" . date("is") . rand(0, 9) . rand(0, 9) . 'BL';
$cover_path = 'images/Blogs/Covers/' . $portfolio_cover;

$result4 = mysqli_query($servercnx, "SELECT * FROM `portfolio_images` WHERE `portfolio_id` = '$pid' ");

if (mysqli_num_rows($result4)>0) {

    if (!empty(array_filter($_FILES['portfolio_gallery']['name']))) {

        $result2 = mysqli_query($servercnx, "UPDATE `portfolio_post` SET `service_name` = '$service_name', `portfolio_date` = '$portfolio_date', `video_check` = '$video_check', `videoURL` = '$videoURL', `gallery_check` = '$gallery_check' WHERE `id` = '$pid'");

        $fileCount = count($_FILES["portfolio_gallery"]['name']);
        for ($i = 0; $i < $fileCount, $row22 = mysqli_fetch_array($result4); $i++) {

           // $temp = explode(".", $_FILES['portfolio_gallery']['name'][$i]);
            // $portfolio_gallery = basename('Gallery-' . $i . time() . '.' . end($temp));
            // $tempName = $_FILES['portfolio_gallery']['tmp_name'][$i];
            
            // move_uploaded_file($tempName, '../../images/Portfolios/Gallery/' . $portfolio_gallery);
            // echo $portfolio_gallery . '                            ';
            // Insert image file name into database
            // $gallery_path = 'images/Portfolios/Gallery/' . $portfolio_gallery;

            $gallery_path='../../images/Portfolios/Gallery/';
            $gallery_path1 = $root.'\images\Portfolios\Gallery\\';
            $portfolio_gallery = 'Gallery-' . $i . time() . '.jpg';
  
            $newname=$gallery_path.$portfolio_gallery;
            $newname1 = $gallery_path1.$portfolio_gallery;
            $tempName = $_FILES['portfolio_gallery']['tmp_name'][$i];
            
            move_uploaded_file($tempName, $newname); 
    
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
            
            $im->writeImage( $newname1);
            $im1->writeImage( $path1 . 'thumbnails\\'.$portfolio_gallery);
    
            $id = $row22['id'];
            $portfolio_id = $row22['portfolio_id'];
            $result3 = mysqli_query($servercnx, "UPDATE `portfolio_images` SET   `image_file`= '$portfolio_gallery', `gallery_path`='$gallery_path' WHERE `id` = '$id' AND `portfolio_id` = $portfolio_id");
        }
    } else {
        $result6 = mysqli_query($servercnx, "UPDATE `portfolio_post` SET `service_name` = '$service_name', `portfolio_date` = '$portfolio_date', `video_check` = '$video_check', `videoURL` = '$videoURL', `gallery_check` = '$gallery_check' WHERE `id` = '$pid'");
    }
} else { echo '1 ';
    $fileCount = count($_FILES["portfolio_gallery"]['name']);
    for ($i = 0; $i < $fileCount; $i++) {
        //$temp = explode(".", $_FILES['portfolio_gallery']['name'][$i]);
        $gallery_path='../../images/Portfolios/Gallery/';
        $gallery_path1 = $root.'\images\Portfolios\Gallery\\';
        $portfolio_gallery = 'Gallery-' . $i . time() . '.jpg';
        $newname=$gallery_path.$portfolio_gallery;
        $newname1 = $gallery_path1.$portfolio_gallery;
        $tempName = $_FILES['portfolio_gallery']['tmp_name'][$i];
        
        move_uploaded_file($tempName, $newname); 

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
        
        $im->writeImage( $newname1);
        $im1->writeImage( $path1 . 'thumbnails\\'.$portfolio_gallery);

         
        $result8 = mysqli_query($servercnx, "INSERT INTO `portfolio_images`( `portfolio_id`, `image_file`, `gallery_path`) VALUES ('$pid','$portfolio_gallery','$gallery_path')");
    } 
}
