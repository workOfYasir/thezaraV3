<?php
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");

if (isset($_POST['blog_id'])) {
    $blog_id = $_POST['blog_id'];
    if ($blog_id == '') {
        unset($blog_id);
    }
}
if (isset($_POST['id_for'])) {
    $id_for = $_POST['id_for'];
    if ($id_for == '') {
        unset($id_for);
    }
}

if (isset($_POST['pdf_for'])) {
    $pdf_for = $_POST['pdf_for'];
    if ($pdf_for == '') {
        unset($pdf_for);
    }
}

if (isset($_POST['udi'])) {
    $udi = $_POST['udi'];
    if ($udi == '') {
        unset($udi);
    }
}

if (isset($blog_id) && isset($id_for) && isset($pdf_for) && isset($udi)) {
    $ImageData = mysqli_query($servercnx, "SELECT gallery_path FROM blog_post WHERE id = '$blog_id'");
    $Image = mysqli_fetch_array($ImageData);
   $targetDir = '../' . $Image['gallery_path'];
    $allowTypes = array('pdf');
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    if (!empty(array_filter($_FILES['gallery_images']['name']))) {
        foreach ($_FILES['gallery_images']['name'] as $key => $val) {
            // File upload path
            $temp = explode(".", $_FILES['gallery_images']['name'][$key]);
            $fileName = basename('PDF-' . $key . time() . '.' . end($temp));
            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES["gallery_images"]["tmp_name"][$key], $targetFilePath)) {
                    $insertValuesSQL .= "('" . $pdf_for . "','" . $id_for . "','" . $udi . "','" . $fileName . "'),";
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
            $insert = $db->query("INSERT INTO pdf_files (pdf_for,id_for,udi,file) VALUES $insertValuesSQL");
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
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=' . $back . '">';
    echo '<script> alert(' . $statusMsg . ')</script>';
}
