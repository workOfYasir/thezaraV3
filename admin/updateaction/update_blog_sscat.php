<?php 
$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if(isset($_POST['sscat_title'])) {$sscat_title=$_POST['sscat_title'];  if($sscat_title==''){unset($sscat_title);}}
if(isset($_POST['id'])) {$id=$_POST['id'];  if($id==''){unset($id);}}
if(isset($_POST['sscat_body'])) {$sscat_body=$_POST['sscat_body'];  if($sscat_body==''){unset($sscat_body);}}
if(isset($_POST['sscat_url'])) {$sscat_url=$_POST['sscat_url'];  if($sscat_url==''){unset($sscat_url);}}
if(isset($_POST['sscat_status'])) {$sscat_status=$_POST['sscat_status'];  if($sscat_status==''){unset($sscat_status);}}
if(isset($_POST['seo_title'])) {$seo_title=$_POST['seo_title'];  if($seo_title==''){unset($seo_title);}}
if(isset($_POST['seo_keywords'])) {$seo_keywords=$_POST['seo_keywords'];  if($seo_keywords==''){unset($seo_keywords);}}
if(isset($_POST['seo_description'])) {$seo_description=$_POST['seo_description'];  if($seo_description==''){unset($seo_description);}}
if(isset($_POST['robots'])) {$robots=$_POST['robots'];  if($robots==''){unset($robots);}}

if(isset($_POST['sscat_position'])) {$sscat_position=$_POST['sscat_position'];  if($sscat_position==''){unset($sscat_position);}} 

if(isset($_POST['head_script'])) {$head_script=$_POST['head_script']; // if($head_script==''){unset($head_script);}
}
if(isset($_POST['after_head'])) {$after_head=$_POST['after_head']; // if($after_head==''){unset($after_head);}
}
if(isset($_POST['footer_script'])) {$footer_script=$_POST['footer_script']; // if($footer_script==''){unset($footer_script);}
}

if(isset($_POST['sscat_scate'])) {$sscat_scate=$_POST['sscat_scate'];  if($sscat_scate==''){unset($sscat_scate);}}

if(isset($_POST['sscat_top'])) {$sscat_top=$_POST['sscat_top'];  if($sscat_top==''){unset($sscat_top);}}

if(isset($_POST['sscat_uniid'])) {$sscat_uniid=$_POST['sscat_uniid'];  if($sscat_uniid==''){unset($sscat_uniid);}}

// Page Cover
if(!empty($_FILES["sscat_cover"]["name"])) 
	{
		$temp = explode(".", $_FILES["sscat_cover"]["name"]);
		$path= '../../images/Blogs/Covers/';
		$LogoData = mysqli_query($servercnx,"SELECT sscat_cover FROM blog_sscat WHERE id = '$id'");
		 $LogoImage = mysqli_fetch_array($LogoData);
		 $sscat_cover = $LogoImage['sscat_cover'];
		 if ($sscat_cover != 'default.jpg') { unlink($path.$sscat_cover); }
		$newname=$path.'Cover-'.$blog_date.'-'.time().'.'.end($temp);
		move_uploaded_file($_FILES['sscat_cover']['tmp_name'],$newname);
		$sscat_cover='Cover-'.$blog_date.'-'.time().'.'.end($temp);
	} 
	else{ $LogoData = mysqli_query($servercnx,"SELECT scat_cover FROM blog_scat WHERE id = '$id'"); $LogoImage = mysqli_fetch_array($LogoData); $scat_cover = $LogoImage['scat_cover']; }
$updated_by = $session->username;
$sscat_title = str_replace("'","&#39;",$sscat_title);
$sscat_body = str_replace("'","&#39;",$sscat_body);
$thumb_path = 'images/Category/Covers/thumb/'.$sscat_cover;
$cover_path = 'images/Category/Covers/'.$sscat_cover;

$CateData = mysqli_query($servercnx,"SELECT scat_mcate FROM blog_scat WHERE scat_uniid = '$sscat_scate'");
$CateScate = mysqli_fetch_array($CateData);
$sscat_mcate = $CateScate['scat_mcate'];



if(isset($sscat_title)
&& isset($id)
&& isset($sscat_body)
&& isset($sscat_status)
&& isset($sscat_url)
&& isset($seo_title)
&& isset($seo_keywords)
&& isset($seo_description)
&& isset($robots)
&& isset($updated_by)
&& isset($sscat_cover)
&& isset($cover_path)
&& isset($sscat_mcate)
&& isset($sscat_position)
&& isset($sscat_top)
&& isset($sscat_scate)
&& isset($sscat_uniid)
){
 $result = mysqli_query($servercnx,"UPDATE blog_sscat SET
			sscat_title = '$sscat_title',
			sscat_scate = '$sscat_scate',
			sscat_mcate = '$sscat_mcate',
			sscat_body = '$sscat_body',
			sscat_status = '$sscat_status',
			sscat_url = '$sscat_url',
			seo_title = '$seo_title',
			seo_keywords = '$seo_keywords',
			seo_description = '$seo_description',
			robots = '$robots',
			updated_by = '$updated_by',
			sscat_cover = '$sscat_cover',
			cover_width = '$cover_width',
			cover_height = '$cover_height',
			thumb_width = '$thumb_width',
			thumb_height = '$thumb_height',
			sscat_position = '$sscat_position',
			sscat_top = '$sscat_top',
			head_script = '$head_script',
			after_head = '$after_head',
			footer_script = '$footer_script',
			cover_path = '$cover_path',
			thumb_path = '$thumb_path' WHERE id = '$id'");

if ($result == true){ 
 $back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Blog-Sscats.php">';}
	else {echo "Error";}
    
}else { echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>"; }
