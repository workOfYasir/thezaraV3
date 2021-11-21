<?php include("../assets/includes/inc/config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($id)) {
    $path = '../../images/Teams/Profiles/';
    $path2 = '../../images/Teams/Covers/';
    $LogoData = mysqli_query($servercnx, "SELECT team_profile,team_cover,team_uniid FROM team WHERE id = '$id'");
    $LogoImage = mysqli_fetch_array($LogoData);
    $team_profile = $LogoImage['team_profile'];
    $team_cover = $LogoImage['team_cover'];
    if ($team_profile != 'default.jpg') {
        unlink($path . $team_profile);
    }
    if ($team_cover != 'default.jpg') {
        unlink($path2 . $team_cover);
    }
    $result = mysqli_query($servercnx, "DELETE FROM `team` WHERE id = '$id'");
    if ($result == true) {
        $back = $_SERVER['HTTP_REFERER'];
        echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=' . $back . '">';
    }
} else {
    echo "Error Deleting <br/><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";
}
