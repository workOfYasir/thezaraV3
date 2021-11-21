<?php 
$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');echo '<br>';
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if(isset($_POST['law_link'])) {$law_link=$_POST['law_link'];  if($law_link==''){unset($law_link);}} 
if(isset($_POST['law_alt_text'])) {$law_alt_text=$_POST['law_alt_text'];  if($law_alt_text==''){unset($law_alt_text);}} 

// Page Cover
if(!empty($_FILES["law_logo"]["name"])) 
{
	//$temp = explode(".", $_FILES["law_logo"]["name"]);
	$path= '../../images/Lawlogos/';
	$path1 = $root.'\images\Lawlogos\\';
	$law_logo='Cover-law-'.time().'.jpg';
	$newname=$path.$law_logo;
	$newname1 = $path1 . $law_logo;
	move_uploaded_file($_FILES['law_logo']['tmp_name'],$newname);
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
	$im1->writeImage($path1 . 'thumb\\'.$law_logo);
} 
else{ $law_logo='default.jpg'; }
$law_link = str_replace("'","&#39;",$law_link);
$law_alt_text = str_replace("'","&#39;",$law_alt_text);

if(isset($law_link)
&& isset($law_logo) 
&& isset($law_alt_text)){
 $result = mysqli_query($servercnx,"INSERT INTO law_logos SET 
			law_link = '$law_link', 
			law_logo = '$law_logo',
			law_alt_text = '$law_alt_text'");
if ($result == true){ $back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Lawlogos.php">';}
}else { echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>"; }
