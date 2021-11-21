<?php 
include("assets/includes/controller.php");
$pagename = 'View-Brands';
$container = 'View-Item'; 
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php");
?> 
<!-- Page Content -->
<div id="page-content" class="gray-bg">

<!-- Title Header -->
<div class="title-header white-bg">
	<i class="fa fa-file-image"></i>
	<h2>Brand Logos</h2>
	<ol class="breadcrumb">
		<li>
		<a href="index.php">Home</a>
		</li>
		<li class="active">
		Brand Logos
		</li>
	</ol>
</div>
<!-- END Title Header -->

<div class="row">                    
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="panel">
			<div class="panel-heading">
			<h2 class="panel-title">Add New Brand Image</h2>
			</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data" action="createaction/add_brand.php">
					<fieldset>
						<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Brand Image</label>
						<div class="col-md-12">
						<input class="form-control" name="slide_image" id="slide_image" type="file"> 
						<input type="hidden" name="type" id="type" value="Brand" />
						</div>
					</fieldset>
					<button class="form-group btn btn-main" type="submit">Add Image</button>
				</form>
			</div>
		</div>                    
	</div>
</div>
<!-- END Row --> 
<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>