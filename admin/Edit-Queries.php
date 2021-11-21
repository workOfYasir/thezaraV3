<?php 
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");
$pagename = 'View-Queries';
$container = 'View-Item'; 
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php");
if(isset($_GET['id'])) {$id=$_GET['id'];} 
$result22 = mysqli_query($servercnx,"SELECT * FROM queries WHERE id = '$id'");
$row22 = mysqli_fetch_array($result22);
$id = $row22['id'];
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
<h4><strong>Queries</strong> - Edit Queries </h4>
</div>
</div>
</div>                                     
</div>

<div class="row">                    
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="panel">
			<div class="panel-heading">
			<h2 class="panel-title">View "<?php echo $row22['query_name'];?>'s" Query</h2>
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-hover users-table table-responsive" width="100%">
					<tr>
						<td width="15%"><b>Name</b></td>
						<td><?php echo $row22['query_name'];?></td>
					</tr>
					<tr>
						<td width="15%"><b>Email</b></td>
						<td><?php echo $row22['query_email'];?></td>
					</tr>
					<tr>
						<td width="15%"><b>Subject</b></td>
						<td><?php echo $row22['query_subject'];?></td>
					</tr>
					<tr>
						<td width="15%"><b>Message</b></td>
						<td><?php echo $row22['query_message'];?></td>
					</tr>
					<tr>
						<td width="15%"><b>User Devive</b></td>
						<td><?php echo $row22['user_device'];?></td>
					</tr>
					<tr>
						<td width="15%"><b>User IP</b></td>
						<td><?php echo $row22['user_ip'];?></td>
					</tr>
					<tr>
						<td width="15%"><b>Consent</b></td>
						<td><?php echo $row22['consent'];?></td>
					</tr>
				</table>
			</div>
		</div>                    
	</div>
</div>
<!-- END Row -->  
<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>