<?php 
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");
$pagename = 'Edit-Prayer';
$container = 'Edit-Item'; 
include("assets/includes/inc/Main-Header.php");

include("assets/includes/inc/editor.php");
$id=$_GET['id'];
$dateid=$_GET['pd_id'];
$result22 = mysqli_query($servercnx,"SELECT * FROM `date_prayer` WHERE pd_id = '$dateid'");
$row22 = mysqli_fetch_array($result22);
$rozadate = $row22['prayer_date'];

$result23 = mysqli_query($servercnx,"SELECT * FROM `roza_time` WHERE `id`= '$id'");
$row23 = mysqli_fetch_array($result23);

$date = date("jS-F-Y", strtotime($rozadate));
$sehar_time = $row23['sehar'];
$iftar_time = $row23['iftar'];


?> 

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Page Content -->
<div id="page-content" class="gray-bg">

<!-- Title Header -->
<div class="title-header white-bg">
	<i class="fa fa-align-justify"></i>
	<h2>Edit Sehar & Iftar</h2>
	<ol class="breadcrumb">
		<li>
		<a href="index.php">Home</a>
		</li>
		<li class="active">
		Edit Sehar & Iftar
		</li>
	</ol>
</div>
<!-- END Title Header -->

<div class="row">                                     
<div class="col-sm-12 col-md-12">
<div class="panel">
<div class="panel-body">
<h4><strong>Sehar & Iftar</strong> - Edit Date & Time for Sehar & Iftar </h4>
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
			<h2 class="panel-title">Edit Sehar & Iftar Time of Date: <?php echo $date; ?></h2>
			</div>
			<div class="panel-body" >

				<form method="post" id="fupForm" enctype="multipart/form-data" action="updateaction/update_roza.php">
					<input type="hidden" name="id" id="id"value="<?php echo $id; ?>">
					<input type="hidden" name="pd_id" id="pd_id"value="<?php echo $dateid; ?>">				
                    <fieldset>
						<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Publish Date</label>
						<div class="col-md-12">
						<input class="form-control" value="<?php echo $row22['prayer_date']; ?>" name="date" id="date" type="date">
						</div>
					</fieldset> 
                  
					<fieldset>
						<h3>Sehar & Iftar Time of this date</h3>
							<hr>
							<div class="col-md-12">
								<div class="col-md-6">
									<div class="form-group row ">
										<div class="col-md-4">
											<label class="col-form-label" for="input-id-1">sehar:</label>
										</div>
										<div class="col-md-8">
											<input class="form-control" name="sehar_time" value="<?php 
								echo $sehar_time;?>" id="sehar_time" type="text" placeholder="Enter time of sehar">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row ">
										<div class="col-md-4">
											<label class="col-form-label" for="input-id-1">iftar</label>
										</div>
										<div class="col-md-8">
											<input class="form-control" name="iftar_time" value="<?php //$iftar = strtotime($iftar_time);
								//echo date("H:i",$iftar);
								echo $iftar_time?>" id="iftar_time" type="text" placeholder="Enter time of iftar">
										</div>
									</div>
								</div>
							</div>
						</fieldset>
                    <button class="form-group btn btn-main" id="butsave" type="submit">Update Sehar & Iftar</button>
				</form>
			</div>
		</div>                    
	</div>
</div>


<!-- END Row --> 
<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>
