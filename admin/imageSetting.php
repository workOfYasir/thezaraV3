<?php
include("assets/includes/controller.php");
$pagename = 'Add-Blog';
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
        <h2>Blog</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li class="active">
                Blog
            </li>
        </ol>
    </div>
    <!-- END Title Header -->

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <h4><strong>Blog</strong> - Add Blog </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    <h2 class="panel-title">Add New Blog</h2>
                </div>
                <div class="panel-body">
                    <form action='resize.php' method='POST' enctype='multipart/form-data'>
                        <h2>Home Page Slider</h2>
                        <hr>
                        <fieldset>
                            <div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Slide One Title:</label>
                                <div class="col-md-12">
                                    <input class="form-control" name="slider_tagline" id="slider_tagline" type="text">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Slide One Text:</label>
                                <div class="col-md-12">
                                    <input class="form-control" name="slider_headline" id="slider_headline" type="text">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group row col-md-12">
                                <div class="col-md-6">
                                    <label class="col-md-12 col-form-label" for="input-id-1">Slide Image for Background(Min Size: 1920 x 1280)</label>
                                    <div class="col-md-6"><input class="btn btn-success" name="slider_cover_bg" id="slider_cover" type="file">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-md-12 col-form-label" for="input-id-1">Slide Image for front(Min Size: 1920 x 1280)</label>
                                    <div class="col-md-6"><input class="btn btn-success" name="slider_cover_front" id="slider_cover" type="file">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <button class="form-group btn btn-main" type="submit">Update Line One</button>
                    </form>
                    <hr>
                    <h2>Services Page Images</h2>
                    <hr>
                    <form action="resize.php" method="post" enctype="multipart/form-data"></form>
                    <fieldset>
                        <div class="form-group row">
                            <label class="col-md-12 col-form-label" for="input-id-1">Service image will save in 2 sizes:</label>
                            <div class="col-md-12">
                                <input class="btn btn-success" name="Services_img" id="Services_img" type="file">
                            </div>
                        </div>
                    </fieldset>
                    <button class="form-group btn btn-main" type="submit">Update Line One</button>
                    </form>

                        <hr>
                        <div class="col-md-6">
                        <h2>Header</h2>
                        <hr>

                        <form action="resize.php" method="post" enctype="multipart/form-data"></form>
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-12 col-form-label" for="input-id-1">Header Image will save in 2 sizes:</label>
                                <div class="col-md-12">
                                    <input class="btn btn-success" name="header_img" id="header_img" type="file">
                                </div>
                            </div>
                        </fieldset>
                        <button class="form-group btn btn-main" type="submit">Update Line One</button>
                        </form>
                    </div>
                    <div class="col-md-6">
      
                        <h2>Footer</h2>
                        <hr>
                        <form action="resize.php" method="post" enctype="multipart/form-data"></form>
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-12 col-form-label" for="input-id-1">Footer Image will save in 2 sizes:</label>
                                <div class="col-md-12">
                                    <input class="btn btn-success" name="Services_img" id="Services_img" type="file">
                                </div>
                            </div>
                        </fieldset>
                        <button class="form-group btn btn-main" type="submit">Update Line One</button>
                        </form>

                        <!-- <input name="file" type="file" accept="image/*"> -->
                        <!-- <button type="submit">SUBMIT</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function yesnoCheck(that) {
                if (that.value == "Yes") {
                    //   alert("check");
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

        <!-- 
<form method=“what you want” enctype=“do not use multipart/form-data to avoid transmission of the file contents to the server”>
<input type=“hidden” name=“full_path_real”>
<input name=“full_path_fake” type=“file” onchange=‘document.forms[0].elements[“full_path_real”].value=document.forms[0].elements[“full_path_fake”].value’>
<input value=“Go” type=“submit”>
</form> -->