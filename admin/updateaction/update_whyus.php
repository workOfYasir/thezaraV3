<?php
include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if(isset($_POST['acticve_clients'])) {$acticve_clients=$_POST['acticve_clients'];  if($acticve_clients==''){unset($acticve_clients);}}
if(isset($_POST['id'])) {$id=$_POST['id'];  if($id==''){unset($id);}}
if(isset($_POST['active_projects'])) {$active_projects=$_POST['active_projects'];  if($active_projects==''){unset($active_projects);}}
if(isset($_POST['active_years'])) {$active_years=$_POST['active_years'];  if($active_years==''){unset($active_years);}}
if(isset($_POST['active_team'])) {$active_team=$_POST['active_team'];  if($active_team==''){unset($active_team);}}
if(isset($_POST['why_slogen_o'])) {$why_slogen_o=$_POST['why_slogen_o'];  if($why_slogen_o==''){unset($why_slogen_o);}}
if(isset($_POST['why_slogen_t'])) {$why_slogen_t=$_POST['why_slogen_t'];  if($why_slogen_t==''){unset($why_slogen_t);}}
if(isset($_POST['why_slogen_th'])) {$why_slogen_th=$_POST['why_slogen_th'];  if($why_slogen_th==''){unset($why_slogen_th);}}
if(isset($_POST['why_body'])) {$why_body=$_POST['why_body'];  if($why_body==''){unset($why_body);}}
if(isset($_POST['testi_heading'])) {$testi_heading=$_POST['testi_heading'];  if($testi_heading==''){unset($testi_heading);}}

$why_slogen_o = str_replace("'","&#39;",$why_slogen_o);
$why_slogen_t = str_replace("'","&#39;",$why_slogen_t);
$why_slogen_th = str_replace("'","&#39;",$why_slogen_th);
$testi_heading = str_replace("'","&#39;",$testi_heading);
$why_body = str_replace("'","&#39;",$why_body);


if(isset($id)
&& isset($acticve_clients)
&& isset($active_years)
&& isset($active_projects)
&& isset($testi_heading)
&& isset($active_team)
&& isset($why_slogen_o)
&& isset($why_slogen_t)
&& isset($why_slogen_th)
&& isset($why_body)
){
 $result = mysqli_query($servercnx,"UPDATE why_us SET
			acticve_clients = '$acticve_clients',
			active_years = '$active_years',
			testi_heading = '$testi_heading',
			active_projects = '$active_projects',
			active_team = '$active_team',
			why_slogen_o = '$why_slogen_o',
			why_slogen_t = '$why_slogen_t',
			why_slogen_th = '$why_slogen_th',
			why_body = '$why_body' WHERE id = '$id'");
if ($result == true){ $back = $_SERVER['HTTP_REFERER'];	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../View-why-us.php">';}
}else { echo "Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>"; }
?>