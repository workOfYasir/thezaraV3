<?php
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");
$pagename = 'View-Blog';
$container = 'View-Item';
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
$result22 = mysqli_query($servercnx, "SELECT * FROM blog_post WHERE id = '$id'");
$row22 = mysqli_fetch_array($result22);
$id = $row22['id'];
$blog_uniid = $row22['blog_uniid'];
$result23 = mysqli_query($servercnx, "SELECT * FROM blog_images WHERE blog_id = '$id'");

?>

<!-- Page Content -->
<div id="page-content" class="gray-bg">

	<!-- Title Header -->
	<div class="title-header white-bg">
		<i class="fa fa-align-justify"></i>
		<h2>Blog </h2>
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
					<h4><strong>Blog</strong> - Edit Blog </h4>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">Edit "<?php echo $row22['blog_title']; ?>"</h2>
				</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data" action="updateaction/update_blog.php">
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Blog Title: (Maximum 30 Characters Including Space)</label>
								<div class="col-md-12">
									<input class="form-control" name="blog_title" id="blog_title" type="text" maxlength="30" value="<?php echo $row22['blog_title']; ?>">
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
									<input class="form-control" name="blog_url" id="blog_url" type="text" placeholder="Enter Blog URL" value="<?php echo $row22['blog_url']; ?>">
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
									<select class="form-control" name="blog_status" id="blog_status">
										<option value="Active" <?php if ($row22['blog_status'] == 'Active') {
																	echo "selected='selected'";
																} ?>>Active</option>
										<option value="Not Active" <?php if ($row22['blog_status'] == 'Not Active') {
																		echo "selected='selected'";
																	} ?>>Not Active</option>
									</select>
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Event:</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" onclick="yesnoCheck(this); " name="blog_event" id="blog_event">
										<option value="Yes" <?php if ($row22['blog_event'] == "Yes") {
																echo "selected";
															} ?>>Yes</option>
										<option value="No" <?php if ($row22['blog_event'] == "No") {
																echo "selected";
															} ?>>No</option>
									</select>
								</div>
								<div id="event_check" style="display: none;">
									<div class="col-md-2">
										<label class="col-form-label" for="input-id-4">Start & End Time:</label>
									</div>
									<div class="col-md-2">
										<input type="time" value="<?php echo $row22['event_start']; ?>" class="form-control" name="event_start" id="event_start">
									</div>

									<div class="col-md-2">
										<input type="time" value="<?php echo $row22['event_end']; ?>" class="form-control" name="event_end" id="event_end">
									</div>
								</div>
							</div>
						</fieldset>
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label">Category:</label>
								<div class="col-md-12">
								<select class="form-control select_group" name="blog_category" id="blog_category" required style="width: 100%;">
										<option disabled selected>--Select Here--</option>
										<?php
										include("assets/includes/inc/config.php");
										$mainpageap = mysqli_query($servercnx, "SELECT * FROM pages WHERE is_parent = 'No' AND is_scat = 'No' AND page_category = '14' ORDER BY page_title ASC");
										while ($mainrowap = mysqli_fetch_array($mainpageap)) { ?>
											<option value="<?php echo $mainrowap['id']; ?>" <?php 
											if ($row22['blog_category'] == $mainrowap['id']) {	echo 'selected';} ?>><?php echo $mainrowap['page_title']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</fieldset>
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Publish Date</label>
								<div class="col-md-12">
									<input class="form-control" name="blog_date" id="blog_date" type="date" value="<?php echo date("Y-m-d", strtotime($row22['blog_date'])); ?>">
								</div>
						</fieldset>
						<fieldset>
							<div class="row">
								<div class="col-md-12">
									<label class="col-form-label" for="input-id-4">Summary Max 170</label>
									<textarea type="text" class="form-control" name="blog_summary" id="blog_summary" maxlength="170" title="Only Alphanumeric" value="Type Alphanumeric Only" onkeydown="return alphaOnly(event);"><?php echo $row22['blog_summary']; ?></textarea>
								</div>
							</div><br>
						</fieldset>
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label">Blog Body:</label>
								<div class="col-md-12"><textarea name="blog_body" id="blog_body" class="update_input ckeditor form-control" accept-charset="iso-8859-1"><?php echo $row22['blog_body']; ?></textarea></div>
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
							<div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Blog Feature Image (Min Size: 1349 x 500)</label>
								<div class="col-md-12"><input class="btn btn-success" name="blog_cover" id="blog_cover" type="file">
								</div>
								<label class="col-md-12 col-form-label" for="input-id-1"><br>Previously Selected Cover:</label>
								<div class="col-md-4">
									<a href="javascript: void(0)" onclick="popup('../images/Blogs/Covers/<?php echo $row22['blog_cover']; ?>')"><img src="../images/Blogs/Covers/<?php echo $row22['blog_cover']; ?>" width="70%"  /></a>
								</div>
							</div>
						</fieldset>
						<input type="hidden" name="id" id="id" value="<?php echo $row22['id']; ?>" />
						<input type="hidden" name="blog_uniid" id="blog_uniid" value="<?php echo $row22['blog_uniid']; ?>" />
						<button class="form-group btn btn-main" type="submit">Update Blog Post</button>
					</form>
					<br>
					<!-- <form id="Blog_Gallery" name="Blog_Gallery" method="post" enctype="multipart/form-data" action="upload_blog_multiimages.php">
						<input type="text" name="cate_id" id="cate_id" value="<?php // echo $row22['blog_category']; ?>" hidden="Yes" />
						<input type="text" name="blog_id" id="blog_id" value="<?php // echo $row22['id']; ?>" hidden="Yes" />
						</fieldset>
						<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1"><?php // echo $row22['blog_title']; ?> Gallery (Min Size: 500px Width)</label>
							<div class="col-md-12"><input class="form-group btn btn-success" name="gallery_images[]" id="gallery_images" type="file" multiple="multiple"></div>
						</div>
						<fieldset>
							<fieldset>
								<button class="form-group btn btn-success" type="submit">Upload Images To Gallery</button>
							</fieldset>
					</form><br>
	
						<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1"><?php // echo $row22['blog_title']; ?> Image Gallery</label></div>-->
						<?php
						// include("assets/includes/inc/config.php");
						// $GalleyImages = mysqli_query($servercnx, "SELECT * FROM blog_images WHERE blog_id = '$id' ORDER BY id ASC");
						
						// while ($Images = mysqli_fetch_array($GalleyImages)   ) { ?>
							<!-- <div class="col-md-3">
								<hr>
								<a href="javascript: void(0)" onclick="popup('../<?php // echo $row22['gallery_path'] . $Images['image_file']; ?>')"><img src="../<?php // echo $row22['gallery_path'] . $Images['image_file']; ?>" width="205" height="160" /></a>
								<a style="margin-top: 5px;" class="btn btn-default" href="delete_blog_multiimages.php?id=<?php // echo $Images['id']; ?>&gallery_path=../<?php // echo $row22['gallery_path']; ?>" onClick="return confirm('Are You sure ? You want to delete !');"><i class="fa fa-trash"></i></a>
								
								 <a class="btn btn-default" href="Edit-blog-Gallery.php?id=<?php //echo $Images['id']; ?>"><i class="fa fa-edit"></i></a> 

								<hr>


								<form method="post"  class="form-horizontal"  enctype="multipart/form-data" action="updateaction/update_blog_gposition.php">
								<div class="form-group" >
								<input type="hidden" name="id" value="<?php // echo  $Images['id'];?>">
								<input type="hidden" name="blog" value="<?php // echo $row22['id']; ?>">

									<label class="control-label col-sm-3" for="position">Position:</label>
					
									<div class="col-sm-4">
									<?php ?>
									<input type="text" name="position" class="form-control" id="position" value="<?php // echo $Images['gallery_img_pos'];?>" >
									<?php  ?>
									</div>								
									<button type="submit" class="btn btn-default"  >
									<i class="fa fa-paper-plane" ></i></button>
								</div>
								</form>
								<hr>
							</div> -->
						<?php // } ?>
					<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Blog Gallery
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
		<input type="text" name="blog_id" id="blog_id" value="<?php  echo $row22['id']; ?>" hidden="Yes" />
		<input type="text" name="cate_id" id="cate_id" value="<?php  echo $row22['blog_category']; ?>" hidden="Yes" />
		<input type="file" class="custom-file-input" name="image" id="image">
            <label class="custom-file-label" for="image">Choose Image to Upload</label>
        </p>   </form>
		<?php
						 include("assets/includes/inc/config.php");
						 $GalleyImages = mysqli_query($servercnx, "SELECT * FROM blog_images WHERE blog_id = '$id' ORDER BY id ASC");
						
						 while ($Images = mysqli_fetch_assoc($GalleyImages)) { ?>
							 <div class="col-md-3">
								<hr>
								<a href="javascript: void(0)" onclick="popup('../<?php  echo $row22['gallery_path'] . $Images['image_file']; ?>')"><img src="../<?php  echo $row22['gallery_path'] . $Images['image_file']; ?>" width="205" height="160" /></a>
								<a style="margin-top: 5px;" class="btn btn-default" href="delete_blog_multiimages.php?id=<?php  echo $Images['id']; ?>&gallery_path=../<?php  echo $row22['gallery_path']; ?>" onClick="return confirm('Are You sure ? You want to delete !');"><i class="fa fa-trash"></i></a>
								
								

								<hr>


								<form method="post"  class="form-horizontal"  enctype="multipart/form-data" action="updateaction/update_blog_gposition.php">
								<div class="form-group" >
								<input type="hidden" name="id" value="<?php  echo  $Images['id'];?>">
								<input type="hidden" name="blog" value="<?php  echo $row22['id']; ?>">

									<label class="control-label col-sm-4" for="position">Position:</label>
					
									<div class="col-sm-5">
									<?php ?>
									<input type="text" name="position" class="form-control" id="position" value="<?php  echo $Images['gallery_img_pos'];?>" >
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

		function yesnoCheck(that) {
			if (that.value == "No") {
				//   alert("check");
				document.getElementById("event_check").style.display = "none";
			} else {
				document.getElementById("event_check").style.display = "block";
			}
		}

		if (document.getElementById("blog_event").value == "Yes") {
			document.getElementById("event_check").style.display = "block";
		} else if (document.getElementById("blog_event").value == "No") {
			document.getElementById("event_check").style.display = "none";
		}
		$(document).ready(function(){
   $("#submitForm").on("change", function(){
      var formData = new FormData(this);
      $.ajax({
         url  : "upload_blog_gallery.php",
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
});
 
function refreshPage(){
    window.location.reload();
} 
	</script>


	<?php include("assets/includes/inc/Main-Footer.php"); ?>
	</body>

	</html>