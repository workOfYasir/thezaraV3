<?php
include("assets/includes/controller.php");
$pagename = 'View-PrayerTime';
$container = 'View-Item';
include("assets/includes/inc/Main-Header.php"); 
?>
<style>

.roza{
	border: 0;
    box-shadow: none;
	width: 60px;
}

</style>
<!-- Page Content -->
<div id="page-content" class="gray-bg">

	<!-- Title Header -->
	<div class="title-header white-bg">
		<i class="fa fa-at"></i>
		<h2>Ramazan Chart</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				Ramazan Chart
			</li>
		</ol>
	</div>
	<!-- END Title Header -->

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel">
				<div class="panel-body">
					<h4><strong>Ramaza Chart</strong> - Modify Date & Time for Sehar & Iftar </h4>
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
					<h2 class="panel-title">Ramazan Chart</h2>
				</div>
				<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered table-hover" id="data-table">

						<thead>
							<th data-column-id="date">Date</th>
							<th>Timeline</th>
							<th>Sehar</th>
							<th>Iftar</th>
							<th>Action</th>
						</thead>
						<?php
						include("assets/includes/inc/config.php");
						$mainpageap = mysqli_query($servercnx, "SELECT * FROM `date_prayer` WHERE `prayer_date` >= CURDATE() ");
						
						while ($mainrowap = mysqli_fetch_array($mainpageap)  ) { ?>
						
							<tr>
							
								<?php
								
								$allDate = $mainrowap['prayer_date'];
								$dateId = $mainrowap['pd_id'];
								$dates = strtotime($allDate);
								$allDateDB = date('d F Y', $dates);
								$dateToday = date("d F Y");

								// join query to fetch sehar and iftar time with respect to date which is comming in loop
								$mainroza = mysqli_query($servercnx, 
								"SELECT * FROM `roza_time` 
								INNER JOIN `date_prayer` 
								ON `date_prayer`.`pd_id` = `roza_time`.`date_id` 
								WHERE `roza_time`.`date_id` = '$dateId' ");


								?><td>
									<?php
									echo $allDateDB ;
									$today = date('d F Y');
									?>
								</td>
								<td><?php 	

								//match date from today date and get upcoming previous present date

								if (strtotime($mainrowap['prayer_date']) > strtotime($today)) {
										echo 'Upcoming';
									} else if (strtotime($mainrowap['prayer_date']) < strtotime($today)) {
										echo 'Previous';
									} else if (strtotime($mainrowap['prayer_date']) == strtotime($today)) {
										echo 'Present';
									} ?></td>
										<?php
										// execution of join query to get data
									$mainrowroza = mysqli_fetch_array($mainroza); ?>	
									<form action="updateaction/update_roza.php" method="POST">
									
						
						
								<td>

								<!-- send id(which is currently null id sehar and iftar time is not added) and date_id which is coming from date_prayer -->
								<input type="hidden" name="id" id="id"value="<?php echo $mainrowroza['id']; ?>">
								<input type="hidden" name="pd_id" id="pd_id"value="<?php echo $mainrowap['pd_id']; ?>">
								<?php
								// check sehar time is already added then show value otherwise null input will be shown for adding new sehar time
								if ($mainrowroza['sehar']=='') {
									?>	<input class="roza" type="text" name="sehar" id="sehar" placeholder="Sehar"><?php
								}else{
								?> <input class="roza" type="text" name="sehar" id="sehar" value=" <?php	echo $mainrowroza['sehar'];?>">   
								<?php }
								
								?>
								</td>
								<td> <?php 
								// check iftar time is already added then show value otherwise null input will be shown for adding new iftar time
								if ($mainrowroza['iftar']=='') {
									?>	<input class="roza" type="text" name="iftar" id="iftar" placeholder="Iftar"><?php
								}else{
									?> <input class="roza" type="text" name="iftar" id="iftar" value=" <?php	echo $mainrowroza['iftar'];?>">   
									<?php }
									
									
								?>
								</td>
								<td>
								<button type="submit" class="btn btn-light btn-sm">Submit</button>
								</td>
								
									</form>
							</tr>
						<?php 	}	?>
					</table>

				</div>
			</div>
		</div>
	</div>
	<script>

	</script>
	<!-- END Row -->
	<?php  include("assets/includes/inc/Main-Footer.php"); ?>
	</body>

	</html>