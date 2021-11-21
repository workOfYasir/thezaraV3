<?php 

$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');

include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if(isset($_POST['service_title'])) {$service_title=$_POST['service_title'];  if($service_title==''){unset($service_title);}}
if(isset($_POST['service_uniid'])) {$service_uniid=$_POST['service_uniid'];  if($service_uniid==''){unset($service_uniid);}}
if(isset($_POST['service_body'])) {$service_body=$_POST['service_body'];  if($service_body==''){unset($service_body);}}
if(isset($_POST['service_icon'])) {$service_icon=$_POST['service_icon'];  if($service_icon==''){unset($service_icon);}}
if(isset($_POST['service_status'])) {$service_status=$_POST['service_status'];  if($service_status==''){unset($service_status);}}
if(isset($_POST['seo_title'])) {$seo_title=$_POST['seo_title'];  if($seo_title==''){unset($seo_title);}}
if(isset($_POST['seo_keywords'])) {$seo_keywords=$_POST['seo_keywords'];  if($seo_keywords==''){unset($seo_keywords);}}
if(isset($_POST['seo_description'])) {$seo_description=$_POST['seo_description'];  if($seo_description==''){unset($seo_description);}}

if(isset($_POST['service_position'])) {$service_position=$_POST['service_position'];  if($service_position==''){unset($service_position);}}

if(isset($_POST['service_tagline'])) {$service_tagline=$_POST['service_tagline'];  if($service_tagline==''){unset($service_tagline);}}

if(isset($_POST['robots'])) {$robots=$_POST['robots'];  if($robots==''){unset($robots);}} 
// Page Cover
if(!empty($_FILES["service_cover"]["name"])) 
{
	
	$temp = basename($_FILES["service_cover"]["name"]);
$path = '../../images/Services/Covers/';
$path1 = $root.'\images\Services\Covers\\';
$service_cover ='Cover-' . time().'.jpg';
$newname = $path . $service_cover;
$newname1 = $path1 . $service_cover;
move_uploaded_file($_FILES['service_cover']['tmp_name'], $newname);

$max_width  = 1200;
$max_height = 800;
$max_width1  = 768;
$max_height1 = 1024;


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
$im1->writeImage($path1 . 'thumb\\'.$service_cover);


$image = new Imagick($newname1);
$d = $image->getImageGeometry();
$cover_width = $d['width'];
$cover_height = $d['height'];

$image1 = new Imagick($path1 . 'thumb\\'.$service_cover);
$d1 = $image1->getImageGeometry();
$thumb_width = $d1['width'];
$thumb_height = $d1['height'];


} 
else{ $service_cover='default.jpg'; }
$added_by = $session->username;
$service_title = str_replace("'","&#39;",$service_title);
$service_body = str_replace("'","&#39;",$service_body);
$service_icon = str_replace("'","&#39;",$service_icon);
$service_tagline = str_replace("'","&#39;",$service_tagline);

if(isset($service_title)
&& isset($service_uniid)
&& isset($service_body)
&& isset($service_status)
&& isset($service_icon)
&& isset($seo_title)
&& isset($seo_keywords)
&& isset($seo_description)
&& isset($service_position)
&& isset($service_tagline)
&& isset($robots)
&& isset($added_by)
&& isset($service_cover)){
 $result = mysqli_query($servercnx,"INSERT INTO services SET
 	        service_uniid = '$service_uniid',
			service_title = '$service_title',
			service_body = '$service_body',
			service_status = '$service_status',
			service_icon = '$service_icon',
			seo_title = '$seo_title',
			seo_keywords = '$seo_keywords',
			seo_description = '$seo_description',
			service_position = '$service_position',
			service_tagline = '$service_tagline',
			robots = '$robots',
			added_by = '$added_by',
			service_cover = '$service_cover'");
if ($result == true){ $back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Services.php">';}
}else { echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>"; }
?>