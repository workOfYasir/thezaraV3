<?php 

$root = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..\\..\\');
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");
$pagename = 'View-Testimonial';
$container = 'View-Item'; 
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php");
if(isset($_GET['id'])) {$id=$_GET['id'];} 
$result22 = mysqli_query($servercnx,"SELECT * FROM testimonials WHERE id = '$id'");
$row22 = mysqli_fetch_array($result22);
$id = $row22['id'];
?> 
<!-- Page Content -->
<div id="page-content" class="gray-bg">

<!-- Title Header -->
<div class="title-header white-bg">
	<i class="fa fa-quote-right"></i>
	<h2>Testimonial</h2>
	<ol class="breadcrumb">
		<li>
		<a href="index.php">Home</a>
		</li>
		<li class="active">
		Testimonial
		</li>
	</ol>
</div>
<!-- END Title Header -->

<div class="row">                                     
<div class="col-sm-12 col-md-12">
<div class="panel">
<div class="panel-body">
<h4><strong>Testimonial</strong> - Edit Testimonial </h4>
</div>
</div>
</div>                                     
</div>

<div class="row">                    
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="panel">
			<div class="panel-heading">
			<h2 class="panel-title">Edit "<?php echo $row22['testimonial_name'];?>'s" Review</h2>
			</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data" action="updateaction/update_testimonial.php">
					<fieldset>
						<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Client Name:</label>
						<div class="col-md-12">
						<input class="form-control" name="testimonial_name" id="testimonial_name" type="text" value="<?php echo $row22['testimonial_name'];?>"> 
						</div>
					</div>
					</fieldset>

					<fieldset>
						<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Category:</label>
						<div class="col-md-12">
						<select class="form-control" name="testimonial_designation" id="testimonial_designation" required>
							<option disabled selected>--- Select Category ---</option>
							<?php 
							include("assets/includes/inc/config.php"); 
							$mainpageapz = mysqli_query($servercnx,"SELECT * FROM scat WHERE scat_status = 'Active' AND scat_cates = 'No' ORDER BY scat_title ASC");
							while($mainrowapz = mysqli_fetch_array($mainpageapz)){ ?>
							<option value="<?php echo $mainrowapz['scat_uniid'];?>|2" <?php if ($mainrowapz['scat_uniid']==$row22['testimonial_designation']){echo "selected='selected'";}?>><?php echo $mainrowapz['scat_title'];?> ( 2ND LEVEL )</option>
							<?php }?>
							<option disabled>--- Level III ---</option>
							<?php 
							include("assets/includes/inc/config.php"); 
							$mainpageap = mysqli_query($servercnx,"SELECT * FROM sscat WHERE sscat_status = 'Active' ORDER BY sscat_title ASC");
							while($mainrowap = mysqli_fetch_array($mainpageap)){ ?>
							<option value="<?php echo $mainrowap['sscat_uniid'];?>|3" <?php if ($mainrowap['sscat_uniid']==$row22['testimonial_designation']){echo "selected='selected'";}?>><?php echo $mainrowap['sscat_title'];?> ( 3RD LEVEL )</option>
	                         <?php }?>
						 </select>
						</div>
						</div>
					</fieldset>

					<fieldset>
						<div class="form-group row"><label class="col-md-12 col-form-label">Client Review:</label>
						<div class="col-md-12"><textarea name="testimonial_body" id="testimonial_body" class="update_input ckeditor form-control" accept-charset="iso-8859-1"><?php echo $row22['testimonial_body'];?></textarea></div>
						</div>
					</fieldset>

					<fieldset>
						<div class="form-group row"><label class="col-md-12 col-form-label">Status:</label>
						<div class="col-md-12">
								<select class="form-control" name="testimonial_status" id="testimonial_status">
								<option value="Active" <?php if ($row22['testimonial_status']=='Active'){echo "selected='selected'";}?>>Active</option>
								<option value="Not Active" <?php if ($row22['testimonial_status']=='Not Active'){echo "selected='selected'";}?>>Not Active</option>
								</select>
							</div>
						</div>
					</fieldset>


					<fieldset style="visibility: hidden; display: none;">
					 <div class="row">
					    <div class="col-md-4">
					      <label class="col-form-label" for="input-id-4">Header Script</label>
					      <textarea type="text" class="form-control" name="head_script" id="head_script"><?php echo $row22['head_script'];?></textarea>
					    </div>
					    <div class="col-md-4">
					      <label class="col-form-label" for="input-id-4">After Header Script</label>
					      <textarea type="text" class="form-control" name="after_head" id="after_head"><?php echo $row22['after_head'];?></textarea>
					    </div>
					    <div class="col-md-4">
					      <label class="col-form-label" for="input-id-4">Footer Script</label>
					      <textarea type="text" class="form-control" name="footer_script" id="footer_script"><?php echo $row22['footer_script'];?></textarea>
					    </div>
					 </div>
					</fieldset>

					<fieldset style="visibility: hidden; display: none;"><br>
						<div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Client Profile Picture (Min Size: 171 x 155)</label>
						<div class="col-md-12"><input class="btn btn-success" name="testimonial_profile" id="testimonial_profile" type="file">
						</div>
						<label class="col-md-12 col-form-label" for="input-id-1"><br>Previously Selected Cover:</label>
						<div class="col-md-4">
						<a href="javascript: void(0)" onclick="popup('../images/Testimonial/Clients/<?php echo $row22['testimonial_profile'];?>')"><img src="../images/Testimonial/Clients/<?php echo $row22['testimonial_profile'];?>" width="250" height="200" /></a>
						</div>
					</div>
					</fieldset>
					<input type="hidden" name="id" id="id" value="<?php echo $row22['id'];?>" />
					<button class="form-group btn btn-main" type="submit">Update Testimonial</button>
				</form>
			</div>
		</div>                    
	</div>
</div>
<!-- END Row --> 
<script type="text/javascript">
function popup(url) 
{
var width  = 700;
var height = 600;
var left   = (screen.width  - width)/2;
var top    = (screen.height - height)/2;
var params = 'width='+width+', height='+height;
params += ', top='+top+', left='+left;
params += ', directories=no';
params += ', location=no';
params += ', menubar=yes';
params += ', resizable=yes';
params += ', scrollbars=yes';
params += ', status=no';
params += ', toolbar=no';
newwin=window.open(url,'windowname5', params);
if (window.focus) {newwin.focus()}
return false;
}
</script> 
<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>