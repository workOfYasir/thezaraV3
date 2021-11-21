<?php
include("assets/includes/controller.php");
$pagename = 'Add-Service';
$container = 'Add-Item';
include("assets/includes/inc/Main-Header.php");
include("assets/includes/inc/config.php");
include("assets/includes/inc/editor.php");
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
					<h4><strong>Service</strong> - Add Service </h4>
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
					
					<form method="post" enctype="multipart/form-data" action="createaction/add_service.php">


						<fieldset>
							<div class="form-group row col-md-12">
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">Title:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="title" id="title" type="text" placeholder="Enter Title">
								</div>
								<div class="col-md-2">
									<label class="col-form-label" for="input-id-1">Price:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="price" id="price" type="text" placeholder="Cost">
								</div>
								
							</div>
						</fieldset>
                        <fieldset>
                        <label class="col-form-label" for="input-id-4">Add Text in Line:</label>
                            <div class="col-md-12" id="line">
                           
                                <div class="col-md-10">
                                    <input class="form-control" name="line[]" id="line" type="text"  placeholder="Enter Line">
                                </div>
                                <div class="col-md-2">
                                    <input type="button" class="btn btn-default" id="btnAddtoList" value="Click me"  >
                                </div>
                            </div>
                        </fieldset>
						 <fieldset>
                        <br>
							<div class="form-group row"> <label class="col-md-12 col-form-label" for="input-id-1">Service Feature Image</label>
								<div class="col-md-12"><input class="btn btn-success" name="thumb" id="thumb" type="file">
								</div>
							</div>
						</fieldset> 
						<button class="form-group btn btn-main" type="submit">Add Post</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
 $(function () {
    var i=0;
      $("#btnAddtoList").click(function() {
          i++;
          div = document.createElement('div');
          var name='line'+i;
          $(div).addClass("inner").html(" <div class='col-md-10'><input class='form-control' name='line[]' id='line' type='text' placeholder='Enter Another Line'></div>");
          $("#line").append(div);
        });
    });
	</script>
	<!-- END Row -->
	<?php include("assets/includes/inc/Main-Footer.php"); ?>
	</body>

	</html>