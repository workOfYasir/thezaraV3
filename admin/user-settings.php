<?php 
include("assets/includes/controller.php");
$pagename = 'user-settings';
$container = 'settings';
if(!$session->isSuperAdmin()){
    header("Location: " . $configs->homePage());
    exit;
}
else{
$form = new Form();
include("assets/includes/inc/Main-Header.php");
?>   
            <!-- Page Content -->
            <div id="page-content" class="gray-bg">

                <!-- Title Header -->
                <div class="title-header white-bg">
                    <i class="fas fa-desktop"></i>
                    <h2>User Settings</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">
                            User Settings
                        </li>
                    </ol>
                </div>
                <!-- END Title Header -->
                
                <div class="row">                                     
                    <div class="col-sm-12 col-md-12">
                        <div class="panel">
                            <div class="panel-body">
                                <h4><strong>User Settings</strong> - Change global settings for user accounts.</h4>
                            </div>
                        </div>
                    </div>                                     
                </div>
             
                <div class="row">                    
                    <div class="col-sm-12 col-md-7 col-lg-8">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2 class="panel-title">General User Settings</h2>
                            </div>
                            <div class="panel-body">
                                    <form class="form-horizontal" id="registration-form-validation" role="form" action="assets/includes/adminprocess.php" method="POST">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Allow Multiple Logins </label>
                                                <div class="col-sm-5">
                                                    <div class="radio radio-success radio-inline">
                                                        <input name="allow_multi_logins" id="allow_multi_logins" type="radio" value="1" <?php if($configs->getConfig('ALLOW_MULTI_LOGONS') == 1) { echo "checked='checked'"; } ?>>
                                                        <label for="allow_multi_logins1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-danger radio-inline">
                                                        <input name="allow_multi_logins" id="allow_multi_logins" type="radio" value="0" <?php if($configs->getConfig('ALLOW_MULTI_LOGONS') == 0) { echo "checked='checked'"; } ?>>
                                                        <label for="allow_multi_logins2">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-8">
                                                <?php echo $adminfunctions->stopField($session->username, 'mainusersettings'); ?>
                                                <input type="hidden" name="form_submission" value="main_user_settings">
                                                <button type="submit" class="btn btn-default">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                        </div> 
                        <div class="panel">
                            <div class="panel-heading">
                                <h2 class="panel-title">Individual User Folders</h2>
                            </div>
                            <div class="panel-body">
                                    <form class="form-horizontal" id="registration-form-validation" role="form" action="assets/includes/adminprocess.php" method="POST">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Individual User Homepages </label>
                                                <div class="col-sm-5">
                                                    <div class="radio radio-success radio-inline">
                                                        <input name="turn_on_individual" id="turn_on_individual" type="radio" value="1" <?php if($configs->getConfig('TURN_ON_INDIVIDUAL') == 1) { echo "checked='checked'"; } ?>>
                                                        <label for="example-inline-radio1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-danger radio-inline">
                                                        <input name="turn_on_individual" id="turn_on_individual" type="radio" value="0" <?php if($configs->getConfig('TURN_ON_INDIVIDUAL') == 0) { echo "checked='checked'"; } ?>>
                                                        <label for="example-inline-radio2">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">How are they Set? </label>
                                                <div class="col-sm-8">
                                                    <div class="radio radio-warning">
                                                        <input name="home_setbyadmin" id="home_setbyadmin" type="radio" value="0" <?php if($configs->getConfig('HOME_SETBYADMIN') == 0) { echo "checked='checked'"; } ?>>
                                                        <label for="home_setbyadmin">
                                                            By User (See User Admin pages)
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-success">
                                                        <input name="home_setbyadmin" id="home_setbyadmin" type="radio" value="1" <?php if($configs->getConfig('HOME_SETBYADMIN') == 1) { echo "checked='checked'"; } ?>>
                                                        <label for="home_setbyadmin">
                                                            By Admin (Set below..)
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="user_home_path_byadmin" class="col-sm-4 control-label">Path (Set by Admin)<span class="text-danger"></span></label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <div class="input-group">
                                                        <input class="form-control" name="user_home_path_byadmin" id="user_home_path_byadmin" placeholder="Set here" value="<?php echo $configs->getConfig('USER_HOME_PATH'); ?>">
                                                        <span class="input-group-addon">Relative to Site Root</span>
                                                    </div>
                                                    <p class="help-block">The path you choose should be set relative to the admin folder (which will be your Site Root, set in the General Settings page in the Control Panel). 
                                                    Therefore you'll most likely want to go back a folder before choosing any subfolder you create for the unique user pages. Use <i>../</i> to go back a folder. So for example, if you site's 
                                                    admin control panel is here - <i>http://www.website.com/admin/</i> and your user folders are here - <i>http://www.website.com/users/</i> you'll want to set the path setting to <i>../users/</i> 
                                                    along with your unique page - so <i>../users/admin.php</i>.</p>
                                                    <p class="help-block">Wildcard available : <strong>%username% </strong>(ie, logged in user's username) </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Exclude Admins </label>
                                                <div class="col-sm-5">
                                                    <div class="radio radio-success radio-inline">
                                                        <input name="no_admin_redirect" id="no_admin_redirect" type="radio" value="1" <?php if($configs->getConfig('NO_ADMIN_REDIRECT') == 1) { echo "checked='checked'"; } ?>>
                                                        <label for="no_admin_redirect1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-danger radio-inline">
                                                        <input name="no_admin_redirect" id="no_admin_redirect" type="radio" value="0" <?php if($configs->getConfig('NO_ADMIN_REDIRECT') == 0) { echo "checked='checked'"; } ?>>
                                                        <label for="no_admin_redirect2">
                                                            No
                                                        </label>
                                                    </div>
                                                    <p class="help-block">Exclude Admins from being redirected.</p>
                                                </div>
                                            </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-8">
                                                <?php echo $adminfunctions->stopField($session->username, 'usersettings'); ?>
                                                <input type="hidden" name="form_submission" value="user_settings">
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
                                <strong>Allow Multiple Logins</strong> - Turn on to allow multiple logins from the same account.<br><br>
                                <hr />
                                <strong>Individual User Homepages</strong> - Turn on or off the option to set individual home pages for users, which they are directed to after logon.<br><br>
                                <strong>How are they Set?</strong> - Is the homepage set by the admin here on this page (maybe using a mixture of wildcards to make the path dynamic), or in each individual user's settings.<br><br> 
                                <strong>Path</strong> - If the path is to be set by the admin, set it here using any wildcards available to you. Example : %username%<strong>/</strong>%username%.php which might be user1/user1.php - This example will be relative to the site root so for example the one above might be : <strong>http://www.website.com/login/user1/user1.php</strong><br><br>
                                <strong>Exclude Admins</strong> - Redirection is disabled for Admin Accounts if set to Yes<br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Row -->

<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>
<?php } ?>