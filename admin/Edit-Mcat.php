<?php
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");
$pagename = 'Mcat';
$container = 'Categories';
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
$result22 = mysqli_query($servercnx, "SELECT * FROM mcat WHERE id = '$id'");
$row22 = mysqli_fetch_array($result22);
$id = $row22['id'];
?>
<!-- Page Content -->
<div id="page-content" class="gray-bg">

	<!-- Title Header -->
	<div class="title-header white-bg">
		<i class="fa fa-cube"></i>
		<h2>Page Categories</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				Page Categories
			</li>
		</ol>
	</div>
	<!-- END Title Header -->

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel">
				<div class="panel-body">
					<h4><strong>Page Categories</strong> - Edit Page Category</h4>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">Edit "<?php echo $row22['mcat_title']; ?>"</h2>
				</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data" action="updateaction/update_mcat.php">
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Page Category Title:</label>
								<div class="col-md-12">
									<input class="form-control" name="mcat_title" id="mcat_title" type="text" value="<?php echo $row22['mcat_title']; ?>">
								</div>
						</fieldset>

						<fieldset>
							<div class="form-group row col-md-12">
								<!--<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">Title:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="seo_title" id="seo_title" type="text" placeholder="Enter Title" value="<?php // echo $row22['seo_title']; ?>">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">Keywords:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="seo_keywords" id="seo_keywords" type="text" placeholder="Enter Keywords" value="<?php // echo $row22['seo_keywords']; ?>">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">Description:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="seo_description" id="seo_description" type="text" placeholder="Enter Description" value="<?php // echo $row22['seo_description']; ?>">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">URL:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="mcat_url" id="mcat_url" type="text" placeholder="Enter Category URL" value="<?php // echo $row22['mcat_url']; ?>">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Robots:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="robots" id="robots" type="text" value="index, follow" placeholder="Enter Robots" value="<?php  //  echo $row22['robots']; ?>">
								</div>
									<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Status:</label>
								</div>
							 	<div class="col-md-4">
									<select class="form-control" name="mcat_status" id="mcat_status">
										<option value="Active" <?php // if ($row22['mcat_status'] == 'Active') {
																	// echo "selected='selected'";
															//	} ?>>Active</option>
										<option value="Not Active" <?php // if ($row22['mcat_status'] == 'Not Active') {
																	//	echo "selected='selected'";
																//	} ?>>Not Active</option>
									</select>
								</div> -->
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Position:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="mcat_position" id="mcat_position" type="text" placeholder="Enter Position e.g, 1,2,3,4" value="<?php echo $row22['mcat_position']; ?>">
								</div>
								<div class="col-md-2">
                                    <label class="col-form-label" for="input-id-4">Main Category:</label>
                                </div>
								<div class="col-md-4">
                                    <select class="form-control" name="mcat_cates" id="mcat_cates"  value="<?php echo $row22['mcat_cates'];?>">
									<option value="Yes" <?php if ($row22['mcat_status'] == 'Yes') {
																	echo "selected='selected'";
																} ?>>Yes</option>
										<option value="No" <?php if ($row22['mcat_status'] == 'No') {
																		echo "selected='selected'";
																	} ?>>No</option>
                                    </select>
                                </div>
							</div>
						</fieldset>
						<!-- <fieldset>
							<div class="row">
								<div class="col-md-12">
									<label class="col-form-label" for="input-id-4">Summary</label>
									<textarea type="text" class="form-control" name="mcat_summary" id="mcat_summary" maxlength="25" title="Only Alphanumeric" value="Type Alphanumeric Only" onkeydown="return alphaOnly(event);"><?php // echo  $row22['mcat_summary']; ?></textarea>
								</div>
							</div><br>
						</fieldset> -->
						<!-- <fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label">Category Body:</label>
								<div class="col-md-12"><textarea name="mcat_body" id="mcat_body" class="update_input ckeditor form-control" accept-charset="iso-8859-1"><?php // echo $row22['mcat_body']; ?></textarea></div>
							</div>
						</fieldset> -->

						<!-- <fieldset>
							<div class="row">
								<div class="col-md-4">
									<label class="col-form-label" for="input-id-4">Header Script</label>
									<textarea type="text" class="form-control" name="head_script" id="head_script"><?php //echo $row22['head_script']; ?></textarea>
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="input-id-4">After Header Script</label>
									<textarea type="text" class="form-control" name="after_head" id="after_head"><?php // echo $row22['after_head']; ?></textarea>
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="input-id-4">Footer Script</label>
									<textarea type="text" class="form-control" name="footer_script" id="footer_script"><?php // echo $row22['footer_script']; ?></textarea>
								</div>
							</div>
						</fieldset> -->

						<!-- <fieldset><br>
							<div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Category Feature Image (Min Size: 1920 x 1000)</label>
								<div class="col-md-12"><input class="btn btn-success" name="mcat_cover" id="mcat_cover" type="file">
								</div>
								<label class="col-md-12 col-form-label" for="input-id-1"><br>Previously Selected Cover:</label>
								<div class="col-md-4">
									<a href="javascript: void(0)" onclick="popup('../images/Categories/Covers/<?php // echo $row22['mcat_cover']; ?>')"><img src="../images/Categories/Covers/<?php // echo $row22['mcat_cover']; ?>" width="50%" /></a>
								</div>
							</div>
						</fieldset> -->
						<input type="hidden" name="id" id="id" value="<?php echo $row22['id']; ?>" />
						<button class="form-group btn btn-main" type="submit">Update Category Post</button>

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