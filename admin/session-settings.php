<?php 
include("assets/includes/controller.php");
$pagename = 'session-settings';
$container = 'settings';
if(!$session->isSuperAdmin()){
    header("Location: ".$configs->homePage());
    exit;
}
else{
include("assets/includes/inc/Main-Header.php");
?> 

            <!-- Page Content -->
            <div id="page-content" class="gray-bg">

                <!-- Title Header -->
                <div class="title-header white-bg">
                    <i class="fas fa-desktop"></i>
                    <h2>Session Settings</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">
                            Session Settings
                        </li>
                    </ol>
                </div>
                <!-- END Title Header -->
                
                <div class="row">                                     
                    <div class="col-sm-12 col-md-12">
                        <div class="panel">
                            <div class="panel-body">
                                <h4><strong>Session Settings</strong> - Change the settings regarding sessions.</h4>
                            </div>
                        </div>
                    </div>                                     
                </div>
             
                <div class="row"> 
                    <div class="col-sm-12 col-md-7 col-lg-8">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2 class="panel-title">Session Settings</h2>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" id="session-form-validation" action="assets/includes/adminprocess.php" method="POST"> 
                                    <div class="form-group">
                                        <label for="user_timeout" class="col-sm-4 control-label">User Inactivity Timeout <span class="text-danger">*</span></label>
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="input-group">
                                                <input class="form-control" name="user_timeout" id="user_timeout" placeholder="Required Field.." value="<?php echo $configs->getConfig('USER_TIMEOUT'); ?>">
                                                <span class="input-group-addon">Minutes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="user_timeout" class="col-sm-4 control-label">Guest Timeout <span class="text-danger">*</span></label>
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="input-group">
                                                <input class="form-control" name="guest_timeout" id="guest_timeout" placeholder="Required Field.." value="<?php echo $configs->getConfig('GUEST_TIMEOUT'); ?>">
                                                <span class="input-group-addon">Minutes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="persist_not_expire" class="col-sm-4 control-label">Reset Expiry at Logon<span class="text-danger">*</span></label>
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="input-group">                                                
                                                <select name="persist_not_expire" id="persist_not_expire" class="form-control">                                         
                                                    <option value="1" <?php if ($configs->getConfig('PERSIST_NOT_EXPIRE') == '1') { echo "selected='selected'"; }?>>Yes</option>
                                                    <option value="0" <?php if ($configs->getConfig('PERSIST_NOT_EXPIRE') == '0') { echo "selected='selected'"; }?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cookie_expiry" class="col-sm-4 control-label">Cookie Expiry <span class="text-danger">*</span></label>
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="input-group">
                                                <input class="form-control" name="cookie_expiry" id="cookie_expiry" placeholder="Required Field.." value="<?php echo $configs->getConfig('COOKIE_EXPIRE'); ?>">
                                                <span class="input-group-addon">Days</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cookie_path" class="col-sm-4 control-label">Cookie Path <span class="text-danger">*</span></label>
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="input-group">
                                                <input class="form-control" name="cookie_path" id="cookie_path" placeholder="Required Field.." value="<?php echo $configs->getConfig('COOKIE_PATH'); ?>">
                                                <span class="input-group-addon"><i class="fas fa-road"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-8">
                                            <?php echo $adminfunctions->stopField($session->username, 'session'); ?>
                                            <input type="hidden" name="form_submission" value="session_edit">
                                            <button type="submit" class="btn btn-default">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>                    
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-4">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2 class="panel-title">Need Help ?</h2>
                            </div>
                            <div class="panel-body">
                                <strong>User Inactivity Timeout</strong> - The user is logged out after the set period of inactivity. The default PHP session timeout is usually already set at 24 minutes.<br><br>
                                <strong>Guest Timeout</strong> - A guest is no longer considered a guest (and counted in the whose online figures) after this set period of inactivity.<br><br> 
                                <strong>Reset Expiry at Logon</strong> - When set to Yes, when a user logs on with a Remember Me cookie, his expiry date will extend by the amount set below. When set to No, he will have to re-logon after the expiry date.<br><br> 
                                <strong>Remember Me Cookie Expiry</strong> - This is the amount of days in which the remember me cookie expires.<br><br>
                                <strong>Cookie Path</strong> - The Path attribute defines the scope of the cookie. Leave as <strong>/</strong> by default.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Row -->

<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>
<?php } ?>