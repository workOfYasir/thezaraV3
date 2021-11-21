<?php 
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if(isset($_POST['project_name'])) {$project_name=$_POST['project_name'];  if($project_name==''){unset($project_name);}}
if(isset($_POST['id'])) {$id=$_POST['id'];  if($id==''){unset($id);}}
if(isset($_POST['project_body'])) {$project_body=$_POST['project_body'];  if($project_body==''){unset($project_body);}}
if(isset($_POST['project_starting'])) {$project_starting=$_POST['project_starting'];  if($project_starting==''){unset($project_starting);}}
if(isset($_POST['project_end'])) {$project_end=$_POST['project_end'];  if($project_end==''){$project_end = 'Present';}}
if(isset($_POST['project_url'])) {$project_url=$_POST['project_url'];  if($project_url==''){unset($project_url);}}
if(isset($_POST['project_category'])) {$project_category=$_POST['project_category'];  if($project_category==''){unset($project_category);}}
if(isset($_POST['project_status'])) {$project_status=$_POST['project_status'];  if($project_status==''){unset($project_status);}}
if(isset($_POST['seo_title'])) {$seo_title=$_POST['seo_title'];  if($seo_title==''){unset($seo_title);}}
if(isset($_POST['seo_keywords'])) {$seo_keywords=$_POST['seo_keywords'];  if($seo_keywords==''){unset($seo_keywords);}}
if(isset($_POST['seo_description'])) {$seo_description=$_POST['seo_description'];  if($seo_description==''){unset($seo_description);}}
if(isset($_POST['robots'])) {$robots=$_POST['robots'];  if($robots==''){unset($robots);}} 
// Page Cover  project_cover  SELECT project_cover FROM projects WHERE id = '$id'");
if(!empty($_FILES["project_cover"]["name"])) 
	{
		$temp = explode(".", $_FILES["project_cover"]["name"]);
		$path= '../../images/Blogs/Covers/';
		$LogoData = mysqli_query($servercnx,"SELECT project_cover FROM projects WHERE id = '$id'");
		 $LogoImage = mysqli_fetch_array($LogoData);
		 $project_cover = $LogoImage['project_cover'];
		 if ($project_cover != 'default.jpg') { unlink($path.$project_cover); }
		$newname=$path.'Cover-'.$blog_date.'-'.time().'.'.end($temp);
		move_uploaded_file($_FILES['project_cover']['tmp_name'],$newname);
		$project_cover='Cover-'.$blog_date.'-'.time().'.'.end($temp);
	} 
	else{ $LogoData = mysqli_query($servercnx,"SELECT project_cover FROM projects WHERE id = '$id'"); $LogoImage = mysqli_fetch_array($LogoData); $project_cover = $LogoImage['project_cover']; }

// Project Logo
if(!empty($_FILES["project_logo"]["name"])) 
	{
		$temp = explode(".", $_FILES["project_logo"]["name"]);
		$path= '../../images/Blogs/Logos/';
		$LogoData = mysqli_query($servercnx,"SELECT project_logo FROM projects WHERE id = '$id'");
		 $LogoImage = mysqli_fetch_array($LogoData);
		 $project_logo = $LogoImage['project_logo'];
		 if ($project_logo != 'default.jpg') { unlink($path.$project_logo); }
		$newname=$path.'logo-'.$blog_date.'-'.time().'.'.end($temp);
		move_uploaded_file($_FILES['project_logo']['tmp_name'],$newname);
		$project_logo='logo-'.$blog_date.'-'.time().'.'.end($temp);
	} 
	else{ $LogoData = mysqli_query($servercnx,"SELECT project_logo FROM projects WHERE id = '$id'"); $LogoImage = mysqli_fetch_array($LogoData); $project_logo = $LogoImage['project_logo']; }
$updated_by = $session->username;
$project_name = str_replace("'","&#39;",$project_name);
$project_body = str_replace("'","&#39;",$project_body);
$project_url = str_replace("'","&#39;",$project_url);

if(isset($project_name)
&& isset($id)
&& isset($project_body)
&& isset($project_status)
&& isset($project_starting)
&& isset($project_end)
&& isset($project_category)
&& isset($project_url)
&& isset($seo_title)
&& isset($seo_keywords)
&& isset($seo_description)
&& isset($robots)
&& isset($updated_by)
&& isset($project_cover)
&& isset($project_logo)){
 $result = mysqli_query($servercnx,"UPDATE projects SET
			project_name = '$project_name',
			project_body = '$project_body',
			project_status = '$project_status',
			project_starting = '$project_starting',
			project_end = '$project_end',
			project_category = '$project_category',
			project_url = '$project_url',
			seo_title = '$seo_title',
			seo_keywords = '$seo_keywords',
			seo_description = '$seo_description',
			robots = '$robots',
			updated_by = '$updated_by',
			project_cover = '$project_cover',
			project_logo = '$project_logo' WHERE id = '$id'");
if ($result == true){ $back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-Projects.php">';}
}else { echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>"; }
?>