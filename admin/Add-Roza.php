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
		<h2>Add Sehr O Iftar</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				Add Sehr O Iftar
			</li>
		</ol>
	</div>
	<!-- END Title Header -->

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel">
				<div class="panel-body">
					<h4><strong>Prayers</strong> - Add Date & Time for Sehr O Iftar </h4>
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
					<h2 class="panel-title">Add Date & Time for Sehr O Iftar</h2>
				</div>
				<div class="panel-body">
					<?php $lastId = "SELECT * FROM `roza_time` ORDER BY `id` DESC LIMIT 1;";
					$result = mysqli_query($servercnx, $lastId);
					$row = mysqli_fetch_array($result);

					?>
					<h3>Last Added Date - <?php
											$lastAddedDate = $row['date'];
											$lastDate = strtotime($lastAddedDate);
											echo date("d M Y", $lastDate);
											?>
					</h3>
					<hr>
					<form method="post" id="fupForm" enctype="multipart/form-data" action="createaction/add_roza.php">
                    <fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Fasting Date</label></div>
							<div class="col-md-12">
								<input class="form-control" name="date" id="date" type="date">
							</div>
						</fieldset>
                        <br>
						<fieldset>
						<h3>Ramazan Time of this date</h3>
							<hr>
							<div class="col-md-12">
								<div class="col-md-6">
									<div class="form-group row ">
										<div class="col-md-4">
											<label class="col-form-label" for="input-id-1">sehar:</label>
										</div>
										<div class="col-md-8">
											<input class="form-control" name="sehar_time" id="sehar_time" type="text" placeholder="Enter time of sehar">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row ">
										<div class="col-md-4">
											<label class="col-form-label" for="input-id-1">iftar</label>
										</div>
										<div class="col-md-8">
											<input class="form-control" name="iftar_time" id="iftar_time" type="text" placeholder="Enter time of iftar">
										</div>
									</div>
								</div>
							</div>
						</fieldset>
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<button class="form-group btn btn-main" id="butsave" type="submit">Add Sehr O Iftar</button>
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