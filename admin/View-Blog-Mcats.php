<?php
include("assets/includes/controller.php");
$pagename = 'Mcat';
$container = 'Categories';
include("assets/includes/inc/Main-Header.php");
?>
<!-- Page Content -->
<div id="page-content" class="gray-bg">

	<!-- Title Header -->
	<div class="title-header white-bg">
		<i class="fa fa-cube"></i>
		<h2>Blog Categories</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				Blog Categories
			</li>
		</ol>
	</div>
	<!-- END Title Header -->

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel">
				<div class="panel-body">
					<h4 class="col-md-6"><strong>Blog Categories</strong> - View</h4>
					<span class="col-md-6"><a href="Add-BlogMcat.php" class="form-group btn btn-main pull-right">Add New Blog Category</a></span>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">View All Blog Categories</h2>
				</div>
				<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered table-hover" id="data-table">
						<thead>
							<th>Cover</th>
							<th data-column-id="name">Name</th>
							<th>URL</th>
							<th>Menu Position</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
						<?php
						include("assets/includes/inc/config.php");
						$mainpageap = mysqli_query($servercnx, "SELECT * FROM blog_mcat");
						while ($mainrowap = mysqli_fetch_array($mainpageap)) { ?>
							<tr>
								<td>
									<div class="media"><img class="img-fluid circle" src="../images/Category/Covers/<?php echo $mainrowap['mcat_cover']; ?>" alt="Image Unavailable" width="50" height="50"></div>
								</td>
								<td><?php echo $mainrowap['mcat_title']; ?></td>
								<td><?php echo $mainrowap['mcat_url']; ?></td>
								<td><?php echo $mainrowap['mcat_position']; ?></td>
								<td><?php echo $mainrowap['mcat_status']; ?></td>
								<td><a href="Edit-BlogMcat.php?id=<?php echo $mainrowap['id']; ?>"><button class="btn btn-default"><i class="fa fa-edit"></i></button></a>
									<?php if ($session->isSuperAdmin()) : ?>
										-
										<a href="delaction/del_blog_mcat.php?id=<?php echo $mainrowap['id']; ?>" onClick="return confirm('Are You sure ? You want to delete !');"><button class="btn btn-default"><i class="fa fa-trash"></i></button></a>
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