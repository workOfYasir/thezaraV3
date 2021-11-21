<?php 
$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if(isset($_POST['scat_title'])) {$scat_title=$_POST['scat_title'];  if($scat_title==''){unset($scat_title);}}
if(isset($_POST['id'])) {$id=$_POST['id'];  if($id==''){unset($id);}}
if(isset($_POST['scat_cates'])) {$scat_cates=$_POST['scat_cates'];  if($scat_cates==''){unset($scat_cates);}}
if(isset($_POST['scat_body'])) {$scat_body=$_POST['scat_body'];  if($scat_body==''){unset($scat_body);}}
if(isset($_POST['scat_url'])) {$scat_url=$_POST['scat_url'];  if($scat_url==''){unset($scat_url);}}
if(isset($_POST['scat_status'])) {$scat_status=$_POST['scat_status'];  if($scat_status==''){unset($scat_status);}}
if(isset($_POST['seo_title'])) {$seo_title=$_POST['seo_title'];  if($seo_title==''){unset($seo_title);}}
if(isset($_POST['seo_keywords'])) {$seo_keywords=$_POST['seo_keywords'];  if($seo_keywords==''){unset($seo_keywords);}}
if(isset($_POST['seo_description'])) {$seo_description=$_POST['seo_description'];  if($seo_description==''){unset($seo_description);}}
if(isset($_POST['robots'])) {$robots=$_POST['robots'];  if($robots==''){unset($robots);}}

if(isset($_POST['scat_position'])) {$scat_position=$_POST['scat_position'];  if($scat_position==''){unset($scat_position);}} 

if(isset($_POST['head_script'])) {$head_script=$_POST['head_script'];  if($head_script==''){unset($head_script);}}
if(isset($_POST['after_head'])) {$after_head=$_POST['after_head']; 
	// if($after_head==''){unset($after_head);}
}
if(isset($_POST['footer_script'])) {$footer_script=$_POST['footer_script']; 
	// if($footer_script==''){unset($footer_script);}
}

if(isset($_POST['scat_mcate'])) {$scat_mcate=$_POST['scat_mcate']; 
	// if($scat_mcate==''){unset($scat_mcate);}
}

if(isset($_POST['scat_uniid'])) {$scat_uniid=$_POST['scat_uniid'];  if($scat_uniid==''){unset($scat_uniid);}}


if(isset($_POST['scat_top'])) {$scat_top=$_POST['scat_top'];  if($scat_top==''){unset($scat_top);}}

// Page Cover
if(!empty($_FILES["scat_cover"]["name"])) 
	{
		$temp = explode(".", $_FILES["scat_cover"]["name"]);
		$path= '../../images/Blogs/Covers/';
		$LogoData = mysqli_query($servercnx,"SELECT scat_cover FROM blog_scat WHERE id = '$id'");
		 $LogoImage = mysqli_fetch_array($LogoData);
		 $scat_cover = $LogoImage['scat_cover'];
		 if ($scat_cover != 'default.jpg') { unlink($path.$scat_cover); }
		$newname=$path.'Cover-'.$blog_date.'-'.time().'.'.end($temp);
		move_uploaded_file($_FILES['scat_cover']['tmp_name'],$newname);
		$scat_cover='Cover-'.$blog_date.'-'.time().'.'.end($temp);
	} 
	else{ $LogoData = mysqli_query($servercnx,"SELECT scat_cover FROM blog_scat WHERE id = '$id'"); $LogoImage = mysqli_fetch_array($LogoData); $scat_cover = $LogoImage['scat_cover']; }



$updated_by = $session->username;
$scat_title = str_replace("'","&#39;",$scat_title);
$scat_body = str_replace("'","&#39;",$scat_body);
$cover_path = 'images/Category/Covers/'.$scat_cover;



if(isset($scat_title)
&& isset($id)
&& isset($scat_cates)
&& isset($scat_body)
&& isset($scat_status)
&& isset($scat_url)
&& isset($seo_title)
&& isset($seo_keywords)
&& isset($seo_description)
&& isset($robots)
&& isset($updated_by)
&& isset($scat_cover)
&& isset($cover_path)
&& isset($scat_position)
&& isset($scat_top)
&& isset($scat_mcate)
&& isset($scat_uniid)

){

 	
 $result = mysqli_query($servercnx,"UPDATE blog_scat SET
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
			updated_by = '$updated_by',
			scat_cover = '$scat_cover',
			scat_position = '$scat_position',
			scat_top = '$scat_top',
			head_script = '$head_script',
			after_head = '$after_head',
			footer_script = '$footer_script',
			cover_path = '$cover_path' WHERE id = '$id'");

if ($result == true){ 
 $back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Blog-Scats.php">';}
	else {echo "Error";}
}else { echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>"; }
