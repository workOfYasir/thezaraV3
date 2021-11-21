<?php 
include("assets/includes/controller.php");
$pagename = 'View-Subscribers';
$container = 'View-Item'; 
include("assets/includes/inc/Main-Header.php"); 
?> 
<!-- Page Content -->
<div id="page-content" class="gray-bg">

<!-- Title Header -->
<div class="title-header white-bg">
	<i class="fa fa-bell"></i>
	<h2>Subscribers</h2>
	<ol class="breadcrumb">
		<li>
		<a href="index.php">Home</a>
		</li>
		<li class="active">
		Subscribers
		</li>
	</ol>
</div>
<!-- END Title Header -->

<div class="row">                                     
<div class="col-sm-12 col-md-12">
<div class="panel">
<div class="panel-body">
<h4><strong>Subscribers</strong> - View Subscribers </h4>
</div>
</div>
</div>                                     
</div>

<div class="row">                    
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="panel">
			<div class="panel-heading">
			<h2 class="panel-title">View All Subscribers</h2>
			</div>
			<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered table-hover" id="data-table">
	<thead>
		<th data-column-id="name">Email</th>
		<th>IP</th>
		<th>Device</th>
		<th>Consent</th>
		<th>Subscribe At</th>
		<th>Action</th>
	</thead>
<?php 
include("assets/includes/inc/config.php"); 
$mainpageap = mysqli_query($servercnx,"SELECT * FROM news_letter");
while($mainrowap = mysqli_fetch_array($mainpageap)){ ?>
	<tr>
		<td><?php echo $mainrowap['email'];?></td>
		<td><?php echo $mainrowap['user_ip'];?></td>
		<td><?php echo $mainrowap['user_device'];?></td>
		<td><?php echo $mainrowap['consent'];?></td>
		<td><?php echo $mainrowap['subcribe_at'];?></td>
		<td>
		<?php if($session->isSuperAdmin()): ?>
		<a href="delaction/del_subcriber.php?id=<?php echo $mainrowap['id'];?>" onClick="return confirm('Are You sure ? You want to delete !');"><button class="btn btn-default"><i class="fa fa-trash"></i></button></a>
		<?php endif; ?>
		</td>
	</tr>
<?php }?>
</table>
			</div>
		</div>                    
	</div>
</div>
<!-- END Row -->  
<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>