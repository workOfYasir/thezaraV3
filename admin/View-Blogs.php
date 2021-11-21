<?php
include("assets/includes/controller.php");
$pagename = 'View-Blog';
$container = 'View-Item';
include("assets/includes/inc/Main-Header.php");
?>
<!-- Page Content -->
<div id="page-content" class="gray-bg">

	<!-- Title Header -->
	<div class="title-header white-bg">
		<i class="fa fa-align-justify"></i>
		<h2>Blog</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				Blog
			</li>
		</ol>
	</div>
	<!-- END Title Header -->

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel">
				<div class="panel-body">
					<h4><strong>Blog</strong> - View Blogs </h4>
				</div>
			</div>
		</div>
	</div>
	<?php		
	if(isset($_GET['updated'])){ 
					$updated = "Data of Selected row is Updated successfully ";
					?><div class="alert alert-success alert-dismissible" id="success" >
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
					<strong>Success ! </strong><?php echo $updated;?> 
					</div><?php
	}else if(isset($_GET['notUpdated'])){ 
				$notUpdated = " Data of Selected row is not Updated ";
					?><div class="alert alert-danger alert-dismissible" id="success" >
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
					<strong>Error ! </strong><?php echo $notUpdated;?> 
					</div><?php
	} else if(isset($_GET['deletederror'])){ 
					
					?><div class="alert alert-danger alert-dismissible" id="success" >
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
					<strong>Error ! </strong>Data of selected row is not Deleted
			  		</div><?php
	} else if(isset($_GET['deleted'])){ 
				?><div class="alert alert-warning alert-dismissible" id="success" >
				<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				<strong>Warning ! </strong>Data of selected row is Deleted  
				  </div><?php
	}
	?>
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">View All Blogs</h2>
				</div>
				<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered table-hover" id="data-table">
						<thead>
							<th>Cover</th>
							<th data-column-id="name">Title</th>
							<th>URL</th>
							<!-- <th>Category</th> -->
							<th>Event</th>
							<th colspan="2">Duration</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
						<?php
						include("assets/includes/inc/config.php");
						$mainpageap = mysqli_query($servercnx, "SELECT * FROM blog_post ORDER BY blog_date DESC");
						while ($mainrowap = mysqli_fetch_array($mainpageap)) {
							// $blog_uniid = $mainrowap['blog_uniid'];
							// include("assets/includes/inc/config.php");
							// $b_cate = $mainrowap['blog_category'];
							// $b_cate_res = mysqli_query($servercnx, "SELECT * FROM mcat WHERE id = $b_cate");
							// $b_cate_output = mysqli_fetch_array($b_cate_res);
						?>
							<tr>
								<td style="width: 170px;">
									<div class="media"><img class="img-fluid circle" src="../images/Blogs/Covers/<?php echo $mainrowap['blog_cover']; ?>" alt="Image Unavailable" width="50%" ></div>
								</td>
								<td><?php echo $mainrowap['blog_title']; ?></td>
								<td><?php echo $mainrowap['blog_url']; ?></td>
								<!-- <td><?php //echo $b_cate_output['mcat_title']; ?></td> -->
								<td><?php echo $mainrowap['blog_event']; ?></td>
								<td><?php $event_start = $mainrowap['event_start']; $start = strtotime($event_start);
								if($mainrowap['event_start']=='')
								{echo 'NULL';}else{
								echo date("h:i A",$start);} ?></td>
								<td><?php $event_end = $mainrowap['event_end']; $end = strtotime($event_end);
								if($mainrowap['event_end']=='')
								{echo 'NULL';}else{
								echo date("h:i A",$end);}?></td>
								<td><?php echo $mainrowap['blog_status']; ?></td>
								<td width="95"><a href="Edit-Blog.php?id=<?php echo $mainrowap['id']; ?>"><button class="btn btn-default"><i class="fa fa-edit"></i></button></a>
									<?php if ($session->isSuperAdmin()) : ?>
										-
										<a href="delaction/del_blog.php?id=<?php echo $mainrowap['id']; ?>" onClick="return confirm('Are You sure ? You want to delete !');"><button class="btn btn-default"><i class="fa fa-trash"></i></button></a>
										
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