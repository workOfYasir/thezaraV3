<?php 

$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');

include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if(isset($_POST['scat_title'])) {$scat_title=$_POST['scat_title'];  if($scat_title==''){unset($scat_title);}}
if(isset($_POST['scat_uniid'])) {$scat_uniid=$_POST['scat_uniid'];  if($scat_uniid==''){unset($scat_uniid);}}

if(isset($_POST['scat_position'])) {$scat_position=$_POST['scat_position'];  if($scat_position==''){unset($scat_position);}} 

if(isset($_POST['scat_top'])) {$scat_top=$_POST['scat_top'];  if($scat_top==''){unset($scat_top);}}

if(isset($_POST['scat_mcate'])) {$scat_mcate=$_POST['scat_mcate'];  if($scat_mcate==''){unset($scat_mcate);}} 


$added_by = $session->username;
$scat_title = str_replace("'","&#39;",$scat_title);


if(isset($scat_title)
&& isset($scat_uniid)
&& isset($added_by)
&& isset($scat_position)
&& isset($scat_top)
&& isset($scat_mcate)
){
	
 $result = mysqli_query($servercnx,"INSERT INTO scat SET
 scat_uniid = '$scat_uniid',
scat_title = '$scat_title',
scat_mcate = '$scat_mcate',

added_by = '$added_by',
scat_position = '$scat_position',
scat_top = '$scat_top'
");
if ($result == true){ 

		$back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Scats.php">';}
	else {echo "Error";}
//	}
}else { echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>"; }
