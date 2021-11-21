<?php 
include("assets/includes/controller.php");
$pagename = 'Home-Slides';
$container = 'View-Item'; 
include("assets/includes/inc/Main-Header.php"); 
?> 
<!-- Page Content -->
<div id="page-content" class="gray-bg">

<!-- Title Header -->
<div class="title-header white-bg">
	<i class="fa fa-file-image"></i>
	<h2>Slide Images</h2>
	<ol class="breadcrumb">
		<li>
		<a href="index.php">Home</a>
		</li>
		<li class="active">
		Slide Images
		</li>
	</ol>
</div>
<!-- END Title Header -->

<div class="row">                                     
<div class="col-sm-12 col-md-12">
<div class="panel">
<div class="panel-body">
<h4 class="col-md-6"><strong>Slide Images</strong> - View</h4>
<span class="col-md-6"><a href="Add-Slidei.php" class="form-group btn btn-main pull-right">Add New Image</a></span>
</div>
</div>
</div>                                     
</div>

<div class="row">                    
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="panel">
			<div class="panel-heading">
			<h2 class="panel-title">View All Images</h2>
			</div>
			<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered table-hover" id="data-table">
	<thead>
		<th>Image</th>
		<th>Delete</th>
	</thead>
<?php 
include("assets/includes/inc/config.php"); 
$mainpageap = mysqli_query($servercnx,"SELECT * FROM slidei WHERE type = 'Home' ");
while($mainrowap = mysqli_fetch_array($mainpageap)){ ?>
	<tr>
		<td width="90%"><div class="media"><img class="img-fluid circle" src="../images/Home/<?php echo $mainrowap['slide_image'];?>" width="20%"></div></td>
		
		<?php if($session->isSuperAdmin()): ?><td>
		<a href="delaction/del_slidei.php?id=<?php echo $mainrowap['id'];?>" onClick="return confirm('Are You sure ? You want to delete !');"><button class="btn btn-danger">Delete Image</button></a>
		</td>
		<?php endif; ?>
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