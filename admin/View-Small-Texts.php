<?php 
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");
$pagename = 'View-Small-Texts';
$container = 'View-Item'; 
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php"); 
$result22 = mysqli_query($servercnx,"SELECT * FROM small_texts");
$row22 = mysqli_fetch_array($result22);
$id = $row22['id'];
?> 
<!-- Page Content -->
<div id="page-content" class="gray-bg">

<!-- Title Header -->
<div class="title-header white-bg">
	<i class="fa fa-rocket"></i>
	<h2>Home Small Texts</h2>
	<ol class="breadcrumb">
		<li>
		<a href="index.php">Home</a>
		</li>
		<li class="active">
		Home Small Texts
		</li>
	</ol>
</div>
<!-- END Title Header -->

<div class="row">                    
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="panel">
			<div class="panel-heading">
			<h2 class="panel-title">Edit Text Content</h2>
			</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data" action="updateaction/update_small_texts.php">


					<fieldset>
						<h2><b>Home Videos</b></h2>
							<div class="col-md-2">
							<label class="col-form-label" for="input-id-1">Image Link:</label>
							</div>
							<div class="col-md-4">
							<input class="form-control" name="home_v_title" id="home_v_title" type="text" value="<?php echo $row22['home_v_title'];?>" > 
							</div>
							<div class="col-md-2">
							<label class="col-form-label" for="input-id-1">Video ID:</label>
							</div>
							<div class="col-md-4">
							<input class="form-control" name="home_v_link" id="home_v_link" type="text" value="<?php echo $row22['home_v_link'];?>" placeholder="i.r Yvfix0_DQ1c" > 
							</div>
							<div class="col-md-2">
							<label class="col-form-label" for="input-id-1">Image Link:</label>
							</div>
							<div class="col-md-4">
							<input class="form-control" name="home_v_title2" id="home_v_title2" type="text" value="<?php echo $row22['home_v_title2'];?>" > 
							</div>
							<div class="col-md-2">
							<label class="col-form-label" for="input-id-1">Video ID:</label>
							</div>
							<div class="col-md-4">
							<input class="form-control" name="home_v_link2" id="home_v_link2" type="text" value="<?php echo $row22['home_v_link2'];?>" placeholder="i.r Yvfix0_DQ1c" > 
							</div>
					</fieldset>

					<hr>

					<fieldset>
						<h2><b>Common Titles</b></h2>
						<div class="form-group row col-md-12">
							
							<div class="col-md-4">
							<input class="form-control" name="title9" id="title9" type="text" value="<?php echo $row22['title9'];?>">
							</div>

							<div class="col-md-4">
							<input class="form-control" name="title10" id="title10" type="text" value="<?php echo $row22['title10'];?>" > 
							</div>
							
							<div class="col-md-4">
							<input class="form-control" name="title1" id="title1" type="text" value="<?php echo $row22['title1'];?>">
							</div>

							<div class="col-md-4">
							<input class="form-control" name="title2" id="title2" type="text" value="<?php echo $row22['title2'];?>" > 
							</div>
							
							<div class="col-md-4">
							<input class="form-control" name="title3" id="title3" type="text" value="<?php echo $row22['title3'];?>">
							</div>

							<div class="col-md-4">
							<input class="form-control" name="title4" id="title4" type="text" value="<?php echo $row22['title4'];?>" > 
							</div>
							
							<div class="col-md-4">
							<input class="form-control" name="title5" id="title5" type="text" value="<?php echo $row22['title5'];?>">
							</div>

							<div class="col-md-4">
							<input class="form-control" name="title6" id="title6" type="text" value="<?php echo $row22['title6'];?>" > 
							</div>
							
							<div class="col-md-4">
							<input class="form-control" name="title7" id="title7" type="text" value="<?php echo $row22['title7'];?>">
							</div>

							<div class="col-md-4">
							<input class="form-control" name="title8" id="title8" type="text" value="<?php echo $row22['title8'];?>" > 
							</div>

							<div class="col-md-4">
							<input class="form-control" name="title11" id="title11" type="text" value="<?php echo $row22['title11'];?>" > 
							</div>

							<div class="col-md-4">
							<input class="form-control" name="title12" id="title12" type="text" value="<?php echo $row22['title12'];?>" > 
							</div>
						</div>
					</fieldset> 
					
<hr>

					<fieldset>
						<h2><b>POPUP Message</b></h2>
						<div class="form-group row col-md-12">
							<div class="col-md-1">
							<label class="col-form-label" for="input-id-1">Title:</label>
							</div>
							<div class="col-md-9">
							<input class="form-control" name="popup_title" id="popup_title" type="text" placeholder="First Title" value="<?php echo $row22['popup_title'];?>">
							</div>
							<div class="col-md-2">
								<select class="form-control" name="popup_status" id="popup_status">
								<option value="Active" <?php if ($row22['popup_status']=='Active'){echo "selected='selected'";}?>>Active</option>
								<option value="Not Active" <?php if ($row22['popup_status']=='Not Active'){echo "selected='selected'";}?>>Not Active</option>
								</select>
							</div>
						</div>
					</fieldset> 

					<fieldset>
						<div class="form-group row"><label class="col-md-12 col-form-label">Text:</label>
						<div class="col-md-12"><textarea name="popup_text" id="popup_text" class="update_input ckeditor form-control" accept-charset="iso-8859-1"><?php echo $row22['popup_text'];?></textarea></div>
						</div>
					</fieldset>

					<input type="hidden" name="id" id="id" value="<?php echo $row22['id'];?>" />
					<button class="form-group btn btn-main" type="submit">Update Data</button>

				</form>
			</div>
		</div>                    
	</div>
</div>
<!-- END Row --> 
<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>