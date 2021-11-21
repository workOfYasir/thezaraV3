<?php 

include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if(isset($_POST['scat_title'])) {$scat_title=$_POST['scat_title'];  if($scat_title==''){unset($scat_title);}}
if(isset($_POST['id'])) {$id=$_POST['id'];  if($id==''){unset($id);}}


if(isset($_POST['scat_position'])) {$scat_position=$_POST['scat_position'];  if($scat_position==''){unset($scat_position);}} 


if(isset($_POST['scat_mcate'])) {$scat_mcate=$_POST['scat_mcate'];  if($scat_mcate==''){unset($scat_mcate);}}

if(isset($_POST['scat_uniid'])) {$scat_uniid=$_POST['scat_uniid'];  if($scat_uniid==''){unset($scat_uniid);}}


if(isset($_POST['scat_top'])) {$scat_top=$_POST['scat_top'];  if($scat_top==''){unset($scat_top);}}


$updated_by = $session->username;
$scat_title = str_replace("'","&#39;",$scat_title);

if(isset($scat_title)
&& isset($id)
&& isset($updated_by)
&& isset($scat_position)
&& isset($scat_top)
&& isset($scat_mcate)
&& isset($scat_uniid)
){

 	
 $result = mysqli_query($servercnx,"UPDATE scat SET
			scat_title = '$scat_title',
			
			scat_mcate = '$scat_mcate',

			
			updated_by = '$updated_by',

			scat_position = '$scat_position',

			scat_top = '$scat_top'
			WHERE id = '$id'");

if ($result == true){ 
		
		$back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Scats.php">';
	}
	else {echo "Error";}

}else { echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>"; }
