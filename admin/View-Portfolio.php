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
		<h2>View Portfolios</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				View Portfolios
			</li>
		</ol>
	</div>
	<!-- END Title Header -->

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel">
				<div class="panel-body">
					<h4><strong>Portfolio</strong> - View Detail for Portfolios </h4>
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
					<h2 class="panel-title">View Date & Time for All Portfolios</h2>
				</div>
				<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered table-hover" id="data-table">

						<thead>
                            <th>Cover</th>
							<th data-column-id="date">Date</th>
                            <th>Service Name</th>
							<th>Youtube</th>
							<th>Video link</th>
							<th>gallery</th>

							<th>Action</th>
						</thead>
						<?php
						include("assets/includes/inc/config.php");
						$mainpageap = mysqli_query($servercnx, "SELECT *
						FROM portfolio_post");

						while ($mainrowap = mysqli_fetch_array($mainpageap)) { ?>
							<tr>
                                <td>
                                <div class="media"><img class="img-fluid circle" src="../images/Portfolios/Covers/<?php echo $mainrowap['portfolio_cover']; ?>" alt="Image Unavailable" width="120"></div>
                                </td>

								<?php
								$allDate = $mainrowap['portfolio_date'];
								$dates = strtotime($allDate);
								$allDateDB = date('d F Y', $dates);
								$dateToday = date("d F Y");

								?><td>
									<?php
									echo $allDateDB ;
									$today = date('d F Y');
							
								
									?>
								</td>
								
                                <td><?php echo $mainrowap['service_name']; ?>
                                </td>
                                <td><?php echo $mainrowap['video_check']; ?>
                                </td>
                                <td> <?php if($mainrowap['videoURL']=='' ){
                                        echo 'Null';
                                    }else{ echo $mainrowap['videoURL'];}?>
                                </td>
                                <td> <?php echo $mainrowap['gallery_check']; ?>
                                </td>

								<td><a href="Edit-Portfolio.php?id=<?php echo $mainrowap['id']; ?>"><button class="btn btn-default"><i class="fa fa-edit"></i></button></a>
									<?php if ($session->isSuperAdmin()) : ?>
										-
										<a href="delaction/del_prayer.php?id=<?php echo $mainrowap['id']; ?>" onClick="return confirm('Are You sure ? You want to delete !');"><button class="btn btn-default"><i class="fa fa-trash"></i></button></a>
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