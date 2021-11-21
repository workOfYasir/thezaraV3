<?php
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");
$pagename = 'Sscat';
$container = 'Categories';
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
$result22 = mysqli_query($servercnx, "SELECT * FROM blog_sscat WHERE id = '$id'");
$row22 = mysqli_fetch_array($result22);
$id = $row22['id'];
$sscat_uniid = $row22['sscat_uniid'];
$sscat_mcate = $row22['sscat_mcate'];
$result234 = mysqli_query($servercnx, "SELECT mcat_title FROM blog_mcat WHERE mcat_uniid = '$sscat_mcate'");
$row234 = mysqli_fetch_array($result234);

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
					<h4><strong>Blog Categories</strong> - Edit Level III </h4>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">Edit "<?php echo $row22['sscat_title']; ?>"</h2>
				</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data" action="updateaction/update_blog_sscat.php">
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Blog Category Title:</label>
								<div class="col-md-12">
									<input class="form-control" name="sscat_title" id="sscat_title" type="text" value="<?php echo $row22['sscat_title']; ?>">
								</div>
						</fieldset>

						<fieldset>
							<div class="form-group row col-md-12">
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">Title:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="seo_title" id="seo_title" type="text" placeholder="Enter Title" value="<?php echo $row22['seo_title']; ?>">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">Keywords:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="seo_keywords" id="seo_keywords" type="text" placeholder="Enter Keywords" value="<?php echo $row22['seo_keywords']; ?>">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">Description:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="seo_description" id="seo_description" type="text" placeholder="Enter Description" value="<?php echo $row22['seo_description']; ?>">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">URL:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="sscat_url" id="sscat_url" type="text" placeholder="Enter Category URL" value="<?php echo $row22['sscat_url']; ?>">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Robots:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="robots" id="robots" type="text" value="index, follow" placeholder="Enter Robots" value="<?php echo $row22['robots']; ?>">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Status:</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="sscat_status" id="sscat_status">
										<option value="Active" <?php if ($row22['sscat_status'] == 'Active') {
																	echo "selected='selected'";
																} ?>>Active</option>
										<option value="Not Active" <?php if ($row22['sscat_status'] == 'Not Active') {
																		echo "selected='selected'";
																	} ?>>Not Active</option>
									</select>
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Top Category:</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="sscat_top" id="sscat_top" required>
										<option disabled>--Select Option--</option>
										<option value="Yes" <?php if ($row22['sscat_top'] == 'Yes') {
																echo "selected='selected'";
															} ?>>Yes</option>
										<option value="No" <?php if ($row22['sscat_top'] == 'No') {
																echo "selected='selected'";
															} ?>>No</option>
									</select>
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Position:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="sscat_position" id="sscat_position" type="text" placeholder="Enter Position e.g, 1,2,3,4" value="<?php echo $row22['sscat_position']; ?>">
								</div>
							</div>
						</fieldset>

						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label">Parent Category:</label>
								<div class="col-md-12">
									<span>Level I Category: <b style="color: red;"><?php echo $row234['mcat_title']; ?></b></span>
								</div>
								<div class="col-md-12">
									<select class="form-control" name="sscat_scate" id="sscat_scate" required>
										<option disabled selected>--Select Option--</option>
										<?php
										include("assets/includes/inc/config.php");
										$mainpageap = mysqli_query($servercnx, "SELECT * FROM blog_scat WHERE scat_cates = 'Yes' AND scat_status = 'Active' ORDER BY scat_title ASC");
										while ($mainrowap = mysqli_fetch_array($mainpageap)) { ?>
											<option value="<?php echo $mainrowap['scat_uniid']; ?>" <?php if ($mainrowap['scat_uniid'] == $row22['sscat_scate']) {
																										echo "selected='selected'";
																									} ?>><?php echo $mainrowap['scat_title']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</fieldset>



						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label">Category Body:</label>
								<div class="col-md-12"><textarea name="sscat_body" id="sscat_body" class="update_input ckeditor form-control" accept-charset="iso-8859-1"><?php echo $row22['sscat_body']; ?></textarea></div>
							</div>
						</fieldset>

						<fieldset>
							<div class="row">
								<div class="col-md-4">
									<label class="col-form-label" for="input-id-4">Header Script</label>
									<textarea type="text" class="form-control" name="head_script" id="head_script"><?php echo $row22['head_script']; ?></textarea>
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="input-id-4">After Header Script</label>
									<textarea type="text" class="form-control" name="after_head" id="after_head"><?php echo $row22['after_head']; ?></textarea>
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="input-id-4">Footer Script</label>
									<textarea type="text" class="form-control" name="footer_script" id="footer_script"><?php echo $row22['footer_script']; ?></textarea>
								</div>
							</div>
						</fieldset>

						<fieldset><br>
							<div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Category Feature Image (Min Size: 1920 x 1000)</label>
								<div class="col-md-12"><input class="btn btn-success" name="sscat_cover" id="sscat_cover" type="file">
								</div>
								<label class="col-md-12 col-form-label" for="input-id-1"><br>Previously Selected Cover:</label>
								<div class="col-md-4">
									<a href="javascript: void(0)" onclick="popup('../images/Categories/Covers/<?php echo $row22['sscat_cover']; ?>')"><img src="../images/Categories/Covers/<?php echo $row22['sscat_cover']; ?>" width="250" height="200" /></a>
								</div>
							</div>
						</fieldset>
						<input type="hidden" name="id" id="id" value="<?php echo $row22['id']; ?>" />
						<input type="hidden" name="sscat_uniid" id="sscat_uniid" value="<?php echo $row22['sscat_uniid']; ?>" />
						<button class="form-group btn btn-main" type="submit">Update Category</button>

					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- END Row -->
	<script type="text/javascript">
		function popup(url) {
			var width = 700;
			var height = 600;
			var left = (screen.width - width) / 2;
			var top = (screen.height - height) / 2;
			var params = 'width=' + width + ', height=' + height;
			params += ', top=' + top + ', left=' + left;
			params += ', directories=no';
			params += ', location=no';
			params += ', menubar=yes';
			params += ', resizable=yes';
			params += ', scrollbars=yes';
			params += ', status=no';
			params += ', toolbar=no';
			newwin = window.open(url, 'windowname5', params);
			if (window.focus) {
				newwin.focus()
			}
			return false;
		}
	</script>
	<?php include("assets/includes/inc/Main-Footer.php"); ?>
	</body>

	</html>