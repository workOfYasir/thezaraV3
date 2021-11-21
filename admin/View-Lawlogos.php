<?php 
include("assets/includes/controller.php");
$pagename = 'Law-Logos';
$container = 'View-Item'; 
include("assets/includes/inc/Main-Header.php"); 
?> 
<!-- Page Content -->
<div id="page-content" class="gray-bg">

<!-- Title Header -->
<div class="title-header white-bg">
	<i class="fa fa-file-image"></i>
	<h2>Law Logos</h2>
	<ol class="breadcrumb">
		<li>
		<a href="index.php">Home</a>
		</li>
		<li class="active">
		Law Logos
		</li>
	</ol>
</div>
<!-- END Title Header -->

<div class="row">                                     
<div class="col-sm-12 col-md-12">
<div class="panel">
<div class="panel-body">
<h4 class="col-md-6"><strong>Law Logos</strong> - View</h4>
<span class="col-md-6"><a href="Add-Lawlogo.php" class="form-group btn btn-main pull-right">Add New Law Logo</a></span>
</div>
</div>
</div>                                     
</div>

<div class="row">                    
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="panel">
			<div class="panel-heading">
			<h2 class="panel-title">View All Law Logos</h2>
			</div>
			<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered table-hover" id="data-table">
	<thead>
		<th>Logo</th>
		<th>URL</th>
		<th>Alt Text</th>
		<th>Action</th>
	</thead>
<?php 
include("assets/includes/inc/config.php"); 
$mainpageap = mysqli_query($servercnx,"SELECT * FROM law_logos");
while($mainrowap = mysqli_fetch_array($mainpageap)){ ?>
	<tr>
		<td><div class="media"><img class="img-fluid circle" src="../images/Lawlogos/<?php echo $mainrowap['law_logo'];?>" alt="Image Unavailable" width="100" height="50"></div></td>
		<td><?php echo $mainrowap['law_link'];?></td>
		<td><?php echo $mainrowap['law_alt_text'];?></td>
		<td><a href="Edit-Lawlogo.php?id=<?php echo $mainrowap['id'];?>"><button class="btn btn-default"><i class="fa fa-edit"></i></button></a> 
		<?php if($session->isSuperAdmin()): ?>
		- 
		<a href="delaction/del_lawlogo.php?id=<?php echo $mainrowap['id'];?>" onClick="return confirm('Are You sure ? You want to delete !');"><button class="btn btn-default"><i class="fa fa-trash"></i></button></a>
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