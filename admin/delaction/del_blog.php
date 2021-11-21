<?php include("../assets/includes/inc/config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($id)) {
    $path = '../../images/Blogs/Covers/';
    $LogoData = mysqli_query($servercnx, "SELECT blog_cover,blog_uniid FROM blog_post WHERE id = '$id'");
    $LogoImage = mysqli_fetch_array($LogoData);
    $blog_cover = $LogoImage['blog_cover'];
    if ($blog_cover != 'default.jpg') {
        unlink($path . $blog_cover);
    }
    $result = mysqli_query($servercnx, "DELETE FROM `blog_post` WHERE id = '$id'");
    $result3 = mysqli_query($servercnx,"DELETE FROM `blogs_categories` WHERE blog_uniid = '$blog_uniid'");	
    if ($result == true) {
        header("location:../View-Blogs.php?deleted");
        // $back = $_SERVER['HTTP_REFERER'];
        // echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=' . $back . '">';
    }
} else {

    header("location:../View-Blogs.php?deletederror");
    // echo "Error Deleting <br/><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";
}
