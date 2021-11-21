<?php
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");
$pagename = 'View-Team';
$container = 'View-Item';
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/editor.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
$result22 = mysqli_query($servercnx, "SELECT * FROM team WHERE id = '$id'");
$row22 = mysqli_fetch_array($result22);
$id = $row22['id'];
$team_uniid = $row22['team_uniid'];
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
					<h4><strong>Team</strong> - Edit Team </h4>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">Edit "<?php echo $row22['team_name']; ?>"</h2>
				</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data" action="updateaction/update_team.php">
						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">New Member Name:</label>
								<div class="col-md-12">
									<input class="form-control" name="team_name" id="team_name" type="text" value="<?php echo $row22['team_name']; ?>">
								</div>
						</fieldset>

						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">New Member Designation:</label>
								<div class="col-md-12">
									<input class="form-control" name="team_designation" id="team_designation" type="text" value="<?php echo $row22['team_designation']; ?>">
								</div>
						</fieldset>

						<fieldset>
							<div class="form-group row col-md-12">
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">Facebook ID:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="team_facebook" id="team_facebook" type="text" value="<?php echo $row22['team_facebook']; ?>">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">Twitter ID</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="team_twitter" id="team_twitter" type="text" value="<?php echo $row22['team_twitter']; ?>">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">LinkedIn ID:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="team_linkedin" id="team_linkedin" type="text" value="<?php echo $row22['team_linkedin']; ?>">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Skype ID:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="team_skype" id="team_skype" type="text" value="<?php echo $row22['team_skype']; ?>">
								</div>

								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Email:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="team_email" id="team_email" type="email" value="<?php echo $row22['team_email']; ?>">
								</div>

								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Frontend Position:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="team_position" id="team_position" type="text" value="<?php echo $row22['team_position']; ?>" placeholder="e.g., 1,2,3,...">
								</div>

								<div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Status:</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="team_status" id="team_status">
										<option value="Active" <?php if ($row22['team_status'] == 'Active') {
																	echo "selected='selected'";
																} ?>>Active</option>
										<option value="Not Active" <?php if ($row22['team_status'] == 'Not Active') {
																		echo "selected='selected'";
																	} ?>>Not Active</option>
									</select>
								</div>
							</div>
						</fieldset>

						<fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label">Team Body:</label>
								<div class="col-md-12"><textarea name="team_body" id="team_body" class="update_input ckeditor form-control" accept-charset="iso-8859-1"><?php echo $row22['team_body']; ?></textarea></div>
							</div>
						</fieldset>

						<fieldset>
							<div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Profile Picture (Min Size: 300 x 361)</label>
								<div class="col-md-12"><input class="btn btn-success" name="team_profile" id="team_profile" type="file">
								</div>
								<label class="col-md-12 col-form-label" for="input-id-1"><br>Previously Selected Profile:</label>
								<div class="col-md-4">
									<a href="javascript: void(0)" onclick="popup('../images/Teams/Profiles/<?php echo $row22['team_profile']; ?>')"><img src="../images/Teams/Profiles/<?php echo $row22['team_profile']; ?>" width="250" height="200" /></a>
								</div>
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
							<div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Cover Photo (Min Size: 1920 x 1000)</label>
								<div class="col-md-12"><input class="btn btn-success" name="team_cover" id="team_cover" type="file">
								</div>
								<label class="col-md-12 col-form-label" for="input-id-1"><br>Previously Selected Cover:</label>
								<div class="col-md-4">
									<a href="javascript: void(0)" onclick="popup('../images/Teams/Covers/<?php echo $row22['team_cover']; ?>')"><img src="../images/Teams/Covers/<?php echo $row22['team_cover']; ?>" width="250" height="200" /></a>
								</div>
							</div>
						</fieldset>

						<input type="hidden" name="id" id="id" value="<?php echo $row22['id']; ?>" />
						<input type="hidden" name="team_uniid" id="team_uniid" value="<?php echo $row22['team_uniid']; ?>" />
						<button class="form-group btn btn-main" type="submit">Update Member</button>
					</form>
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
	</script>
	<?php include("assets/includes/inc/Main-Footer.php"); ?>
	</body>

	</html>