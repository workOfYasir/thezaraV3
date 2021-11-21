<?php
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");
$pagename = 'View-Page';
$container = 'View-Item';
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
$result22 = mysqli_query($servercnx, "SELECT * FROM pages WHERE id = '$id'");
$row22 = mysqli_fetch_array($result22);
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
					<h4><strong>Page</strong> - Edit Page </h4>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">Edit "<?php echo $row22['page_title']; ?>"</h2>
				</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data" action="updateaction/update_page.php">
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Page Name:</label>
								<div class="col-md-12">
									<input class="form-control" name="page_title" id="page_title" type="text" value="<?php echo $row22['page_title']; ?>">
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
									<input class="form-control" name="page_url" id="page_url" type="text" placeholder="Enter URL" value="<?php echo $row22['page_url']; ?>">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Robots:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="robots" id="robots" type="text" value="index, follow" placeholder="Enter Robots" value="<?php echo $row22['robots']; ?>">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Position:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="page_position" id="page_position" type="text" placeholder="Enter Position e.g, 1,2,3,4" value="<?php echo $row22['page_position']; ?>">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Show in Header:</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="show_header" id="show_header" required>
										<option disabled <?php if ($row22['show_header'] == '') {
																echo "selected='selected'";
															} ?>>--Select Option--</option>
										<option value="Yes" <?php if ($row22['show_header'] == 'Yes') {
																echo "selected='selected'";
															} ?>>Yes</option>
										<option value="No" <?php if ($row22['show_header'] == 'No') {
																echo "selected='selected'";
															} ?>>No</option>
									</select>
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Show in Footer:</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="show_footer" id="show_footer" required>
										<option disabled <?php if ($row22['show_footer'] == '') {
																echo "selected='selected'";
															} ?>>--Select Option--</option>
										<option value="Yes" <?php if ($row22['show_footer'] == 'Yes') {
																echo "selected='selected'";
															} ?>>Yes</option>
										<option value="No" <?php if ($row22['show_footer'] == 'No') {
																echo "selected='selected'";
															} ?>>No</option>
									</select>
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Status:</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="page_status" id="page_status">
										<option value="Active" <?php if ($row22['page_status'] == 'Active') {
																	echo "selected='selected'";
																} ?>>Active</option>
										<option value="Not Active" <?php if ($row22['page_status'] == 'Not Active') {
																		echo "selected='selected'";
																	} ?>>Not Active</option>
									</select>
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Youtube Video ID:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="v_embd" id="v_embd" type="text" placeholder="e.g, Yvfix0_DQ1c" value="<?php echo $row22['v_embd']; ?>">
								</div>
								<div class="col-md-2">
									<label for="col-form-label">Parent Category</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="is_parent" id="parent_cat" onchange="yesnoCheck(this);" required style="width: 100%;">
										<option value="Yes" <?php if ($row22['is_parent'] == 'Yes') {
																echo "selected='selected'";
															} ?>>Yes</option>
										<option value="No" <?php if ($row22['is_parent'] == 'No') {
																echo "selected='selected'";
															} ?>>No</option>
									</select>
								</div>
								<div class="col-md-2">
									<label for="col-form-label">Any Sub Cats</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="is_scat" id="is_scat" required onchange="yesNoCheck(this);" style="width: 100%;">

										<option value="Yes" <?php if ($row22['is_scat'] == 'Yes') {
																echo "selected='selected'";
															} ?>>Yes</option>
										<option value="No" <?php if ($row22['is_scat'] == 'No') {
																echo "selected='selected'";
															} ?>>No</option>
									</select>
								</div>
								<div id="page_category" style="display: none;">
								<div class="col-md-2">
									<label class="col-form-label">Category:</label>
								</div>
								<div class="col-md-4">
								
										<select class="form-control" name="page_category" required style="width: 100%;">

											<?php
											include("assets/includes/inc/config.php");
											$maincat = mysqli_query($servercnx, "SELECT * FROM pages WHERE is_parent = 'Yes' AND is_scat = 'Yes'");
											?>
											<option value="No" selected>-----Select------</option>

											<?php while ($mcatq = mysqli_fetch_array($maincat)) {	?>
												<?php  ?>
												<option value="<?php echo $mcatq['id']; ?>" <?php
																							if ($row22['page_category'] == $mcatq['id']) {
																								echo 'selected';
																							} ?>><?php echo $mcatq['page_title']; ?></option>
											<?php } ?>

										</select>
									</div>
								</div>
							</div>
						</fieldset>
						<fieldset>
							<div class="row">
								<div class="col-md-12">
									<label class="col-form-label" for="input-id-4">Page Summary (Maximum 170 Characters Only)</label>
									<textarea type="text" class="form-control" name="page_summary" id="page_summary" maxlength="170" title="Only Alphanumeric" value="Type Alphanumeric Only" onkeydown="return alphaOnly(event);"><?php echo $row22['page_summary']; ?></textarea>
								</div>
							</div><br>
						</fieldset>
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label">Page Body:</label>
								<div class="col-md-12"><textarea name="page_body" id="page_body" class="update_input ckeditor form-control" accept-charset="iso-8859-1"><?php echo $row22['page_body']; ?></textarea></div>
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
							<div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Page Feature Image (Min Size: 1920 x 900)</label>
								<div class="col-md-12"><input class="btn btn-success" name="page_cover" id="page_cover" type="file">
								</div>
								<label class="col-md-12 col-form-label" for="input-id-1"><br>Previously Selected Cover:</label>
								<div class="col-md-4">
									<a href="javascript: void(0)" onclick="popup('../images/Pages/Covers/<?php echo $row22['page_cover']; ?>')"><img src="../images/Pages/Covers/<?php echo $row22['page_cover']; ?>" width="70%" /></a>
								</div>
							</div>
						</fieldset> 
						<input type="hidden" name="id" id="id" value="<?php echo $row22['id']; ?>" />
						<button class="form-group btn btn-main" type="submit">Update Page</button>

					</form>
					<br>
					<!--<form id="page_Gallery" name="page_Gallery" method="post" enctype="multipart/form-data" action="upload_page_multiimages.php">
						<input type="text" name="page_id" id="page_id" value="<?php // echo $row22['id']; ?>" hidden="Yes" />
						</fieldset>
						<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1"><?php // echo $row22['page_title']; ?> Gallery (Min Size: 500px Width)</label>
							<div class="col-md-12">
								<input class="form-group btn btn-success" name="gallery_images[]" max-size="44000" id="gallery_images" type="file" multiple="multiple">
								 <input class="form-group btn btn-success" id="portfolio_gallery" type="file" name="portfolio_gallery[]" multiple /> 
							</div>
						</div>
						<fieldset>
							<fieldset>
								<button class="form-group btn btn-success" type="submit">Upload Images To Gallery</button>
							</fieldset>
					</form><br>
					<fieldset>
						<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1"><?php // echo $row22['page_title']; ?> Image Gallery</label></div>
						<?php
					 //	include("assets/includes/inc/config.php");
					//	$GalleyImages = mysqli_query($servercnx, "SELECT * FROM page_images WHERE page_id = '$id' ORDER BY created_at DESC");
					//	while ($Images = mysqli_fetch_array($GalleyImages)) { ?>
							<div class="col-md-3">
								<hr>
								<a href="javascript: void(0)" onclick="popup('../<?php // echo $row22['gallery_path'] . $Images['image_file']; ?>')"><img src="../<?php // echo $row22['gallery_path'] . $Images['image_file']; ?>" width="244" /></a>
								<a style="margin-top: 5px;" class="btn btn-danger" href="delete_page_multiimages.php?id=<?php // echo $Images['id']; ?>&gallery_path=../<?php // echo $row22['gallery_path']; ?>" onClick="return confirm('Are You sure ? You want to delete !');">Delete Image</a>
								<hr>


								<form method="post" class="form-horizontal" enctype="multipart/form-data" action="updateaction/update_page_gposition.php">
									<div class="form-group">
										<input type="hidden" name="id" value="<?php // echo $Images['id']; ?>">
										<input type="hidden" name="page" value="<?php // echo $row22['id']; ?>">

										<div class="col-sm-4">
											<?php ?>
											<input type="text" name="position" class="form-control" id="position" value="<?php // echo $Images['gallery_img_pos']; ?>">
											<?php  ?>
										</div>
										<button type="submit" class="btn btn-default">Update Position</button>
									</div>
								</form>
								<hr>
							</div>
						<?php // } ?>
					</fieldset>-->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Page Gallery
