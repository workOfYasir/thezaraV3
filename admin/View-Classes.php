<?php
include("assets/includes/controller.php");
$pagename = 'View-Classes';
$container = 'View-Item';
include("assets/includes/inc/Main-Header.php");
?>
<!-- Page Content -->
<div id="page-content" class="gray-bg">

	<!-- Title Header -->
	<div class="title-header white-bg">
		<i class="fa fa-link"></i>
		<h2>Class</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				Class
			</li>
		</ol>
	</div>
	<!-- END Title Header -->

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel">
				<div class="panel-body">
					<h4><strong>Class</strong> - View Classes </h4>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">View All Classes</h2>
				</div>
				<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered table-hover" id="data-table">
						<thead>
		
							<th data-column-id="name">Name</th>
							<th>Duration</th>
							<th>Timing</th>
							<th>Cost</th>
							<th>Action</th>
						</thead>
						<?php
						include("assets/includes/inc/config.php");
						$mainpageap = mysqli_query($servercnx, "SELECT * FROM classes");
						while ($mainrowap = mysqli_fetch_array($mainpageap)) { ?>
							<tr>
								
								<td><?php echo $mainrowap['class_name']; ?></td>
								<td><?php echo $mainrowap['duration']; ?></td>
								<td><?php echo $mainrowap['timing']; ?></td>
								<td><?php echo $mainrowap['cost']; ?></td>
								<td><a href="Edit-Class.php?id=<?php echo $mainrowap['id']; ?>"><button class="btn btn-default"><i class="fa fa-edit"></i></button></a>
									<?php if ($session->isSuperAdmin()) : ?>
										-
										<a href="delaction/del_class.php?id=<?php echo $mainrowap['id']; ?>" onClick="return confirm('Are You sure ? You want to delete !');"><button class="btn btn-default"><i class="fa fa-trash"></i></button></a>
									<?php endif; ?>
								</td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- END Row -->
	<?php include("assets/includes/inc/Main-Footer.php"); ?>
	</body>

	</html>