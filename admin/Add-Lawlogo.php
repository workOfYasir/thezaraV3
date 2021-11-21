<?php 
include("assets/includes/controller.php");
$pagename = 'Law-Logos';
$container = 'View-Item'; 
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php");
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
<h4><strong>Law Logos</strong> - Add Law Logo </h4>
</div>
</div>
</div>                                     
</div>

<div class="row">                    
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="panel">
			<div class="panel-heading">
			<h2 class="panel-title">Add New Law Logo</h2>
			</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data" action="createaction/add_lawlogo.php">
					<fieldset>
						<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Law Logo</label>
						<div class="col-md-12">
						<input class="form-control" name="law_logo" id="law_logo" type="file"> 
						</div>
					</fieldset>

					<fieldset>
						<div class="form-group row col-md-12">
							<div class="col-md-2">
							<label class="col-form-label" for="input-id-1">Link:</label>
							</div>
							<div class="col-md-4">
							<input class="form-control" name="law_link" id="law_link" type="text" required value="<?php echo SITE_URL;?>">
							</div>
							<div class="col-md-2">
							<label class="col-form-label" for="input-id-1">Alt Text:</label>
							</div>
							<div class="col-md-4">
							<input class="form-control" name="law_alt_text" id="law_alt_text" type="text" required value="Image Unavailable"> 
							</div>
						</div>
					</fieldset> 
					<button class="form-group btn btn-main" type="submit">Add Logo</button>
				</form>
			</div>
		</div>                    
	</div>
</div>
<!-- END Row --> 
<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>