</button>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gallery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form id="submitForm" method="post">
        <p>
		<input type="text" name="page_id" id="page_id" value="<?php  echo $row22['id']; ?>" hidden="Yes" />
		<!-- <input type="text" name="cate_id" id="cate_id" value="<?php  // echo $row22['blog_category']; ?>" hidden="Yes" /> -->
		<input type="file" class="custom-file-input" name="image" id="image">
            <label class="custom-file-label" for="image">Choose Image to Upload</label>
        </p>  </form>
		<?php
					 	include("assets/includes/inc/config.php");
						$GalleyImages = mysqli_query($servercnx, "SELECT * FROM page_images WHERE page_id = '$id' ORDER BY created_at DESC");
						while ($Images = mysqli_fetch_array($GalleyImages)) { ?>
							<div class="col-md-3">
								<hr>
								<a href="javascript: void(0)" onclick="popup('../<?php  echo $row22['gallery_path'] . $Images['image_file']; ?>')"><img src="../<?php  echo $row22['gallery_path'] . $Images['image_file']; ?>" width="205" height="160"  /></a>
								<a style="margin-top: 5px;" class="btn btn-danger" href="delete_page_multiimages.php?id=<?php  echo $Images['id']; ?>&gallery_path=../<?php  echo $row22['gallery_path']; ?>" onClick="return confirm('Are You sure ? You want to delete !');"><i class="fa fa-trash"></i></a>
								<hr>


								<form method="post" class="form-horizontal" enctype="multipart/form-data" action="updateaction/update_page_gposition.php">
									<div class="form-group">
										<input type="hidden" name="id" value="<?php  echo $Images['id']; ?>">
										<input type="hidden" name="page" value="<?php  echo $row22['id']; ?>">

										<label class="control-label col-sm-4" for="position">Position:</label>
					
					<div class="col-sm-5">
					<?php ?>
					<input type="text" name="position" class="form-control" id="position" value="<?php echo $Images['gallery_img_pos'];?>" >
					<?php  ?>
					</div>								
					<button type="submit" class="btn btn-default"  >
					<i class="fa fa-paper-plane" ></i></button>
									</div>
								</form>
								<hr>
							</div>
						<?php  } ?>
	

	  <div class="row">
   <div class="col-md-4"></div>  
      <div class="card col-md-4" id="preview" style="display: none;">
      <div class="card-body" id="imageView">
               
      </div>
   </div>    
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="refreshPage()"  class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
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
		$("#submitForm").on("change", function(){
      var formData = new FormData(this);
      $.ajax({
         url  : "upload_page_gallery.php",
         type : "POST",
         cache: false,
         contentType : false, // you can also use multipart/form-data replace of false
         processData: false,
         data: formData,
         success:function(response){
        //   $("#preview").show();
        //   $("#imageView").html(response);
        //   $("#image").val('');
          alert("Image uploaded Successfully");
         }
      });
   });

 
function refreshPage(){
    window.location.reload();
} 
	</script>
	<?php include("assets/includes/inc/Main-Footer.php"); ?>
	</body>
	<script>
		function yesnoCheck(that) {
			if (that.value == "No") {

				document.getElementById("page_category").style.display = "block";
			} else {
				document.getElementById("page_category").style.display = "none";
			}
		}
	</script>

	</html>