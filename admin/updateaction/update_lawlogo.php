<?php 

$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');

include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if(isset($_POST['id'])) {$id=$_POST['id'];  if($id==''){unset($id);}}
if(isset($_POST['law_link'])) {$law_link=$_POST['law_link'];  if($law_link==''){unset($law_link);}}
if(isset($_POST['law_alt_text'])) {$law_alt_text=$_POST['law_alt_text'];  if($law_alt_text==''){unset($law_alt_text);}}


// Page Cover law_logo mysqli_query($servercnx,"SELECT law_logo FROM law_logos WHERE id = '$id'");
if(!empty($_FILES["law_logo"]["name"])) 
	{
		$temp = explode(".", $_FILES["law_logo"]["name"]);
		$path= '../../images/Blogs/Covers/';
		$LogoData = mysqli_query($servercnx,"SELECT law_logo FROM law_logos WHERE id = '$id'");
		 $LogoImage = mysqli_fetch_array($LogoData);
		 $law_logo = $LogoImage['law_logo'];
		 if ($law_logo != 'default.jpg') { unlink($path.$law_logo); }
		$newname=$path.'Cover-'.$blog_date.'-'.time().'.'.end($temp);
		move_uploaded_file($_FILES['law_logo']['tmp_name'],$newname);
		$law_logo='Cover-'.$blog_date.'-'.time().'.'.end($temp);
	} 
	else{ $LogoData = mysqli_query($servercnx,"SELECT law_logo FROM law_logos WHERE id = '$id'"); $LogoImage = mysqli_fetch_array($LogoData); $law_logo = $LogoImage['law_logo']; }
$law_link = str_replace("'","&#39;",$law_link);
$law_alt_text = str_replace("'","&#39;",$law_alt_text);

if(isset($id)
&& isset($law_link)
&& isset($law_alt_text)){
 $result = mysqli_query($servercnx,"UPDATE law_logos SET 
			law_link = '$law_link', 
			law_logo = '$law_logo',
			law_alt_text = '$law_alt_text' WHERE id = '$id'");
if ($result == true){ $back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Lawlogos.php">';}
}else { echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>"; }
?>