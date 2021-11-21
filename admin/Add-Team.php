<?php
include("assets/includes/controller.php");
$pagename = 'Add-Team';
$container = 'Add-Item';
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php");
?>
<!-- Page Content -->
<div id="page-content" class="gray-bg">

	<!-- Title Header -->
	<div class="title-header white-bg">
		<i class="fa fa-users"></i>
		<h2>Team</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				Team
			</li>
		</ol>
	</div>
	<!-- END Title Header -->

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel">
				<div class="panel-body">
					<h4><strong>Team</strong> - Add Team </h4>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">Add New Team Member</h2>
				</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data" action="createaction/add_team.php">
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">New Member Name:</label>
								<div class="col-md-12">
									<input class="form-control" name="team_name" id="team_name" type="text">
								</div>
						</fieldset>

						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">New Member Designation:</label>
								<div class="col-md-12">
									<input class="form-control" name="team_designation" id="team_designation" type="text">
								</div>
						</fieldset>

						<fieldset>
							<div class="form-group row col-md-12">
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">Facebook ID:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="team_facebook" id="team_facebook" type="text" value="https://www.facebook.com/">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">Twitter ID</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="team_twitter" id="team_twitter" type="text" value="https://twitter.com/">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">LinkedIn ID:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="team_linkedin" id="team_linkedin" type="text" value="https://www.linkedin.com/">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Skype ID:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="team_skype" id="team_skype" type="text" value="https://www.skype.com/en/">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Email:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="team_email" id="team_email" type="email" value="info@falconsolicitors.com">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Frontend Position:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="team_position" id="team_position" type="text" placeholder="e.g., 1,2,3,...">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Status:</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="team_status" id="team_status">
										<option value="Active">Active</option>
										<option value="Not Active" selected>Not Active</option>
									</select>
								</div>
							</div>
						</fieldset>

						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label">Team Body:</label>
								<div class="col-md-12"><textarea name="team_body" id="team_body" class="update_input ckeditor form-control" accept-charset="iso-8859-1"></textarea></div>
							</div>
						</fieldset>

						<fieldset>
							<div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Profile Picture (Min Size: 300 x 361)</label>
								<div class="col-md-12"><input class="btn btn-success" name="team_profile" id="team_profile" type="file">
								</div>
							</div>
						</fieldset>

						<fieldset>
							<div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Cover Photo (Min Size: 1920 x 1000)</label>
								<div class="col-md-12"><input class="btn btn-success" name="team_cover" id="team_cover" type="file">
								</div>
							</div>
						</fieldset>
						<button class="form-group btn btn-main" type="submit">Add New Member</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- END Row -->
	<?php include("assets/includes/inc/Main-Footer.php"); ?>
	</body>

	</html>