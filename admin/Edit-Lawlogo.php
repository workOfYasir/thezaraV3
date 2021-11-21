<?php 
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");
$pagename = 'Law-Logos';
$container = 'View-Item'; 
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php");
if(isset($_GET['id'])) {$id=$_GET['id'];} 
$result22 = mysqli_query($servercnx,"SELECT * FROM law_logos WHERE id = '$id'");
$row22 = mysqli_fetch_array($result22);
$id = $row22['id'];
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
<h4><strong>Law Logos</strong> - Edit Law Logo </h4>
</div>
</div>
</div>                                     
</div>

<div class="row">                    
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="panel">
			<div class="panel-heading">
			<h2 class="panel-title">Edit Law Logo</h2>
			</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data" action="updateaction/update_lawlogo.php">
					<fieldset>
						<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Law Logo</label>
						<div class="col-md-12">
						<input class="form-control" name="law_logo" id="law_logo" type="file">
						<label class="col-md-12 col-form-label" for="input-id-1"><br>Previously Selected Logo:</label>
						<div class="col-md-4">
						<a href="javascript: void(0)" onclick="popup('../images/Lawlogos/<?php echo $row22['law_logo'];?>')"><img src="../images/Lawlogos/<?php echo $row22['law_logo'];?>" width="250" height="200" /></a>
						</div> 
						</div>
					</fieldset>

					<fieldset>
						<div class="form-group row col-md-12">
							<div class="col-md-2">
							<label class="col-form-label" for="input-id-1">Link:</label>
							</div>
							<div class="col-md-4">
							<input class="form-control" name="law_link" id="law_link" type="text" required value="<?php echo $row22['law_link'];?>">
							</div>
							<div class="col-md-2">
							<label class="col-form-label" for="input-id-1">Alt Text:</label>
							</div>
							<div class="col-md-4">
							<input class="form-control" name="law_alt_text" id="law_alt_text" type="text" required value="<?php echo $row22['law_alt_text'];?>"> 
							</div>
						</div>
					</fieldset> 
					<input type="hidden" name="id" id="id" value="<?php echo $row22['id'];?>" />
					<button class="form-group btn btn-main" type="submit">Update Logo</button>
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