<?php 
include("assets/includes/controller.php");
$pagename = 'View-Queries';
$container = 'View-Item'; 
include("assets/includes/inc/Main-Header.php"); 
?> 
<!-- Page Content -->
<div id="page-content" class="gray-bg">

<!-- Title Header -->
<div class="title-header white-bg">
	<i class="fa fa-at"></i>
	<h2>Queries</h2>
	<ol class="breadcrumb">
		<li>
		<a href="index.php">Home</a>
		</li>
		<li class="active">
		Queries
		</li>
	</ol>
</div>
<!-- END Title Header -->

<div class="row">                                     
<div class="col-sm-12 col-md-12">
<div class="panel">
<div class="panel-body">
<h4><strong>Queries</strong> - View Queries </h4>
</div>
</div>
</div>                                     
</div>

<div class="row">                    
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="panel">
			<div class="panel-heading">
			<h2 class="panel-title">View All Queries</h2>
			</div>
			<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered table-hover" id="data-table">
	<thead>
		<th data-column-id="name">Name</th>
		<th>Subject</th>
		<th>Email</th>
		<th>Time</th>
		<th>Action</th>
	</thead>
<?php 
include("assets/includes/inc/config.php"); 
$mainpageap = mysqli_query($servercnx,"SELECT * FROM queries");
while($mainrowap = mysqli_fetch_array($mainpageap)){ ?>
	<tr>
		<td><?php echo $mainrowap['query_name'];?></td>
		<td><?php echo $mainrowap['query_subject'];?></td>
		<td><?php echo $mainrowap['query_email'];?></td>
		<td><?php echo $mainrowap['query_at'];?></td>
		<td><a href="Edit-Queries.php?id=<?php echo $mainrowap['id'];?>"><button class="btn btn-default"><i class="fa fa-edit"></i></button></a> 
		<?php if($session->isSuperAdmin()): ?>
		- 
		<a href="delaction/del_query.php?id=<?php echo $mainrowap['id'];?>" onClick="return confirm('Are You sure ? You want to delete !');"><button class="btn btn-default"><i class="fa fa-trash"></i></button></a>
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