<?php 
include("assets/includes/controller.php");
$pagename = 'Sscat';
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
<h4 class="col-md-6"><strong>Page Categories</strong> - View Level III </h4>
<span class="col-md-6"><a href="Add-Sscat.php" class="form-group btn btn-main pull-right">Add New Level III</a></span>
</div>
</div>
</div>                                     
</div>

<div class="row">                    
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="panel">
			<div class="panel-heading">
			<h2 class="panel-title">View All Third Level Page Categories</h2>
			</div>
			<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered table-hover" id="data-table">
	<thead>
		<th>Cover</th>
		<th data-column-id="name">Name</th>
		<th>Parent Cat.</th>
		<!-- <th>Related Categories</th> -->
		<th>Top</th>
		<th>Status</th>
		<th>Action</th>
	</thead>
<?php 
include("assets/includes/inc/config.php"); 
$mainpageap = mysqli_query($servercnx,"SELECT sscat.*, scat_title AS s_title FROM sscat LEFT JOIN scat ON sscat_scate = scat_uniid");
while($mainrowap = mysqli_fetch_array($mainpageap)){ 

	$sscat_uniid = $mainrowap['sscat_uniid'];
	include("assets/includes/inc/config.php"); 
	//$b_cate_res = mysqli_query($servercnx,"SELECT * FROM sscat_rcategories WHERE sscat_uniid = '$sscat_uniid'");
	//while($b_cate_output = mysqli_fetch_array($b_cate_res)){

		//if ($b_cate_output['cate_table']==2) {
		//	$cate_uniid=$b_cate_output['cate_uniid'];
		//	$cate_title = mysqli_query($servercnx,"SELECT scat_title FROM scat WHERE scat_uniid = '$cate_uniid'");
		//	$cate_title_res = mysqli_fetch_array($cate_title);
		//	$cate_title_array[] = $cate_title_res['scat_title'];
		//}
		//else if ($b_cate_output['cate_table']==3) {
		//	$cate_uniid=$b_cate_output['cate_uniid'];
		//	$cate_title = mysqli_query($servercnx,"SELECT sscat_title FROM sscat WHERE sscat_uniid = '$cate_uniid'");
		//	$cate_title_res = mysqli_fetch_array($cate_title);
		//	$cate_title_array[] = $cate_title_res['sscat_title'];
		//}
	//}
?>
	<tr>
		<td><div class="media"><img class="img-fluid circle" src="../images/Categories/Covers/<?php echo $mainrowap['sscat_cover'];?>" alt="Image Unavailable" width="50" height="50"></div></td>
		<td><?php echo $mainrowap['sscat_title'];?></td>
		<td><?php echo $mainrowap['s_title'];?></td>
		<!-- <td><?php //foreach ($cate_title_array as $cate_name) { 
			//echo $cate_name; echo '<br>- - - - - - - - - - - - - - - - - - <br>';}?></td>-->
		<td><?php echo $mainrowap['sscat_top'];?></td>
		<td><?php echo $mainrowap['sscat_status'];?></td>
		<td><a href="Edit-Sscat.php?id=<?php echo $mainrowap['id'];?>"><button class="btn btn-default"><i class="fa fa-edit"></i></button></a> 
		<?php if($session->isSuperAdmin()): ?>
		- 
		<a href="delaction/del_sscat.php?id=<?php echo $mainrowap['id'];?>" onClick="return confirm('Are You sure ? You want to delete !');"><button class="btn btn-default"><i class="fa fa-trash"></i></button></a>
		<?php endif; ?>
		</td>
	</tr>
<?php }//unset($cate_title_array);}?>
</table>
			</div>
		</div>                    
	</div>
</div>
<!-- END Row -->  
<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>