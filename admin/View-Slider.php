<?php 
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");
$pagename = 'View-Slider';
$container = 'View-Item'; 
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php");
?> 
<!-- Page Content -->
<div id="page-content" class="gray-bg">

<!-- Title Header -->
<div class="title-header white-bg">
	<i class="fa fa-file-image"></i>
	<h2>Slider</h2>
	<ol class="breadcrumb">
		<li>
		<a href="index.php">Home</a>
		</li>
		<li class="active">
		Slider
		</li>
	</ol>
</div>
<!-- END Title Header -->

<div class="row">                                     
<div class="col-sm-12 col-md-12">
<div class="panel">
<div class="panel-body">
<h4><strong>Top Text</strong> - Edit Home Page Slider </h4>
</div>
</div>
</div>                                     
</div>

<div class="row">                    
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="panel">
			<div class="panel-heading">
			<h2 class="panel-title">Edit Text</h2>
			</div>
			<div class="panel-body">
				<?php 
				$result22 = mysqli_query($servercnx,"SELECT * FROM slider WHERE id = 1");
				$slide1 = mysqli_fetch_array($result22);
				?>
				<form method="post" enctype="multipart/form-data" action="updateaction/update_slider.php">

					<fieldset>
					<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Slide One Title:</label>
						<div class="col-md-12">
						<input class="form-control" name="slider_tagline" id="slider_tagline" type="text" value="<?php echo $slide1['slider_tagline'];?>"> 
						</div>
					</div>
					</fieldset>

					<fieldset>
					<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Slide One Text:</label>
						<div class="col-md-12">
						<input class="form-control" name="slider_headline" id="slider_headline" type="text" value="<?php echo $slide1['slider_headline'];?>"> 
						</div>
					</div>
					</fieldset>

					<fieldset>
					   <div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Slide Image (Min Size: 1920 x 1280)</label>
						<div class="col-md-12"><input class="btn btn-success" name="slider_cover" id="slider_cover" type="file">
						</div>
						<label class="col-md-12 col-form-label" for="input-id-1"><br>Previously Selected Image:</label>
						<div class="col-md-4">
						<a href="javascript: void(0)" onclick="popup('../images/Slider/<?php echo $slide1['slider_cover'];?>')"><img src="../images/Slider/<?php echo $slide1['slider_cover'];?>" width="300" height="200" /></a>
						</div>
                       </div>
					</fieldset>

					<input type="hidden" name="id" id="id" value="<?php echo $slide1['id'];?>" />
					<button class="form-group btn btn-main" type="submit">Update Line One</button>
				</form>
<br>
				<?php 
				$result22 = mysqli_query($servercnx,"SELECT * FROM slider WHERE id = 2");
				$slide2 = mysqli_fetch_array($result22);
				?>
				<form method="post" enctype="multipart/form-data" action="updateaction/update_slider.php">
					<fieldset>
					<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Slide One Title:</label>
						<div class="col-md-12">
						<input class="form-control" name="slider_tagline" id="slider_tagline" type="text" value="<?php echo $slide2['slider_tagline'];?>"> 
						</div>
					</div>
					</fieldset>

					<fieldset>
					<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Slide One Text:</label>
						<div class="col-md-12">
						<input class="form-control" name="slider_headline" id="slider_headline" type="text" value="<?php echo $slide2['slider_headline'];?>"> 
						</div>
					</div>
					</fieldset>

					<fieldset>
					   <div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Slide Image (Min Size: 1920 x 1280)</label>
						<div class="col-md-12"><input class="btn btn-success" name="slider_cover" id="slider_cover" type="file">
						</div>
						<label class="col-md-12 col-form-label" for="input-id-1"><br>Previously Selected Image:</label>
						<div class="col-md-4">
						<a href="javascript: void(0)" onclick="popup('../images/Slider/<?php echo $slide2['slider_cover'];?>')"><img src="../images/Slider/<?php echo $slide2['slider_cover'];?>" width="300" height="200" /></a>
						</div>
                       </div>
					</fieldset>

					<input type="hidden" name="id" id="id" value="<?php echo $slide2['id'];?>" />
					<button class="form-group btn btn-main" type="submit">Update Line Two</button>
				</form>
				<br>
				<?php 
				$result22 = mysqli_query($servercnx,"SELECT * FROM slider WHERE id = 3");
				$slide3 = mysqli_fetch_array($result22);
				?>
				<form method="post" enctype="multipart/form-data" action="updateaction/update_slider.php">
					<fieldset>
					<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Slide One Title:</label>
						<div class="col-md-12">
						<input class="form-control" name="slider_tagline" id="slider_tagline" type="text" value="<?php echo $slide3['slider_tagline'];?>"> 
						</div>
					</div>
					</fieldset>

					<fieldset>
					<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Slide One Text:</label>
						<div class="col-md-12">
						<input class="form-control" name="slider_headline" id="slider_headline" type="text" value="<?php echo $slide3['slider_headline'];?>"> 
						</div>
					</div>
					</fieldset>

					<fieldset>
					   <div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Slide Image (Min Size: 1920 x 1280)</label>
						<div class="col-md-12"><input class="btn btn-success" name="slider_cover" id="slider_cover" type="file">
						</div>
						<label class="col-md-12 col-form-label" for="input-id-1"><br>Previously Selected Image:</label>
						<div class="col-md-4">
						<a href="javascript: void(0)" onclick="popup('../images/Slider/<?php echo $slide3['slider_cover'];?>')"><img src="../images/Slider/<?php echo $slide3['slider_cover'];?>" width="300" height="200" /></a>
						</div>
                       </div>
					</fieldset>

					<input type="hidden" name="id" id="id" value="<?php echo $slide3['id'];?>" />
					<button class="form-group btn btn-main" type="submit">Update Line Three</button>
				</form>
			</div>
		</div>                    
	</div>
</div>
<!-- END Row --> 
<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>