<?php

// Include the database configuration file 
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");

if (isset($_POST['portfolio_id'])) {
    $portfolio_id = $_POST['portfolio_id'];
    if ($portfolio_id == '') {
        unset($portfolio_id);
    }
}



//File upload configuration 
$added_by = $session->username;


if (!empty(array_filter($_FILES['portfolio_gallery']['name']))) {


    $fileCount = count($_FILES["portfolio_gallery"]['name']);
    for ($i = 0; $i < $fileCount; $i++) {
        $temp = basename($_FILES["mcat_cover"]["name"]);
        $portfolio_gallery = 'Gallery-' . $i . time() . '.jpg';

        $tempName = $_FILES['portfolio_gallery']['tmp_name'][$i];

        move_uploaded_file($tempName, '../../images/Portfolios/Gallery/' . $portfolio_gallery);


        // Insert image file name into database
        $gallery_path = 'images/Portfolios/Gallery/' . $portfolio_gallery;

        $gallery_path1 = $root . '\images\Portfolios\Gallery\\';

        $newname1 = $gallery_path1 . $portfolio_gallery;

        $newname = $gallery_path . $portfolio_gallery;
        move_uploaded_file($_FILES['portfolio_gallery']['tmp_name'], $newname);

        $max_width  = 1920;
        $max_height = 1024;
        $max_width1  = 500;
        $max_height1 = 700;


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
        $im1->writeImage($gallery_path1 . 'thumb\\' . $portfolio_gallery);


        $image = new Imagick($newname1);
        $d = $image->getImageGeometry();
        $cover_width = $d['width'];
        $cover_height = $d['height'];

        $image1 = new Imagick($path1 . 'thumb\\' . $portfolio_gallery);
        $d1 = $image1->getImageGeometry();
        $thumb_width = $d1['width'];
        $thumb_height = $d1['height'];


        $result1 = mysqli_query($servercnx, "INSERT INTO `portfolio_images`( `portfolio_id`, `image_file`, `gallery_path`) VALUES ('$portfolio_id','$portfolio_gallery','$gallery_path')");
        if ($result) {
            //header('location: ../Edit-Portfolio.php?Success');
        } else {
            //header('location: ../Add-Portfolio.php?Error');
        }
    }

    echo "Image Uploaded Successfully";
}
