<?php 
include("assets/includes/controller.php");
$pagename = 'Add-Testimonial';
$container = 'Add-Item'; 
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php");
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
<h4><strong>Testimonial</strong> - Add Testimonial </h4>
</div>
</div>
</div>                                     
</div>

<div class="row">                    
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="panel">
			<div class="panel-heading">
			<h2 class="panel-title">Add New Testimonial</h2>
			</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data" action="createaction/add_testimonial.php">
					<input type="text" name="testimonial_uniid" id="testimonial_uniid" value="<?php echo md5(uniqid(mt_rand(), true)); ?>" hidden="Yes" />
					<fieldset>
						<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Client Name:</label>
						<div class="col-md-12">
						<input class="form-control" name="testimonial_name" id="testimonial_name" type="text"> 
						</div>
					</div>
					</fieldset>

					<fieldset>
						<div class="form-group row"><label class="col-md-12 col-form-label">Client Review:</label>
						<div class="col-md-12"><textarea name="testimonial_body" id="testimonial_body" class="update_input form-control" accept-charset="iso-8859-1"></textarea></div>
						</div>
					</fieldset>

					<fieldset>
						<div class="form-group row"><label class="col-md-12 col-form-label">Status:</label>
						<div class="col-md-12">
							<select class="form-control" name="testimonial_status" id="testimonial_status">
								<option value="Active">Active</option>
								<option value="Not Active" selected>Not Active</option>
								</select>
							</div>
						</div>
					</fieldset>


					<fieldset>
						<div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Client Profile Picture (Min Size: 171 x 155)</label>
						<div class="col-md-12"><input class="btn btn-success" name="testimonial_profile" id="testimonial_profile" type="file">
						</div></div>
					</fieldset>
					<input type="hidden" name="cate_table" id="cate_table" value="22" />
					<button class="form-group btn btn-main" type="submit">Add Testimonial</button>
				</form>
			</div>
		</div>                    
	</div>
</div>
<!-- END Row --> 
<script>
function CategoryIndentifier(option_id) {
  console.log(option_id);
}
</script>
<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>