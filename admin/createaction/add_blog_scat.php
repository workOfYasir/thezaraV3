<?php 


include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if(isset($_POST['scat_title'])) {$scat_title=$_POST['scat_title'];  if($scat_title==''){unset($scat_title);}}
if(isset($_POST['scat_uniid'])) {$scat_uniid=$_POST['scat_uniid'];  if($scat_uniid==''){unset($scat_uniid);}}
if(isset($_POST['scat_mcate'])) {$scat_cates=$_POST['scat_mcate'];  if($scat_cates==''){unset($scat_cates);}
}
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

// Page Cover
if(!empty($_FILES["scat_cover"]["name"])) 
{
	// $temp = explode(".", $_FILES["scat_cover"]["name"]);
	// $path= '../../images/Categories/Covers/';
	// $newname=$path.'Cover-ii'.$scat_position.'-'.time().'.'.end($temp);
	// move_uploaded_file($_FILES['scat_cover']['tmp_name'],$newname);
	// $scat_cover='Cover-ii'.$scat_position.'-'.time().'.'.end($temp);
	
	$temp = basename($_FILES["scat_cover"]["name"]);
	$path = '../../images/Category/Covers/';
	$path1 = $root.'\images\Category\Covers\\';
	$scat_cover ='Cover-ii' . time().'.jpg';	
	$newname = $path . $scat_cover;
	$newname1 = $path1 . $scat_cover;
	move_uploaded_file($_FILES['scat_cover']['tmp_name'], $newname);
	
	$max_width  = 1920;
	$max_height = 1024;
	$max_width1  = 500;
	$max_height1 = 700;

	$im = new Imagick($newname1);
	
	$im->resizeImage(
		min($im->getImageWidth(),  $max_width),
		min($im->getImageHeight(), $max_height),
		imagick::FILTER_CATROM,
		1,
		true
	);
	$im1 = new Imagick($newname1);
	
	$im1->resizeImage(
		min($im->getImageWidth(),  $max_width1),
		min($im->getImageHeight(), $max_height1),
		imagick::FILTER_CATROM,
		1,
		true
	);
	
	$im->writeImage($newname1);
	$im1->writeImage($path1 . 'thumb\\'.$scat_cover);
	
	$image = new Imagick($newname1);
	$d = $image->getImageGeometry();
	$cover_width = $d['width'];
	$cover_height = $d['height'];

	$image1 = new Imagick($path1 . 'thumb\\'.$scat_cover);
	$d1 = $image1->getImageGeometry();
	$thumb_width = $d1['width'];
	$thumb_height = $d1['height'];

} 
else{ $scat_cover='default.jpg'; }
$added_by = $session->username;
$scat_title = str_replace("'","&#39;",$scat_title);
$scat_body = str_replace("'","&#39;",$scat_body);
$thumb_path = 'images/Category/Covers/thumb/' . $scat_cover;
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
&& isset($scat_mcate)
){


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
			cover_width = '$cover_width',
			cover_height = '$cover_height',
			thumb_width = '$thumb_width',
			thumb_height = '$thumb_height',
			scat_position = '$scat_position',
			scat_top = '$scat_top',
			cover_path = '$cover_path',
			thumb_path = '$thumb_path'
			");
if ($result == true){ 
	 $back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Blog-Scats.php">';}
	else {echo "Error";}
	
}
 else { echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>"; }
?>