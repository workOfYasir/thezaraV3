<?php 
include("assets/includes/controller.php");
$pagename = 'Scat';
$container = 'Categories'; 
include("assets/includes/inc/Main-Header.php"); 
?> 
<!-- Page Content -->
<div id="page-content" class="gray-bg">

<!-- Title Header -->
<div class="title-header white-bg">
	<i class="fa fa-cube"></i>
	<h2>Categories</h2>
	<ol class="breadcrumb">
		<li>
		<a href="index.php">Home</a>
		</li>
		<li class="active">
		Categories
		</li>
	</ol>
</div>
<!-- END Title Header -->

<div class="row">                                     
<div class="col-sm-12 col-md-12">
<div class="panel">
<div class="panel-body">
<h4 class="col-md-6"><strong>Categories</strong> - View Level II </h4>
<span class="col-md-6"><a href="Add-Scat.php" class="form-group btn btn-main pull-right">Add New Level II</a></span>
</div>
</div>
</div>                                     
</div>

<div class="row">                    
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="panel">
			<div class="panel-heading">
			<h2 class="panel-title">View All Second Level Categories</h2>
			</div>
			<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered table-hover" id="data-table">
	<thead>

		<th data-column-id="name">Name</th>
		<th>Parent Cat.</th>		
	
		<th>Top</th>
	
		<th>Action</th>
	</thead>
<?php 
include("assets/includes/inc/config.php"); 
$mainpageap = mysqli_query($servercnx,"SELECT scat.*, mcat_title AS m_title FROM scat LEFT JOIN mcat ON scat_mcate = mcat_uniid");
while($mainrowap = mysqli_fetch_array($mainpageap)){ 
	$scat_uniid = $mainrowap['scat_uniid'];
	include("assets/includes/inc/config.php"); 
	

?>
	<tr>
	
		<td><?php echo $mainrowap['scat_title'];?></td>
	
		<td><?php echo $mainrowap['m_title'];?></td>
		<td><?php echo $mainrowap['scat_top'];?></td>

		<td><a href="Edit-Scat.php?id=<?php echo $mainrowap['id'];?>"><button class="btn btn-default"><i class="fa fa-edit"></i></button></a> 
		<?php if($session->isSuperAdmin()): ?>
		- 
		<a href="delaction/del_scat.php?id=<?php echo $mainrowap['id'];?>" onClick="return confirm('Are You sure ? You want to delete !');"><button class="btn btn-default"><i class="fa fa-trash"></i></button></a>
		<?php endif; ?>
		</td>
	</tr>
<?php unset($cate_title_array);}?>
</table>
			</div>
		</div>                    
	</div>
</div>
<!-- END Row -->  
<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>