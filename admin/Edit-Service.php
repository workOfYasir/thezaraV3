<?php
include("assets/includes/controller.php");

$pagename = 'Edit-Service';
$container = 'Add-Item';
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/config.php");
include("assets/includes/inc/editor.php");

echo $id = $_GET['id'];

$result22 = mysqli_query($servercnx, "SELECT * FROM `service` WHERE id = '$id'");
$row22 = mysqli_fetch_array($result22);
echo $title = $row22['title'];

$result23 = mysqli_query($servercnx, "SELECT * FROM service_line WHERE service_id = '$id'");

?>



<!-- Page Content -->
<div id="page-content" class="gray-bg">

	<!-- Title Header -->
	<div class="title-header white-bg">
		<i class="fa fa-align-justify"></i>
		<h2>Service</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				Service
			</li>
		</ol>
	</div>
	<!-- END Title Header -->

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel">
				<div class="panel-body">
					<h4><strong>Service</strong> - Edit Service </h4>
				</div>
			</div>
		</div>
	</div>
	<?php
	if (isset($_GET['DuplicatedDate'])) {
		$Duplicated = " This Date is already Added in Record ";
	?><div class="alert alert-danger alert-dismissible" id="success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<strong>Duplicated Value ! </strong> <?php echo $Duplicated; ?>
		</div>
	<?php
	} else if (isset($_GET['DataEncounterd'])) {
		$Encounter = "Error encountered while adding user data ";
	?><div class="alert alert-danger alert-dismissible" id="success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<strong>Error ! </strong><?php echo $Encounter; ?>
		</div><?php
			} else if (isset($_GET['Success'])) {
				$SuccessM = "Data inserted successfully ";
				?><div class="alert alert-success alert-dismissible" id="success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<strong>Success ! </strong><?php echo $SuccessM; ?>
		</div>

	<?php
			} else if (isset($_GET['fewfilled'])) {
				$fillFields = "Please Fill All Fields ";
	?><div class="alert alert-danger alert-dismissible" id="success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<strong>Error ! </strong><?php echo $fillFields; ?>
		</div><?php
			}
				?>
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h2 class="panel-title">Add New Service</h2>
				</div>
				<div class="panel-body">

					<form method="post" enctype="multipart/form-data" action="updateaction/update_service.php">
						<input type="hidden" name="id" value="<?php echo $id; ?>">

						<fieldset>
							<div class="form-group row col-md-12">
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">Title:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="title" id="title" type="text" value="<?php echo $row22['title']; ?>" placeholder="Enter Title">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">Price:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="price" id="price" type="text" value="<?php echo $row22['price']; ?>" placeholder="Cost">
								</div>

							</div>
						</fieldset>
						<fieldset>
							<label class="col-form-label" for="input-id-4">Add Text in Line:</label>
							<div class="col-md-12" id="line">

								<div class="col-md-10">
										<div class="col-md-10">
									<?php  while ($row23 = mysqli_fetch_array($result23)) {
									
										$lid = $row23['service_id'];
										$Id = $row23['id'];
									?> 
											<input class="form-control" name="line[]" id="line" type="text" value="<?php echo $row23['line'];  ?>" placeholder="Enter Line"><input type="hidden" name="lid" id="lid" value="<?php echo $Id;?>">
										
										
									<?php



									} ?></div><div class="col-md-2">
										<a href="#myModal" onclick="<?php echo $lid; ?>" > 
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Delete Lines</button></a></div>
									


								</div>
								<div class="col-md-2">
									<input type="button" class="btn btn-default" id="btnAddtoList" value="Add New Line">
								</div>
							</div>
						</fieldset>
						<fieldset><br>
							<div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Service Feature Image </label>
								<div class="col-md-12"><input class="btn btn-success" name="thumb" id="thumb" type="file">
								</div>
								<label class="col-md-12 col-form-label" for="input-id-1"><br>Previously Selected Cover:</label>
								<div class="col-md-4">
									<a href="javascript: void(0)" onclick="popup('../images/Services/<?php  echo $row22['thumb']; ?>')"><img src="../images/Services/<?php  echo $row22['thumb']; ?>" width="70%" /></a>
								</div>
							</div>
						</fieldset> 
						<button class="form-group btn btn-main" name="action"  type="submit" value="update">Update Service</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><strong> Text </strong></h4>
      </div>
      <div class="modal-body">
     <?php
	 $res=mysqli_query($servercnx,"SELECT * FROM `service_line` WHERE `service_id`= '$lid'");
	 while($row=mysqli_fetch_array($res))
	 {?>
 <div class="container-fluid">
    <div class="row">
	<div class="col-md-10">
		<p><?php echo $row['line']; ?></p><hr>
		</div>
		<div class="col-md-2">
	<a style="margin: auto;" href="delaction/del_line.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Are You sure ? You want to delete !');"><button class="btn btn-default"><i class="fa fa-trash"></i></button></a></div>
	</div></div>
	<?php }
	 ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
	<script>
		$(function() {
					var i = 0;
					$("#btnAddtoList").click(function() {
						i++;
						div = document.createElement('div');
						var name = 'line' + i;
						$(div).addClass("inner").html(" <div class='col-md-10'><input class='form-control' name='line[]' id='line' type='text' placeholder='Enter Another Line'></div>");
						$("#line").append(div);
					});

				
						});
	</script>
	<!-- END Row -->
	<?php include("assets/includes/inc/Main-Footer.php"); ?>
	</body>

	</html>