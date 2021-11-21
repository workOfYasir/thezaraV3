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
					<form method="post" enctype="multipart/form-data" action="createaction/add_portfolio.php">
						<input type="text" name="page_uniid" id="page_uniid" value="<?php echo md5(uniqid(mt_rand(), true)); ?>" hidden="Yes" />
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Service Name:</label>
								<div class="col-md-12">
									<input class="form-control" name="service_name" id="service_name" type="text">
								</div>
						</fieldset>

						<fieldset>
							<div class="form-group row col-md-12" >
								<div class="col-md-2" style="margin-bottom: 20px;" >
									<label class="col-form-label" for="input-id-4">Youtube:</label>
								</div>
								<div class="col-md-4" style="margin-bottom: 20px;"  >
									<select class="form-control" name="video_check" id="video_check" onchange="checkVideo(this);">
										<option value="Yes">Yes</option>
										<option value="No" selected>No</option>
									</select>
								</div>
								<div id="video" style="display: none;" >
									<div class="col-md-2" style="margin-bottom: 20px;">
										<label class="col-form-label" for="input-id-4">Youtube Video ID:</label>
									</div>
									<div class="col-md-4" style="margin-bottom: 20px;">
										<input class="form-control" name="v_embd" id="v_embd" type="text" placeholder="e.g, Yvfix0_DQ1c" value="">
									</div>
								</div>
								<form>
									
							
								<div class="col-md-2" style="margin-bottom: 20px;">
									<label class="col-form-label" for="input-id-4">Gallery:</label>
								</div>
								<div class="col-md-4" style="margin-bottom: 20px;">
									<select class="form-control" name="gallery_check" id="gallery_check" onchange="checkGallery(this);">
										<option class="evnt" value="Yes">Yes</option>
										<option class="evnt" value="No" selected>No</option>
									</select>
								</div>
								<div class="col-md-2" id="gallerySpace" style="margin-top: 50px;"></div>
								<div id="gallery" style="display: none;">
								
									<div class="col-md-2" style="margin-bottom: 20px;">
										<label class="col-form-label uploadGallery" for="input-id-4">Upload Images:</label>
									</div>
									<div class="col-md-4" style="margin-bottom: 20px;">
									<input class="form-control uploadGallery" id="portfolio_gallery" type="file" name="portfolio_gallery[]" multiple />
										
									</div>
								</div>
							</div>
						</fieldset>
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Publish Date</label>
								<div class="col-md-12">
									<input class="form-control" name="portfolio_date" id="portfolio_date" type="date">
								</div>
						</fieldset>
						<fieldset>
							<div class="row">
								<div class="col-md-12">
									<label class="col-form-label" for="input-id-4">Service Summary (Maximum 70 Characters Only)</label>
									<textarea type="text" class="form-control" name="portfilio_summary" id="portfilio_summary" maxlength="70" title="Only Alphanumeric" value="Type Alphanumeric Only" onkeydown="return alphaOnly(event);"></textarea>
								</div>
							</div><br>
						</fieldset>
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label">Service Body:</label>
								<div class="col-md-12"><textarea name="portfilio_body" id="portfilio_body" class="update_input ckeditor form-control" accept-charset="iso-8859-1"></textarea></div>
							</div>
						</fieldset>
						<fieldset>
							<div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Service Feature Image (Min Size: 1920 x 1000))</label>
								<div class="col-md-12"><input class="btn btn-success" name="portfolio_cover" id="portfolio_cover" type="file">
								</div>
							</div>
						</fieldset>
						<button class="form-group btn btn-main" type="submit">Add New Page</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script>
		function checkVideo(that) {
			if (that.value == "Yes") {
				document.getElementById("video").style.display = "block";
				document.getElementById("gallerySpace").style.display = "none";
			} else {
				document.getElementById("video").style.display = "none";
				document.getElementById("gallerySpace").style.display = "block";
			}	
		}	
		function checkGallery(that) {
			if (that.value == "Yes") {
					document.getElementById("gallery").style.display = "block";
			} else {
				document.getElementById("gallery").style.display = "none";
			}
		}
	if (document.getElementById("video_check").value == "Yes") {
			document.getElementById("video").style.display = "block";
			document.getElementById("gallerySpace").style.display = "block";
		} else if (document.getElementById("video_check").value == "No") {
			document.getElementById("video").style.display = "none";
			document.getElementById("gallerySpace").style.display = "none";
		} else if (document.getElementById("gallery_check").value == "Yes") {
			document.getElementById("gallery").style.display = "block";
		} else if (document.getElementById("gallery_check").value == "No") {	
			document.getElementById("gallery").style.display = "none";
		}
	


	</script>
	<!-- END Row -->
	<?php include("assets/includes/inc/Main-Footer.php"); ?>
	</body>

	</html>