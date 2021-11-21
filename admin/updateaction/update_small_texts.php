<?php
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");

if(isset($_POST['home_v_title'])) {$home_v_title=$_POST['home_v_title'];  if($home_v_title==''){unset($home_v_title);}}
if(isset($_POST['home_v_link'])) {$home_v_link=$_POST['home_v_link'];  if($home_v_link==''){unset($home_v_link);}}
if(isset($_POST['home_v_title2'])) {$home_v_title2=$_POST['home_v_title2'];  if($home_v_title2==''){unset($home_v_title2);}}
if(isset($_POST['home_v_link2'])) {$home_v_link2=$_POST['home_v_link2'];  if($home_v_link2==''){unset($home_v_link2);}}
if(isset($_POST['title1'])) {$title1=$_POST['title1'];  if($title1==''){unset($title1);}}
if(isset($_POST['title2'])) {$title2=$_POST['title2'];  if($title2==''){unset($title2);}}
if(isset($_POST['title3'])) {$title3=$_POST['title3'];  if($title3==''){unset($title3);}}
if(isset($_POST['title4'])) {$title4=$_POST['title4'];  if($title4==''){unset($title4);}}
if(isset($_POST['title5'])) {$title5=$_POST['title5'];  if($title5==''){unset($title5);}}
if(isset($_POST['title6'])) {$title6=$_POST['title6'];  if($title6==''){unset($title6);}}
if(isset($_POST['title7'])) {$title7=$_POST['title7'];  if($title7==''){unset($title7);}}
if(isset($_POST['title8'])) {$title8=$_POST['title8'];  if($title8==''){unset($title8);}}
if(isset($_POST['title9'])) {$title9=$_POST['title9'];  if($title9==''){unset($title9);}}
if(isset($_POST['title10'])) {$title10=$_POST['title10'];  if($title10==''){unset($title10);}}
if(isset($_POST['title11'])) {$title11=$_POST['title11'];  if($title11==''){unset($title11);}}
if(isset($_POST['title12'])) {$title12=$_POST['title12'];  if($title12==''){unset($title12);}}
if(isset($_POST['popup_status'])) {$popup_status=$_POST['popup_status'];  if($popup_status==''){unset($popup_status);}}
if(isset($_POST['popup_text'])) {$popup_text=$_POST['popup_text'];  if($popup_text==''){unset($popup_text);}}
if(isset($_POST['popup_title'])) {$popup_title=$_POST['popup_title'];  if($popup_title==''){unset($popup_title);}}


$home_v_title = str_replace("'","&#39;",$home_v_title);
$home_v_link = str_replace("'","&#39;",$home_v_link);
$home_v_title2 = str_replace("'","&#39;",$home_v_title2);
$home_v_link2 = str_replace("'","&#39;",$home_v_link2);
$title1 = str_replace("'","&#39;",$title1);
$title2 = str_replace("'","&#39;",$title2);
$title3 = str_replace("'","&#39;",$title3);
$title4 = str_replace("'","&#39;",$title4);
$title5 = str_replace("'","&#39;",$title5);
$title6 = str_replace("'","&#39;",$title6);
$title7 = str_replace("'","&#39;",$title7);
$title8 = str_replace("'","&#39;",$title8);
$title9 = str_replace("'","&#39;",$title9);
$title10 = str_replace("'","&#39;",$title10);
$title12 = str_replace("'","&#39;",$title12);
$title11 = str_replace("'","&#39;",$title11);
$popup_text = str_replace("'","&#39;",$popup_text);
$popup_title = str_replace("'","&#39;",$popup_title);


if(isset($home_v_title)
&& isset($home_v_link)
&& isset($home_v_title2)
&& isset($home_v_link2)
&& isset($title1)
&& isset($title2)
&& isset($title3)
&& isset($title4)
&& isset($title5)
&& isset($title6)
&& isset($title7)
&& isset($title8)
&& isset($title9)
&& isset($title10)
&& isset($title12)
&& isset($title11)
&& isset($popup_status)
&& isset($popup_text)
&& isset($popup_title )
){
 $result = mysqli_query($servercnx,"UPDATE small_texts SET
			home_v_title = '$home_v_title',
			home_v_link = '$home_v_link',
			home_v_title2 = '$home_v_title2',
			home_v_link2 = '$home_v_link2',
			title1 = '$title1',
			title2 = '$title2',
			title3 = '$title3',
			title4 = '$title4',
			title5 = '$title5',
			title6 = '$title6',
			title7 = '$title7',
			title8 = '$title8',
			title9 = '$title9',
			title10 = '$title10',
			title12 = '$title12',
			title11 = '$title11',
			popup_status = '$popup_status',
			popup_title = '$popup_title',
			popup_text = '$popup_text'
			");
if ($result == true){ $back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Small-Texts.php">';}
}else { echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>"; }
?>