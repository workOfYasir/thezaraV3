<?php
include("assets/includes/controller.php");
$pagename = 'Add-Prayer';
$container = 'Add-Item';
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/config.php");
include("assets/includes/inc/editor.php");
?>

<!-- Page Content -->
<div id="page-content" class="gray-bg">

	<!-- Title Header -->
	<div class="title-header white-bg">
		<i class="fa fa-align-justify"></i>
		<h2>Add Prayers</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				Add Prayers
			</li>
		</ol>
	</div>
	<!-- END Title Header -->

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel">
				<div class="panel-body">
					<h4><strong>Prayers</strong> - Add Date & Time for Prayers </h4>
				</div>
			</div>
		</div>
	</div>
	<?php
	if (isset($_GET['DuplicatedDate'])) {
		$Duplicated = " This Date is already Added in Record ";
	?><div class="alert alert-danger alert-dismissible" id="success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<strong>Duplicated Value ! </strong> <?php echo $Duplicated; ?>

		</div><?php

			} else if (isset($_GET['DataEncounterd'])) {
				$Encounter = "Error encountered while adding user data ";
				?><div class="alert alert-danger alert-dismissible" id="success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<strong>Error ! </strong><?php echo $Encounter; ?>
		</div><?php
			} else if (isset($_GET['Success'])) {
				$SuccessM = "Data inserted successfully ";
				?><div class="alert alert-success alert-dismissible" id="success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<strong>Success ! </strong><?php echo $SuccessM; ?>
		</div><?php
			} else if (isset($_GET['fillFields'])) {
				$SuccessM = "Please Fill All Fields ";
				?><div class="alert alert-danger alert-dismissible" id="success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<strong>Error ! </strong><?php echo $SuccessM; ?>
		</div><?php
			}
				?>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">Add Date & Time for Prayers</h2>
				</div>
				<div class="panel-body">
					<?php $lastId = "SELECT * FROM `date_prayer` ORDER BY `pd_id` DESC LIMIT 1;";
					$result = mysqli_query($servercnx, $lastId);
					$row = mysqli_fetch_array($result);

					?>
					<h3>Last Added Date - <?php
											$lastAddedDate = $row['prayer_date'];
											$lastDate = strtotime($lastAddedDate);
											echo date("d M Y", $lastDate);
											?>
					</h3>
					<hr>
					<form method="post" id="fupForm" enctype="multipart/form-data" action="createaction/add_prayer.php">

						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Prayer Date</label></div>
							<div class="col-md-12">
								<input class="form-control" name="prayer_date" id="prayer_date" type="date">
							</div>
						</fieldset>
						<br>
						<fieldset>
							<div class="col-md-12">
								<div class="col-md-6">
									<div class="form-group row ">
										<div class="col-md-4">
											<label class="col-form-label" for="input-id-1">Fajar:</label>
										</div>
										<div class="col-md-8">
											<input class="form-control" name="fajar_time" id="fajar_time" type="text" placeholder="Enter time of Fajar">
										</div>
									</div>
									<div class="form-group row ">
										<div class="col-md-4">
											<label class="col-form-label" for="input-id-1">Zohar</label>
										</div>
										<div class="col-md-8">
											<input class="form-control" name="zohar_time" id="zohar_time" type="text" placeholder="Enter time of Zohar">
										</div>
									</div>
									<div class="form-group row ">
										<div class="col-md-4">
											<label class="col-form-label" for="input-id-1">Asr</label>
										</div>
										<div class="col-md-8">
											<input class="form-control" name="asr_time" id="asr_time" type="text" placeholder="Enter time of asr">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row ">
										<div class="col-md-4">
											<label class="col-form-label" for="input-id-4">Magrib</label>
										</div>
										<div class="col-md-8">
											<input class="form-control" name="magrib_time" id="magrib_time" type="text" placeholder="Enter time of magrib">
										</div>
									</div>
									<div class="form-group row ">
										<div class="col-md-4">
											<label class="col-form-label" for="input-id-4">Isha</label>
										</div>
										<div class="col-md-8">
											<input class="form-control" name="isha_time" id="isha_time" type="text" placeholder="Enter time of isha">
										</div>
									</div>
								</div>
							</div>
						</fieldset>

						<div class="container">
							<div class="row">
								<div class="col text-center">
									<button class="form-group btn btn-main" id="butsave" type="submit">Add Prayers Time</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- END Row -->
	<?php include("assets/includes/inc/Main-Footer.php"); ?>
	</body>

	</html>