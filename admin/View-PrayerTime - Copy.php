<?php
include("assets/includes/controller.php");
$pagename = 'View-PrayerTime';
$container = 'View-Item';
include("assets/includes/inc/Main-Header.php");
?>

<!-- Page Content -->
<div id="page-content" class="gray-bg">

	<!-- Title Header -->
	<div class="title-header white-bg">
		<i class="fa fa-at"></i>
		<h2>View Prayers</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				View Prayers
			</li>
		</ol>
	</div>
	<!-- END Title Header -->

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel">
				<div class="panel-body">
					<h4><strong>Prayer Time</strong> - View Date & Time for Prayers </h4>
				</div>
			</div>
		</div>
	</div>
	<?php
	if (isset($_GET['Success'])) {
		$SuccessM = " Data Updated successfully ";
	?><div class="alert alert-success alert-dismissible" id="success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<strong>Success ! </strong><?php echo $SuccessM; ?>
		</div><?php
			} else if (isset($_GET['error'])) {
				$SuccessM = " Data is not Updated ";
				?><div class="alert alert-danger alert-dismissible" id="success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<strong>Error ! </strong><?php echo $SuccessM; ?>
		</div><?php
			} else if (isset($_GET['deleted'])) {
				$deleteM = "Selected Data is Deleted";
				?><div class="alert alert-info alert-dismissible" id="success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<strong>Success ! </strong><?php echo $deleteM; ?>
		</div><?php
			}   ?>
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">View Date & Time for All Prayers</h2>
				</div>
				<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered table-hover" id="data-table">

						<thead>
							<th data-column-id="date">Date</th>
							<th>Timeline</th>
							<th>Fajar</th>
							<th>Zohar</th>
							<th>Asr</th>
							<th>Magrib</th>
							<th>Isha</th>
							<th>Sehar</th>
							<th>Iftar</th>
							<th>Action</th>
						</thead>
						<?php
						include("assets/includes/inc/config.php");
						$mainpageap = mysqli_query($servercnx, "SELECT *
						FROM prayer_time as pt
						LEFT JOIN date_prayer as pd
						ON pt.prayer_date_id = pd.pd_id");

						while ($mainrowap = mysqli_fetch_array($mainpageap)) { ?>
							<tr>

								<?php
								$allDate = $mainrowap['prayer_date'];
								$dates = strtotime($allDate);
								$allDateDB = date('d F Y', $dates);
								$dateToday = date("d F Y");

								?><td>
									<?php
									echo $allDateDB ;
									$today = date('d F Y');
							
								
									?>
								</td>
								<td><?php 	
								if (strtotime($mainrowap['prayer_date']) > strtotime		($today)) {
										echo 'Upcoming';
									} else if (strtotime($mainrowap['prayer_date']) < strtotime($today)) {
										echo 'Previous';
									} else if (strtotime($mainrowap['prayer_date']) == strtotime($today)) {
										echo 'Present';
									} ?></td>

								<td><?php // $fajarTime = $mainrowap['fajar'];
								//	$fajar = strtotime($fajarTime);
								//	echo date("H:i", $fajar); 
								echo $mainrowap['fajar'];
								?></td>
								<td><?php // $zoharTime = $mainrowap['zohar'];
								 //	$zohar = strtotime($zoharTime);
								//	echo date("H:i", $zohar); 
								echo $mainrowap['zohar'];
								?></td>
								<td><?php // $asarTime = $mainrowap['asr'];
								//	$asar = strtotime($asarTime);
								//	echo date("H:i", $asar); 
								echo $mainrowap['asr'];
								?></td>
								<td><?php
								// $magribTime = $mainrowap['magrib'];
								//	$magrib = strtotime($magribTime);
								//	echo date("H:i", $magrib);
								echo $mainrowap['magrib']; ?></td>
								<td><?php // $ishaTime = $mainrowap['isha'];
								//	$isha = strtotime($ishaTime);
								//	echo date("H:i", $isha);
								echo $mainrowap['isha']; ?></td>
								<td> <?php 
								echo $mainrowap['sehar'];
								?>
								</td>
								<td> <?php 
								echo $mainrowap['iftar'];
								?>
								</td>
								<td><a href="Edit-Prayer.php?pd_id=<?php echo $mainrowap['pd_id']; ?>&pt_id=<?php echo $mainrowap['pt_id']; ?>"><button class="btn btn-default"><i class="fa fa-edit"></i></button></a>
									<?php if ($session->isSuperAdmin()) : ?>
										-
										<a href="delaction/del_prayer.php?pt_id=<?php echo $mainrowap['pt_id']; ?>" onClick="return confirm('Are You sure ? You want to delete !');"><button class="btn btn-default"><i class="fa fa-trash"></i></button></a>
									<?php endif; ?>

							</tr>
						<?php
						} ?>
					</table>

				</div>
			</div>
		</div>
	</div>
	<script>

	</script>
	<!-- END Row -->
	<?php include("assets/includes/inc/Main-Footer.php"); ?>
	</body>

	</html>