<?php
include("assets/includes/controller.php");
$pagename = 'Mcat';
$container = 'Categories';
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php");
?>
<!-- Content -->
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
					<h4><strong>Categories</strong> - Add Category </h4>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">Add New Category</h2>
				</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data" action="createaction/add_mcat.php">
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Category Title:</label>
								<div class="col-md-12">
									<input class="form-control" name="mcat_title" id="mcat_title" type="text">
								</div>
						</fieldset>
						<fieldset>
							<div class="form-group row col-md-12">
								
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Position:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="mcat_position" id="mcat_position" type="text" placeholder="Enter Position e.g, 1,2,3,4">
								</div>
								<div class="col-md-2">
                                    <label class="col-form-label" for="input-id-4">Main Category:</label>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" name="mcat_cates" id="mcat_cates">
                                        <option value="Yes">Yes</option>
                                        <option value="No" selected>No</option>
                                    </select>
                                </div>
							</div>
						</fieldset>
						
						<button class="form-group btn btn-main" type="submit">Add Category</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- END Row -->
	<?php include("assets/includes/inc/Main-Footer.php"); ?>
	</body>

	</html>