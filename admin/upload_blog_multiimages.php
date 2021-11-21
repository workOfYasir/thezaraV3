<?php
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");

if (isset($_POST['blog_id'])) {
    $blog_id = $_POST['blog_id'];
    if ($blog_id == '') {
        unset($blog_id);
    }
}
if (isset($_POST['cate_id'])) {
    $cate_id = $_POST['cate_id'];
    if ($cate_id == '') {
        unset($cate_id);
    }
}



if (isset($blog_id) && isset($cate_id)) {
    $ImageData = mysqli_query($servercnx, "SELECT gallery_path FROM blog_post WHERE id = '$blog_id'");
    $Image = mysqli_fetch_array($ImageData);
    $targetDir = '../' . $Image['gallery_path'];
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    if (!empty(array_filter($_FILES['gallery_images']['name']))) {
        foreach ($_FILES['gallery_images']['name'] as $key => $val) {
            // File upload path
            $temp = explode(".", $_FILES['gallery_images']['name'][$key]);
            $fileName = basename('Gallery-' . $key . time() . '.' . end($temp));
            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES["gallery_images"]["tmp_name"][$key], $targetFilePath)) {
                    $insertValuesSQL .= "('" . $blog_id . "','" . $cate_id . "','" . $fileName . "'),";
                } else {
                    $errorUpload .= $_FILES['gallery_images']['name'][$key] . ', ';
                }
            } else {
                $errorUploadType .= $_FILES['gallery_images']['name'][$key] . ', ';
            }
        }

        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');
            // Insert image file name into database
            $insert = $db->query("INSERT INTO blog_images (blog_id,cate_id,image_file) VALUES $insertValuesSQL");
            if ($insert) {
                $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . $errorUpload : '';
                $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . $errorUploadType : '';
                $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
                $statusMsg = "Files are uploaded successfully." . $errorMsg;
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $statusMsg = 'Please select minimum 1 file to upload.';
    }
    $back = $_SERVER['HTTP_REFERER'];
    // echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=' . $back . '">';
    // echo '<script> alert(' . $statusMsg . ')</script>';
}
