<?php
include("assets/includes/controller.php");
$pagename = 'Add-Class';
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
        <h2>Class</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li class="active">
                Class
            </li>
        </ol>
    </div>
    <!-- END Title Header -->

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <h4><strong>New Class</strong></h4>
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
                    <h2 class="panel-title">New Class Details</h2>
                </div>
                <div class="panel-body">
                    <hr />
                    <form method="post" enctype="multipart/form-data" action="createaction/add_class.php">
                        <fieldset>
                            <div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Class Title:</label>
                                <div class="col-md-12">
                                    <input class="form-control" name="class_name" id="class_name" type="text">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Short Detail:</label>
                                <div class="col-md-12">
                                    <input class="form-control" name="short_details" id="short_details" type="text">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="form-group row col-md-12">
                                <div class="col-md-2">
                                    <label class="col-form-label" for="input-id-1">SEO Title:</label>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" name="seo_title" id="seo_title" type="text" placeholder="Enter Title">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label" for="input-id-1">SEO Keywords:</label>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" name="seo_keywords" id="seo_keywords" type="text" placeholder="Enter Keywords">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label" for="input-id-1">SEO Description:</label>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" name="seo_description" id="seo_description" type="text" placeholder="Enter Description">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label" for="input-id-4">URL:</label>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" name="class_url" id="class_url" type="text" placeholder="Enter Class URL">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label" for="input-id-4">Robots:</label>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" name="robots" id="robots" type="text" value="index, follow" placeholder="Enter Robots">
                                </div>
                                <div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Position:</label>
								</div>
								<div class="col-md-4">
									<input class="form-control" name="class_position" id="class_position" type="text" placeholder="Enter Position e.g, 1,2,3,4">
								</div>
                                <div class="col-md-2">
									<label class="col-form-label" for="input-id-4">Status:</label>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="class_status" id="class_status">
										<option value="Active" selected>Active</option>
										<option value="Not Active">Not Active</option>
									</select>
								</div>
                                <div class="col-md-2">
                                    <label class="col-form-label" for="input-id-1">Duration</label>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" name="duration" id="duration" type="text">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label" for="input-id-4">Time:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="time" id="time">
                                </div>
                                
                                <div class="col-md-2">
                                    <label class="col-form-label" for="input-id-4">Cost:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="cost" id="cost">
                                </div>
                                
                                <div class="col-md-2">
										<label class="col-form-label">Category:</label>
									</div>
									<div class="col-md-4">
										<select class="form-control" name="class_category"  required style="width: 100%;">

											<?php
											include("assets/includes/inc/config.php");
											$maincat = mysqli_query($servercnx, "SELECT * FROM pages WHERE is_parent = 'Yes'");
											?>
											<option selected value="No">-----SELECT-------</option>
											<?php while ($mcatq = mysqli_fetch_array($maincat)) {	?>
												<?php  ?>
												<option value="<?php echo $mcatq['id']; ?>"><?php echo $mcatq['page_title']; ?></option><?php } ?>
										</select>
									</div>
                            </div>
                        </fieldset>
                   
                        <fieldset>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="col-form-label" for="input-id-4">Summary (Maximum 100 Characters Only)</label>
                                    <textarea type="text" class="form-control" name="class_summary" id="class_summary" maxlength="100" title="Only Alphanumeric" value="Type Alphanumeric Only" onkeydown="return alphaOnly(event);"></textarea>
                                </div>
                            </div><br>
                        </fieldset>
                        <fieldset>
							<div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Text Body:</label>
								<div class="col-md-12">
                                <textarea class="form-control ckeditor" name="class_body" id="class_body" rows="6" cols="50"></textarea>
									
								</div>
                            </div>
						</fieldset>

                        <button class="form-group btn btn-main" type="submit">Add Class</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function yesnoCheck(that) {
            if (that.value == "Yes") {

                document.getElementById("event_check").style.display = "block";
            } else {
                document.getElementById("event_check").style.display = "none";
            }
        }
    </script>
    <!-- END Row -->
    <?php include("assets/includes/inc/Main-Footer.php"); ?>
    </body>

    </html>