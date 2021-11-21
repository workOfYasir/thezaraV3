<?php
include("assets/includes/controller.php");
$pagename = 'Add-Blog';
$container = 'Add-Item';
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/config.php");
include("assets/includes/inc/editor.php");
?>
<!-- Page Content -->
<div id="page-content" class="gray-bg">

	<!-- Title Header -->
	<div class="title-header white-bg">
		<i class="fa fa-align-justify"></i>
		<h2>Blog</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				Blog
			</li>
		</ol>
	</div>
	<!-- END Title Header -->

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel">
				<div class="panel-body">
					<h4><strong>Blog</strong> - Add Blog </h4>
				</div>
			</div>
		</div>
	</div>
	<?php
	if (isset($_GET['DuplicatedDate'])) {
		$Duplicated = " This Date is already Added in Record ";
	?><div class="alert alert-danger alert-dismissible" id="success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<strong>Duplicated Value ! </strong> <?php echo $Duplicated; ?>
		</div>
	<?php
	} else if (isset($_GET['DataEncounterd'])) {
		$Encounter = "Error encountered while adding user data ";
	?><div class="alert alert-danger alert-dismissible" id="success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<strong>Error ! </strong><?php echo $Encounter; ?>
		</div><?php
			} else if (isset($_GET['Success'])) {
				$SuccessM = "Data inserted successfully ";
				?><div class="alert alert-success alert-dismissible" id="success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<strong>Success ! </strong><?php echo $SuccessM; ?>
		</div>
		
	<?php
			} else if (isset($_GET['fewfilled'])) {
				$fillFields = "Please Fill All Fields ";
	?><div class="alert alert-danger alert-dismissible" id="success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<strong>Error ! </strong><?php echo $fillFields; ?>
		</div><?php
			}
				?>
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">Add New Blog</h2>
				</div>
				<div class="panel-body">
					<?php $lastId = "SELECT `id`, `blog_date` FROM `blog_post` ORDER BY `id` DESC LIMIT 1;";
					$result = mysqli_query($servercnx, $lastId);
					$row = mysqli_fetch_array($result);
					?>
					<h3>Last Added Blog Date - <?php
												$lastAddedDate = $row['blog_date'];
												$lastDate = strtotime($lastAddedDate);
												echo date("F / d / Y", $lastDate);
												?>
					</h3>
					<hr />
					<form method="post" enctype="multipart/form-data" action="createaction/add_blog.php">
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Blog Title: (Maximum 30 Characters Including Space)</label>
								<div class="col-md-12">
									<input class="form-control" name="blog_title" id="blog_title" maxlength="30" type="text">
								</div>
						</fieldset>
						<fieldset>
							<div class="form-group row col-md-12">
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">SEO Title:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="seo_title" id="seo_title" type="text" placeholder="Enter Title">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">SEO Keywords:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="seo_keywords" id="seo_keywords" type="text" placeholder="Enter Keywords">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">SEO Description:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="seo_description" id="seo_description" type="text" placeholder="Enter Description">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">URL:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="blog_url" id="blog_url" type="text" placeholder="Enter Blog URL">
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
									<select class="form-control" name="blog_status" id="blog_status">
										<option value="Active" selected>Active</option>
										<option value="Not Active">Not Active</option>
									</select>
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Up Coming Event:</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="blog_event" id="blog_event" onchange="yesnoCheck(this);">
										<option value="Yes">Yes</option>
										<option value="No" selected>No</option>
									</select>
								</div>
								<div id="event_check" style="display: none;">
									<div class="col-md-2">
										<label class="col-form-label" for="input-id-4">Start & End Time:</label>
									</div>
									<div class="col-md-2">
										<input type="time" class="form-control" name="event_start" id="event_start">
									</div>
									<div class="col-md-2">
										<input type="time" class="form-control" name="event_end" id="event_end">
									</div>
								</div>
							</div>
						</fieldset>
						<fieldset>
							<div class="form-group row"><label class="col-md-1 col-form-label">Category:</label>
								<div class="col-md-5">
									<select class="form-control select_group" name="blog_category" id="blog_category" required style="width: 100%;">
										<option disabled selected>--Select Here--</option>
										<?php
										include("assets/includes/inc/config.php");
										$mainpageap = mysqli_query($servercnx, "SELECT * FROM pages WHERE is_parent OR is_scat = 'No' AND page_category = '14' ORDER BY page_title ASC");
										while ($mainrowap = mysqli_fetch_array($mainpageap)) { ?>
											<option value="<?php echo $mainrowap['id']; ?>"><?php echo $mainrowap['page_title']; ?></option>
										<?php } ?>
									</select>
								</div>
								<label class="col-md-2 col-form-label" for="input-id-1">Post Date</label>
								<div class="col-md-3">
									<input class="form-control" name="blog_date" id="blog_date" type="date">
							</div>
						</fieldset>

						<fieldset>
							<div class="row">
								<div class="col-md-12">
									<label class="col-form-label" for="input-id-4">Summary (Maximum 100 Characters Only)</label>
									<textarea type="text" class="form-control" name="blog_summary" id="blog_summary" maxlength="100" title="Only Alphanumeric" value="Type Alphanumeric Only" onkeydown="return alphaOnly(event);"></textarea>
								</div>
							</div><br>
						</fieldset>
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label">Body:</label>
								<div class="col-md-12"><textarea name="blog_body" id="blog_body" class="update_input ckeditor form-control" accept-charset="iso-8859-1"></textarea></div>
							</div>
						</fieldset>

						<fieldset>
							<div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Blog Feature Image (Min Size: 1349 x 500)</label>
								<div class="col-md-12"><input class="btn btn-success" name="blog_cover" id="blog_cover" type="file">
								</div>
							</div>
						</fieldset>
						<button class="form-group btn btn-main" type="submit">Add Post</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		function yesnoCheck(that) {
			if (that.value == "Yes") {
				
				document.getElementById("event_check").style.display = "block";
			} else {
				document.getElementById("event_check").style.display = "none";
			}
		}
	</script>
	<!-- END Row -->
	<?php include("assets/includes/inc/Main-Footer.php"); ?>
	</body>

	</html>