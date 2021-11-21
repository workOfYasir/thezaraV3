<?php
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");
$pagename = 'Edit-Portfolio';
$container = 'Add-Item';
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php");
$id = $_GET['id'];
$result22 = mysqli_query($servercnx, "SELECT *
FROM portfolio_post as pp
INNER JOIN portfolio_images as pi
ON pi.portfolio_id = pp.id
Where pi.portfolio_id = $id");
$result = mysqli_query($servercnx, "SELECT *
FROM portfolio_post
Where id = $id");
$row22 = mysqli_fetch_array($result);
$id = $row22['id'];
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
					<h4><strong>Portfolio</strong> - Edit Portfolio </h4><span style="color:red"><b>Note: </b>You can only replace or change the gallery images but No of Inserted Images will be same </span>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">Edit New Portfolio</h2>
				</div>
				<div class="panel-body">
					<form method="POST" enctype="multipart/form-data" action="updateaction/update_portfolio.php">
						<input type="text" name="page_uniid" id="page_uniid" value="<?php echo md5(uniqid(mt_rand(), true)); ?>" hidden="Yes" />
						<input type="hidden" name="id" id="id" value="<?php echo $id ?>">
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Service Name:</label>
								<div class="col-md-12">
									<input class="form-control" value="<?php echo $row22['service_name']; ?>" name="service_name" id="service_name" type="text">
								</div>
						</fieldset>

						<fieldset>
							<div class="form-group row col-md-12">
								<div class="col-md-2" style="margin-bottom: 20px;">
									<label class="col-form-label" for="input-id-4">Youtube:</label>
								</div>
								<div class="col-md-4" style="margin-bottom: 20px;">
									<select class="form-control" name="video_check" id="video_check" onchange="checkVideo(this);">
										<option value="Yes" <?php if ($row22['video_check'] == "Yes") {
																echo "selected";
															} else {
																echo "";
															} ?>>Yes</option>
										<option value="No" <?php if ($row22['video_check'] == "No") {
																echo "selected";
															} else {
																echo "";
															} ?>>No</option>
									</select>
								</div>
								<div id="video">
									<div class="col-md-2" style="margin-bottom: 20px;">
										<label class="col-form-label" for="input-id-4">Youtube Video ID:</label>
									</div>
									<div class="col-md-4" style="margin-bottom: 20px;">
										<input class="form-control" name="v_embd" id="v_embd" type="text" value="<?php echo $row22['videoURL']; ?>">
									</div>
								</div>
								<div class="col-md-2" style="margin-bottom: 20px;">
									<label class="col-form-label" for="input-id-4">Gallery:</label>
								</div>
								<div class="col-md-4" style="margin-bottom: 20px;">
									<select class="form-control" name="gallery_check" id="gallery_check" onchange="checkGallery(this);">
										<option class="evnt" value="Yes" <?php if ($row22['gallery_check'] == 'Yes') {
																				echo "selected";
																			} else {
																				echo "";
																			} ?>>Yes</option>
										<option class="evnt" value="No" <?php if ($row22['gallery_check'] == 'No') {
																			echo "selected";
																		} else {
																			echo "";
																		} ?>>No</option>
									</select>
								</div>

								<div id="gallery">

									<div class="col-md-2" style="margin-bottom: 20px;">
										<label class="col-form-label uploadGallery" for="input-id-4">Upload Images:</label>
									</div>
									<div class="col-md-4" style="margin-bottom: 20px;">
										<input class="form-control uploadGallery" value="<?php $row22['service_name']; ?>" id="portfolio_gallery" type="file" name="portfolio_gallery[]" multiple />

									</div>
								</div>
							</div>

							<div class="row col-md-12" id="imgDiv" style="border:1px solid LightGray; margin-left:4px; padding:15px;margin-bottom: 10px; ">
								<div class="col-md-12 text-right"><a href="delete_portfolio_gallery.php?id=<?php echo $id ?>"><i class="far fa-times-circle" style="font-size: 20px;"></i></a></div>
								<?php
								while ($row = $result22->fetch_assoc()) {
									$imageURL = '../images/Portfolios/Gallery/' . $row["image_file"];
									echo $gid = $row['id'];
								?>
									<div class="selectedImg">
										<img src="<?php echo $imageURL; ?>" class="images" id="imgGallery" class="image" style="" alt="no gallery" multiple />
										<div class="middle">
											<div class="text">
												<a href="delete_selected_portfolio_img.php?id=<?php echo $gid ?>">
													<i class="far fa-times-circle" style="font-size: 20px;"></i>
												</a>
											</div>
										</div>
									</div>

								<?php } ?>

							</div>
						</fieldset>
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Publish Date</label>
								<div class="col-md-12">
									<input class="form-control" value="<?php echo $row22['portfolio_date']; ?>" name="portfolio_date" id="portfolio_date" type="date">
								</div>
						</fieldset>
						<fieldset>
							<div class="row">
								<div class="col-md-12">
									<label class="col-form-label" for="input-id-4">Service Summary (Maximum 70 Characters Only)</label>
									<textarea type="text" class="form-control" name="portfilio_summary" id="portfilio_summary" maxlength="70" title="Only Alphanumeric" value="Type Alphanumeric Only" onkeydown="return alphaOnly(event);"><?php echo $row22['portfilio_summary']; ?>"></textarea>
								</div>
							</div><br>
						</fieldset>
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label">Service Body:</label>
								<div class="col-md-12"><textarea name="portfilio_body" id="portfilio_body" class="update_input ckeditor form-control" accept-charset="iso-8859-1"><?php echo $row22['portfilio_body']; ?>></textarea></div>
							</div>
						</fieldset>
						<fieldset>
							<div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Service Feature Image (Min Size: 1920 x 1000))</label>
								<div class="col-md-12"><input class="btn btn-success" name="portfolio_cover" id="portfolio_cover" type="file">
									<img src="../images/Portfolios/Covers/<?php echo $row22['portfolio_cover'] ?>" width="299px" alt="no image">
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
		document.addEventListener("DOMContentLoaded", function(event) {
			document.querySelectorAll('img').forEach(function(img) {
				img.onerror = function() {
					this.style.display = 'none';
				};
			})
		});

		function checkVideo(that) {
			if (that.value == "Yes") {
				document.getElementById("video").style.display = "block";
			} else {
				document.getElementById("video").style.display = "none";

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
		} else if (document.getElementById("video_check").value == "No") {
			document.getElementById("video").style.display = "none";

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