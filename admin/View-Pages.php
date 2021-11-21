<?php
include("assets/includes/controller.php");
$pagename = 'View-Page';
$container = 'View-Item';
include("assets/includes/inc/Main-Header.php");
?>
<!-- Page Content -->
<div id="page-content" class="gray-bg">

	<!-- Title Header -->
	<div class="title-header white-bg">
		<i class="fa fa-link"></i>
		<h2>Page</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				Page
			</li>
		</ol>
	</div>
	<!-- END Title Header -->

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel">
				<div class="panel-body">
					<h4><strong>Page</strong> - View Pages <small style="color: #f00; font-size: 12px;"><b>Do not <u>delete</u> page or <u>change URL</u> for any page having <u>Position = 0</u> and <u>Status = Not Active</u>.</b></small></h4>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">View All Pages</h2>
				</div>
				<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered table-hover" id="data-table">
						<thead>
							<th>Cover</th>
							<th data-column-id="name">Title</th>
							<th>URL</th>
							<th>Status</th>
							<th>Position</th>
							<th>Action</th>
						</thead>
						<?php
						include("assets/includes/inc/config.php");
						$mainpageap = mysqli_query($servercnx, "SELECT * FROM pages");
						while ($mainrowap = mysqli_fetch_array($mainpageap)) { ?>
							<tr>
								<td width="120">
									<div class="media"><img class="img-fluid circle" src="../images/Pages/Covers/<?php echo $mainrowap['page_cover']; ?>" alt="Image Unavailable" width="100%" ></div>
								</td>
								<td><?php echo $mainrowap['page_title']; ?></td>
								<td><?php echo $mainrowap['page_url']; ?></td>
								<td><?php echo $mainrowap['page_status']; ?></td>
								<td><?php echo $mainrowap['page_position']; ?></td>
								<td><a href="Edit-Page.php?id=<?php echo $mainrowap['id']; ?>"><button class="btn btn-default"><i class="fa fa-edit"></i></button></a>
									<?php if ($session->isSuperAdmin()) : ?>
										-
										<a href="delaction/del_page.php?id=<?php echo $mainrowap['id']; ?>" onClick="return confirm('Are You sure ? You want to delete !');"><button class="btn btn-default"><i class="fa fa-trash"></i></button></a>
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