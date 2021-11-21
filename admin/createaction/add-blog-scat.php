<?php 

include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if(isset($_POST['scat_title'])) {$scat_title=$_POST['scat_title'];  if($scat_title==''){unset($scat_title);}}
if(isset($_POST['scat_uniid'])) {$scat_uniid=$_POST['scat_uniid'];  if($scat_uniid==''){unset($scat_uniid);}}
if(isset($_POST['scat_cates'])) {$scat_cates=$_POST['scat_cates'];  if($scat_cates==''){unset($scat_cates);}}
if(isset($_POST['scat_body'])) {$scat_body=$_POST['scat_body'];  if($scat_body==''){unset($scat_body);}}
if(isset($_POST['scat_url'])) {$scat_url=$_POST['scat_url'];  if($scat_url==''){unset($scat_url);}}
if(isset($_POST['scat_status'])) {$scat_status=$_POST['scat_status'];  if($scat_status==''){unset($scat_status);}}
if(isset($_POST['seo_title'])) {$seo_title=$_POST['seo_title'];  if($seo_title==''){unset($seo_title);}}
if(isset($_POST['seo_keywords'])) {$seo_keywords=$_POST['seo_keywords'];  if($seo_keywords==''){unset($seo_keywords);}}
if(isset($_POST['seo_description'])) {$seo_description=$_POST['seo_description'];  if($seo_description==''){unset($seo_description);}}
if(isset($_POST['robots'])) {$robots=$_POST['robots'];  if($robots==''){unset($robots);}} 

if(isset($_POST['scat_position'])) {$scat_position=$_POST['scat_position'];  if($scat_position==''){unset($scat_position);}} 

if(isset($_POST['scat_top'])) {$scat_top=$_POST['scat_top'];  if($scat_top==''){unset($scat_top);}}

if(isset($_POST['scat_mcate'])) {$scat_mcate=$_POST['scat_mcate'];  if($scat_mcate==''){unset($scat_mcate);}} 

// if (isset($_POST['scat_rcategory'])) { $scat_rcategory =  $_POST['scat_rcategory'];}

// Page Cover scat_cover
if(!empty($_FILES["scat_cover"]["name"])) 
{
	$temp = explode(".", $_FILES["scat_cover"]["name"]);
	$path= '../../images/Pages/Covers/';
	$newname=$path.'Cover-'.time().'.'.end($temp);
	move_uploaded_file($_FILES['scat_cover']['tmp_name'],$newname);
	$scat_cover='Cover-'.time().'.'.end($temp);
} 
else{ $scat_cover='default.jpg'; }

$added_by = $session->username;
$scat_title = str_replace("'","&#39;",$scat_title);
$scat_body = str_replace("'","&#39;",$scat_body);
$cover_path = 'images/Categories/Covers/'.$scat_cover;



if(isset($scat_title)
&& isset($scat_uniid)
&& isset($scat_cates)
&& isset($scat_body)
&& isset($scat_status)
&& isset($scat_url)
&& isset($seo_title)
&& isset($seo_keywords)
&& isset($seo_description)
&& isset($robots)
&& isset($added_by)
&& isset($scat_cover)
&& isset($cover_path)
&& isset($scat_position)
&& isset($scat_top)
&& isset($scat_mcate)){
 $result = mysqli_query($servercnx,"INSERT INTO blog_scat SET
 	        scat_uniid = '$scat_uniid',
			scat_title = '$scat_title',
			scat_cates = '$scat_cates',
			scat_mcate = '$scat_mcate',
			scat_body = '$scat_body',
			scat_status = '$scat_status',
			scat_url = '$scat_url',
			seo_title = '$seo_title',
			seo_keywords = '$seo_keywords',
			seo_description = '$seo_description',
			robots = '$robots',
			added_by = '$added_by',
			scat_cover = '$scat_cover',
			scat_position = '$scat_position'
			");
if ($result == true){ 
	 $back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Blog-Scats.php">';}
	else {echo "Error";}
	
}
 else { echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>"; }
?>