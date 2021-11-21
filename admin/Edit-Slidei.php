<?php 
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");
$pagename = 'Home-Slides';
$container = 'View-Item'; 
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php");
if(isset($_GET['id'])) {$id=$_GET['id'];} 
$result22 = mysqli_query($servercnx,"SELECT * FROM slidei WHERE id = '$id'");
$row22 = mysqli_fetch_array($result22);
$id = $row22['id'];
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
<h4><strong>Slide Image</strong> - Edit Slide Image </h4>
</div>
</div>
</div>                                     
</div>

<div class="row">                    
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="panel">
			<div class="panel-heading">
			<h2 class="panel-title">Edit Slide Image</h2>
			</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data" action="updateaction/update_slidei.php">
					<fieldset>
						<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Slide Image</label>
						<div class="col-md-12">
						<input class="form-control" name="slidei" id="slidei" type="file">
						<label class="col-md-12 col-form-label" for="input-id-1"><br>Current:</label>
						<div class="col-md-4">
						<a href="javascript: void(0)" onclick="popup('../images/Home/<?php echo $row22['slide_image'];?>')"><img src="../images/Home/<?php echo $row22['silde_image'];?>" width="250" height="200" /></a>
						</div> 
						</div>
					</fieldset>

					<input type="hidden" name="id" id="id" value="<?php echo $row22['id'];?>" />
					<button class="form-group btn btn-main" type="submit">Update Image</button>
				</form>
			</div>
		</div>                    
	</div>
</div>
<!-- END Row --> 
<script type="text/javascript">
function popup(url) 
{
var width  = 700;
var height = 600;
var left   = (screen.width  - width)/2;
var top    = (screen.height - height)/2;
var params = 'width='+width+', height='+height;
params += ', top='+top+', left='+left;
params += ', directories=no';
params += ', location=no';
params += ', menubar=yes';
params += ', resizable=yes';
params += ', scrollbars=yes';
params += ', status=no';
params += ', toolbar=no';
newwin=window.open(url,'windowname5', params);
if (window.focus) {newwin.focus()}
return false;
}
</script> 
<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>