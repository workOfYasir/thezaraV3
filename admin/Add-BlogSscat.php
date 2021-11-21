<?php
include("assets/includes/controller.php");
$pagename = 'Sscat';
$container = 'Categories';
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php");
?>
<!-- Page Content -->
<div id="page-content" class="gray-bg">

	<!-- Title Header -->
	<div class="title-header white-bg">
		<i class="fa fa-cube"></i>
		<h2>Blog Categories</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				Blog Categories
			</li>
		</ol>
	</div>
	<!-- END Title Header -->

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel">
				<div class="panel-body">
					<h4 class="col-md-6"><strong>Blog Categories</strong> - Add Level III </h4>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">Add New Blog Category</h2>
				</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data" action="createaction/add_blog_sscat.php">
						<input type="text" name="sscat_uniid" id="sscat_uniid" value="<?php echo md5(uniqid(mt_rand(), true)); ?>" hidden="Yes" />
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Blog Category Title:</label>
								<div class="col-md-12">
									<input class="form-control" name="sscat_title" id="sscat_title" type="text">
								</div>
						</fieldset>

						<fieldset>
							<div class="form-group row col-md-12">
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">Title:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="seo_title" id="seo_title" type="text" placeholder="Enter Title">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">Keywords:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="seo_keywords" id="seo_keywords" type="text" placeholder="Enter Keywords">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">Description:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="seo_description" id="seo_description" type="text" placeholder="Enter Description">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">URL:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="sscat_url" id="sscat_url" type="text" placeholder="Enter Category URL">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Robots:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="robots" id="robots" type="text" value="index, follow" placeholder="Enter Robots">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Status:</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="sscat_status" id="sscat_status">
										<option value="Active">Active</option>
										<option value="Not Active" selected>Not Active</option>
									</select>
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Top Category:</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="sscat_top" id="sscat_top" required>
										<option disabled>--Select Option--</option>
										<option value="Yes">Yes</option>
										<option value="No" selected>No</option>
									</select>
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Position:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="sscat_position" id="sscat_position" type="text" placeholder="Enter Position e.g, 1,2,3,4">
								</div>
							</div>
						</fieldset>

						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label">Parent Category:</label>
								<div class="col-md-12">
									<select class="form-control" name="sscat_scate" id="sscat_scate" required>
										<option disabled selected>--Select Option--</option>
										<?php
										include("assets/includes/inc/config.php");
										$mainpageap = mysqli_query($servercnx, "SELECT * FROM blog_scat WHERE scat_cates = 'Yes' AND scat_status = 'Active' ORDER BY scat_title ASC");
										while ($mainrowap = mysqli_fetch_array($mainpageap)) { ?>
											<option value="<?php echo $mainrowap['scat_uniid']; ?>"><?php echo $mainrowap['scat_title']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</fieldset>


						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label">Category Body:</label>
								<div class="col-md-12"><textarea name="sscat_body" id="sscat_body" class="update_input ckeditor form-control" accept-charset="iso-8859-1"></textarea></div>
							</div>
						</fieldset>

						<fieldset>
							<div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Category Feature Image (Min Size: 1920 x 1000)</label>
								<div class="col-md-12"><input class="btn btn-success" name="sscat_cover" id="sscat_cover" type="file">
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