<?php 
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");
$pagename = 'Edit-Prayer';
$container = 'Edit-Item'; 
include("assets/includes/inc/Main-Header.php");

include("assets/includes/inc/editor.php");
$pd_id=$_GET['pd_id'];
$pt_id=$_GET['pt_id'];

$result22 = mysqli_query($servercnx,"SELECT * FROM date_prayer WHERE pd_id = '$pd_id'");
$row22 = mysqli_fetch_array($result22);

$prayer_date_id = $row22['pd_id'];
$date = $row22['prayer_date'];
$prayer_date = date("jS-F-Y", strtotime($date));
$result23 = mysqli_query($servercnx,"SELECT * FROM prayer_time WHERE pt_id = '$pt_id'");
$row23 = mysqli_fetch_array($result23);

$prayer_time_id = $row23['pt_id'];
$fajar_time = $row23['fajar'];
$zohar_time = $row23['zohar'];
$asr_time = $row23['asr'];
$magrib_time = $row23['magrib'];
$isha_time = $row23['isha'];

// $result24 = mysqli_query($servercnx,"SELECT *
// FROM prayer_time as pt
// LEFT JOIN date_prayer as pd
// ON pt.prayer_date_id = pd.pd_id");
// $row24 = mysqli_fetch_array($result24);


?> 

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Page Content -->
<div id="page-content" class="gray-bg">

<!-- Title Header -->
<div class="title-header white-bg">
	<i class="fa fa-align-justify"></i>
	<h2>Edit Prayers</h2>
	<ol class="breadcrumb">
		<li>
		<a href="index.php">Home</a>
		</li>
		<li class="active">
		Edit Prayers
		</li>
	</ol>
</div>
<!-- END Title Header -->

<div class="row">                                     
<div class="col-sm-12 col-md-12">
<div class="panel">
<div class="panel-body">
<h4><strong>Prayers</strong> - Edit Date & Time for Prayers </h4>
</div>
</div>
</div>                                     
</div>
<?php
if(isset($_GET['Success'])){ 
				$SuccessM = " Data Updated successfully ";
					?><div class="alert alert-success alert-dismissible" id="success" >
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
					<strong>Success ! </strong><?php echo $SuccessM;?> 
				  </div><?php
				 } else if(isset($_GET['error'])){ 
					$SuccessM = " Data is not Updated ";
						?><div class="alert alert-danger alert-dismissible" id="success" >
						<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						<strong>Error ! </strong><?php echo $SuccessM;?> 
					  </div><?php
					 }  ?>
<div class="alert  alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
<div class="row">                    
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="panel">
			<div class="panel-heading">
			<h2 class="panel-title">Edit Prayers Time of Date: <?php echo $prayer_date; ?></h2>
			</div>
			<div class="panel-body" >

				<form method="post" id="fupForm" enctype="multipart/form-data" action="updateaction/update_prayer.php">
					<input type="hidden" name="pd_id" id="pd_id"value="<?php echo $pd_id ?>">
					<input type="hidden" name="pt_id" id="pt_id" value="<?php echo $pt_id ?>">
                    <fieldset>
						<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Publish Date</label>
						<div class="col-md-12">
						<input class="form-control" value="<?php echo $date;?>" name="prayer_date" id="prayer_date" type="date">
						</div>
					</fieldset> 
                    <fieldset>
						<div class="form-group row col-md-12">
							<div class="col-md-2">
								<label class="col-form-label" for="input-id-1">Fajar:</label>
							</div>
							<div class="col-md-4">
								<input class="form-control" value="<?php //$fajar = strtotime($fajar_time);
		//echo date("H:i",$fajar);
		echo $fajar_time;?>" name="fajar_time" id="fajar_time" type="text" placeholder="Enter time of Fajar">
							</div>
							<div class="col-md-2">
								<label class="col-form-label" for="input-id-1">Zohar</label>
							</div>
							<div class="col-md-4">
								<input class="form-control" value="<?php //$zohar = strtotime($zohar_time);
								//echo date("H:i",$zohar);
								echo $zohar_time;?>" name="zohar_time" id="zohar_time" type="text" placeholder="Enter time of Zohar"> 
							</div>
							<div class="col-md-2">
								<label class="col-form-label" for="input-id-1">Asr</label>
							</div>
							<div class="col-md-4">
								<input class="form-control" value="<?php //$asar = strtotime($asr_time);
								//echo date("H:i",$asar);
								echo $asr_time?>" name="asr_time" id="asr_time" type="text" placeholder="Enter time of asr">
							</div>
							<div class="col-md-2">
								<label class="col-form-label" for="input-id-4">Magrib</label>
							</div>
							<div class="col-md-4">
								<input class="form-control" value="<?php //$magrib = strtotime($magrib_time);
								//echo date("H:i",$magrib);
								echo $magrib_time;?>" name="magrib_time" id="magrib_time" type="text" placeholder="Enter time of magrib">
							</div>
							<div class="col-md-2">
								<label class="col-form-label" for="input-id-4">Isha</label>
							</div>
							<div class="col-md-4">
								<input class="form-control" value="<?php //$isha = strtotime($isha_time);
								//echo date("H:i",$isha);
								echo $isha_time;?>" name="isha_time" id="isha_time" type="text" placeholder="Enter time of isha">
							</div>


						</div>
					</fieldset>
					
                    <button class="form-group btn btn-main" id="butsave" type="submit">Update Prayers Time</button>
				</form>
			</div>
		</div>                    
	</div>
</div>


<!-- END Row --> 
<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>
