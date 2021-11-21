<?php
 include("../assets/includes/inc/config.php");

 if($_GET['id']){
    echo $id=$_GET['id'];
    $id = $servercnx-> real_escape_string($id);
}
if(isset($id)){
    $sql = "DELETE FROM `service_line` WHERE id=$id";
    if (mysqli_query($servercnx, $sql)) {
        $back = $_SERVER['HTTP_REFERER']; echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$back.'">';}
	else {
        echo "Error Deleting <br/><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>";}
	
}

?>