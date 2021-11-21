<?php
	include("assets/includes/controller.php");
    include("assets/includes/inc/config.php");
	// Include database connectivity
	
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
    
	
	// upload file using move_uploaded_file function in php
	if (isset($blog_id) && isset($cate_id)) {
        $ImageData = mysqli_query($servercnx, "SELECT gallery_path FROM blog_post WHERE id = '$blog_id'");
        $Image = mysqli_fetch_array($ImageData);
        $targetDir = '../' . $Image['gallery_path'];
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
	if (!empty($_FILES['image']['name'])) {

        $temp = explode(".", $_FILES['image']['name']);
        $fileName = basename('Gallery-' . time() . '.' . end($temp));
        $targetFilePath = $targetDir . $fileName;

        // Check whether file type is valid
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);



	    //$fileName = $_FILES['image']['name'];
		
	   // $fileExt = explode('.', $fileName);
	   // $fileActExt = strtolower(end($fileExt));
	   // $allowImg = array('png','jpeg','jpg');
	   // $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
	  //  $filePath = '../images/Blogs/'.$fileNew; 
        // $insertValuesSQL .= "('" . $blog_id . "','" . $cate_id . "','" . $fileName . "'),";
        
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                        $image_info = getimagesize($targetFilePath);
                        $image_width = $image_info[0];
                        $image_height = $image_info[1];
            $insertValuesSQL .= "('" . $blog_id . "','" . $cate_id . "','" . $fileName ."','" . $image_width ."','" . $image_height . "'),";
    		    echo '<img src="'.$targetFilePath.'" style="width:220px; "/>';
	        }else{
		    return false;
	        }	
	      
        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');
            // Insert image file name into database
            $insert = $db->query("INSERT INTO blog_images (blog_id,cate_id,image_file,gallery_width,gallery_height) VALUES $insertValuesSQL");
            if ($insert) {
                $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . $errorUpload : '';
                $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . $errorUploadType : '';
                $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
                $statusMsg = "Files are uploaded successfully." . $errorMsg;
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
	}else{	
    	    return false;
	}
    }
    
?>