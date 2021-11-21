<?php
include("assets/includes/controller.php");
$pagename = 'configurations';
$container = '';
if (!$session->isSuperAdmin()) {
    header("Location: " . $configs->homePage());
    exit;
} else {
    $form = new Form();
    include("assets/includes/inc/Main-Header.php");
?>
    <!-- Page Content -->
    <div id="page-content" class="gray-bg">

        <!-- Title Header -->
        <div class="title-header white-bg">
            <i class="fas fa-cogs"></i>
            <h2>General Settings</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">
                    General Settings
                </li>
            </ol>
        </div>
        <!-- END Title Header -->

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <h4><strong>General Settings</strong></h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h2 class="panel-title">Frontend Site Setting</h2>
                    </div>
                    <?php
                    include("assets/includes/inc/config.php");
                    $result22 = mysqli_query($servercnx, "SELECT * FROM site_settings WHERE id = 1");
                    $row22 = mysqli_fetch_array($result22);
                    $id = $row22['id'];
                    ?>
                    <div class="panel-body">
                        <form class="form-horizontal" id="configurations-form-validation" role="form" action="updateaction/update_sitesettings.php" method="POST">
                            <fieldset>
                                <div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Site Name:</label>
                                    <div class="col-md-12"><input class="form-control" name="site_name" id="site_name" type="text" value="<?php echo $row22['site_name'] ?>"></div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group row"><label class="col-md-3 col-form-label" for="input-id-1">Phone No:</label>
                                    <div class="col-md-9"><input class="form-control" name="site_phone" id="site_phone" type="text" value="<?php echo $row22['site_phone'] ?>"></div>
                                </div>
                                <div class="form-group row"><label class="col-md-3 col-form-label" for="input-id-1">Calling No:</label>
                                    <div class="col-md-9"><input class="form-control" name="site_phone_call" id="site_phone_call" type="text" value="<?php echo $row22['site_phone_call'] ?>"></div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group row" style="display: none;"><label class="col-md-8 col-form-label" for="input-id-1">Jummah Prayer Time:</label>
                                    <div class="col-md-4"><input class="form-control" name="jummah_time" id="jummah_time" type="text" value="<?php echo $row22['jummah_time'] ?>"></div>
                                </div>
                                <div class="form-group row" style="display: none;"><label class="col-md-8 col-form-label" for="input-id-1">Charity Registration Number:</label>
                                    <div class="col-md-4"><input class="form-control" name="site_charity_id" id="site_charity_id" type="text" value="<?php echo $row22['site_charity_id'] ?>"></div>
                                </div>
                                <div class="form-group row"><label class="col-md-8 col-form-label" for="input-id-1">Instagram Username:</label>
                                    <div class="col-md-4"><input class="form-control" name="insta_user" id="insta_user" type="text" value="<?php echo $row22['insta_user'] ?>"></div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Email:</label>
                                    <div class="col-md-12"><input class="form-control" name="site_email" id="site_email" type="text" value="<?php echo $row22['site_email'] ?>"></div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Address:</label>
                                    <div class="col-md-12"><input class="form-control" name="site_address" id="site_address" type="text" value="<?php echo $row22['site_address'] ?>"></div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group row"><label class="col-md-12 col-form-label" for="input-id-1">Site URL:</label>
                                    <div class="col-md-12"><input class="form-control" name="site_domain" id="site_domain" type="text" value="<?php echo $row22['site_domain'] ?>"></div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group row"><label class="col-md-12 col-form-label">Linkedin URL:</label>
                                    <div class="col-md-12"><input class="form-control" name="site_linkedin" id="site_linkedin" type="text" value="<?php echo $row22['site_linkedin'] ?>"></div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group row"><label class="col-md-12 col-form-label">Facebook URL:</label>
                                    <div class="col-md-12"><input class="form-control" name="site_facebook" id="site_facebook" type="text" value="<?php echo $row22['site_facebook'] ?>">
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group row"><label class="col-md-12 col-form-label">Twitter URL:</label>
                                    <div class="col-md-12"><input class="form-control" name="site_twitter" id="site_twitter" type="text" value="<?php echo $row22['site_twitter'] ?>">
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset>
                                <div class="form-group row"><label class="col-md-12 col-form-label">Instagram:</label>
                                    <div class="col-md-12"><input class="form-control" name="site_insta" id="site_insta" type="text" value="<?php echo $row22['site_insta'] ?>">
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group row"><label class="col-md-12 col-form-label">YouTube:</label>
                                    <div class="col-md-12"><input class="form-control" name="site_youtube" id="site_youtube" type="text" value="<?php echo $row22['site_youtube'] ?>">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset style="display: none;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="col-form-label" for="input-id-4">Footer Text:</label>
                                        <textarea type="text" class="form-control" name="site_summary" id="site_summary"><?php echo $row22['site_summary']; ?></textarea>
                                    </div>
                                </div><br>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="input-id-4">In Header Script:</label>
                                        <textarea type="text" class="form-control" name="head_script" id="head_script"><?php echo $row22['head_script']; ?></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="input-id-4">After Header Script:</label>
                                        <textarea type="text" class="form-control" name="after_head" id="after_head"><?php echo $row22['after_head']; ?></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="input-id-4">Footer Script:</label>
                                        <textarea type="text" class="form-control" name="footer_script" id="footer_script"><?php echo $row22['footer_script']; ?></textarea>
                                    </div>
                                </div><br>
                            </fieldset>

                            <button class="btn btn-default" type="submit">Update Site Settings</button>
                            <input class="form-control" name="id" id="id" type="hidden" value="<?php echo $row22['id'] ?>">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h2 class="panel-title">Admin Panel Settings</h2>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" id="configurations-form-validation" role="form" action="assets/includes/adminprocess.php" method="POST">
                            <div class="form-group <?php if (Form::error("sitename")) {
                                                        echo 'has-error';
                                                    } ?>">
                                <label for="sitename" class="col-sm-3 control-label">Site Name <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input class="form-control" name="sitename" id="sitename" placeholder="Required Field.." value="<?php if (Form::value('sitename') == "") {
                                                                                                                                            echo $configs->getConfig('SITE_NAME');
                                                                                                                                        } else {
                                                                                                                                            echo Form::value('sitename');
                                                                                                                                        } ?>">
                                        <span class="input-group-addon"><i class="fas fa-question-circle"></i></span>
                                    </div>
                                    <?php if (Form::error("sitename")) {
                                        echo "<div class='help-block' id='sitename-error'>" . Form::error('sitename') . "</div>";
                                    } ?>
                                </div>
                            </div>
                            <div class="form-group <?php if (Form::error("sitedesc")) {
                                                        echo 'has-error';
                                                    } ?>">
                                <label for="sitedesc" class="col-sm-3 control-label">Site Description <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input class="form-control" name="sitedesc" id="sitedesc" placeholder="Required Field.." value="<?php if (Form::value("sitedesc") == "") {
                                                                                                                                            echo $configs->getConfig('SITE_DESC');
                                                                                                                                        } else {
                                                                                                                                            echo Form::value("sitedesc");
                                                                                                                                        } ?>">
                                        <span class="input-group-addon"><i class="fas fa-question-circle"></i></span>
                                    </div>
                                    <?php if (Form::error("sitedesc")) {
                                        echo "<div class='help-block' id='sitedesc-error'>" . Form::error('sitedesc') . "</div>";
                                    } ?>
                                </div>
                            </div>
                            <div class="form-group <?php if (Form::error("emailfromname")) {
                                                        echo 'has-error';
                                                    } ?>">
                                <label for="emailfromname" class="col-sm-3 control-label">E-mail From Name <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input class="form-control" name="emailfromname" id="emailfromname" placeholder="Required Field.." value="<?php if (Form::value("emailfromname") == "") {
                                                                                                                                                        echo $configs->getConfig('EMAIL_FROM_NAME');
                                                                                                                                                    } else {
                                                                                                                                                        echo Form::value("emailfromname");
                                                                                                                                                    } ?>">
                                        <span class="input-group-addon"><i class="fas fa-question-circle"></i></span>
                                    </div>
                                    <?php if (Form::error("emailfromname")) {
                                        echo "<div class='help-block' id='emailfromname-error'>" . Form::error('emailfromname') . "</div>";
                                    } ?>
                                </div>
                            </div>
                            <div class="form-group <?php if (Form::error("adminemail")) {
                                                        echo 'has-error';
                                                    } ?>">
                                <label for="adminemail" class="col-sm-3 control-label">Site E-mail Address <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input class="form-control" name="adminemail" id="adminemail" placeholder="Required Field.." value="<?php if (Form::value("adminemail") == "") {
                                                                                                                                                echo $configs->getConfig('EMAIL_FROM_ADDR');
                                                                                                                                            } else {
                                                                                                                                                echo Form::value("adminemail");
                                                                                                                                            } ?>">
                                        <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <?php if (Form::error("adminemail")) {
                                        echo "<div class='help-block' id='adminemail-error'>" . Form::error('adminemail') . "</div>";
                                    } ?>
                                </div>
                            </div>
                            <div class="form-group <?php if (Form::error("webroot")) {
                                                        echo 'has-error';
                                                    } ?>">
                                <label for="webroot" class="col-sm-3 control-label">Site Root <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input class="form-control" name="webroot" id="webroot" placeholder="Required Field.." value="<?php if (Form::value("webroot") == "") {
                                                                                                                                            echo $configs->getConfig('WEB_ROOT');
                                                                                                                                        } else {
                                                                                                                                            echo Form::value("webroot");
                                                                                                                                        } ?>">
                                        <span class="input-group-addon"><i class="fas fa-globe"></i></span>
                                    </div>
                                    <?php if (Form::error("webroot")) {
                                        echo "<div class='help-block' id='webroot-error'>" . Form::error('webroot') . "</div>";
                                    } ?>
                                </div>
                            </div>
                            <div class="form-group <?php if (Form::error("home_page")) {
                                                        echo 'has-error';
                                                    } ?>">
                                <label for="home_page" class="col-sm-3 control-label">Admin Home Page <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input class="form-control" name="home_page" id="home_page" placeholder="Required Field.." value="<?php echo $configs->getConfig('home_page'); ?>">
                                        <span class="input-group-addon"><i class="fas fa-globe"></i></span>
                                    </div>
                                    <?php if (Form::error("home_page")) {
                                        echo "<div class='help-block' id='home_page-error'>" . Form::error('home_page') . "</div>";
                                    } ?>
                                </div>
                            </div>
                            <div class="form-group <?php if (Form::error("login_page")) {
                                                        echo 'has-error';
                                                    } ?>">
                                <label for="login_page" class="col-sm-3 control-label">Login Page <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input class="form-control" name="login_page" id="login_page" placeholder="Required Field.." value="<?php echo $configs->getConfig('login_page'); ?>">
                                        <span class="input-group-addon"><i class="fas fa-globe"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group <?php if (Form::error("date_format")) {
                                                        echo 'has-error';
                                                    } ?>">
                                <label for="date_format" class="col-sm-3 control-label">PHP Date Format <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input class="form-control" name="date_format" id="date_format" placeholder="Required Field.." value="<?php echo $configs->getConfig('date_format'); ?>">
                                        <span class="input-group-addon"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-10">
                                    <?php echo $adminfunctions->stopField($session->username, 'configs'); ?>
                                    <input type="hidden" name="form_submission" value="config_edit">
                                    <button type="submit" class="btn btn-default">Update Admin Panel Settings</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Row -->
        <?php include("assets/includes/inc/Main-Footer.php"); ?>
        </body>

        </html>
    <?php } ?>