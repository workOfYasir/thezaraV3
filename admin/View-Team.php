<?php
include("assets/includes/controller.php");
$pagename = 'View-Team';
$container = 'View-Item';
include("assets/includes/inc/Main-Header.php");
?>
<!-- Page Content -->
<div id="page-content" class="gray-bg">

	<!-- Title Header -->
	<div class="title-header white-bg">
		<i class="fa fa-users"></i>
		<h2>Team</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				Team
			</li>
		</ol>
	</div>
	<!-- END Title Header -->

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel">
				<div class="panel-body">
					<h4><strong>Team</strong> - View Team </h4>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">View All Team</h2>
				</div>
				<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered table-hover" id="data-table">
						<thead>
							<th>Profile</th>
							<th data-column-id="name">Name</th>
							<th>Designation</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
						<?php
						include("assets/includes/inc/config.php");
						$mainpageap = mysqli_query($servercnx, "SELECT * FROM team");
						while ($mainrowap = mysqli_fetch_array($mainpageap)) {
						?>
							<tr>
								<td>
									<div class="media"><img class="img-fluid circle" src="../images/Teams/Profiles/<?php echo $mainrowap['team_profile']; ?>" alt="Image Unavailable" width="50" height="50"></div>
								</td>
								<td><?php echo $mainrowap['team_name']; ?></td>
								<td><?php echo $mainrowap['team_designation']; ?></td>
								<td><?php echo $mainrowap['team_status']; ?></td>
								<td><a href="Edit-Team.php?id=<?php echo $mainrowap['id']; ?>"><button class="btn btn-default"><i class="fa fa-edit"></i></button></a>
									<?php if ($session->isSuperAdmin()) : ?>
										-
										<a href="delaction/del_team.php?id=<?php echo $mainrowap['id']; ?>" onClick="return confirm('Are You sure ? You want to delete !');"><button class="btn btn-default"><i class="fa fa-trash"></i></button></a>
									<?php endif; ?>
								</td>
							</tr>
						<?php unset($cate_title_array);
						} ?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- END Row -->
	<?php include("assets/includes/inc/Main-Footer.php"); ?>
	</body>

	</html>