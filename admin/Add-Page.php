<?php
include("assets/includes/controller.php");
$pagename = 'Add-Page';
$container = 'Add-Item';
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php");

?>
<!-- Page Content -->
<div id="page-content" class="gray-bg">

	<!-- Title Header -->
	<div class="title-header white-bg">
		<i class="fa fa-link"></i>
		<h2>Page</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				Page
			</li>
		</ol>
	</div>
	<!-- END Title Header -->

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel">
				<div class="panel-body">
					<h4><strong>Page</strong> - Add Page </h4>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">Add New Page</h2>
				</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data" action="createaction/add_page.php">
						<input type="text" name="page_uniid" id="page_uniid" value="<?php echo md5(uniqid(mt_rand(), true)); ?>" hidden="Yes" />
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Page Name:</label>
								<div class="col-md-12">
									<input class="form-control" name="page_title" id="page_title" type="text">
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
									<input class="form-control" name="page_url" id="page_url" type="text" placeholder="Enter URL">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Robots:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="robots" id="robots" type="text" value="index, follow" placeholder="Enter Robots">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Position:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="page_position" id="page_position" type="text" placeholder="Enter Position e.g, 1,2,3,4">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Show in Header:</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="show_header" id="show_header" required>
										<option disabled selected>--Select Option--</option>
										<option value="Yes" selected>Yes</option>
										<option value="No">No</option>
									</select>
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Show in Footer:</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="show_footer" id="show_footer" required>
										<option disabled selected>--Select Option--</option>
										<option value="Yes">Yes</option>
										<option value="No" selected>No</option>
									</select>
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Status:</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="page_status" id="page_status">
										<option value="Active" selected>Active</option>
										<option value="Not Active">Not Active</option>
									</select>
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Youtube Video ID:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="v_embd" id="v_embd" type="text" placeholder="e.g, Yvfix0_DQ1c" value="No">
								</div>
								<div class="col-md-2">
									<label for="col-form-label">Is Parent Cat</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="is_parent" id="parent_cat" onchange="yesnoCheck(this);" required style="width: 100%;">
										<option disabled selected>---SELECT---</option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
								</div>
								<div class="col-md-2">
									<label for="col-form-label">Is sub Cat</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="is_scat" id="is_scat" required onchange="yesNoCheck(this);" style="width: 100%;">

										<option value="Yes">Yes</option>
										<option value="No" selected>No</option>
									</select>
								</div>
								<div id="page_category" style="display: none;">
									<div class="col-md-2">
										<label class="col-form-label">Category:</label>
									</div>
									<div class="col-md-4">
										<select class="form-control" name="page_category"  required style="width: 100%;">

											<?php
											include("assets/includes/inc/config.php");
											$maincat = mysqli_query($servercnx, "SELECT * FROM pages WHERE is_parent = 'Yes' AND is_scat = 'Yes'");
											?>
											<option selected value="No">-----SELECT-------</option>
											
											<?php while ($mcatq = mysqli_fetch_array($maincat)) {	?>
												<?php  ?>
												<option value="<?php echo $mcatq['id']; ?>"><?php echo $mcatq['page_title']; ?></option><?php } ?>


											

										</select>
									</div>
								</div>
								
							</div>
						</fieldset>
						<fieldset>
							<div class="row">
								<div class="col-md-12">
									<label class="col-form-label" for="input-id-4">Page Summary (Maximum 170 Characters Only)</label>
									<textarea type="text" class="form-control" name="page_summary" id="page_summary" maxlength="170" title="Only Alphanumeric" value="Type Alphanumeric Only" onkeydown="return alphaOnly(event);"></textarea>
								</div>
							</div><br>
						</fieldset>
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label">Page Body:</label>
								<div class="col-md-12"><textarea name="page_body" id="page_body" class="update_input ckeditor form-control" accept-charset="iso-8859-1"></textarea></div>
							</div>
						</fieldset>
						<fieldset>
							<div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Page Feature Image (Min Size: 1920 x 1000))</label>
								<div class="col-md-12"><input class="btn btn-success" name="page_cover" id="page_cover" type="file">
								</div>
							</div>
						</fieldset>
						<button class="form-group btn btn-main" type="submit">Add New Page</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- END Row -->
	<?php include("assets/includes/inc/Main-Footer.php"); ?>
	</body>

	</html>
	<script>
		function yesnoCheck(that) {
			if (that.value == "No") {

				document.getElementById("page_category").style.display = "block";
			} else {
				document.getElementById("page_category").style.display = "none";
			}
		}

	</script>