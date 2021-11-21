<?php 
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");
$pagename = 'View-Why-us';
$container = 'View-Item'; 
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php"); 
$result22 = mysqli_query($servercnx,"SELECT * FROM why_us WHERE id = 1");
$row22 = mysqli_fetch_array($result22);
$id = $row22['id'];
?> 
<!-- Page Content -->
<div id="page-content" class="gray-bg">

<!-- Title Header -->
<div class="title-header white-bg">
	<i class="fa fa-rocket"></i>
	<h2>W hy Us</h2>
	<ol class="breadcrumb">
		<li>
		<a href="index.php">Home</a>
		</li>
		<li class="active">
		Why us
		</li>
	</ol>
</div>
<!-- END Title Header -->

<div class="row">                                     
<div class="col-sm-12 col-md-12">
<div class="panel">
<div class="panel-body">
<h4><strong>Why us</strong> - Edit Why us </h4>
</div>
</div>
</div>                                     
</div>

<div class="row">                    
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="panel">
			<div class="panel-heading">
			<h2 class="panel-title">Edit Text Content</h2>
			</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data" action="updateaction/update_whyus.php">

					<fieldset>
						<h2><b>Counter Section</b></h2>
						<div class="form-group row col-md-12">
							<div class="col-md-2">
							<label class="col-form-label" for="input-id-1">Happy Clients:</label>
							</div>
							<div class="col-md-4">
							<input class="form-control" name="acticve_clients" id="acticve_clients" type="text" value="<?php echo $row22['acticve_clients'];?>">
							</div>
							<div class="col-md-2">
							<label class="col-form-label" for="input-id-1">Success Ratio:</label>
							</div>
							<div class="col-md-4">
							<input class="form-control" name="active_projects" id="active_projects" type="text" value="<?php echo $row22['active_projects'];?>" > 
							</div>
							<div class="col-md-2">
							<label class="col-form-label" for="input-id-1">Years of Service:</label>
							</div>
							<div class="col-md-4">
							<input class="form-control" name="active_years" id="active_years" type="text"  value="<?php echo $row22['active_years'];?>">
							</div>
							<div class="col-md-2">
							<label class="col-form-label" for="input-id-1">Support:</label>
							</div>
							<div class="col-md-4">
							<input class="form-control" name="active_team" id="active_team" type="text" value="<?php echo $row22['active_team'];?>">
							</div>
						</div>
					</fieldset> 

					<fieldset>
						<h2><b>Heading Section</b></h2>
						<div class="form-group row col-md-12">
							<div class="col-md-2">
							<label class="col-form-label" for="input-id-1">Form Heading:</label>
							</div>
							<div class="col-md-4">
							<input class="form-control" name="why_slogen_o" id="why_slogen_o" type="text" placeholder="First Title" value="<?php echo $row22['why_slogen_o'];?>">
							</div>
							<div class="col-md-2">
							<label class="col-form-label" for="input-id-1">Content Heading:</label>
							</div>
							<div class="col-md-4">
							<input class="form-control" name="why_slogen_t" id="why_slogen_t" type="text" placeholder="Second Title" value="<?php echo $row22['why_slogen_t'];?>" > 
							</div>
							<div class="col-md-2">
							<label class="col-form-label" for="input-id-1">Why Us Top:</label>
							</div>
							<div class="col-md-4">
							<input class="form-control" name="why_slogen_th" id="why_slogen_th" type="text" placeholder="Third Title" value="<?php echo $row22['why_slogen_th'];?>">
							</div>
						</div>
					</fieldset> 


					<fieldset>
						<h2><b>Heading Section</b></h2>
						<div class="form-group row col-md-12">
							<div class="col-md-2">
							<label class="col-form-label" for="input-id-1">Testimonila Heading:</label>
							</div>
							<div class="col-md-10">
							<input class="form-control" name="testi_heading" id="testi_heading" type="text" placeholder="First Title" value="<?php echo $row22['testi_heading'];?>">
							</div>
						</div>
					</fieldset> 

					<fieldset>
						<div class="form-group row"><label class="col-md-12 col-form-label">Why Us Content:</label>
						<div class="col-md-12"><textarea name="why_body" id="why_body" class="update_input ckeditor form-control" accept-charset="iso-8859-1"><?php echo $row22['why_body'];?></textarea></div>
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